<?php

use Illuminate\Support\Facades\Route;

Route::get('/users', function () {
    return new \App\Http\Resources\UserCollection(\App\Models\User::all());
})->middleware('auth:sanctum')->name('api.user.collection');
Route::get('/user/posts', function () {
    return new \App\Http\Resources\UserPostResource(auth()->user());
})->middleware('auth:sanctum')->name('api.user.post.resource');
Route::get('/user/{id}', function ($id) {
    return new \App\Http\Resources\UserResource(\App\Models\User::findOrFail($id));
})->middleware(['auth:sanctum', 'admin'])->name('api.user.resource');
Route::patch('/user/profile/update', function () {
    \App\Models\User::query()->find(Request::user()->id)->update(
        [
            'name' => Request::input('name'),
            'email' => Request::input('email'),
            'username' => Request::input('username'),
            'bio' => Request::input('bio'),
        ]
    );
    return new \App\Http\Resources\UserResource(\App\Models\User::find(Request::user()->id));
})->middleware(['auth:sanctum', 'verified']);

Route::get('/post/{slug}', function ($slug) {
    return new \App\Http\Resources\PostResource(\App\Models\Post::firstWhere('slug', $slug));
})->middleware(['auth:sanctum'])->name('api.post.slug');
Route::get('/posts', function () {
    return new \App\Http\Resources\PostCollection(\App\Models\Post::all());
})->middleware(['auth:sanctum', 'admin'])->name('api.post.collection');
Route::get('/posts/user/{id}')->middleware('auth:sanctum');
Route::get('/posts/subject/{subject}')->middleware('auth:sanctum');
Route::get('/posts/{slug}/likes')->middleware('auth:sanctum');
Route::post('/post/new', function () {
    $model = \App\Models\Post::query()->create([
        'title' => $title = Request::input('title'),
        'body' => Request::input('body'),
        'user_id' => Request::user()->id,
        'subject_id' => \App\Models\Subject::query()->firstOrCreate([
            'subject' => Request::input('subject')
        ])->id,
        'tag_id' => \App\Models\Tag::query()->firstOrCreate([
            'tag' => Request::input('tag'),
            'user_id' => Request::user()->id
        ])->id,
        'views' => 0,
        'slug' => \Illuminate\Support\Str::slug($title)
    ]);
    return new \App\Http\Resources\PostResource($model);
})->middleware(['auth:sanctum', 'verified'])->name('api.post.new');
Route::delete('/post/{slug}/delete', function ($slug) {
    $post = new \App\Http\Resources\PostResource(\App\Models\Post::firstWhere('slug', $slug)->where('user_id', Request::user()->id));
    \App\Models\Post::firstWhere('slug', $slug)->where('user_id', Request::user()->id)->forceDelete();
    return [
        'deleted' => $post,
        'status' => 'deleted'
    ];
})->middleware('auth:sanctum');

Route::get('/comment/{id}', function ($id) {
    return new \App\Http\Resources\CommentResource(\App\Models\Comment::findOrFail($id));
})->middleware('auth:sanctum');
Route::delete('/comment/{id}/delete', function ($id) {
    \App\Models\Comment::query()
        ->find($id)
        ->where('user_id', \Illuminate\Support\Facades\Request::user()->id)
        ->forceDelete();
    return [
        'status' => 'deleted'
    ];
})->middleware('auth:sanctum');

Route::get('/assignment/{id}', function ($id) {
    return new \App\Http\Resources\AssignmentResource(\App\Models\Assignment::findOrFail($id));
})->middleware(['auth:sanctum']);
Route::get('/assignment/{id}/students', function ($id) {
    return new \App\Http\Resources\AssignmentUserResource(\App\Models\Assignment::findOrFail($id));
})->middleware(['auth:sanctum', 'tutor']);

Route::get('/blog/{slug}', function ($slug) {
    return new \App\Http\Resources\BlogResource(\App\Models\Blog::firstWhere('slug', $slug));
})->middleware(['auth:sanctum']);
Route::get('/blogs', function () {
    return new \App\Http\Resources\BlogCollection(\App\Models\Blog::all());
})->middleware(['auth:sanctum']);
Route::get('/blog/{slug}/responses', function ($slug) {
    return new \App\Http\Resources\BlogResponseResource(\App\Models\Blog::firstWhere('slug', $slug));
})->middleware(['auth:sanctum']);


Route::get('/subjects', function () {
    return new \App\Http\Resources\SubjectCollection(\App\Models\Subject::all());
})->middleware('auth:sanctum');
Route::get('/subject/{id}', function ($id) {
    return new \App\Http\Resources\SubjectResource(\App\Models\Subject::findOrFail($id));
})->middleware('auth:sanctum');
Route::post('/subject/new', function () {
    $id = \App\Models\Subject::create([
        'subject' => Request::input('subject')
    ]);
    return new \App\Http\Resources\SubjectResource($id);
})->middleware(['auth:sanctum', 'admin']);
Route::delete('/subject/{id}/delete', function ($id) {
    \App\Models\Subject::findOrFail($id)->forceDelete();
    return [
        'status' => 'completed'
    ];
})->middleware(['auth:sanctum', 'admin']);

Route::get('/notes', function () {
    return new \App\Http\Resources\NoteCollection(\App\Models\Note::all());
})->middleware(['auth:sanctum', 'admin']);
Route::get('/note/{id}', function ($id) { // This model uses UUIDs as their primary key called 'id'
    return new \App\Http\Resources\NoteResource(\App\Models\Note::findOrFail($id));
})->middleware('auth:sanctum');

Route::get('/reports', function () {
    return new \App\Http\Resources\ReportCollection(\App\Models\Report::all());
})->middleware(['auth:sanctum', 'admin'])->name('api.reports.collection');
Route::get('/report/{id}', function ($id) {
    return new \App\Http\Resources\ReportResource(\App\Models\Report::findOrFail($id));
})->middleware(['auth:sanctum', 'admin'])->name('api.report.resource');
Route::get('/reports/user/{id}', function ($id) {
    return new \App\Http\Resources\ReportCollection(\App\Models\Report::where('user_id', $id)->get());
})->middleware(['auth:sanctum', 'admin'])->name('api.report.user.id');
Route::get('/reports/post/{id}', function ($id) {
    return new \App\Http\Resources\ReportCollection(\App\Models\Report::where('post_id', $id)->get());
})->middleware(['auth:sanctum', 'admin'])->name('api.report.post.id');
Route::patch('/report/{id}/resolved', function ($id) {
    \App\Models\Report::find($id)->update(['resolved' => true]);
    return new \App\Http\Resources\ReportResource(\App\Models\Report::find($id));
})->middleware(['auth:sanctum', 'admin'])->name('api.report.resolved');
Route::patch('/report/{id}/unresolved', function ($id) {
    \App\Models\Report::find($id)->update(['resolved' => false]);
    return new \App\Http\Resources\ReportResource(\App\Models\Report::find($id));
})->middleware(['auth:sanctum', 'admin'])->name('api.report.unresolved');
Route::patch('/report/{id}/severity/high', function ($id) {
    \App\Models\Report::find($id)->update(['severity' => 'High']);
    return new \App\Http\Resources\ReportResource(\App\Models\Report::find($id));
})->middleware(['auth:sanctum', 'admin'])->name('api.report.severity.high');
Route::patch('/report/{id}/severity/moderate', function ($id) {
    \App\Models\Report::find($id)->update(['severity' => 'Moderate']);
    return new \App\Http\Resources\ReportResource(\App\Models\Report::find($id));
})->middleware(['auth:sanctum', 'admin'])->name('api.report.severity.moderate');
Route::patch('/report/{id}/severity/low', function ($id) {
    \App\Models\Report::find($id)->update(['severity' => 'Low']);
    return new \App\Http\Resources\ReportResource(\App\Models\Report::find($id));
})->middleware(['auth:sanctum', 'admin'])->name('api.report.severity.low');

Route::get('/groups', function () {
    return new \App\Http\Resources\GroupCollection(\App\Models\Group::all());
})->middleware('auth:sanctum');
Route::get('/group/{name}', function ($name) {
    return new \App\Http\Resources\GroupResource(\App\Models\Group::firstWhere('name', $name));
})->middleware('auth:sanctum');
Route::get('/group/{name}/users', function ($name) {
    return new \App\Http\Resources\GroupUserResource(\App\Models\Group::firstWhere('name', $name));
})->middleware('auth:sanctum');

Route::get('/tasks', function () {
    return new \App\Http\Resources\TaskCollection(\App\Models\Task::all());
})->middleware('auth:sanctum');
Route::get('/task/{id}', function ($id) {
    return new \App\Http\Resources\TaskResource(\App\Models\Task::query()->find($id));
})->middleware('auth:sanctum');
Route::post('/task/new', function () {
    $yeet = \App\Models\Task::query()->create([
        'task' => Request::input('task'),
        'details' => Request::input('details'),
        'user_id' => Request::user()->id,
        'due' => \Carbon\Carbon::parse(Request::input('due')),
        'complete' => Request::input('complete') ? null : false
    ]);
    return new \App\Http\Resources\TaskResource($yeet);
})->middleware('auth:sanctum');
Route::patch('/task/{id}/complete', function ($id) {
    \App\Models\Task::query()->where('user_id', Request::user()->id)->find($id)->update([
        'complete' => true
    ]);
    return new \App\Http\Resources\TaskResource(\App\Models\Task::query()->findOrFail($id));
})->middleware('auth:sanctum');
Route::patch('/task/{id}/update', function ($id) {
    \App\Models\Task::query()->where('user_id', Request::user()->id)->find($id)->update([
        'task' => Request::input('task'),
        'details' => Request::input('details'),
        'due' => Request::input('due'),
    ]);
    return new \App\Http\Resources\TaskResource(\App\Models\Task::query()->findOrFail($id));
})->middleware('auth:sanctum');

Route::get('/replies', function () {
    return new \App\Http\Resources\ReplyResource(\App\Models\Reply::all());
})->middleware('auth:sanctum');
Route::get('/reply/{id}', function ($id) {
    return new \App\Http\Resources\ReplyResource(\App\Models\Reply::findOrFail($id));
})->middleware('auth:sanctum');

Route::get('/tags', function () {
    return new \App\Http\Resources\TagCollection(\App\Models\Tag::all());
})->middleware('auth:sanctum');
Route::get('/tag/{tag}', function ($tag) {
    return new \App\Http\Resources\TagResource(\App\Models\Tag::query()->firstWhere('tag', $tag));
})->middleware('auth:sanctum');