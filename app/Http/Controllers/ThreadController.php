<?php

namespace App\Http\Controllers;

use App\Thread;
use App\ThreadComment;
use App\ThreadMedia;
use Illuminate\Http\Request;
use PhpParser\Comment;

class ThreadController extends Controller
{
    //

    public function __construct()
    {
//        $this->middleware('auth')->except(['index', 'show', 'nextPage']);
    }

    public function index(){

        $threads = Thread::limit(5)->offset(0)->latest()->get();

        return view('welcome', compact('threads'));
    }

    public function nextPage($page){
        if(is_numeric($page)) {
            $offset = ($page * 5) + 1;
            $threads = Thread::limit(5)->offset($offset)->latest()->get();
//        dd($threads);
            return view('welcome', compact('threads', 'page'));
        }
        else{
            $threads = Thread::limit(5)->offset(0)->latest()->get();
            return view('welcome', compact('threads'));
        }
    }

    public function show(Thread $thread){
//        $media = $thread->threadMedia();
        $media = ThreadMedia::getThisThreadMedia($thread);
//        dd($media);
        $thread->increment('number_of_views');
        return view('layouts.thread', compact('thread', 'media'));
    }

    public function getUserThread(){
        $thisThreads = new Thread;
        $threads = $thisThreads->getUserThreads();
        return view('sessions.user_thread', compact('threads'));
    }

    public function store(){
//        $inputArray = array('title' => ValidationController::cleanInput(request('title')),
//                        'body' => ValidationController::cleanInput(request('body')));
//        dd($inputArray);
        Thread::newThread();
        $thread = Thread::latest()->first();
        $threadMediaController = new ThreadMediaController();
        $threadMediaController->multipleUpload(request('file_upload'), $thread->id);
        return back();
    }

    public function destroy($id){
        $thread = Thread::findOrFail($id);
        $thread->delete();
        return redirect('/admin/threads');

    }

    public function update($id){
        $thread = Thread::findOrFail($id);

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        $input = request()->all();

        $thread->fill($input)->save();

        return redirect('/admin/threads');
    }


}
