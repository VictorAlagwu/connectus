<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 3/2/18
 * Time: 11:48 PM
 */

namespace App\Filters;


use App\User;
use Illuminate\Http\Request;

class ThreadFilters extends Filters{
    
    protected $filters = ['by'];
    
    protected function by($username){
          $user = User::where('name',$username)->firstOrFail();
          return $this->builder->where('user_id',$user->id);
    }

}