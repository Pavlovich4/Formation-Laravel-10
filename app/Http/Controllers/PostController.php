<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{

    public function index(): View
    {
        $posts = Post::latest()->isPublished()->paginate(8);

        return view('posts.index', compact('posts'));
    }


    public function show(string $slug, Post $post)
    {

        if ($post->slug != $slug) {
            return to_route('posts.show', ['id' => $post->id, 'slug' => $post->slug]);
        }


        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(CreatePostRequest $request)
    {

        $title = $request->input('title');

        Post::create([
            'title' => $title,
            'is_published' => $request->boolean('is_published'),
            'content' => $request->input('content')
        ]);

        return to_route('posts.index')->with('alert', [
            'type' => 'success',
            'message' => 'Article créé avec succès'
        ]);
    }

}
