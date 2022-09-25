<?php

use Illuminate\Support\Facades\Route;

Route::get('/users', function () {
    return new \App\Http\Resources\UserCollection(\App\Models\User::all());
})->middleware('auth:sanctum');
Route::get('/user/{id}', function ($id) {
    return new \App\Http\Resources\UserResource(\App\Models\User::findOrFail($id));
})->middleware(['auth:sanctum', 'admin']);


Route::get('/post/{id}', function ($id) {
    return new \App\Http\Resources\PostResource(\App\Models\Post::findOrFail($id));
})->middleware(['auth:sanctum']);