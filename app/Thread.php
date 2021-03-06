<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Thread extends Model
{
    //
    
    use RecordsActivity;
    protected $guarded = [];

    protected $with = ['channel'];
   
    protected static function boot(){
        parent::boot();
        static::addGlobalScope('replyCount', function($builder) {
            $builder->withCount('replies');
        });

        static::addGlobalScope('user',function($builder){
            $builder->with('user');
        });
    }

    
    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }
    
    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function path(){
        return "/threads/{$this->channel->slug}/{$this->id}";
    }
    public function addReply($reply){
        return $this->replies()->create($reply);
    }
    public function channel(){
        return $this-> belongsTo(Channel::class);
    }
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
    public function getReplyCount(){
        return $this->replies()->count();
    }
}
