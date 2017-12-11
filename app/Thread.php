<?php

namespace App;


use function Composer\Autoload\includeFile;
use Illuminate\Support\Facades\DB;

class Thread extends MyModel
{
    //
    protected $fillable = array('body', 'title');

    public function comments(){
        return $this->hasMany(ThreadComment::class);
    }

    public function threadMedia(){
        return $this->hasMany(ThreadMedia::class);
    }

    public function addComment($body){
//        dd($body);
        $this->comments()->create(['user_id' => auth()->id()]);
//        $threadId = $this->;
//        ThreadComment::create([
//            'body' => $body,
//            'thread_id' => $threadId,
//            'user_id' => auth()->id()
//        ]);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getUserThreads(){
        $threads = Thread::where('user_id', auth()->id())->get();
        return $threads;
    }

    public static function newThread(){
//        dd(request('title'));
//        dd(request('user_id'));
        Thread::create([
//            'user_id' => request('user_id'),
            'title' => request('title'),
            'body' => request('body')
            ]);
        //TODO: Work on this in the future
        $result = DB::statement('UPDATE threads SET user_id= :this_user_id WHERE
               title= :this_title',
            array('this_user_id' => auth()->id(), 'this_title' => request('title')));

    }

    public function tags(){
        //TODO: USE DB SELECT TO RETURN THE TAGS
        return $this->belongsToMany(Tag::class);
//       $result = DB::select( select `tags`.*, `
//tag_thread`.`thread_id` as `pivot_thread_id`, `tag_thread`.`tag_id` as
//        `pivot_tag_id` from `tags` inner join `tag_thread` on `tags`.`id` = `tag_thread`.`tag_id` where `tag
//_thread`.`thread_id` = 3);
//        $result = DB::statement('SELECT name FROM tags WHERE tags.id = post_tag.tag_id AND post_tag.pos')
    }



}

