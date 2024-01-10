<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(8);

        return view('posts.index', compact('posts'));
    }


    public function show($slug, $id)
    {
        $post = Post::findOrFail($id);


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
            'slug' => str($title)->slug(),
            'content' => $request->input('content')
        ]);

        return to_route('posts.index')->with('alert', [
            'type' => 'success',
            'message' => 'Article créé avec succès'
        ]);
    }

}
