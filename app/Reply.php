<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Reply extends Model
{
    //
    protected $guarded = [];
   public function thread()
    {
    	return $this->hasOne(Thread::class);
    }
    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function path()
    {
    	return '/users/'.$this->user_id;
    }
}