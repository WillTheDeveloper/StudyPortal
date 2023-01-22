<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\KanbanController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StarController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ThirdPartyAuthenticationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebhookController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Normal routes
Route::get('/', function () {
    return view('guest.home');
})->name('home');
Route::get('/features', function () {
    return view('guest.features');
})->name('features');
Route::get('/contact', function () {
    return view('guest.contact');
})->name('contact');

// Dashboard routes
Route::get('/dashboard', [DashboardController::class, 'show'])
    ->middleware('auth')
    ->name('dashboard');
Route::get('/profile', function () {
    return view('dashboard.profile');
})->middleware(['auth'])->name('profile');
Route::get('/groups', function (Request $request) {
    if ($request->user()->is_tutor) {
        return view('groups');
    }
    return abort(401);
})->middleware(['auth', 'tutor'])->name('groups');
Route::get('/placements', [PlacementController::class, 'view'])
    ->middleware(['auth', 'verified'])
    ->name('placements');
Route::get('/applications', [ApplicationController::class, 'all'])
    ->middleware(['auth', 'verified'])
    ->name('applications');
Route::get('/tickets', [TicketController::class, 'switch'])
    ->middleware(['auth', 'verified'])
    ->name('tickets');
// Dynamic get routes

//assignment routes
Route::middleware(['auth'])->prefix('assignments')->group(function () {
    Route::get('/due', [AssignmentController::class, 'due'])->name('assignments');
    Route::get('/late', [AssignmentController::class, 'late'])->name('assignments.late');
    Route::get('/completed', [AssignmentController::class, 'completed'])->name('assignments.completed');
    Route::get('/manage/{id}', [AssignmentController::class, 'manage'])->name('assignments.manage');
    Route::get('/create', [AssignmentController::class, 'create'])->middleware(['tutor'])->name('assignment.create');
    Route::get('/edit/{id}', [AssignmentController::class, 'edit'])->middleware(['tutor'])->name('assignment.edit');
    Route::post('/delete/{id}', [AssignmentController::class, 'delete'])->middleware(['tutor'])->name('assignment.delete');
    Route::post('/new', [AssignmentController::class, 'new'])->middleware(['tutor'])->name('assignment.new');
});
//community routes
Route::middleware(['auth'])->prefix('community')->group(function () {
    Route::get('/', [CommunityController::class, 'view'])->middleware(['verified'])->name('community');
    Route::get('/user/{id}', [CommunityController::class, 'profile'])->name('community.profile');
    Route::get('/post/{slug}', [CommunityController::class, 'post'])->name('community.post');
    Route::get('/subject/{id}', [CommunityController::class, 'showSubject'])->name('community.subject');
    Route::get('/popular', [CommunityController::class, 'popular'])->name('community.popular');
    Route::get('/communities', [CommunityController::class, 'communities'])->name('community.communities');
    Route::get('/trending', [CommunityController::class, 'trending'])->name('community.trending');
    Route::get('/search', [CommunityController::class, 'search'])->middleware('verified')->name('community.search');
    Route::get('/report/{id}', [ReportController::class, 'view'])->middleware(['verified'])->name('community.report');
    Route::get('/communities/manage', [SubjectController::class, 'manage'])->middleware(['admin', 'verified'])->name('communities.manage');
    Route::get('/communities/new', [SubjectController::class, 'create'])->middleware(['admin', 'verified'])->name('communities.new');
    Route::get('/communities/{id}', [SubjectController::class, 'setting'])->middleware(['admin', 'verified'])->name('communities.id');
    Route::post('/post/create', [CommunityController::class, 'createNewPost'])->name('community.new');
    Route::post('/post/delete/{slug}', [CommunityController::class, 'deletePost'])->name('community.delete');
    Route::post('/post/{slug}/comment/new', [CommunityController::class, 'CreateNewComment'])->name('community.comment.new');
    Route::post('/communities/join/{id}', [CommunityController::class, 'joinSubject'])->name('communities.join');
    Route::post('/communities/leave/{id}', [CommunityController::class, 'leaveSubject'])->name('communities.leave');
    Route::post('/post/{slug}/update', [CommunityController::class, 'updatePost'])->name('community.post.update');
    Route::post('/comment/{id}/update', [CommunityController::class, 'updateComment'])->name('community.comment.update');
    Route::post('/comment/{id}/delete', [CommunityController::class, 'deleteComment'])->name('community.comment.delete');
    Route::post('/like/{slug}', [CommunityController::class, 'like'])->middleware(['verified'])->name('community.like');
    Route::post('/report/{id}/submit', [ReportController::class, 'submit'])->middleware(['verified'])->name('community.report.submit');
    Route::post('/user/{id}/privacy', [CommunityController::class, 'updatePrivacy'])->middleware(['verified'])->name('community.update-privacy');
    Route::post('/communities/{id}/update', [SubjectController::class, 'updatesettings'])->middleware(['verified', 'admin'])->name('communities.id.update');
    Route::post('/communities/create', [SubjectController::class, 'save'])->middleware(['admin', 'verified'])->name('communities.new.save');
});

//group routes
Route::middleware(['auth', 'verified'])->prefix('group')->group(function () {
    Route::get('/{id}/discussions', [GroupController::class, 'discussion'])->name('group.discussion');
    Route::get('/{id}/discussions/replies', [GroupController::class, 'replies'])->name('discussions.replies');
    Route::post('/{id}/discussions/new', [GroupController::class, 'newdiscussion'])->middleware(['tutor'])->name('group.new.discussion');
    Route::post('/{id}/discussions/lock', [GroupController::class, 'lock'])->middleware(['tutor'])->name('discussions.lock');
    Route::post('/{id}/discussions/unlock', [GroupController::class, 'unlock'])->middleware(['tutor'])->name('discussions.unlock');
    Route::post('/{id}/discussions/delete', [GroupController::class, 'deletediscussion'])->middleware(['tutor'])->name('discussions.delete');
    Route::post('/{id}/discussions/reply', [GroupController::class, 'reply'])->name('discussions.reply');
});
//groups routes
Route::middleware(['auth'])->prefix('groups')->name("groups.")->group(function () {
    Route::get('/manage/{id}', [GroupController::class, 'returnView'])->middleware(['tutor'])->name('manage');
    Route::get('/create', [GroupController::class, 'create'])->middleware(['tutor'])->name('create');
    Route::get('/update/{id}', [GroupController::class, 'add'])->middleware(['tutor'])->name('update');
    Route::get('/edit/{id}', [GroupController::class, 'edit'])->middleware(['tutor'])->name('edit');
    Route::post('/new', [GroupController::class, 'new'])->middleware(['tutor'])->name('new');
    Route::post('/delete/{id}', [GroupController::class, 'delete'])->middleware(['tutor'])->name('delete');
    Route::post('/update/{id}/add', [GroupController::class, 'update'])->middleware(['tutor'])->name('add');
    Route::post('/updating/{id}', [GroupController::class, 'updatename'])->middleware(['tutor'])->name('updatedata');
});


//kanban routes
Route::middleware(['auth'])->prefix('kanban')->name('kanban.')->group(function () {
    Route::get('/', [KanbanController::class, 'list'])->name('list');
    Route::get('/{id}', [KanbanController::class, 'view'])->name('view');
    Route::get('/board/create', [KanbanController::class, 'renderCreate'])->name('create');
    Route::post('/delete/{id}', [KanbanController::class, 'delete'])->middleware("owner:" . \App\Models\Kanban::class)->name('delete');
    Route::post('/board/new', [KanbanController::class, 'create'])->name('new');
    Route::post('/{id}/group/create', [KanbanController::class, 'addGroup'])->name('group.create');
    Route::post('/{id}/item/create', [KanbanController::class, 'addItem'])->name('item.create');
});

//blog routes
Route::get('/blog', [BlogController::class, 'all'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::middleware(['auth'])->prefix('blog')->name('blog')->group(function () {
    Route::get('/create', [BlogController::class, 'make'])->middleware(['verified', 'admin'])->name('.create');
    Route::get('/hidden', [BlogController::class, 'hidden'])->middleware(['admin', 'verified'])->name('.hidden');
    Route::post('/save', [BlogController::class, 'postit'])->middleware(['admin'])->name('.save');
    Route::post('/{slug}/visible', [BlogController::class, 'makeVisible'])->middleware(['admin',  'verified'])->name('.make-visible');
    Route::post('/{slug}/hide', [BlogController::class, 'makeHidden'])->middleware(['admin', 'verified'])->name('.make-hidden');
    Route::post('/{slug}/enable', [BlogController::class, 'enableReplies'])->middleware(['admin', 'verified'])->name('.enable-replies');
    Route::post('/{slug}/disable', [BlogController::class, 'disableReplies'])->middleware(['admin', 'verified'])->name('.disable-replies');
    Route::post('/{slug}/response/create', [BlogController::class, 'response'])->middleware(['verified'])->name('.response.create');
});
//notes routes
Route::middleware(['auth'])->prefix('notes')->group(function () {
    Route::get('/', [NoteController::class, 'show'])->name('note.show');
    Route::get('/create', [NoteController::class, 'create'])->name('note.create');
    Route::get('/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');
    Route::get('/{id}/view', [NoteController::class, 'view'])->name('note.render');
    Route::get('/{id}/delete', [NoteController::class, 'confirmDelete'])->name('note.confirm-delete');
    Route::post('/create/new', [NoteController::class, 'newNote'])->name('notes.create.new');
    Route::post('/{id}/save', [NoteController::class, 'save'])->name('notes.save');
    Route::post('/{id}/delete/confirmed', [NoteController::class, 'deleteConfirmed'])->name('note.confirmed-delete');
    Route::post('/{id}/private', [NoteController::class, 'makePrivate'])->name('note.make-private');
    Route::post('/{id}/public', [NoteController::class, 'makePublic'])->name('note.make-public');
});

//reports routes
Route::middleware(['auth', 'admin', 'verified'])->prefix('reports')->group(function () {
    Route::get('/overview', [ReportController::class, 'overview'])->name('reports.overview');
    Route::get('/resolved', [ReportController::class, 'resolved'])->name('reports.resolved');
    Route::get('/unresolved', [ReportController::class, 'unresolved'])->name('reports.unresolved');
    Route::get('/details/{id}', [ReportController::class, 'details'])->name('report.details');
    Route::post('/resolve/{id}', [ReportController::class, 'resolve'])->name('reports.resolve.id');
    Route::post('/unresolve/{id}', [ReportController::class, 'unresolve'])->name('reports.unresolve.id');
});
//placement routes
Route::middleware(['auth', 'verified'])->prefix('placement')->name('placement.')->group(function () {
    Route::get('/{slug}', [PlacementController::class, 'slug'])->name('slug');
    Route::get('/new', [PlacementController::class, 'new'])->name('new');
    Route::get('/{slug}/apply', [ApplicationController::class, 'apply'])->name('apply');
    Route::get('/{slug}/applications', [ApplicationController::class, 'allapplications'])->name('applications');
    Route::post('/create', [PlacementController::class, 'create'])->name('create');
    Route::post('/{slug}/submit', [ApplicationController::class, 'submit'])->name('submit');
});

//institutions routes
Route::middleware(['auth', 'admin', 'verified'])->prefix('institutions')->group(function () {
    Route::get('/', [InstitutionController::class, 'view'])->name('institution.manage');
    Route::get('/new', [InstitutionController::class, 'create'])->name('institution.create');
    Route::get('/{joincode}', [InstitutionController::class, 'manage'])->name('institution.edit');
    Route::get('/{joincode}/users', [InstitutionController::class, 'users'])->name('institution.users');
    Route::get('/{joincode}/add', [InstitutionController::class, 'addUser'])->name('institutions.add');
    Route::get('/{joincode}/delete', [InstitutionController::class, 'requestDelete'])->name('institution.request-delete');
    Route::post('/create', [InstitutionController::class, 'create'])->name('institutions.create');
    Route::post('/submit', [InstitutionController::class, 'submit'])->name('institution.submit');
    Route::post('/{joincode}/update', [InstitutionController::class, 'update'])->name('institution.update');
    Route::post('/{joincode}/process', [InstitutionController::class, 'process'])->name('institution.process');
    Route::post('/{joincode}/deletenow', [InstitutionController::class, 'deletedelete'])->name('institution.deletedelete');
});

//application routes
Route::middleware(['auth', 'verified'])->prefix('application')->name('application.')->group(function () {
    Route::get('/{id}', [ApplicationController::class, 'id'])->name('id');
    Route::get('/{id}/review', [ApplicationController::class, 'review'])->name('review');
    Route::post('/{id}/redact', [ApplicationController::class, 'redact'])->name('redact');
});
//webhooks routes
Route::middleware(['auth', 'verified'])->prefix('webhooks')->group(function () {
    Route::get('/', [WebhookController::class, 'all'])->name('webhook.all');
    Route::get('/new', [WebhookController::class, 'new'])->name('webhook.new');
    Route::post('/{id}/posts/enable', [WebhookController::class, 'enablePost'])->name('webhooks.posts.enable');
    Route::post('/{id}/posts/disable', [WebhookController::class, 'disablePost'])->name('webhooks.posts.disable');
    Route::post('/{id}/comments/enable', [WebhookController::class, 'enableComments'])->name('webhooks.comments.enable');
    Route::post('/{id}/comments/disable', [WebhookController::class, 'disableComments'])->name('webhooks.comments.disable');
    Route::post('/{id}/assignments/enable', [WebhookController::class, 'enableAssignments'])->name('webhooks.assignments.enable');
    Route::post('/{id}/assignments/disable', [WebhookController::class, 'disableAssignments'])->name('webhooks.assignments.disable');
    Route::post('/{id}/blog/enable', [WebhookController::class, 'enableBlog'])->name('webhooks.blog.enable');
    Route::post('/{id}/blog/disable', [WebhookController::class, 'disableBlog'])->name('webhooks.blog.disable');
    Route::post('/{id}/enable', [WebhookController::class, 'enableWebhook'])->name('webhooks.enable');
    Route::post('/{id}/disable', [WebhookController::class, 'disableWebhook'])->name('webhooks.disable');
    Route::post('/{id}/delete', [WebhookController::class, 'deleteWebhook'])->name('webhooks.delete');
    Route::post('/create', [WebhookController::class, 'createWebhook'])->name('webhooks.create');
});
//todo routes
Route::middleware(['auth', 'verified'])->prefix('todo')->name('todo.')->group(function () {
    Route::get('/completed', [TodoController::class, 'completed'])->name('completed');
    Route::get('/archived', [TodoController::class, 'archived'])->name('archived');
    Route::get('/active', [TodoController::class, 'active'])->name('all');
    Route::post('/{id}/completed', [TodoController::class, 'markAsComplete'])->name('mark-as-complete');
    Route::post('/{id}/due', [TodoController::class, 'markAsDue'])->name('mark-as-due');
    Route::post('/{id}/archive', [TodoController::class, 'archive'])->name('mark-as-archive');
    Route::post('/{id}/delete', [TodoController::class, 'deletearchive'])->name('delete-archive');
    Route::post('/{id}/restore', [TodoController::class, 'restore'])->name('restore');
    Route::post('/create', [TodoController::class, 'new'])->name('new');
});

//resources routes
Route::middleware(['auth', 'verified'])->prefix('resources')->group(function () {
    Route::get('/', [ResourceController::class, 'main'])->name('resources');
    Route::get('/search', [ResourceController::class, 'search'])->name('resources.search');
    Route::get('/results', [ResourceController::class, 'myresourceresults'])->name('resources.results');
    Route::get('/search/results', [ResourceController::class, 'results'])->name('resources.search.results');
    Route::get('/starred', [StarController::class, 'starred'])->name('resources.starred');
    Route::get('/create', [ResourceController::class, 'create'])->name('resource.create');
    Route::get('/{id}', [ResourceController::class, 'show'])->name('resource.id');
    Route::post('/{id}/star', [StarController::class, 'star'])->name('resources-id.star');
    Route::post('/upload', [ResourceController::class, 'store'])->name('resources.upload');
});

//tickets routes
Route::middleware(['auth', 'verified'])->prefix('ticket')->name('ticket.')->group(function () {
    Route::get('/new', [TicketController::class, 'create'])->name('new');
    Route::get('/{id}', [TicketController::class, 'viewticket'])->name('id');
    Route::post('/create', [TicketController::class, 'new'])->name('create');
    Route::post('/{id}/message', [MessageController::class, 'create'])->name('message');
    Route::post('/{id}/resolved', [TicketController::class, 'resolved'])->name('resolved');
});

//keys routes
Route::middleware(['auth', 'verified'])->prefix('keys')->name('keys.')->group(function () {
    Route::get('/', [ApiController::class, 'view'])->name('view');
    Route::get('/new', [ApiController::class, 'new'])->name('new');
    //API POST ROUTES
    Route::post('/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name);
        return ['token' => $token->plainTextToken];
    })->name('create');
});
//shop routes
Route::prefix('shop')->name('shop')->group(function () {
    Route::get('/', [ShopController::class, 'view']);
    Route::get('/management', [ShopController::class, 'manage'])->middleware(['auth', 'admin', 'verified'])->name('.management');
    Route::get('/{slug}', [ShopController::class, 'product'])->name('.product');
});

//timetable routes
Route::middleware(['auth'])->prefix('timetable')->name('timetable')->group(function () {
    Route::get('/', [TimetableController::class, 'view']);
    Route::get('/add', [TimetableController::class, 'add'])->name('.add');
    Route::post('/create', [TimetableController::class, 'create'])->name('.create');
});

//users routes
Route::middleware(['auth', 'admin'])->prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'showAll'])->name('users');
    Route::get('/{id}/manage', [UserController::class, 'manageUser'])->name('user.manage');
    Route::post('/{id}/update', [UserController::class, 'updateUser'])->name('user.update');
});



Route::get('/notifications', [NotificationController::class, 'show'])
    ->middleware('auth')
    ->name('notifications.view');
Route::get('/settings/delete/confirm', [UserController::class, 'confirmDelete'])
    ->middleware('auth')
    ->name('user.confirm-delete');
Route::get('/settings', [UserController::class, 'settings'])
    ->middleware('auth')
    ->name('settings');
Route::get('/calendar', [CalendarController::class, 'view'])
    ->middleware(['auth', 'verified'])
    ->name('calendar');

// Post routes
Route::post('/profile/update', [UserController::class, 'updateprofile'])
    ->middleware('auth')
    ->name('profile.update');
Route::post('/assignment/update/{id}', [AssignmentController::class, 'update'])
    ->middleware(['auth', 'tutor'])
    ->name('assignment.update');
Route::post('/profile/institution/join', [UserController::class, 'joinInstitution'])
    ->middleware('auth')
    ->name('institution.join');
Route::post('/contact/submit', [ContactController::class, 'SendContactForm'])
    ->name('contact.submitform');
Route::post('/notifications/markallasread', [NotificationController::class, 'markAllAsRead'])
    ->name('notifications.markallasread');
Route::post('/settings/delete/confirmed', [UserController::class, 'DeleteAccount'])
    ->middleware('auth')
    ->name('delete.confirmed');
Route::post('/institution/{joincode}/user/add', [InstitutionController::class, 'submitUser'])
    ->middleware(['auth', 'verified'])
    ->name('institution.submit-user');


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
Route::get('/auth/github/redirect', [ThirdPartyAuthenticationController::class, 'githubRedirect'])
    ->name('github.redirect');

Route::get('/auth/github/callback', [ThirdPartyAuthenticationController::class, 'githubCallback'])
    ->name('github.callback');

// Don't delete this
require __DIR__ . '/auth.php';

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
Route::middleware(['auth'])->prefix('support')->name('support')->group(function () {
    Route::get('/', function () {
        return view('support.index');
    });
    Route::get('/timetable', function () {
        return view('support.timetable');
    })->name('.timetable');
    Route::get('/assignments', function () {
        return view('support.assignments');
    })->name('.assignments');
    Route::get('/kanban', function () {
        return view('support.kanban');
    })->name('.kanban');
    Route::get('/notes', function () {
        return view('support.notes');
    })->name('.notes');
    Route::get('/groups', function () {
        return view('support.groups');
    })->name('.groups');
    Route::get('/community', function () {
        return view('support.community');
    })->name('.community');
    Route::get('/users', function () {
        return view('support.users');
    })->name('.users');
    Route::get('/profile', function () {
        return view('support.profile');
    })->name('.profile');
});


// API DOCUMENTATION PAGES

// V1
Route::name('docs.v1.')->group(function () { // Prefix the name of the routes
    Route::middleware(['auth', 'web'])->group(function () { // Apply auth middleware to the prefixed routes.
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
