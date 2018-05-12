<?php

namespace App\Http\Controllers;

use App\Http\Requests\pmRequest;
use Illuminate\Http\Request;
use App\PrivateMessage;
use Auth;
use App\User;
class PMController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view_message(PrivateMessage $message)
    {
        return view('pmview', compact('message'));
    }

    public function display()
    {
        $received = PrivateMessage::where('to_id','=',Auth::user()->id)->where('deleted_by_receiver','=','0');
        $sent = PrivateMessage::where('from_id','=',Auth::user()->id)->where('deleted_by_sender','=','0');
        $display = $received->union($sent)->orderBy('created_at','desc')->get();
        return view('pmessages', compact('display'));
    }
    public function sent()
    {
        $sent = PrivateMessage::where('from_id','=',Auth::user()->id)->where('deleted_by_sender','=','0')->orderBy('created_at','desc')->get();
        return view('pmsent', compact('sent'));
    }
    public function received()
    {
        $received = PrivateMessage::where('to_id','=',Auth::user()->id)->where('deleted_by_receiver','=','0')->orderBy('created_at','desc')->get();
        return view('pmreceived', compact('received'));
    }
    public function send()
    {
        return view('pmsend');
    }

    public function reply(PrivateMessage $message)
    {
        $replyto = User::where('id','=',$message->from_id)->get();
        return view('pmreply',compact('replyto','message'));
    }

    public function store(pmRequest $request)
    {
        $usermail=$request->email;
        $userid=User::where('email',$usermail)->value('id');
        $request->merge(
            ['to_id' => $userid]
        );
        PrivateMessage::create($request->all());
        return redirect()->route('PMController.sent');
    }

    public function delete(PrivateMessage $message)
    {
        if($message->from_id==Auth::user()->id)
            PrivateMessage::where('id', $message->id)->update(['deleted_by_sender' => '1']);
        if($message->to_id==Auth::user()->id)
            PrivateMessage::where('id', $message->id)->update(['deleted_by_receiver' => '1']);
        return redirect()->back();
    }

}
