<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Just a beta home page
Route::get('/', function () {
    return view('home');
});

// Concept pages
Route::get('/concept/dashboard', function () {
    return view('concept.dashboard');
});
Route::get('/concept/assignments', function () {
    return view('concept.assignments');
});
Route::get('/concept/resources', function () {
    return view('concept.resources');
});
Route::get('/concept/community', function () {
    return view('concept.community');
});
Route::get('/concept/timetable', function () {
    return view('concept.timetable');
});
Route::get('/concept/settings', function () {
    return view('concept.settings');
});
