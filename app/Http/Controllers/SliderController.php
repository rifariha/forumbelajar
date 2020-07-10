<?php

namespace App\Http\Controllers;

use App\DataTables\SliderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Repositories\SliderRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Str;

class SliderController extends AppBaseController
{
    /** @var  SliderRepository */
    private $sliderRepository;

    public function __construct(SliderRepository $sliderRepo)
    {
        $this->sliderRepository = $sliderRepo;
    }

    /**
     * Display a listing of the Slider.
     *
     * @param SliderDataTable $sliderDataTable
     * @return Response
     */
    public function index(SliderDataTable $sliderDataTable)
    {
        return $sliderDataTable->render('testimonials.index');
    }

    /**
     * Show the form for creating a new Slider.
     *
     * @return Response
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Store a newly created Slider in storage.
     *
     * @param CreateSliderRequest $request
     *
     * @return Response
     */
    public function store(CreateSliderRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();

            $path = $request->file('image')->storeAs('slider', Str::slug($request->slider_name) . '.' . $ext);
            $input['image'] = $path;
        }

        $slider = $this->sliderRepository->create($input);

        Flash::success('Testimoni berhasil ditambah.');

        return redirect(route('testimonials.index'));
    }

    /**
     * Display the specified Slider.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Tesimoni tidak ditemukan');

            return redirect(route('testimonials.index'));
        }

        return view('testimonials.show')->with('slider', $slider);
    }

    /**
     * Show the form for editing the specified Slider.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Tesimoni tidak ditemukan');

            return redirect(route('testimonials.index'));
        }

        return view('testimonials.edit')->with('slider', $slider);
    }

    /**
     * Update the specified Slider in storage.
     *
     * @param  int              $id
     * @param UpdateSliderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSliderRequest $request)
    {
        $slider = $this->sliderRepository->find($id);
        $input = $request->all();

        if (empty($slider)) {
            Flash::error('Tesimoni tidak ditemukan');

            return redirect(route('testimonials.index'));
        }

        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();

            $path = $request->file('image')->storeAs('slider', Str::slug($request->slider_name) . '.' . $ext);
            $input['image'] = $path;
        }

        $slider = $this->sliderRepository->update($input, $id);

        Flash::success('Tesimoni berhasil diupdate.');

        return redirect(route('testimonials.index'));
    }

    /**
     * Remove the specified Slider from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Tesimoni tidak ditemukan');

            return redirect(route('testimonials.index'));
        }

        $this->sliderRepository->delete($id);

        Flash::success('Tesimoni berhasil dihapus.');

        return redirect(route('testimonials.index'));
    }
}
