<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTopicLessonRequest;
use App\Http\Requests\UpdateTopicLessonRequest;
use App\Repositories\TopicLessonRepository;
use App\Http\Controllers\AppBaseController;
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
        $topicLessons = $this->topicLessonRepository->all();

        return view('topic_lessons.index')
            ->with('topicLessons', $topicLessons);
    }

    /**
     * Show the form for creating a new TopicLesson.
     *
     * @return Response
     */
    public function create()
    {
        return view('topic_lessons.create');
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

        $topicLesson = $this->topicLessonRepository->create($input);

        Flash::success('Topic Lesson saved successfully.');

        return redirect(route('topicLessons.index'));
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
            Flash::error('Topic Lesson not found');

            return redirect(route('topicLessons.index'));
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
    public function edit($id)
    {
        $topicLesson = $this->topicLessonRepository->find($id);

        if (empty($topicLesson)) {
            Flash::error('Topic Lesson not found');

            return redirect(route('topicLessons.index'));
        }

        return view('topic_lessons.edit')->with('topicLesson', $topicLesson);
    }

    /**
     * Update the specified TopicLesson in storage.
     *
     * @param int $id
     * @param UpdateTopicLessonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTopicLessonRequest $request)
    {
        $topicLesson = $this->topicLessonRepository->find($id);

        if (empty($topicLesson)) {
            Flash::error('Topic Lesson not found');

            return redirect(route('topicLessons.index'));
        }

        $topicLesson = $this->topicLessonRepository->update($request->all(), $id);

        Flash::success('Topic Lesson updated successfully.');

        return redirect(route('topicLessons.index'));
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
    public function destroy($id)
    {
        $topicLesson = $this->topicLessonRepository->find($id);

        if (empty($topicLesson)) {
            Flash::error('Topic Lesson not found');

            return redirect(route('topicLessons.index'));
        }

        $this->topicLessonRepository->delete($id);

        Flash::success('Topic Lesson deleted successfully.');

        return redirect(route('topicLessons.index'));
    }
}
