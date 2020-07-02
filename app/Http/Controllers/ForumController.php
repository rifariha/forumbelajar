<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateForumRequest;
use App\Http\Requests\UpdateForumRequest;
use App\Repositories\ForumRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;

class ForumController extends AppBaseController
{
    /** @var  ForumRepository */
    private $forumRepository;

    public function __construct(ForumRepository $forumRepo)
    {
        $this->forumRepository = $forumRepo;
    }

    /**
     * Display a listing of the Forum.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $forums = $this->forumRepository->all();

        return view('forums.index')
            ->with('forums', $forums);
    }

    /**
     * Show the form for creating a new Forum.
     *
     * @return Response
     */
    public function create()
    {
        return view('forums.create');
    }

    /**
     * Store a newly created Forum in storage.
     *
     * @param CreateForumRequest $request
     *
     * @return Response
     */
    public function store(CreateForumRequest $request)
    {
        $chapterId = request()->segment(2);
        $topicId = request()->segment(4);
        $input['comment'] = $request->comment;
        $input['user_id'] = Auth::user()->id;
        $input['topic_id'] = $topicId;
        $input['parent_id'] = $request->parent_id;

        $forum = $this->forumRepository->create($input);

        Flash::success('Komentar berhasil ditambah.');

        return redirect()->back();
    }

    /**
     * Display the specified Forum.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $forum = $this->forumRepository->find($id);

        if (empty($forum)) {
            Flash::error('Forum not found');

            return redirect(route('forums.index'));
        }

        return view('forums.show')->with('forum', $forum);
    }

    /**
     * Show the form for editing the specified Forum.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $forum = $this->forumRepository->find($id);

        if (empty($forum)) {
            Flash::error('Forum not found');

            return redirect(route('forums.index'));
        }

        return view('forums.edit')->with('forum', $forum);
    }

    /**
     * Update the specified Forum in storage.
     *
     * @param int $id
     * @param UpdateForumRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateForumRequest $request)
    {
        $forum = $this->forumRepository->find($id);

        if (empty($forum)) {
            Flash::error('Forum not found');

            return redirect(route('forums.index'));
        }

        $forum = $this->forumRepository->update($request->all(), $id);

        Flash::success('Komentar berhasil diupdate.');

        return redirect(route('forums.index'));
    }

    /**
     * Remove the specified Forum from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($chapterId,$topicId,$id)
    {
        $forum = $this->forumRepository->find($id);

        if (empty($forum)) {
            Flash::error('Forum not found');

            return redirect()->back();
        }

        $this->forumRepository->delete($id);

        Flash::success('Komentar berhasil dihapus.');

        return redirect()->back();
    }
}
