<?php

namespace App;


trait RecordsActivity
{

    protected static function bootRecordsActivity(){
        if(auth()->guest()) return;
        foreach(static::getRecordEvents() as $event){
            static::$event(function ($model) use ($event){
                $model->recordActivity($event);
             });
        }
       
    }
    protected static function getRecordEvents(){
        return ['created'];
    }
    protected function recordActivity($event){
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $event . '_' . strtolower((new \ReflectionClass($this))->getShortName()),
        ]);
    
    }
    public function activity(){
        return $this->morphMany('App\Activity','subject');
    }
}