<?php

namespace App;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ThreadMedia extends MyModel
{
    //
    protected $table = 'thread_media';

    // NOTE THAT THE NAME OF THE FUNCTION MUST CORRESPOND TO THE NAME OF THE CLASS BEING CALLED
    public function thread(){

        return $this->belongsTo(Thread::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function getThisThreadMedia(Thread $thread){
        $result = DB::select('SELECT * FROM thread_media WHERE thread_id = :this_thread_id', array('this_thread_id' => $thread->id));
        return $result;
    }

}
