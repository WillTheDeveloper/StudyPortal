<?php

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user/current', function () {
    return new UserResource(User::query()->findOrFail(auth()->id()));
})->middleware('auth:sanctum');

Route::get('/user/{id}', function ($id) {
    return new UserResource(User::query()->findOrFail($id));
})->middleware('auth:sanctum');