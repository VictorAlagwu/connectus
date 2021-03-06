<?php

namespace App\Http\Controllers;

use App\Filters\ThreadFilters;
use App\Thread;
use App\Channel;
use Illuminate\Http\Request;

/**
 * Class ThreadsController
 * @package App\Http\Controllers
 */
class ThreadsController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @param Channel $channel
     * @param ThreadFilters $filters
     * @return \Illuminate\Http\Response
     *
     */
    public function index(Channel $channel, ThreadFilters $filters)
    {
        //
        $threads = $this->getThreads($channel, $filters);
        
        if(request()->wantsJson()){
            return $threads;
        }
        return view('threads.index', compact('threads'));
    } 

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'channel_id' => 'required|exists:channels,id'
        ]);

        $thread = Thread::create([
            'body'=>request('body'),
            'title' =>request('title'),
            'user_id'=>auth()->id(),
            'channel_id'=>request('channel_id')
        ]);
;
        return redirect($thread->path());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($channel, Thread $thread)
    {
        //
        
        return view('threads.show', ['thread' => $thread, 'replies' => $thread->replies()->paginate(4)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy($channel, Thread $thread)
    {
        //
        // if($thread->user_id != auth()->id()){
            // if(request()->wantsJson()){
            //     return response(['status' => 'Permission Denied'], 403);
            // }

            // return redirect('/login');
        //     abort('403','You do not have permission to do this');
        // }
            $this->authorize('update', $thread);
            $thread->replies()->delete();
            $thread->delete();
            if(request()->wantsJson){return response ([], 204);}
            return redirect('/threads');
            
    }
    protected function getThreads(Channel $channel , ThreadFilters $filters){

         $threads = Thread::latest()->filter($filters);
   
        if($channel->exists){
            $threads = $channel->threads()->latest();
        }
        return $threads->get();
    }
}
