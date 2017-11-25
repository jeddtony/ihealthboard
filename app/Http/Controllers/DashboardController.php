<?php

namespace App\Http\Controllers;
use App\Thread;
use App\ThreadComment;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $thisComment = new ThreadComment;
        $comments = $thisComment->getUserComments();

        $thisThread = new Thread;
        $threads = $thisThread->getUserThreads();

        return view('sessions.user_dashboard', compact('comments', 'threads'));
    }
}
