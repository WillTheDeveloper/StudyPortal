<?php

use App\Http\Controllers\Api;
use App\Http\Controllers\Assignment;
use App\Http\Controllers\Blog;
use App\Http\Controllers\Community;
use App\Http\Controllers\Contact;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Exam;
use App\Http\Controllers\Expenses;
use App\Http\Controllers\Group;
use App\Http\Controllers\Institution;
use App\Http\Controllers\Kanban;
use App\Http\Controllers\Report;
use App\Http\Controllers\Star;
use App\Http\Controllers\Subject;
use App\Http\Controllers\Subscription;
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
    return view('guest.home');
})->name('home');
Route::get('/features', function () {
    return view('guest.features');
})->name('features');
Route::get('/pricing', function () {
    return view('guest.pricing');
})->name('pricing');
Route::get('/contact', function () {
    return view('guest.contact');
})->name('contact');

// Dashboard routes
Route::get('/dashboard', [Dashboard::class, 'show'])
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
Route::get('/placements', [Placement::class, 'view'])
    ->middleware(['auth', 'verified'])
    ->name('placements');
Route::get('/applications', [Application::class, 'all'])
    ->middleware(['auth', 'verified'])
    ->name('applications');
Route::get('/tickets', [Ticket::class, 'switch'])
    ->middleware(['auth', 'verified'])
    ->name('tickets');
// Dynamic get routes

//assignment routes
Route::middleware(['auth'])->prefix('assignments')->group(function () {
    Route::get('/due', [Assignment::class, 'due'])->name('assignments');
    Route::get('/late', [Assignment::class, 'late'])->name('assignments.late');
    Route::get('/completed', [Assignment::class, 'completed'])->name('assignments.completed');
    Route::get('/manage/{id}', [Assignment::class, 'manage'])->name('assignments.manage');
    Route::get('/create', [Assignment::class, 'create'])->middleware(['tutor'])->name('assignment.create');
    Route::get('/edit/{id}', [Assignment::class, 'edit'])->middleware(['tutor'])->name('assignment.edit');
    Route::post('/delete/{id}', [Assignment::class, 'delete'])->middleware(['tutor'])->name('assignment.delete');
    Route::post('/new', [Assignment::class, 'new'])->middleware(['tutor'])->name('assignment.new');
});
//community routes
Route::middleware(['auth'])->prefix('community')->group(function () {
    Route::get('/', [Community::class, 'view'])->middleware(['verified'])->name('community');
    Route::get('/user/{id}', [Community::class, 'profile'])->name('community.profile');
    Route::get('/post/{slug}', [Community::class, 'post'])->name('community.post');
    Route::get('/subject/{id}', [Community::class, 'showSubject'])->name('community.subject');
    Route::get('/popular', [Community::class, 'popular'])->name('community.popular');
    Route::get('/communities', [Community::class, 'communities'])->name('community.communities');
    Route::get('/trending', [Community::class, 'trending'])->name('community.trending');
    Route::get('/search', [Community::class, 'search'])->middleware('verified')->name('community.search');
    Route::get('/report/{id}', [Report::class, 'view'])->middleware(['verified'])->name('community.report');
    Route::get('/communities/manage', [Subject::class, 'manage'])->middleware(['admin', 'verified'])->name('communities.manage');
    Route::get('/communities/new', [Subject::class, 'create'])->middleware(['admin', 'verified'])->name('communities.new');
    Route::get('/communities/{id}', [Subject::class, 'setting'])->middleware(['admin', 'verified'])->name('communities.id');
    Route::post('/post/create', [Community::class, 'createNewPost'])->name('community.new');
    Route::post('/post/delete/{slug}', [Community::class, 'deletePost'])->name('community.delete');
    Route::post('/post/{slug}/comment/new', [Community::class, 'CreateNewComment'])->name('community.comment.new');
    Route::post('/communities/join/{id}', [Community::class, 'joinSubject'])->name('communities.join');
    Route::post('/communities/leave/{id}', [Community::class, 'leaveSubject'])->name('communities.leave');
    Route::post('/post/{slug}/update', [Community::class, 'updatePost'])->name('community.post.update');
    Route::post('/comment/{id}/update', [Community::class, 'updateComment'])->name('community.comment.update');
    Route::post('/comment/{id}/delete', [Community::class, 'deleteComment'])->name('community.comment.delete');
    Route::post('/like/{slug}', [Community::class, 'like'])->middleware(['verified'])->name('community.like');
    Route::post('/report/{id}/submit', [Report::class, 'submit'])->middleware(['verified'])->name('community.report.submit');
    Route::post('/user/{id}/privacy', [Community::class, 'updatePrivacy'])->middleware(['verified'])->name('community.update-privacy');
    Route::post('/communities/{id}/update', [Subject::class, 'updatesettings'])->middleware(['verified', 'admin'])->name('communities.id.update');
    Route::post('/communities/create', [Subject::class, 'save'])->middleware(['admin', 'verified'])->name('communities.new.save');
});

//group routes
Route::middleware(['auth', 'verified'])->prefix('group')->group(function () {
    Route::get('/{id}/discussions', [Group::class, 'discussion'])->name('group.discussion');
    Route::get('/{id}/discussions/replies', [Group::class, 'replies'])->name('discussions.replies');
    Route::post('/{id}/discussions/new', [Group::class, 'newdiscussion'])->middleware(['tutor'])->name('group.new.discussion');
    Route::post('/{id}/discussions/lock', [Group::class, 'lock'])->middleware(['tutor'])->name('discussions.lock');
    Route::post('/{id}/discussions/unlock', [Group::class, 'unlock'])->middleware(['tutor'])->name('discussions.unlock');
    Route::post('/{id}/discussions/delete', [Group::class, 'deletediscussion'])->middleware(['tutor'])->name('discussions.delete');
    Route::post('/{id}/discussions/reply', [Group::class, 'reply'])->name('discussions.reply');
});
//groups routes
Route::middleware(['auth'])->prefix('groups')->name("groups.")->group(function () {
    Route::get('/manage/{id}', [Group::class, 'returnView'])->middleware(['tutor'])->name('groups.manage');
    Route::get('/create', [Group::class, 'create'])->middleware(['tutor'])->name('create');
    Route::get('/update/{id}', [Group::class, 'add'])->middleware(['tutor'])->name('update');
    Route::get('/edit/{id}', [Group::class, 'edit'])->middleware(['tutor'])->name('edit');
    Route::post('/new', [Group::class, 'new'])->middleware(['tutor'])->name('new');
    Route::post('/delete/{id}', [Group::class, 'delete'])->middleware(['tutor'])->name('delete');
    Route::post('/update/{id}/add', [Group::class, 'update'])->middleware(['tutor'])->name('add');
    Route::post('/updating/{id}', [Group::class, 'updatename'])->middleware(['tutor'])->name('updatedata');
});


//kanban routes
Route::middleware(['auth'])->prefix('kanban')->name('kanban.')->group(function () {
    Route::get('/', [Kanban::class, 'list'])->name('list');
    Route::get('/{id}', [Kanban::class, 'view'])->name('view');
    Route::get('/board/create', [Kanban::class, 'renderCreate'])->name('create');
    Route::post('/delete/{id}', [Kanban::class, 'delete'])->middleware("owner:" . \App\Models\Kanban::class)->name('delete');
    Route::post('/board/new', [Kanban::class, 'create'])->name('new');
    Route::post('/{id}/group/create', [Kanban::class, 'addGroup'])->name('group.create');
    Route::post('/{id}/item/create', [Kanban::class, 'addItem'])->name('item.create');
});

//blog routes
Route::middleware(['auth'])->prefix('blog')->name('blog')->group(function () {
    Route::get('/', [Blog::class, 'all']);
    Route::get('/create', [Blog::class, 'make'])->middleware(['verified', 'admin'])->name('.create');
    Route::get('/hidden', [Blog::class, 'hidden'])->middleware(['admin', 'verified'])->name('.hidden');
    Route::get('/{slug}', [Blog::class, 'show'])->name('.show');
    Route::post('/save', [Blog::class, 'postit'])->middleware(['admin'])->name('.save');
    Route::post('/{slug}/visible', [Blog::class, 'makeVisible'])->middleware(['admin',  'verified'])->name('.make-visible');
    Route::post('/{slug}/hide', [Blog::class, 'makeHidden'])->middleware(['admin', 'verified'])->name('.make-hidden');
    Route::post('/{slug}/enable', [Blog::class, 'enableReplies'])->middleware(['admin', 'verified'])->name('.enable-replies');
    Route::post('/{slug}/disable', [Blog::class, 'disableReplies'])->middleware(['admin', 'verified'])->name('.disable-replies');
    Route::post('/{slug}/response/create', [Blog::class, 'response'])->middleware(['verified'])->name('.response.create');
});
//notes routes
Route::middleware(['auth'])->prefix('notes')->group(function () {
    Route::get('/', [Note::class, 'show'])->name('note.show');
    Route::get('/create', [Note::class, 'create'])->name('note.create');
    Route::get('/{id}/edit', [Note::class, 'edit'])->name('note.edit');
    Route::get('/{id}/view', [Note::class, 'view'])->name('note.render');
    Route::get('/{id}/delete', [Note::class, 'confirmDelete'])->name('note.confirm-delete');
    Route::post('/create/new', [Note::class, 'newNote'])->name('notes.create.new');
    Route::post('/{id}/save', [Note::class, 'save'])->name('notes.save');
    Route::post('/{id}/delete/confirmed', [Note::class, 'deleteConfirmed'])->name('note.confirmed-delete');
    Route::post('/{id}/private', [Note::class, 'makePrivate'])->name('note.make-private');
    Route::post('/{id}/public', [Note::class, 'makePublic'])->name('note.make-public');
});

//reports routes
Route::middleware(['auth', 'admin', 'verified'])->prefix('reports')->group(function () {
    Route::get('/overview', [Report::class, 'overview'])->name('reports.overview');
    Route::get('/resolved', [Report::class, 'resolved'])->name('reports.resolved');
    Route::get('/unresolved', [Report::class, 'unresolved'])->name('reports.unresolved');
    Route::get('/details/{id}', [Report::class, 'details'])->name('report.details');
    Route::post('/resolve/{id}', [Report::class, 'resolve'])->name('reports.resolve.id');
    Route::post('/unresolve/{id}', [Report::class, 'unresolve'])->name('reports.unresolve.id');
});
//placement routes
Route::middleware(['auth', 'verified'])->prefix('placement')->name('placement.')->group(function () {
    Route::get('/{slug}', [Placement::class, 'slug'])->name('slug');
    Route::get('/new', [Placement::class, 'new'])->name('new');
    Route::get('/{slug}/apply', [Application::class, 'apply'])->name('apply');
    Route::get('/{slug}/applications', [Application::class, 'allapplications'])->name('applications');
    Route::post('/create', [Placement::class, 'create'])->name('create');
    Route::post('/{slug}/submit', [Application::class, 'submit'])->name('submit');
});

//institutions routes
Route::middleware(['auth', 'admin', 'verified'])->prefix('institutions')->group(function () {
    Route::get('/', [Institution::class, 'view'])->name('institution.manage');
    Route::get('/new', [Institution::class, 'create'])->name('institution.create');
    Route::get('/{joincode}', [Institution::class, 'manage'])->name('institution.edit');
    Route::get('/{joincode}/users', [Institution::class, 'users'])->name('institution.users');
    Route::get('/{joincode}/add', [Institution::class, 'addUser'])->name('institutions.add');
    Route::get('/{joincode}/delete', [Institution::class, 'requestDelete'])->name('institution.request-delete');
    Route::post('/create', [Institution::class, 'create'])->name('institutions.create');
    Route::post('/submit', [Institution::class, 'submit'])->name('institution.submit');
    Route::post('/{joincode}/update', [Institution::class, 'update'])->name('institution.update');
    Route::post('/{joincode}/process', [Institution::class, 'process'])->name('institution.process');
    Route::post('/{joincode}/deletenow', [Institution::class, 'deletedelete'])->name('institution.deletedelete');
});

//application routes
Route::middleware(['auth', 'verified'])->prefix('application')->name('application.')->group(function () {
    Route::get('/{id}', [Application::class, 'id'])->name('id');
    Route::get('/{id}/review', [Application::class, 'review'])->name('review');
    Route::post('/{id}/redact', [Application::class, 'redact'])->name('redact');
});
//webhooks routes
Route::middleware(['auth', 'verified'])->prefix('webhooks')->group(function () {
    Route::get('/', [Webhook::class, 'all'])->name('webhook.all');
    Route::get('/new', [Webhook::class, 'new'])->name('webhook.new');
    Route::post('/{id}/posts/enable', [Webhook::class, 'enablePost'])->name('webhooks.posts.enable');
    Route::post('/{id}/posts/disable', [Webhook::class, 'disablePost'])->name('webhooks.posts.disable');
    Route::post('/{id}/comments/enable', [Webhook::class, 'enableComments'])->name('webhooks.comments.enable');
    Route::post('/{id}/comments/disable', [Webhook::class, 'disableComments'])->name('webhooks.comments.disable');
    Route::post('/{id}/assignments/enable', [Webhook::class, 'enableAssignments'])->name('webhooks.assignments.enable');
    Route::post('/{id}/assignments/disable', [Webhook::class, 'disableAssignments'])->name('webhooks.assignments.disable');
    Route::post('/{id}/blog/enable', [Webhook::class, 'enableBlog'])->name('webhooks.blog.enable');
    Route::post('/{id}/blog/disable', [Webhook::class, 'disableBlog'])->name('webhooks.blog.disable');
    Route::post('/{id}/enable', [Webhook::class, 'enableWebhook'])->name('webhooks.enable');
    Route::post('/{id}/disable', [Webhook::class, 'disableWebhook'])->name('webhooks.disable');
    Route::post('/{id}/delete', [Webhook::class, 'deleteWebhook'])->name('webhooks.delete');
    Route::post('/create', [Webhook::class, 'createWebhook'])->name('webhooks.create');
});
//to do routes
Route::middleware(['auth', 'verified'])->prefix('todo')->name('todo.')->group(function () {
    Route::get('/completed', [Todo::class, 'completed'])->name('completed');
    Route::get('/archived', [Todo::class, 'archived'])->name('archived');
    Route::get('/active', [Todo::class, 'active'])->name('all');
    Route::post('/{id}/completed', [Todo::class, 'markAsComplete'])->name('mark-as-complete');
    Route::post('/{id}/due', [Todo::class, 'markAsDue'])->name('mark-as-due');
    Route::post('/{id}/archive', [Todo::class, 'archive'])->name('mark-as-archive');
    Route::post('/{id}/delete', [Todo::class, 'deletearchive'])->name('delete-archive');
    Route::post('/{id}/restore', [Todo::class, 'restore'])->name('restore');
    Route::post('/create', [Todo::class, 'new'])->name('new');
});

//resources routes
Route::middleware(['auth', 'verified'])->prefix('resources')->group(function () {
    Route::get('/', [Resource::class, 'main'])->name('resources');
    Route::get('/search', [Resource::class, 'search'])->name('resources.search');
    Route::get('/results', [Resource::class, 'myresourceresults'])->name('resources.results');
    Route::get('/search/results', [Resource::class, 'results'])->name('resources.search.results');
    Route::get('/starred', [Star::class, 'starred'])->name('resources.starred');
    Route::get('/create', [Resource::class, 'create'])->name('resource.create');
    Route::get('/{id}', [Resource::class, 'show'])->name('resource.id');
    Route::post('/{id}/star', [Star::class, 'star'])->name('resources-id.star');
    Route::post('/upload', [Resource::class, 'store'])->name('resources.upload');
});

//expenses routes
Route::middleware(['auth', 'verified'])->prefix('expenses')->name('expense.')->group(function () {
    Route::get('/overview', [Expenses::class, 'overview'])->name('overview');

    Route::get('/income/add', [Expenses::class, 'addincome'])->name('income.add');
    Route::post('/income/save', [Expenses::class, 'saveincome'])->name('income.save');

    Route::get('/purchase/add', [Expenses::class, 'addpurchase'])->name('purchase.add');
    Route::post('/purchase/save', [Expenses::class, 'savepurchase'])->name('purchase.save');

    Route::get('/categories', [Expenses::class, 'managecategories'])->name('category.manage');
    Route::get('/categories/{id}', [Expenses::class, 'category'])->name('category.detail');
    Route::get('/categories/add', [Expenses::class, 'addcategory'])->name('category.add');
    Route::post('/categories/save', [Expenses::class, 'savecategory'])->name('category.save');
    Route::post('/categories/{id}/delete', [Expenses::class, 'deletecategory'])->name('category.delete');
});

//tickets routes
Route::middleware(['auth', 'verified'])->prefix('ticket')->name('ticket.')->group(function () {
    Route::get('/new', [Ticket::class, 'create'])->name('new');
    Route::get('/{id}', [Ticket::class, 'viewticket'])->name('id');
    Route::post('/create', [Ticket::class, 'new'])->name('create');
    Route::post('/{id}/message', [Message::class, 'create'])->name('message');
    Route::post('/{id}/resolved', [Ticket::class, 'resolved'])->name('resolved');
});

//keys routes
Route::middleware(['auth', 'verified'])->prefix('keys')->name('keys.')->group(function () {
    Route::get('/', [Api::class, 'view'])->name('view');
    Route::get('/new', [Api::class, 'new'])->name('new');
    //API POST ROUTES
    Route::post('/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name);
        return ['token' => $token->plainTextToken];
    })->name('create');
});
//shop routes
Route::prefix('shop')->name('shop')->group(function () {
    Route::get('/', [Shop::class, 'view']);
    Route::get('/management', [Shop::class, 'manage'])->middleware(['auth', 'admin', 'verified'])->name('.management');
    Route::get('/{slug}', [Shop::class, 'product'])->name('.product');
});

//timetable routes
Route::middleware(['auth'])->prefix('timetable')->name('timetable')->group(function () {
    Route::get('/', [Timetable::class, 'view']);
    Route::get('/add', [Timetable::class, 'add'])->name('.add');
    Route::post('/create', [Timetable::class, 'create'])->name('.create');
});

//users routes
Route::middleware(['auth', 'admin'])->prefix('users')->group(function () {
    Route::get('/', [User::class, 'showAll'])->name('users');
    Route::get('/{id}/manage', [User::class, 'manageUser'])->name('user.manage');
    Route::post('/{id}/update', [User::class, 'updateUser'])->name('user.update');
});

Route::middleware(['auth', 'verified', 'tutor'])->prefix('exams')->group(function () {
    Route::get('/', [Exam::class, 'index'])->name('exam');
    Route::get('/{id}/manage', [Exam::class, 'manage'])->name('exam.manage');
});

Route::get('/notifications', [Notification::class, 'show'])
    ->middleware('auth')
    ->name('notifications.view');
Route::get('/settings/delete/confirm', [User::class, 'confirmDelete'])
    ->middleware('auth')
    ->name('user.confirm-delete');
Route::get('/settings', [User::class, 'settings'])
    ->middleware('auth')
    ->name('settings');
Route::get('/calendar', [Calendar::class, 'view'])
    ->middleware(['auth', 'verified'])
    ->name('calendar');

// Post routes
Route::post('/profile/update', [User::class, 'updateprofile'])
    ->middleware('auth')
    ->name('profile.update');
Route::post('/assignment/update/{id}', [Assignment::class, 'update'])
    ->middleware(['auth', 'tutor'])
    ->name('assignment.update');
Route::post('/profile/institution/join', [User::class, 'joinInstitution'])
    ->middleware('auth')
    ->name('institution.join');
Route::post('/contact/submit', [Contact::class, 'SendContactForm'])
    ->name('contact.submitform');
Route::post('/notifications/markallasread', [Notification::class, 'markAllAsRead'])
    ->name('notifications.markallasread');
Route::post('/settings/delete/confirmed', [User::class, 'DeleteAccount'])
    ->middleware('auth')
    ->name('delete.confirmed');
Route::post('/institution/{joincode}/user/add', [Institution::class, 'submitUser'])
    ->middleware(['auth', 'verified'])
    ->name('institution.submit-user');


//STRIPE
Route::get('/billing-portal', [Subscription::class, 'billingPortal'])->name('billing-portal');

//SOCIALITE
Route::get('/auth/github/redirect', [ThirdPartyAuthentication::class, 'githubRedirect'])
    ->name('github.redirect');

Route::get('/auth/github/callback', [ThirdPartyAuthentication::class, 'githubCallback'])
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
