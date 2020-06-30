<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTopicLessonRequest;
use App\Http\Requests\UpdateTopicLessonRequest;
use App\Repositories\TopicLessonRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Chapter;
use App\Models\Topic;
use Illuminate\Http\Request;
use Flash;
use Response;

class TopicLessonController extends AppBaseController
{
    /** @var  TopicLessonRepository */
    private $topicLessonRepository;

    public function __construct(TopicLessonRepository $topicLessonRepo)
    {
        $this->topicLessonRepository = $topicLessonRepo;
    }

    /**
     * Display a listing of the TopicLesson.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $topicId = request()->segment(4);
        $topic = Topic::where('id',$topicId)->with('chapter')->first();
        $topicLessons = $this->topicLessonRepository->findWhere(['topic_id' => $topicId]);

        return view('chapters.topics.topic_lessons.index', compact('topic','topicLessons'));
    }

    /**
     * Show the form for creating a new TopicLesson.
     *
     * @return Response
     */
    public function create()
    {
        $topicId = request()->segment(4);
        $topic = Topic::where('id', $topicId)->with('chapter')->first();
        return view('chapters.topics.topic_lessons.create', compact('topic'));
    }

    /**
     * Store a newly created TopicLesson in storage.
     *
     * @param CreateTopicLessonRequest $request
     *
     * @return Response
     */
    public function store(CreateTopicLessonRequest $request)
    {
        $input = $request->all();
        $chapterId = request()->segment(2);
        $topicId = request()->segment(4);
        $input['topic_id'] = $topicId;
        $topicLesson = $this->topicLessonRepository->create($input);

        Flash::success('Materi Pelajaran Berhasil ditambah.');

        return redirect(route('topics.show',[$chapterId,$topicId]));
    }

    /**
     * Display the specified TopicLesson.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $topicLesson = $this->topicLessonRepository->find($id);

        if (empty($topicLesson)) {
            Flash::error('Materi Pelajaran tidak ditemukan');

            return redirect(route('topics.show'));
        }

        return view('topic_lessons.show')->with('topicLesson', $topicLesson);
    }

    /**
     * Show the form for editing the specified TopicLesson.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($chapter_id,$topic_id,$id)
    {
        $topicLesson = $this->topicLessonRepository->find($id);

        $topic = Topic::where('id', $topic_id)->with('chapter')->first();

        if (empty($topicLesson)) {
            Flash::error('Materi Pelajaran tidak ditemukan');

            return redirect(route('topics.show'));
        }

        return view('chapters.topics.topic_lessons.edit', compact('topicLesson', 'topic'));
    }

    /**
     * Update the specified TopicLesson in storage.
     *
     * @param int $id
     * @param UpdateTopicLessonRequest $request
     *
     * @return Response
     */
    public function update($chapterId, $topicId, $id, UpdateTopicLessonRequest $request)
    {
        $topicLesson = $this->topicLessonRepository->find($id);

        $input = $request->all();
        if (empty($topicLesson)) {
            Flash::error('Materi Pelajaran tidak ditemukan');

            return redirect(route('topics.show'));
        }

        $topicLesson = $this->topicLessonRepository->update($input, $id);

        Flash::success('Materi Pelajaran berhasil diupdate.');

        return redirect(route('topics.show', [$chapterId, $topicId]));
    }

    /**
     * Remove the specified TopicLesson from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($chapter_id, $topic_id, $id)
    {
        $topicLesson = $this->topicLessonRepository->find($id);

        if (empty($topicLesson)) {
            Flash::error('Materi Pelajaran tidak ditemukan');

            return redirect(route('topics.show'));
        }

        $this->topicLessonRepository->delete($id);

        Flash::success('Materi Pelajaran berhasil dihapus.');

        return redirect(route('topics.show', [$chapter_id, $topic_id]));
    }
}
