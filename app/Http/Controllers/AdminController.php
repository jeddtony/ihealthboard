<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //

    public function index(){
        dd("Owkay jed this is the admin controller");
    }

    public function getThreads(){
        $threads = Thread::limit(25)->offset(0)->latest()->get();
        return view('sessions.admin_view.admin_thread', compact('threads'));
    }

    public function editThread($id){
        $threads = Thread::where('id', '=', $id)->get();
        return view('sessions.admin_view.thread_edit', compact('threads'));
    }


    public function deleteThread($id){
        $threads = Thread::where('id', '=', $id)->get();
        return view('sessions.admin_view.thread_delete', compact('threads'));
    }


}
