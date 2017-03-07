<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getMessages()
    {
        return view('user.message');
    }

    public function postMessage(Request $request)
    {
        $this->validate($request,[
           'message'=>'required'
        ]);


        $user = User::where('role_id',1)->first();
            $mess = new Message();
            $mess->receive_id =$user->id;
            $mess->user_id = auth()->user()->id;
            $mess->message = $request['message'];
            $mess->status =0;
            $mess->save();

        return redirect()->route('get.messages');
    }
}
