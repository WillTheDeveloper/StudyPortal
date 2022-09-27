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


Route::get('/post/{slug}', function ($slug) {
    return new \App\Http\Resources\PostResource(\App\Models\Post::firstWhere('slug', $slug));
})->middleware(['auth:sanctum'])->name('api.post.slug');
Route::get('/posts', function () {
    return new \App\Http\Resources\PostCollection(\App\Models\Post::all());
})->middleware(['auth:sanctum', 'admin'])->name('api.post.collection');
Route::post('/post/new', function () {
    $model = \App\Models\Post::create([
        'title' => $title = Request::input('title'),
        'body' => Request::input('body'),
        'user_id' => Request::user()->id,
        'subject_id' => Request::input('subject'),
        'tag_id' => Request::input('tag'),
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
});

Route::get('/comment/{id}', function ($id) {
    return new \App\Http\Resources\CommentResource(\App\Models\Comment::findOrFail($id));
});

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
});
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
})->middleware(['auth:sanctum', 'admin']);
Route::get('/report/{id}', function ($id) {
    return new \App\Http\Resources\ReportResource(\App\Models\Report::findOrFail($id));
})->middleware(['auth:sanctum', 'admin']);
Route::get('/reports/user/{id}', function ($id) {
    return new \App\Http\Resources\ReportCollection(\App\Models\Report::where('user_id', $id)->get());
})->middleware(['auth:sanctum', 'admin']);
Route::get('/reports/post/{id}', function ($id) {
    return new \App\Http\Resources\ReportCollection(\App\Models\Report::where('post_id', $id)->get());
})->middleware(['auth:sanctum', 'admin']);
Route::patch('/report/{id}/resolved', function ($id) {
    \App\Models\Report::find($id)->update(['resolved' => true]);
    return new \App\Http\Resources\ReportResource(\App\Models\Report::find($id));
})->middleware(['auth:sanctum', 'admin']);
Route::patch('/report/{id}/unresolved', function ($id) {
    \App\Models\Report::find($id)->update(['resolved' => false]);
    return new \App\Http\Resources\ReportResource(\App\Models\Report::find($id));
})->middleware(['auth:sanctum', 'admin']);
Route::patch('/report/{id}/severity/high', function ($id) {
    \App\Models\Report::find($id)->update(['severity' => 'High']);
    return new \App\Http\Resources\ReportResource(\App\Models\Report::find($id));
})->middleware(['auth:sanctum', 'admin']);
Route::patch('/report/{id}/severity/moderate', function ($id) {
    \App\Models\Report::find($id)->update(['severity' => 'Moderate']);
    return new \App\Http\Resources\ReportResource(\App\Models\Report::find($id));
})->middleware(['auth:sanctum', 'admin']);
Route::patch('/report/{id}/severity/low', function ($id) {
    \App\Models\Report::find($id)->update(['severity' => 'Low']);
    return new \App\Http\Resources\ReportResource(\App\Models\Report::find($id));
})->middleware(['auth:sanctum', 'admin']);