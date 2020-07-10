<?php

namespace App\Http\Controllers;

use App\DataTables\NewsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Repositories\NewsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\News;    
use App\Models\NewsCategory;
use Response;
use Illuminate\Support\Str;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
class NewsController extends AppBaseController
{
    /** @var  NewsRepository */
    private $newsRepository;

    public function __construct(NewsRepository $newsRepo)
    {
        $this->middleware(['auth', 'isAdmin']);
        $this->newsRepository = $newsRepo;
    }

    /**
     * Display a listing of the News.
     *
     * @param NewsDataTable $newsDataTable
     * @return Response
     */
    public function index(NewsDataTable $newsDataTable)
    {
        return $newsDataTable->render('news.index');
    }

    /**
     * Show the form for creating a new News.
     *
     * @return Response
     */
    public function create()
    {
        $category = NewsCategory::pluck('category_name','id');
        return view('news.create')->with('category', $category);
    }

    /**
     * Store a newly created News in storage.
     *
     * @param CreateNewsRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();

            $path = $request->file('image')->storeAs('berita', Str::slug($request->headline) . '.' . $ext);
            
            //make thumbnail
            $thumbnailName = Str::slug($request->headline) . '.' . $ext;
            $thumbnailPath = public_path('/thumbnail/' . $thumbnailName);
            $this->resize_crop_image(500, 500, $request->file('image'), $thumbnailPath);
            
            // $img = Image::make($request->file('image'));
            // $img->crop(500, 500);
            // $thumbnailPath = public_path('/thumbnail');
            // $thumbnailName = Str::slug($request->headline) . '.' . $ext;
            // $img->save($thumbnailPath . '/' .$thumbnailName);

            $input['thumbnail'] = $thumbnailName;
            $input['image'] = $path;
        }
        
        $slug = Str::slug($request->headline) . '-' . Str::random(5);
        $input['slug'] = $slug;
        $input['created_by'] = Auth::user()->name;

        $news = $this->newsRepository->create($input);

        Flash::success('Berita berhasil ditambah.');

        return redirect(route('news.index'));
    }

    /**
     * Display the specified News.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // $news = $this->newsRepository->find($id);
        $news = News::with('category')->where(['id' => $id])->first();
        if (empty($news)) {
            Flash::error('Berita tidak ditemukan');

            return redirect(route('news.index'));
        }

        return view('news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified News.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $news = $this->newsRepository->find($id);
        $category = NewsCategory::pluck('category_name', 'id');

        if (empty($news)) {
            Flash::error('Berita tidak ditemukan');

            return redirect(route('news.index'));
        }

        return view('news.edit', compact('news','category'));
    }

    /**
     * Update the specified News in storage.
     *
     * @param  int              $id
     * @param UpdateNewsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsRequest $request)
    {
        $news = $this->newsRepository->find($id);
        $input = $request->all();
        if (empty($news)) {
            Flash::error('Berita tidak ditemukan');

            return redirect(route('news.index'));
        }

        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();

            $path = $request->file('image')->storeAs('berita', Str::slug($request->headline) . '.' . $ext);

            //make thumbnail
            $thumbnailName = Str::slug($request->headline) . '.' . $ext;
            $thumbnailPath = public_path('/thumbnail/'.$thumbnailName);
            $this->resize_crop_image(500, 500, $request->file('image'), $thumbnailPath);

            // $img = Image::make($request->file('image'));
            // $img->crop(500, 500);
            // $img->save($thumbnailPath . '/' . $thumbnailName);

            $input['thumbnail'] = $thumbnailName;
            $input['image'] = $path;
        }

        $slug = Str::slug($request->headline).'-'.Str::random(5);
        $input['slug'] = $slug;
        $news = $this->newsRepository->update($input, $id);

        Flash::success('Berita berhasil diupdate.');

        return redirect(route('news.index'));
    }

    /**
     * Remove the specified News from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('Berita tidak ditemukan');

            return redirect(route('news.index'));
        }

        $this->newsRepository->delete($id);

        Flash::success('Berita berhasil dihapus.');

        return redirect(route('news.index'));
    }

    function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 80)
    {
        $imgsize = getimagesize($source_file);
        $width = $imgsize[0];
        $height = $imgsize[1];
        $mime = $imgsize['mime'];

        switch($mime){
            case 'image/gif':
                $image_create = "imagecreatefromgif";
                $image = "imagegif";
                break;

            case 'image/png':
                $image_create = "imagecreatefrompng";
                $image = "imagepng";
                $quality = 7;
                break;

            case 'image/jpeg':
                $image_create = "imagecreatefromjpeg";
                $image = "imagejpeg";
                $quality = 80;
                break;

            default:
                return false;
                break;
        }

        $dst_img = imagecreatetruecolor($max_width, $max_height);
        $src_img = $image_create($source_file);

        $width_new = $height * $max_width / $max_height;
        $height_new = $width * $max_height / $max_width;
        //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
        if($width_new > $width){
            //cut point by height
            $h_point = (($height - $height_new) / 2);
            //copy image
            imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
        }else{
            //cut point by width
            $w_point = (($width - $width_new) / 2);
            imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
        }

        $image($dst_img, $dst_dir, $quality);

        if($dst_img)imagedestroy($dst_img);
        if($src_img)imagedestroy($src_img);
    }
}
