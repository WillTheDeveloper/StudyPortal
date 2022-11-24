<?php

use App\Http\Controllers\Api;
use App\Http\Controllers\Assignment;
use App\Http\Controllers\Blog;
use App\Http\Controllers\Community;
use App\Http\Controllers\Contact;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Group;
use App\Http\Controllers\Institution;
use App\Http\Controllers\Kanban;
use App\Http\Controllers\Report;
use App\Http\Controllers\ThirdPartyAuthentication;
use App\Http\Controllers\Timetable;
use App\Http\Controllers\Todo;
use App\Http\Controllers\User;
use App\Http\Controllers\Notification;
use App\Http\Controllers\Note;
use App\Http\Controllers\Webhook;
use App\Http\Controllers\Ticket;
use App\Http\Controllers\Message;
use App\Http\Controllers\Shop;
use App\Http\Controllers\Placement;
use App\Http\Controllers\Calendar;
use App\Http\Controllers\Application;
use App\Http\Controllers\Resource;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/dashboard', [Dashboard::class, 'show'])
    ->middleware('auth')
    ->name('dashboard');
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
Route::get('/assignments/due', [Assignment::class, 'due'])
    ->middleware('auth')
    ->name('assignments');
Route::get('/assignments/late', [Assignment::class, 'late'])
    ->middleware('auth')
    ->name('assignments.late');
Route::get('/assignments/completed', [Assignment::class, 'completed'])
    ->middleware('auth')
    ->name('assignments.completed');
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
Route::get('/community/post/{slug}', [Community::class, 'post'])
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
Route::get('/group/{id}/discussions', [Group::class, 'discussion'])
    ->middleware(['auth', 'verified'])
    ->name('group.discussion');
Route::get('/group/{id}/discussions/replies', [Group::class, 'replies'])
    ->middleware(['auth', 'verified'])
    ->name('discussions.replies');
Route::get('/webhooks', [Webhook::class, 'all'])
    ->middleware(['auth', 'verified'])
    ->name('webhook.all');
Route::get('/webhooks/new', [Webhook::class, 'new'])
    ->middleware(['auth', 'verified'])
    ->name('webhook.new');
Route::get('/institutions', [Institution::class, 'view'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('institution.manage');
Route::get('/institutions/new', [Institution::class, 'create'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('institution.create');
Route::get('/institutions/{joincode}', [Institution::class, 'manage'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('institution.edit');
Route::get('/institutions/{joincode}/users', [Institution::class, 'users'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('institution.users');
Route::get('/institutions/{joincode}/add', [Institution::class, 'addUser'])
    ->middleware(['auth', 'admin', 'verified'])
    ->name('institutions.add');
Route::get('/institutions/{joincode}/delete', [Institution::class, 'requestDelete'])
    ->middleware(['admin', 'auth', 'verified'])
    ->name('institution.request-delete');
Route::get('/todo/completed', [Todo::class, 'completed'])
    ->middleware(['auth', 'verified'])
    ->name('todo.completed');
Route::get('/todo/archived', [Todo::class, 'archived'])
    ->middleware(['auth', 'verified'])
    ->name('todo.archived');
Route::get('/todo/active', [Todo::class, 'active'])
    ->middleware(['auth', 'verified'])
    ->name('todo.all');
Route::get('/tickets', [Ticket::class, 'switch'])
    ->middleware(['auth', 'verified'])
    ->name('tickets');
Route::get('/ticket/new', [Ticket::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('ticket.new');
Route::get('/ticket/{id}', [Ticket::class, 'viewticket'])
    ->middleware(['auth', 'verified'])
    ->name('ticket.id');
Route::get('/shop', [Shop::class, 'view'])
    ->middleware('web')
    ->name('shop');
Route::get('/shop/{slug}', [Shop::class, 'product'])
    ->middleware('web')
    ->name('shop.product');
Route::get('/placements', [Placement::class, 'view'])
    ->middleware(['auth', 'verified'])
    ->name('placements');
Route::get('/placement/{slug}', [Placement::class, 'slug'])
    ->middleware(['auth', 'verified'])
    ->name('placement.slug');
Route::get('/placement/new', [Placement::class, 'new'])
    ->middleware(['auth', 'verified'])
    ->name('placement.new');
Route::get('/calendar', [Calendar::class, 'view'])
    ->middleware(['auth', 'verified'])
    ->name('calendar');
Route::get('/applications', [Application::class, 'all'])
    ->middleware(['auth', 'verified'])
    ->name('applications');
Route::get('/application/{id}', [Application::class, 'id'])
    ->middleware(['auth', 'verified'])
    ->name('application.id');
Route::get('/placement/{slug}/apply', [Application::class, 'apply'])
    ->middleware(['auth', 'verified'])
    ->name('placement.apply');
Route::get('/placement/{slug}/applications', [Application::class, 'allapplications'])
    ->middleware(['auth', 'verified'])
    ->name('placement.applications');
Route::get('/application/{id}/review', [Application::class, 'review'])
    ->middleware(['auth', 'verified'])
    ->name('application.review');
Route::get('/resources', [Resource::class, 'view'])
    ->middleware(['auth', 'verified'])
    ->name('resources');

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
Route::post('/community/post/delete/{slug}', [Community::class, 'deletePost'])
    ->middleware('auth')
    ->name('community.delete');
Route::post('/kanban/delete/{id}', [Kanban::class, 'delete'])
    ->middleware('auth')->middleware("owner:" . \App\Models\Kanban::class)
    ->name('kanban.delete');
Route::post('/community/post/{slug}/comment/new', [Community::class, 'CreateNewComment'])
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
Route::post('/community/post/{slug}/update', [Community::class, 'updatePost'])
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
Route::post('/community/like/{slug}', [Community::class, 'like'])
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
Route::post('/group/{id}/discussions/new', [Group::class, 'newdiscussion'])
    ->middleware(['auth', 'verified', 'tutor'])
    ->name('group.new.discussion');
Route::post('/group/{id}/discussions/lock', [Group::class, 'lock'])
    ->middleware(['auth', 'verified', 'tutor'])
    ->name('discussions.lock');
Route::post('/group/{id}/discussions/unlock', [Group::class, 'unlock'])
    ->middleware(['auth', 'verified', 'tutor'])
    ->name('discussions.unlock');
Route::post('/group/{id}/discussions/delete', [Group::class,'deletediscussion'])
    ->middleware(['auth', 'verified', 'tutor'])
    ->name('discussions.delete');
Route::post('/group/{id}/discussions/reply', [Group::class, 'reply'])
    ->middleware(['auth', 'verified'])
    ->name('discussions.reply');
Route::post('/webhooks/{id}/posts/enable', [Webhook::class, 'enablePost'])
    ->middleware(['auth', 'verified'])
    ->name('webhooks.posts.enable');
Route::post('/webhooks/{id}/posts/disable', [Webhook::class, 'disablePost'])
    ->middleware(['auth', 'verified'])
    ->name('webhooks.posts.disable');
Route::post('/webhooks/{id}/comments/enable', [Webhook::class, 'enableComments'])
    ->middleware(['auth', 'verified'])
    ->name('webhooks.comments.enable');
Route::post('/webhooks/{id}/comments/disable', [Webhook::class, 'disableComments'])
    ->middleware(['auth', 'verified'])
    ->name('webhooks.comments.disable');
Route::post('/webhooks/{id}/assignments/enable', [Webhook::class, 'enableAssignments'])
    ->middleware(['auth', 'verified'])
    ->name('webhooks.assignments.enable');
Route::post('/webhooks/{id}/assignments/disable', [Webhook::class, 'disableAssignments'])
    ->middleware(['auth', 'verified'])
    ->name('webhooks.assignments.disable');
Route::post('/webhooks/{id}/blog/enable', [Webhook::class, 'enableBlog'])
    ->middleware(['auth', 'verified'])
    ->name('webhooks.blog.enable');
Route::post('/webhooks/{id}/blog/disable', [Webhook::class, 'disableBlog'])
    ->middleware(['auth', 'verified'])
    ->name('webhooks.blog.disable');
Route::post('/webhooks/{id}/enable', [Webhook::class, 'enableWebhook'])
    ->middleware(['auth', 'verified'])
    ->name('webhooks.enable');
Route::post('/webhooks/{id}/disable', [Webhook::class, 'disableWebhook'])
    ->middleware(['auth', 'verified'])
    ->name('webhooks.disable');
Route::post('/webhooks/{id}/delete', [Webhook::class, 'deleteWebhook'])
    ->middleware(['auth', 'verified'])
    ->name('webhooks.delete');
Route::post('/webhooks/create', [Webhook::class, 'createWebhook'])
    ->middleware(['auth', 'verified'])
    ->name('webhooks.create');
Route::post('/institutions/create', [Institution::class, 'create'])
    ->middleware(['admin', 'auth', 'verified'])
    ->name('institutions.create');
Route::post('/institutions/submit', [Institution::class, 'submit'])
    ->middleware(['auth', 'admin', 'verified'])
    ->name('institution.submit');
Route::post('/institutions/{joincode}/update', [Institution::class, 'update'])
    ->middleware(['auth', 'admin', 'verified'])
    ->name('institution.update');
Route::post('/institutions/{joincode}/process', [Institution::class, 'process'])
    ->middleware(['auth', 'admin', 'verified'])
    ->name('institution.process');
Route::post('/institutions/{joincode}/deletenow', [Institution::class, 'deletedelete'])
    ->middleware(['auth', 'admin', 'verified'])
    ->name('institution.deletedelete');
Route::post('/community/user/{id}/privacy', [Community::class, 'updatePrivacy'])
    ->middleware(['auth', 'verified'])
    ->name('community.update-privacy');
Route::post('/blog/{slug}/response/create', [Blog::class, 'response'])
    ->middleware(['auth', 'verified'])
    ->name('blog.response.create');
Route::post('/todo/{id}/completed', [Todo::class, 'markAsComplete'])
    ->middleware(['auth', 'verified'])
    ->name('todo.mark-as-complete');
Route::post('/todo/{id}/due', [Todo::class, 'markAsDue'])
    ->middleware(['auth', 'verified'])
    ->name('todo.mark-as-due');
Route::post('/todo/{id}/archive', [Todo::class, 'archive'])
    ->middleware(['auth', 'verified'])
    ->name('todo.mark-as-archive');
Route::post('/todo/{id}/delete', [Todo::class, 'deletearchive'])
    ->middleware(['auth', 'verified'])
    ->name('todo.delete-archive');
Route::post('/todo/{id}/restore', [Todo::class, 'restore'])
    ->middleware(['auth', 'verified'])
    ->name('todo.restore');
Route::post('/todo/create', [Todo::class, 'new'])
    ->middleware(['auth', 'verified'])
    ->name('todo.new');
Route::post('/notes/{id}/private', [Note::class, 'makePrivate'])
    ->middleware(['auth'])
    ->name('note.make-private');
Route::post('/notes/{id}/public', [Note::class, 'makePublic'])
    ->middleware(['auth'])
    ->name('note.make-public');
Route::post('/ticket/create', [Ticket::class, 'new'])
    ->middleware(['auth', 'verified'])
    ->name('ticket.create');
Route::post('/ticket/{id}/message', [Message::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('ticket.message');
Route::post('/ticket/{id}/resolved', [Ticket::class, 'resolved'])
    ->middleware(['auth', 'verified'])
    ->name('ticket.resolved');
Route::post('/placement/create', [Placement::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('placement.create');
Route::post('/application/{id}/redact', [Application::class, 'redact'])
    ->middleware(['auth', 'verified'])
    ->name('application.redact');
Route::post('/placement/{slug}/submit', [Application::class, 'submit'])
    ->middleware(['auth', 'verified'])
    ->name('placement.submit');
Route::post('/institution/{joincode}/user/add', [Institution::class, 'submitUser'])
    ->middleware(['auth', 'verified'])
    ->name('institution.submit-user');

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

// SUPPORT PAGES
Route::get('/support', function () {
    return view('support');
})->name('support')->middleware('auth');
Route::get('/support/timetable', function () {
    return view('supporttimetable');
})->name('support.timetable')->middleware('auth');
Route::get('/support/assignments', function () {
    return view('supportassignments');
})->name('support.assignments')->middleware('auth');
Route::get('/support/kanban', function () {
    return view('supportkanban');
})->name('support.kanban')->middleware('auth');
Route::get('/support/notes', function () {
    return view('supportnotes');
})->name('support.notes')->middleware('auth');
Route::get('/support/groups', function () {
    return view('supportgroups');
})->name('support.groups')->middleware('auth');
Route::get('/support/community', function () {
    return view('supportcommunity');
})->name('support.community')->middleware('auth');
Route::get('/support/users', function () {
    return view('supportusers');
})->name('support.users')->middleware('auth');
Route::get('/support/profile', function () {
    return view('supportprofile');
})->name('support.profile')->middleware('auth');

// API DOCUMENTATION PAGES

// V1
Route::name('docs.v1.')->group(function () { // Prefix the name of the routes
    Route::middleware(['auth', 'web'])->group( function () { // Apply auth middleware to the prefixed routes.
        Route::prefix('/api/v1/docs')->group(function () { // V1 Documentation. Prefix = {url}/api/v1/docs/posts for example
            Route::get('/', function () {
                return view('api.root');
            })->name('root');
            Route::get('/assignments', function () {
                return view('api.v1.assignments');
            })->name('assignments');
            Route::get('/blog', function () {
                return view('api.v1.blog');
            })->name('blog');
            Route::get('/comments', function () {
                return view('api.v1.comments');
            })->name('comments');
            Route::get('/discussion', function () {
                return view('api.v1.discussion');
            })->name('discussion');
            Route::get('/group', function () {
                return view('api.v1.group');
            })->name('group');
            Route::get('/institution', function () {
                return view('api.v1.institution');
            })->name('institution');
            Route::get('/kanban', function () {
                return view('api.v1.kanban');
            })->name('kanban');
            Route::get('/likes', function () {
                return view('api.v1.like');
            })->name('likes');
            Route::get('/notes', function () {
                return view('api.v1.notes');
            })->name('notes');
            Route::get('/posts', function () {
                return view('api.v1.posts');
            })->name('posts');
            Route::get('/reply', function () {
                return view('api.v1.reply');
            })->name('reply');
            Route::get('/report', function () {
                return view('api.v1.report');
            })->name('report');
            Route::get('/response', function () {
                return view('api.v1.response');
            })->name('response');
            Route::get('/subject', function () {
                return view('api.v1.subject');
            })->name('subject');
            Route::get('/tag', function () {
                return view('api.v1.tag');
            })->name('tag');
            Route::get('/task', function () {
                return view('api.v1.task');
            })->name('task');
            Route::get('/timetable', function () {
                return view('api.v1.timetable');
            })->name('timetable');
            Route::get('/users', function () {
                return view('api.v1.users');
            })->name('users');
            Route::get('/webhook', function () {
                return view('api.v1.webhook');
            })->name('webhook');
        });
    });
});