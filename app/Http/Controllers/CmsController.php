<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCmsRequest;
use App\Http\Requests\UpdateCmsRequest;
use App\Repositories\CmsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CmsController extends AppBaseController
{
    /** @var  CmsRepository */
    private $cmsRepository;

    public function __construct(CmsRepository $cmsRepo)
    {
        $this->cmsRepository = $cmsRepo;
    }

    /**
     * Display a listing of the Cms.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cms = $this->cmsRepository->all();

        return view('cms.index')
            ->with('cms', $cms);
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

        $cms = $this->cmsRepository->create($input);

        Flash::success('Cms saved successfully.');

        return redirect(route('cms.index'));
    }

    /**
     * Display the specified Cms.
     *
     * @param int $id
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
     * @param int $id
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
     * @param int $id
     * @param UpdateCmsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCmsRequest $request)
    {
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            Flash::error('Cms not found');

            return redirect(route('cms.index'));
        }

        $cms = $this->cmsRepository->update($request->all(), $id);

        Flash::success('Cms updated successfully.');

        return redirect(route('cms.index'));
    }

    /**
     * Remove the specified Cms from storage.
     *
     * @param int $id
     *
     * @throws \Exception
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

        Flash::success('Cms deleted successfully.');

        return redirect(route('cms.index'));
    }
}
