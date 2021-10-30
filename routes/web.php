<?php

use App\Http\Controllers\Assignment;
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

Route::get('/assignments/manage/{id}', [Assignment::class, 'manage'])
    ->middleware(['auth'])
    ->name('assignments.manage');

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
Route::get('/timetable', [Timetable::class, 'view'])
    ->middleware(['auth'])
    ->name('timetable');
Route::get('/community', [Community::class, 'view'])
    ->middleware('auth')
    ->name('community');
Route::get('/groups/manage/{id}', [Group::class, 'returnView'])
    ->middleware('auth')
    ->name('groups.manage');
Route::get('/users', [User::class, 'showAll'])
    ->middleware('auth')
    ->name('users');
Route::get('/community/{id}', [Community::class, 'profile'])
    ->middleware('auth')
    ->name('community.profile');
Route::get('/community/post/{id}', [Community::class, 'post'])
    ->middleware('auth')
    ->name('community.post');
Route::get('/assignments/create', [Assignment::class, 'create'])
    ->middleware('auth')
    ->name('assignment.create');
Route::get('/groups/create', [Group::class, 'create'])
    ->middleware('auth')
    ->name('groups.create');
Route::get('/groups/update/{id}', [Group::class, 'add'])
    ->middleware('auth')
    ->name('groups.update');
Route::get('/community/subject/{id}', [Community::class, 'showSubject'])
    ->middleware('auth')
    ->name('community.subject');
Route::get('/community/popular', [Community::class, 'popular'])
    ->middleware('auth')
    ->name('community.popular');
Route::get('/community/communities', [Community::class, 'communites'])
    ->middleware('auth')
    ->name('community.communities');
Route::get('/community/trending', [Community::class, 'trending'])
    ->middleware('auth')
    ->name('community.trending');

// Post routes
Route::post('/assignments/delete/{id}', [Assignment::class, 'delete'])
    ->middleware(['auth'])
    ->name('assignment.delete');
Route::post('/assignments/new', [Assignment::class, 'new'])
    ->middleware('auth')
    ->name('assignment.new');
Route::post('/groups/new', [Group::class, 'new'])
    ->middleware('auth')
    ->name('groups.new');
Route::post('/groups/delete/{id}', [Group::class, 'delete'])
    ->middleware('auth')
    ->name('groups.delete');
Route::post('/groups/update/{id}/add', [Group::class, 'update'])
    ->middleware('auth')
    ->name('groups.add');
Route::post('/profile/update', [User::class, 'updateprofile'])
    ->middleware('auth')
    ->name('profile.update');



// Stripe Routes
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
