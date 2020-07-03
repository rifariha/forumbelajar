<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Repositories\MessageRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
class MessageController extends AppBaseController
{
    /** @var  MessageRepository */
    private $messageRepository;

    public function __construct(MessageRepository $messageRepo)
    {
        $this->messageRepository = $messageRepo;
    }

    /**
     * Display a listing of the Message.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $messages = $this->messageRepository->all();
        $messages = Message::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        $sents = Message::where('sender_id', Auth::user()->id)->groupBy('batch')->orderBy('created_at', 'desc')->paginate(10);
       
        return view('messages.index',compact('messages','sents'));
    }

    /**
     * Show the form for creating a new Message.
     *
     * @return Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created Message in storage.
     *
     * @param CreateMessageRequest $request
     *
     * @return Response
     */
    public function store(CreateMessageRequest $request)
    {
        $last_batch = Message::orderBy('id', 'desc')->pluck('batch')->first();
        
        $new_batch = (int)$last_batch + 1;
        $users = User::where('status',1)->where('id','!=',1)->where('id','!=',2)->pluck('id');
        $bulk = [];
        foreach ($users as $user) 
        {
            $message = [
                'subject' => $request->subject,
                'sender_id' =>  Auth::user()->id,
                'sender_name' =>  Auth::user()->name,
                'message' => $request->message,
                'user_id' => $user,
                'status' => 0,
                'batch' => $new_batch,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            array_push($bulk,$message);
        }
        DB::beginTransaction();
        try {
            Message::insert($bulk);
            DB::commit();
            Flash::success('Message saved successfully.');
        } catch (\Throwable $th) {
            Flash::error($th);
        }

        return redirect(route('messages.index'));
    }

    /**
     * Display the specified Message.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $message = Message::where("id",$id)->where('user_id', Auth::user()->id)->first();

        if (empty($message)) {
            Flash::error('Pesan tidak ditemukan');

            return redirect(route('messages.index'));
        }

        Message::where('id',$id)->update(['status' => 1]);
        return view('messages.show')->with('message', $message);
    }

    /**
     * Display the specified Message.
     *
     * @param int $id
     *
     * @return Response
     */
    public function sentItemDetail($id)
    {
        // $sent = $this->messageRepository->find($id);
        $sent = Message::where(['batch' => $id])->first();

        if (empty($sent)) {
            Flash::error('Pesan tidak ditemukan');

            return redirect(route('messages.index'));
        }

        return view('messages.sent-item-show')->with('sent', $sent);
    }

    public function resend($id)
    {
        //get old message data
        $old = Message::where(['batch' => $id])->first();
        
        //get last batch
        $last_batch = Message::orderBy('id', 'desc')->pluck('batch')->first();

        //create new batch
        $new_batch = (int) $last_batch + 1;
        //get all users id
        $users = User::where('status', 1)->where('id', '!=', 1)->where('id', '!=', 2)->pluck('id');
        $bulk = [];
        foreach ($users as $user) {
            $message = [
                'subject' => $old->subject,
                'sender_id' =>  Auth::user()->id,
                'sender_name' =>  Auth::user()->name,
                'message' => $old->message,
                'user_id' => $user,
                'status' => 0,
                'batch' => $new_batch,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            array_push($bulk, $message);
        }
        DB::beginTransaction();
        try {
            Message::insert($bulk);
            DB::commit();
            Flash::success('Pesan berhasil terkirim.');
        } catch (\Throwable $th) {
            Flash::error($th);
        }

        return redirect(route('messages.index'));

    }

    /**
     * Show the form for editing the specified Message.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        return view('messages.edit')->with('message', $message);
    }

    /**
     * Update the specified Message in storage.
     *
     * @param int $id
     * @param UpdateMessageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMessageRequest $request)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        $message = $this->messageRepository->update($request->all(), $id);

        Flash::success('Message updated successfully.');

        return redirect(route('messages.index'));
    }

    /**
     * Remove the specified Message from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        $this->messageRepository->delete($id);

        Flash::success('Message berhasil dihapus.');

        return redirect(route('messages.index'));
    }
}
