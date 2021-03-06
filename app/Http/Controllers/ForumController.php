<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateForumRequest;
use App\Http\Requests\UpdateForumRequest;
use App\Repositories\ForumRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\BackupLog;
use App\Models\Chapter;
use App\Models\Forum;
use App\Models\Topic;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use PDF;
use Storage;
use Illuminate\Support\Str;
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
        $forums = Forum::with(['topic' => function($q){
            $q->with('chapter');
        }])->with('user')->orderBy('created_at', 'desc')->paginate(10);
        
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

        Forum::where('parent_id',$id)->delete();
        $this->forumRepository->delete($id);

        Flash::success('Komentar berhasil dihapus.');

        return redirect()->back();
    }

    public function backupDiscussion(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $start = $request->start_date.' 00:00:00';
        $end = $request->end_date. ' 23:59:59';

        $topicId = $request->topic_id;
        $chapterId = request()->segment(2);
        $topic = Topic::where('id',$topicId)->first();
        $folder = Str::random(6);

        $comments = Forum::with('user', 'descendant')->whereBetween('created_at', [$start, $end])->where(['topic_id' => $topicId])->get();
        $pdf = PDF::loadview('chapters.topics.topic_lessons.discussion_backup',['comments' => $comments, 'topic' => $topic])->setPaper('a4')->setWarnings(false);
        $filename = 'Backup-Diskusi-Materi-' . $topic->topic_name .'-Tanggal-' . $request->start_date . '-Sampai-' . $request->end_date . '.pdf';
        
        $content = $pdf->download()->getOriginalContent();

        Storage::put('discussion/backup/'.$folder.'/'.$filename, $content);
        
        $backup_log = [
            'topic_id' => $topicId,
            'status' => 1,
            'created_by' => Auth::user()->name,
            'folder' => $folder,
            'filename' => $filename
        ];

        BackupLog::create($backup_log);
        
        Forum::whereBetween('created_at', [$start, $end])->where(['topic_id' => $topicId])->delete();

        Flash::success('Diskusi berhasil di backup.');

        return redirect(route('topics.show', [$chapterId, $topicId]));
    }
}