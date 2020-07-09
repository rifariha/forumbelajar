<?php

namespace App\Http\Controllers;

use App\DataTables\CmsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCmsRequest;
use App\Http\Requests\UpdateCmsRequest;
use App\Repositories\CmsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Str;

class CmsController extends AppBaseController
{
    /** @var  CmsRepository */
    private $cmsRepository;

    public function __construct(CmsRepository $cmsRepo)
    {
        $this->middleware(['auth', 'isAdmin']);
        $this->cmsRepository = $cmsRepo;
    }

    /**
     * Display a listing of the Cms.
     *
     * @param CmsDataTable $cmsDataTable
     * @return Response
     */
    public function index(CmsDataTable $cmsDataTable)
    {
        return $cmsDataTable->render('cms.index');
    }

    /**
     * Show the form for creating a new Cms.
     *
     * @return Response
     */
    public function create()
    {
        return view('cms.create');
    }

    /**
     * Store a newly created Cms in storage.
     *
     * @param CreateCmsRequest $request
     *
     * @return Response
     */
    public function store(CreateCmsRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('content')) {
            $file = $request->content;
            $ext = $file->getClientOriginalExtension();

            $path = $request->file('content')->storeAs('homepage', Str::slug($request->cms_name) . '.' . $ext);
            $input['content'] = $path;
        }

        $cms = $this->cmsRepository->create($input);

        Flash::success('Cms saved successfully.');

        return redirect(route('cms.index'));
    }

    /**
     * Display the specified Cms.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            Flash::error('Cms not found');

            return redirect(route('cms.index'));
        }

        return view('cms.show')->with('cms', $cms);
    }

    /**
     * Show the form for editing the specified Cms.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            Flash::error('Cms not found');

            return redirect(route('cms.index'));
        }

        return view('cms.edit')->with('cms', $cms);
    }

    /**
     * Update the specified Cms in storage.
     *
     * @param  int              $id
     * @param UpdateCmsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCmsRequest $request)
    {
        $cms = $this->cmsRepository->find($id);

        $input = $request->all();
        if (empty($cms)) {
            Flash::error('Cms not found');

            return redirect(route('cms.index'));
        }

        if ($request->hasFile('content')) {
            $file = $request->content;
            $ext = $file->getClientOriginalExtension();
            $size = $file->getSize();
            
            if($size > 512000)
            {
                Flash::error('Ukuran Gambar maksimal 512 KB');
                return redirect()->back();
            }

            if (strtolower($ext) != 'png') {
                Flash::error('Format Gambar harus .png');
                return redirect()->back();
            }

            if ($request->cms_name == 'gambar-headline') 
            {
                $height = 709;
                $width = 854;

                $data = getimagesize($file);
                $widthImage = $data[0];
                $heightImage = $data[1];

                if($widthImage != $width OR $heightImage != $height)
                {
                    Flash::error('Dimensi gambar headline harus 854 x 709 px');
                    return redirect()->back();
                }
            }
            
            $path = $request->file('content')->storeAs('homepage', Str::slug($request->cms_name) . '.' . $ext);
            $input['content'] = $path;
        }
        $cms = $this->cmsRepository->update($input, $id);

        Flash::success('Cms berhasil diupdate.');

        return redirect(route('cms.index'));
    }

    /**
     * Remove the specified Cms from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            Flash::error('Cms not found');

            return redirect(route('cms.index'));
        }

        $this->cmsRepository->delete($id);

        Flash::success('Cms berhasil dihapus.');

        return redirect(route('cms.index'));
    }
}
