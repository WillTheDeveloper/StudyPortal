<?php

use App\Http\Controllers\Api;
use App\Http\Controllers\Assignment;
use App\Http\Controllers\Blog;
use App\Http\Controllers\Community;
use App\Http\Controllers\Contact;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Group;
use App\Http\Controllers\Kanban;
use App\Http\Controllers\Report;
use App\Http\Controllers\ThirdPartyAuthentication;
use App\Http\Controllers\Timetable;
use App\Http\Controllers\User;
use App\Http\Controllers\Notification;
use App\Http\Controllers\Note;

use App\Http\Controllers\Webhook;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserPostResource;
use App\Http\Resources\UserResource;
use App\Models\Post;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

// Normal routes
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/features', function () {
    return view('features');
})->name('features');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Dashboard routes
/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/
Route::get('/dashboard', [Dashboard::class, 'show'])
    ->middleware('auth')
    ->name('dashboard');

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

// Dynamic get routes
Route::get('/timetable', [Timetable::class, 'view'])
    ->middleware(['auth'])
    ->name('timetable');
Route::get('/community', [Community::class, 'view'])
    ->middleware(['auth', 'verified'])
    ->name('community');
Route::get('/groups/manage/{id}', [Group::class, 'returnView'])
    ->middleware(['auth', 'tutor'])
    ->name('groups.manage');
Route::get('/users', [User::class, 'showAll'])
    ->middleware(['auth', 'admin'])
    ->name('users');
Route::get('/community/user/{id}', [Community::class, 'profile'])
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
    ->middleware('auth')
    ->name('assignments.manage');
Route::get('/kanban', [Kanban::class, 'list'])
    ->middleware('auth')
    ->name('kanban.list');
Route::get('/kanban/{id}', [Kanban::class, 'view'])
    ->middleware('auth')
    ->name('kanban.view');
Route::get('/kanban/board/create', [Kanban::class, 'renderCreate'])
    ->middleware('auth')
    ->name('kanban.create');
Route::get('/notifications', [Notification::class, 'show'])
    ->middleware('auth')
    ->name('notifications.view');
Route::get('/users/{id}/manage', [User::class, 'manageUser'])
    ->middleware(['auth', 'admin'])
    ->name('user.manage');
Route::get('/notes', [Note::class, 'show'])
    ->middleware('auth')
    ->name('note.show');
Route::get('/notes/create', [Note::class, 'create'])
    ->middleware('auth')
    ->name('note.create');
Route::get('/notes/{id}/edit', [Note::class, 'edit'])
    ->middleware('auth')
    ->name('note.edit');
Route::get('/notes/{id}/view', [Note::class, 'view'])
    ->middleware('auth')
    ->name('note.render');
Route::get('/notes/{id}/delete', [Note::class, 'confirmDelete'])
    ->middleware('auth')
    ->name('note.confirm-delete');
Route::get('/settings/delete/confirm', [User::class, 'confirmDelete'])
    ->middleware('auth')
    ->name('user.confirm-delete');
Route::get('/settings', [User::class, 'settings'])
    ->middleware('auth')
    ->name('settings');
Route::get('/community/search', [Community::class, 'search'])
    ->middleware('auth', 'verified')
    ->name('community.search');
Route::get('/timetable/add', [Timetable::class, 'add'])
    ->middleware('auth')
    ->name('timetable.add');
Route::get('/reports/overview', [Report::class, 'overview'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('reports.overview');
Route::get('/community/report/{id}', [Report::class, 'view'])
    ->middleware(['auth', 'verified'])
    ->name('community.report');
Route::get('/reports/resolved', [Report::class, 'resolved'])
    ->middleware(['auth', 'admin', 'verified'])
    ->name('reports.resolved');
Route::get('/reports/unresolved', [Report::class, 'unresolved'])
    ->middleware(['auth', 'admin', 'verified'])
    ->name('reports.unresolved');
Route::get('/reports/details/{id}', [Report::class, 'details'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('report.details');
Route::get('/keys', [Api::class, 'view'])
    ->middleware(['auth', 'verified'])
    ->name('keys.view');
Route::get('/keys/new', [Api::class, 'new'])
    ->middleware(['auth', 'verified'])
    ->name('keys.new');
Route::get('/blog', [Blog::class, 'all'])
    ->name('blog');
Route::get('/blog/create', [Blog::class, 'make'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('blog.create');
Route::get('/blog/hidden', [Blog::class, 'hidden'])
    ->middleware(['auth', 'admin', 'verified'])
    ->name('blog.hidden');
Route::get('/blog/{slug}', [Blog::class, 'show'])
    ->name('blog.show');
Route::get('/webhooks', [Webhook::class, 'all'])
    ->middleware(['auth', 'verified'])
    ->name('webhook.all');

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
Route::post('/community/post/create', [Community::class, 'createNewPost'])
    ->middleware('auth')
    ->name('community.new');
Route::post('/community/post/delete/{id}', [Community::class, 'deletePost'])
    ->middleware('auth')
    ->name('community.delete');
Route::post('/kanban/delete/{id}', [Kanban::class, 'delete'])
    ->middleware('auth')
    ->name('kanban.delete');
Route::post('/community/post/{id}/comment/new', [Community::class, 'CreateNewComment'])
    ->middleware('auth')
    ->name('community.comment.new');
Route::post('/kanban/board/new', [Kanban::class, 'create'])
    ->middleware('auth')
    ->name('kanban.new');
Route::post('/kanban/{id}/group/create', [Kanban::class, 'addGroup'])
    ->middleware('auth')
    ->name('kanban.group.create');
Route::post('/kanban/{id}/item/create', [Kanban::class, 'addItem'])
    ->middleware('auth')
    ->name('kanban.item.create');
Route::post('/community/communities/join/{id}', [Community::class, 'joinSubject'])
    ->middleware('auth')
    ->name('communities.join');
Route::post('/community/communities/leave/{id}', [Community::class, 'leaveSubject'])
    ->middleware('auth')
    ->name('communities.leave');
Route::post('/profile/institution/join', [User::class, 'joinInstitution'])
    ->middleware('auth')
    ->name('institution.join');
Route::post('/contact/submit', [Contact::class, 'SendContactForm'])
    ->name('contact.submitform');
Route::post('/notifications/markallasread', [Notification::class, 'markAllAsRead'])
    ->name('notifications.markallasread');
Route::post('/users/{id}/update', [User::class, 'updateUser'])
    ->middleware(['auth', 'admin'])
    ->name('user.update');
Route::post('/community/post/{id}/update', [Community::class, 'updatePost'])
    ->middleware('auth')
    ->name('community.post.update');
Route::post('/community/comment/{id}/update', [Community::class, 'updateComment'])
    ->middleware('auth')
    ->name('community.comment.update');
Route::post('/community/comment/{id}/delete', [Community::class, 'deleteComment'])
    ->middleware('auth')
    ->name('community.comment.delete');
Route::post('/notes/create/new', [Note::class, 'newNote'])
    ->middleware('auth')
    ->name('notes.create.new');
Route::post('/notes/{id}/save', [Note::class, 'save'])
    ->middleware('auth')
    ->name('notes.save');
Route::post('/notes/{id}/delete/confirmed', [Note::class, 'deleteConfirmed'])
    ->middleware('auth')
    ->name('note.confirmed-delete');
Route::post('/settings/delete/confirmed', [User::class, 'DeleteAccount'])
    ->middleware('auth')
    ->name('delete.confirmed');
Route::post('/timetable/create', [Timetable::class, 'create'])
    ->middleware('auth')
    ->name('timetable.create');
Route::post('/community/like/{id}', [Community::class, 'like'])
    ->middleware(['auth', 'verified'])
    ->name('community.like');
Route::post('/community/report/{id}/submit', [Report::class, 'submit'])
    ->middleware(['auth', 'verified'])
    ->name('community.report.submit');
Route::post('/reports/resolve/{id}', [Report::class, 'resolve'])
    ->middleware(['auth', 'admin', 'verified'])
    ->name('reports.resolve.id');
Route::post('/reports/unresolve/{id}', [Report::class, 'unresolve'])
    ->middleware(['auth', 'admin', 'verified'])
    ->name('reports.unresolve.id');
Route::post('/blog/save', [Blog::class, 'postit'])
    ->middleware(['admin', 'auth'])
    ->name('blog.save');
Route::post('/blog/{slug}/visible', [Blog::class, 'makeVisible'])
    ->middleware(['admin', 'auth', 'verified'])
    ->name('blog.make-visible');
Route::post('/blog/{slug}/hide', [Blog::class, 'makeHidden'])
    ->middleware(['admin', 'auth', 'verified'])
    ->name('blog.make-hidden');
Route::post('/blog/{slug}/enable', [Blog::class, 'enableReplies'])
    ->middleware(['auth', 'admin', 'verified'])
    ->name('blog.enable-replies');
Route::post('/blog/{slug}/disable', [Blog::class, 'disableReplies'])
    ->middleware(['admin', 'auth', 'verified'])
    ->name('blog.disable-replies');

//API GET ROUTES
Route::prefix('api')->group(function () {
    Route::get('/user', function () {
        return new UserResource(\App\Models\User::query()->findOrFail(auth()->id()));
    })->middleware('auth:sanctum');
    Route::get('/post/{id}', function ($id) {
        return new PostResource(Post::query()->findOrFail($id));
    })->middleware('auth:sanctum');
    Route::get('/posts', function () {
        return new PostCollection(Post::all());
    })->middleware('auth:sanctum');
    Route::get('/user/posts', function () {
        return new PostCollection(Post::all()->where('user_id', auth()->id()));
    })->middleware('auth:sanctum');
});

//API POST ROUTES
Route::post('/keys/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
})->name('keys.create');

//STRIPE
Route::get('/billing-portal', function (Request $request) {
    return $request->user()->redirectToBillingPortal(route('dashboard'));
});
Route::get('/subscribe', function () {
    return auth()->user()
        ->newSubscription('default', ['price_1JiiBJDEx6ZR0UQMWtdBytdf'])
        ->checkout(
            [
                'success_url' => route('dashboard'),
                'cancel_url' => route('subscribe')
            ]
        );
})->middleware('auth')->name('subscribe');


//SOCIALITE
Route::get('/auth/github/redirect', [ThirdPartyAuthentication::class, 'githubRedirect'])
    ->name('github.redirect');

Route::get('/auth/github/callback', [ThirdPartyAuthentication::class, 'githubCallback'])
    ->name('github.callback');

// Don't delete this
require __DIR__.'/auth.php';

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
