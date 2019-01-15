<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;
use App\Services\IForumService;

class ForumController extends Controller
{
    private $forumService;

    public function __construct(IForumService $forumService)
    {
        $this->forumService = $forumService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Forum::with('title')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forum = $this->forumService->create($request->all())->load('title');

        return response()->json($forum->load('title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        return response()->json($forum->load('title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        $forum = $this->forumService->update($forum, $request->all());

        return response()->json($forum->load('title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        $forum->destroy();
    }
}
