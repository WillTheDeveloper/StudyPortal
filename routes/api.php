<?php

use Illuminate\Support\Facades\Route;

// ENSURE THAT YOU USE THE MIGRATIONS THAT ARE LOCATED ON THE MASTER BRANCH!

Route::get('/users', function () {
    return new \App\Http\Resources\UserCollection(\App\Models\User::all());
})->middleware('auth:sanctum');
Route::get('/user/posts', function () {
    return new \App\Http\Resources\UserPostResource(auth()->user());
})->middleware('auth:sanctum');
Route::get('/user/{id}', function ($id) {
    return new \App\Http\Resources\UserResource(\App\Models\User::findOrFail($id));
})->middleware(['auth:sanctum', 'admin']);


Route::get('/post/{slug}', function ($slug) {
    return new \App\Http\Resources\PostResource(\App\Models\Post::firstWhere('slug', $slug));
})->middleware(['auth:sanctum']);
Route::get('/posts', function () {
    return new \App\Http\Resources\PostCollection(\App\Models\Post::all());
})->middleware(['auth:sanctum', 'admin']);


Route::get('/comment/{id}', function ($id) {
    return new \App\Http\Resources\CommentResource(\App\Models\Comment::findOrFail($id));
});

Route::get('/assignment/{id}', function ($id) {
    return new \App\Http\Resources\AssignmentResource(\App\Models\Assignment::findOrFail($id));
});
Route::get('/assignment/{id}/students', function ($id) {
    return new \App\Http\Resources\AssignmentUserResource(\App\Models\Assignment::findOrFail($id));
});