<?php

namespace App\Http\Composers;

use Illuminate\Support\Facades\View;
use App\Models\Message;
use Auth;
class MasterComposer
{

    public function compose($view)
    {
        $read = Message::where('user_id', Auth::user()->id)->where('status',0)->count();
        $data = array(
            'read' => $read
        );
        View::share($data);
    }
}