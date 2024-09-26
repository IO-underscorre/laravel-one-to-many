<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Helper;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(20);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Helper::generateSlug($data['title'], Post::class);
        $data['reading_time'] = Helper::getReadingTime($data['body']);

        $new_post = Post::create($data);

        return redirect()->route('admin.posts.show', $new_post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (!isset($post)) {
            abort(404);
        }

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (!isset($post)) {
            abort(404);
        }

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        if (!isset($post)) {
            abort(404);
        }

        $data = $request->all();

        $data['slug'] = Helper::generateSlug($data['title'], Post::class);
        $data['reading_time'] = Helper::getReadingTime($data['body']);

        $post->update($data);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (!isset($post)) {
            abort(404);
        }

        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
