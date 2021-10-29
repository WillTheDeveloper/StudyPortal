<?php

use App\Http\Controllers\Community;
use App\Http\Controllers\Group;
use App\Http\Controllers\Timetable;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/assignments', function () {
    return view('assignments');
})->middleware(['auth'])->name('assignments');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

Route::get('/groups', function (Request $request) {
    if ($request->user()->is_tutor) {
        return view('groups');
    }
    return view('dashboard');
})->middleware(['auth'])->name('groups');

Route::get('/subscribe', function () {
    return view('subscribe', [
        'intent' => auth()->user()->createSetupIntent()
    ]);
})->middleware(['auth'])->name('subscribe');

// Dynamic get routes
Route::get('/timetable', [Timetable::class, 'view'])->middleware(['auth'])->name('timetable');
Route::get('/community', [Community::class, 'view'])->middleware('auth')->name('community');
Route::get('/groups/manage/{id}', [Group::class, 'returnView'])->middleware('auth')->name('groups.manage');
Route::get('/users', [User::class, 'showAll'])->middleware('auth')->name('users');
Route::get('/community/{id}', [Community::class, 'profile'])->middleware('auth')->name('community.profile');
Route::get('/community/post/{id}', [Community::class, 'post'])->middleware('auth')->name('community.post');

// Post routes
Route::post('/subscribe', function (Request $request) {
    dd($request->all());
//    auth()->user()->newSubscription(
//        'default', $request->stripe,
//    )->create($request);

//    auth()->user()->updateDefaultPaymentMethodFromStripe();
//    auth()->user()->syncStripeCustomerDetails();
});

// Don't delete this
require __DIR__.'/auth.php';
