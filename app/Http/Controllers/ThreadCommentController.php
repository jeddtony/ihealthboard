<?php

namespace App\Http\Controllers;

use App\Thread;
use App\ThreadComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThreadCommentController extends Controller
{
    //
    protected $fillable = array('body', 'title');

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Thread $thread){
//        $thread->addComment(request('body'));

        ThreadComment::newComment($thread);

        return back();

    }

    public function getUserComment(){
        $thisThreads = new ThreadComment;
        $comments = $thisThreads->getUserComments();
        return view('sessions.user_comment', compact('comments'));
    }
}
