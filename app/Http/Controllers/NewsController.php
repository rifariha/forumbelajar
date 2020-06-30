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
            $input['image'] = $path;
        }
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
            $input['image'] = $path;
        }

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
}
