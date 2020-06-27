<?php

namespace App\Http\Controllers;

use App\DataTables\TopicDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Repositories\TopicRepository;
use Flash;
use App\Models\Chapter;
use Illuminate\Support\Str;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;

class TopicController extends AppBaseController
{
    /** @var  TopicRepository */
    private $topicRepository;

    public function __construct(TopicRepository $topicRepo)
    {
        $this->topicRepository = $topicRepo;
    }

    /**
     * Display a listing of the Topic.
     *
     * @param TopicDataTable $topicDataTable
     * @return Response
     */
    public function index($id, TopicDataTable $topicDataTable)
    {
        $chapterId = request()->segment(2);
        $chapter = Chapter::find($chapterId);
        
        return $topicDataTable->render('chapters.topics.index',compact('chapter'));
    }

    /**
     * Show the form for creating a new Topic.
     *
     * @return Response
     */
    public function create($id)
    {
        $chapter = Chapter::find($id);
        return view('chapters.topics.create',compact('chapter'));
    }

    /**
     * Store a newly created Topic in storage.
     *
     * @param CreateTopicRequest $request
     *
     * @return Response
     */
    public function store($id, CreateTopicRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $size = $file->getSize();
            $allowed = ['jpg', 'png', 'jpeg'];
            if ($size < 15000) {
                Flash::error('Ukuran maksimal gambar 1 MB');
                return redirect()->back();
            }

            if (!in_array($ext, $allowed)) {
                Flash::error('Ekstensi harus berformat jpg/png');
                return redirect()->back();
            }

            $path = $request->file('image')->storeAs('covermateri', Str::slug($request->topic_name).'.'.$ext);
            $input['image'] = $path;
        }
        else {
            $input['image'] = 'covermateri/default_cover.jpg';
        }
        $input['chapter_id'] = $id;
        $input['created_by'] = Auth::user()->name;
        $topic = $this->topicRepository->create($input);

        Flash::success('Materi berhasil ditambah.');

        return redirect(route('chapters.show',[$id]));
    }

    /**
     * Display the specified Topic.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id,$topic_id)
    {
        $topic = $this->topicRepository->find($id);

        if (empty($topic)) {
            Flash::error('Topic not found');

            return redirect(route('chapter.show'));
        }

        return view('chapters.topics.show')->with('topic', $topic);
    }

    /**
     * Show the form for editing the specified Topic.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id,$topic_id)
    {
        $topic = $this->topicRepository->find($topic_id);

        if (empty($topic)) {
            Flash::error('Topic not found');

            return redirect(route('chapter.show'));
        }
        $chapter = Chapter::find($id);
        return view('chapters.topics.edit', compact('topic', 'chapter'));
    }

    /**
     * Update the specified Topic in storage.
     *
     * @param  int              $id
     * @param UpdateTopicRequest $request
     *
     * @return Response
     */
    public function update($id,$topic_id, UpdateTopicRequest $request)
    {
        $topic = $this->topicRepository->find($topic_id);
        $input = $request->all();
        if (empty($topic)) {
            Flash::error('Topic not found');

            return redirect(route('topics.index'));
        }

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

            $path = $request->file('image')->storeAs('covermateri', Str::slug($request->topic_name) . '.' . $ext);
            $input['image'] = $path;
        } else {
            $input['image'] = $topic->image;
        }

        $topic = $this->topicRepository->update($input, $topic_id);
        
        Flash::success('Materi berhasil diupdate.');

        return redirect(route('chapters.show', [$id]));
    }

    /**
     * Remove the specified Topic from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id, $topic_id)
    {
        $topic = $this->topicRepository->find($topic_id);

        if (empty($topic)) {
            Flash::error('Topic not found');

            return redirect(route('topics.index'));
        }

        $this->topicRepository->delete($topic_id);

        Flash::success('Topic deleted successfully.');

        return redirect(route('chapters.show', [$id]));
    }
}
