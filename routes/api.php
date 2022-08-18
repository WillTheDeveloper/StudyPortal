<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user/{id}', function ($id) {
    return new \App\Http\Resources\UserResource(\App\Models\User::query()->findOrFail($id));
})->middleware('auth:sanctum');