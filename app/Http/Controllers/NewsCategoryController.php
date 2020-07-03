<?php

namespace App\Http\Controllers;

use App\DataTables\NewsCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNewsCategoryRequest;
use App\Http\Requests\UpdateNewsCategoryRequest;
use App\Repositories\NewsCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NewsCategoryController extends AppBaseController
{
    /** @var  NewsCategoryRepository */
    private $newsCategoryRepository;

    public function __construct(NewsCategoryRepository $newsCategoryRepo)
    {
        $this->middleware(['auth', 'isAdmin']);
        $this->newsCategoryRepository = $newsCategoryRepo;
    }

    /**
     * Display a listing of the NewsCategory.
     *
     * @param NewsCategoryDataTable $newsCategoryDataTable
     * @return Response
     */
    public function index(NewsCategoryDataTable $newsCategoryDataTable)
    {
        $this->middleware(['auth', 'isAdmin']);
        return $newsCategoryDataTable->render('news_categories.index');
    }

    /**
     * Show the form for creating a new NewsCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('news_categories.create');
    }

    /**
     * Store a newly created NewsCategory in storage.
     *
     * @param CreateNewsCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsCategoryRequest $request)
    {
        $input = $request->all();

        $newsCategory = $this->newsCategoryRepository->create($input);

        Flash::success('Kategori baru berhasil disimpan.');

        return redirect(route('newsCategories.index'));
    }

    /**
     * Display the specified NewsCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $newsCategory = $this->newsCategoryRepository->find($id);

        if (empty($newsCategory)) {
            Flash::error('Kategori tidak ditemukan');

            return redirect(route('newsCategories.index'));
        }

        return view('news_categories.show')->with('newsCategory', $newsCategory);
    }

    /**
     * Show the form for editing the specified NewsCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $newsCategory = $this->newsCategoryRepository->find($id);

        if (empty($newsCategory)) {
            Flash::error('Kategori tidak ditemukan');

            return redirect(route('newsCategories.index'));
        }

        return view('news_categories.edit')->with('newsCategory', $newsCategory);
    }

    /**
     * Update the specified NewsCategory in storage.
     *
     * @param  int              $id
     * @param UpdateNewsCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsCategoryRequest $request)
    {
        $newsCategory = $this->newsCategoryRepository->find($id);

        if (empty($newsCategory)) {
            Flash::error('Kategori tidak ditemukan');

            return redirect(route('newsCategories.index'));
        }

        $newsCategory = $this->newsCategoryRepository->update($request->all(), $id);

        Flash::success('Kategori berhasil diupdate.');

        return redirect(route('newsCategories.index'));
    }

    /**
     * Remove the specified NewsCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $newsCategory = $this->newsCategoryRepository->find($id);

        if (empty($newsCategory)) {
            Flash::error('Kategori tidak ditemukan');

            return redirect(route('newsCategories.index'));
        }

        $this->newsCategoryRepository->delete($id);

        Flash::success('Kategori berhasil dihapus.');

        return redirect(route('newsCategories.index'));
    }
}
