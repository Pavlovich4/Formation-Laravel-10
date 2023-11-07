<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/articles')->name('posts.')->group(function () {

    Route::get('/', function (Request $request) {
        return [
            [
                'title' => 'Ici mon super article',
                'content' => 'Ici mon contenu'
            ]
        ];
    })->name('index');

    Route::get('/{slug}-{id}', function ($slug, $id) {
        return 'Ici mon super article avec comme slug : ' . $slug . ' avec l\'ID ' . $id;
    })
        ->where([
        'slug' => '[a-z0-9\-]+',
        'id' => '[0-9]+'
    ])->name('show');
});







