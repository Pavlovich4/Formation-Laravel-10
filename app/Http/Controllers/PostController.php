<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class PostController extends Controller
{

    public function index(): View
    {
        $posts = Post::with('author')->latest()->isPublished()->paginate(12);

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
        $post = new Post();

        return view('posts.create', compact('post'));
    }

    public function store(CreatePostRequest $request)
    {
        $imagePath = '';

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $title = $request->input('title');

        Post::create([
            'title' => $title,
            'is_published' => $request->boolean('is_published'),
            'content' => $request->input('content'),
            'image' => $imagePath
        ]);

        return to_route('posts.index')->with('alert', [
            'type' => 'success',
            'message' => 'Article créé avec succès'
        ]);
    }

    public function edit(Post $post)
    {
        //Gate::authorize('update', $post);

        if (!auth()->user()->can('update', $post)) {
            abort(401);
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'is_published' => 'required',
            'image' => 'file|nullable'
        ]);

        $imagePath = '';

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'is_published' => $request->boolean('is_published'),
            'image' => $imagePath
        ]);

        return to_route('posts.index')->with('alert', [
            'type' => 'success',
            'message' => 'Article edité avec succès'
        ]);
    }


    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();

        return back()->with('alert', [
            'type' => 'success',
            'message' => 'Article supprime avec succes'
        ]);
    }
}
