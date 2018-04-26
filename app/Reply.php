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
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited');
    }
    // public function favorite()
    // {
    //     if(!$this->favorites()->when(['user_id' => auth()->id()])->exists()){
    //        return  $this->favorites()->create(['user_id' => auth()->id()]);
    //     }
       
    // }
     public function favorite()
    {
        $attributes = ['user_id' => auth()->id()];
        if (! $this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
    }

    /**
     * Determine if the current reply has been favorited.
     *
     * @return boolean
     */
    public function isFavorited()
    {
        return $this->favorites->where('user_id', auth()->id())->count();
    }
}
