<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index () {
        return [
            [
                'title' => 'Ici mon super article',
                'content' => 'Ici mon contenu'
            ]
        ];
    }

    public function show ($slug, $id) {
        return 'Ici mon super article avec comme slug : ' . $slug . ' avec l\'ID ' . $id;
    }
}
