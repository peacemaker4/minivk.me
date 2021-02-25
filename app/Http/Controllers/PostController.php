<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post', [
            'except'=>['index', 'show']
        ]);
    }
    public function index()
    {
        $posts=Post::query()
            ->latest()
            ->paginate(7);

        return view('pages.posts.feed',[
            'posts'=>$posts
        ]);
    }
    public function show(Post $post)
    {
        return view('pages.posts.show', [
            'posts'=>$post
        ]);
    }
    public function create()
    {
        return view('pages.posts.create');
    }

    public function store(PostRequest $request)
    {
        $post=auth()->user()
            ->posts()
            ->create($request->validatedWithImage());
        return redirect()->route('posts.show', $post);
    }

    public function edit(Post $post)
    {
        return view('pages.posts.create',[
            'post'=>$post
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validatedWithImage());
        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $post->deleteImage();
        $post->delete();
        return redirect()->route('posts.index');
    }
    function removeImage(Post $post){
        $this->authorize('update', $post);

        $post->deleteImage();
        $post->update([
            'image_path'=>null
        ]);
        return back();
    }
}
