<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Controllers\WelcomeController::class)->name('home');

Route::prefix('/posts')
    ->controller(App\Http\Controllers\PostController::class)
    ->name('posts.')
    ->group(function () {


    Route::get('/{slug}-{post}', 'show')
        ->where([
        'slug' => '[a-z0-9\-]+'
    ])->name('show');
});

Route::resource('posts', \App\Http\Controllers\PostController::class)->except(['show']);

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login.get');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');







