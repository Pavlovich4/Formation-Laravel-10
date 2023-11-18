<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'Ici mon super article',
                'content' => 'Ici mon contenu'
            ],
            [
                'id' => 2,
                'title' => 'Ici mon second super article',
                'content' => 'Ici mon second contenu'
            ]
        ];

        return view('posts.index', compact('posts'));
    }


    public function show($slug, $id) {

        return view('posts.show', compact('slug', 'id'));
    }
}
