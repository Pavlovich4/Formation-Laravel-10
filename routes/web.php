<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Controllers\WelcomeController::class)->name('home');

Route::prefix('/articles')
    ->controller(App\Http\Controllers\PostController::class)
    ->name('posts.')
    ->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('/{slug}-{id}', 'show')
        ->where([
        'slug' => '[a-z0-9\-]+',
        'id' => '[0-9]+'
    ])->name('show');
});







