<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{    
    use DatabaseMigrations;
 
    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function a_user_can_view_all_threads()
    {
    	$response = $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /** @test */
    function a_user_can_view_single_thread (){

       $this->get('/threads/'.$this->thread->id)
            ->assertSee($this->thread->title);
    }

    /** @test */
    function a_user_can_view_a_thread_replies(){

        $reply = factory('App\Reply')
            ->create(['thread_id' => $this->thread->id]);
        
            $this->get('/threads/'.$this->thread->id)
                ->assertSee($reply->body);

    }

  
}

