<?php

use Illuminate\Support\Facades\Route;

// Normal routes
Route::get('/', function () {
    return view('home');
});
Route::get('/features', function () {
    return view('features');
});
Route::get('/pricing', function () {
    return view('pricing');
});
Route::get('/contact', function () {
    return view('contact');
});

// Dashboard routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/timetable', function () {
    return view('timetable');
})->middleware(['auth'])->name('timetable');

Route::get('/assignments', function () {
    return view('assignments');
})->middleware(['auth'])->name('assignments');

Route::get('/community', function () {
    return view('community');
})->middleware(['auth'])->name('community');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

// Don't delete this
require __DIR__.'/auth.php';
