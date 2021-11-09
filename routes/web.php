<?php

use App\Http\Controllers\Assignment;
use App\Http\Controllers\Community;
use App\Http\Controllers\Group;
use App\Http\Controllers\Kanban;
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
    return abort(401);
})->middleware(['auth', 'tutor'])->name('groups');

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
    ->middleware(['auth', 'tutor'])
    ->name('groups.manage');
Route::get('/users', [User::class, 'showAll'])
    ->middleware(['auth', 'admin'])
    ->name('users');
Route::get('/community/{id}', [Community::class, 'profile'])
    ->middleware('auth')
    ->name('community.profile');
Route::get('/community/post/{id}', [Community::class, 'post'])
    ->middleware('auth')
    ->name('community.post');
Route::get('/assignments/create', [Assignment::class, 'create'])
    ->middleware(['auth', 'tutor'])
    ->name('assignment.create');
Route::get('/groups/create', [Group::class, 'create'])
    ->middleware(['auth', 'tutor'])
    ->name('groups.create');
Route::get('/groups/update/{id}', [Group::class, 'add'])
    ->middleware(['auth', 'tutor'])
    ->name('groups.update');
Route::get('/community/subject/{id}', [Community::class, 'showSubject'])
    ->middleware('auth')
    ->name('community.subject');
Route::get('/community/popular', [Community::class, 'popular'])
    ->middleware('auth')
    ->name('community.popular');
Route::get('/community/communities', [Community::class, 'communities'])
    ->middleware('auth')
    ->name('community.communities');
Route::get('/community/trending', [Community::class, 'trending'])
    ->middleware('auth')
    ->name('community.trending');
Route::get('/assignments/edit/{id}', [Assignment::class, 'edit'])
    ->middleware(['auth', 'tutor'])
    ->name('assignment.edit');
Route::get('/groups/edit/{id}', [Group::class, 'edit'])
    ->middleware(['auth', 'tutor'])
    ->name('groups.edit');
Route::get('/assignments/manage/{id}', [Assignment::class, 'manage'])
    ->middleware(['auth', 'tutor'])
    ->name('assignments.manage');
Route::get('/kanban', [Kanban::class, 'list'])
    ->middleware('auth')
    ->name('kanban.list');
Route::get('/kanban/{id}', [Kanban::class, 'view'])
    ->middleware('auth')
    ->name('kanban.view');

// Post routes
Route::post('/assignments/delete/{id}', [Assignment::class, 'delete'])
    ->middleware(['auth', 'tutor'])
    ->name('assignment.delete');
Route::post('/assignments/new', [Assignment::class, 'new'])
    ->middleware(['auth', 'tutor'])
    ->name('assignment.new');
Route::post('/groups/new', [Group::class, 'new'])
    ->middleware(['auth', 'tutor'])
    ->name('groups.new');
Route::post('/groups/delete/{id}', [Group::class, 'delete'])
    ->middleware(['auth', 'tutor'])
    ->name('groups.delete');
Route::post('/groups/update/{id}/add', [Group::class, 'update'])
    ->middleware(['auth', 'tutor'])
    ->name('groups.add');
Route::post('/profile/update', [User::class, 'updateprofile'])
    ->middleware('auth')
    ->name('profile.update');
Route::post('/assignment/update/{id}', [Assignment::class, 'update'])
    ->middleware(['auth', 'tutor'])
    ->name('assignment.update');
Route::post('/groups/updating/{id}', [Group::class, 'updatename'])
    ->middleware(['auth', 'tutor'])
    ->name('groups.updatedata');



// Stripe Routes
Route::post('/subscribe', function (Request $request) {
    dd($request->all());
//    auth()->user()->newSubscription(
//        'default', $request->stripe,
//    )->create($request->payment_method);

//    auth()->user()->updateDefaultPaymentMethodFromStripe();
//    auth()->user()->syncStripeCustomerDetails();
});

// Don't delete this
require __DIR__.'/auth.php';
