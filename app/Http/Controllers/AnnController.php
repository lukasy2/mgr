<?php

namespace App\Http\Controllers;

use App\Http\Requests\annRequest;
use Illuminate\Http\Request;
use App\Announcement;
use App\User;
use Auth;
class AnnController extends Controller
{

    public function __construct()
    {
        // uprawnienia do ogloszen
        $this->middleware('auth', ['only' => ['reply', 'create', 'store']]);
        // Alternativly
        $this->middleware('auth', ['except' => ['index', 'ann']]);
    }

    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(5);
        return view('announcements', compact('announcements'));
    }

    public function ann(Announcement $announcement)
    {
        return view('announcement', compact('announcement'));
    }

    public function reply(Announcement $announcement)
    {
        $replyto = User::where('id','=',$announcement->user_id)->get();

        return view('annreply',compact('replyto','announcement'));
    }

    public function create()
    {
        return view('anncreate');
    }

    public function store(annRequest $request)
    {
        Announcement::create($request->all());
        return redirect()->route('AnnController.index');
    }

}
