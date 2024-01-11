<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Controllers\WelcomeController::class)->name('home');

Route::prefix('/articles')
    ->controller(App\Http\Controllers\PostController::class)
    ->name('posts.')
    ->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('/{slug}-{post}', 'show')
        ->where([
        'slug' => '[a-z0-9\-]+'
    ])->name('show');

    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
});







