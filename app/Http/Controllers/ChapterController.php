<?php

namespace App\Http\Controllers;

use App\DataTables\ChapterDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Repositories\ChapterRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Str;
use Response;

class ChapterController extends AppBaseController
{
    /** @var  ChapterRepository */
    private $chapterRepository;

    public function __construct(ChapterRepository $chapterRepo)
    {
        $this->chapterRepository = $chapterRepo;
    }

    /**
     * Display a listing of the Chapter.
     *
     * @param ChapterDataTable $chapterDataTable
     * @return Response
     */
    public function index(ChapterDataTable $chapterDataTable)
    {
        return $chapterDataTable->render('chapters.index');
    }

    /**
     * Show the form for creating a new Chapter.
     *
     * @return Response
     */
    public function create()
    {
        return view('chapters.create');
    }

    /**
     * Store a newly created Chapter in storage.
     *
     * @param CreateChapterRequest $request
     *
     * @return Response
     */
    public function store(CreateChapterRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $size = $file->getSize();
            $allowed = ['jpg', 'png', 'jpeg'];

            if (!in_array($ext, $allowed)) {
                Flash::error('Ekstensi harus berformat jpg/png');
                return redirect()->back();
            }

            if ($size < 15000) {
                Flash::error('Ukuran maksimal gambar 1 MB');
                return redirect()->back();
            }
            
            $path = $request->file('image')->storeAs('coverbab', Str::slug($request->chapter_name).'.'.$ext);
            $input['image'] = $path;
        }
        else {
            $input['image'] = 'coverbab/default_cover.jpg';
        }
        
        $chapter = $this->chapterRepository->create($input);

        Flash::success('Bab berhasil ditambah.');

        return redirect(route('chapters.index'));
    }

    /**
     * Display the specified Chapter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            Flash::error('Chapter not found');

            return redirect(route('chapters.index'));
        }

        return view('topics.show')->with('chapter', $chapter);
    }

    /**
     * Show the form for editing the specified Chapter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            Flash::error('Chapter not found');

            return redirect(route('chapters.index'));
        }

        return view('chapters.edit')->with('chapter', $chapter);
    }

    /**
     * Update the specified Chapter in storage.
     *
     * @param  int              $id
     * @param UpdateChapterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChapterRequest $request)
    {
        $chapter = $this->chapterRepository->find($id);
        $input = $request->all();
        if (empty($chapter)) {
            Flash::error('Bab Tidak Ditemukan');

            return redirect(route('chapters.index'));
        }

        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $size = $file->getSize();
            $allowed = ['jpg','png','jpeg'];

            if(!in_array($ext, $allowed))
            {
                Flash::error('Ekstensi harus berformat jpg/png');
                return redirect()->back();
            }

            if($size < 15000)
            {
                Flash::error('Ukuran maksimal gambar 1 MB');
                return redirect()->back();
            }

            $path = $request->file('image')->storeAs('coverbab', Str::slug($request->chapter_name) . '.' . $ext);
            $input['image'] = $path;
        }
        else
        {
            $input['image'] = $chapter->image;
        }

        $chapter = $this->chapterRepository->update($input, $id);

        Flash::success('Bab berhasil diupdate.');

        return redirect(route('chapters.index'));
    }

    /**
     * Remove the specified Chapter from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            Flash::error('Chapter not found');

            return redirect(route('chapters.index'));
        }

        $this->chapterRepository->delete($id);

        Flash::success('Bab berhasil dihapus.');

        return redirect(route('chapters.index'));
    }
}
