<?php

namespace App;


class Tag extends MyModel
{
    //

    public function threads(){
        return $this->belongsToMany(Thread::class);
    }
}
