<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostCollection;

class PostController extends Controller
{
    protected $post;
    public function __construct(Post $post){
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(new PostCollection(
            $this->post->orderBy('id', 'desc')->get()
        ), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = $this->post->create($request->all());
        return response()->json(new PostResource($post), 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response()->json(new PostResource($post), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());
        return response()->json(new PostResource($post), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message'=>'Post eliminado'], 200); 
    }
}
