<?php

namespace App;

use Illuminate\Support\Facades\DB;
class ThreadComment extends MyModel
{
    //

    // NOTE THAT THE NAME OF THE FUNCTION MUST CORRESPOND TO THE NAME OF THE CLASS BEING CALLED
    public function thread(){

        return $this->belongsTo(Thread::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function newComment(Thread $thread){
//
        ThreadComment::create([
            'body' => request('body'),
//            'thread_id' => $thread->id
//            'user_id' => auth()->id()
        ]);

        //TODO: Work on this in the future
        $result = DB::statement('UPDATE thread_comments SET user_id= :this_user_id, thread_id= :thread_id WHERE 
               body = :this_body',
            array('this_user_id' => auth()->id(), 'thread_id' => $thread->id, 'this_body' => request('body')));
    }

    public function getUserComments(){
        $threadComments = ThreadComment::where('user_id', auth()->id())->distinct()->get();
        return $threadComments;
    }
}
