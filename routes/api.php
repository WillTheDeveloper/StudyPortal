<?php

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/users', function () {
    return new \App\Http\Resources\UserCollection(\App\Models\User::all());
})->middleware('auth:sanctum')->name('api.user.collection');
Route::get('/user/posts', function () {
    return new \App\Http\Resources\UserPostResource(auth()->user());
})->middleware('auth:sanctum')->name('api.user.post.resource');
Route::get('/user/me', function () {
    return new UserResource(User::findOrFail(auth()->user()->id));
})->middleware('auth:sanctum')->name('api.user.me');
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
})->middleware(['auth:sanctum'])->name('api.assignment.id');
Route::get('/assignment/{id}/students', function ($id) {
    return new \App\Http\Resources\AssignmentUserResource(\App\Models\Assignment::findOrFail($id));
})->middleware(['auth:sanctum', 'tutor'])->name('api.assignment.id.students');

Route::get('/blog/{slug}', function ($slug) {
    return new \App\Http\Resources\BlogResource(\App\Models\Blog::firstWhere('slug', $slug));
})->middleware(['auth:sanctum'])->name('api.blog.slug');
Route::get('/blogs', function () {
    return new \App\Http\Resources\BlogCollection(\App\Models\Blog::all());
})->middleware(['auth:sanctum'])->name('api.blogs');
Route::get('/blog/{slug}/responses', function ($slug) {
    return new \App\Http\Resources\BlogResponseResource(\App\Models\Blog::firstWhere('slug', $slug));
})->middleware(['auth:sanctum'])->name('api.blog.slug.responses');


Route::get('/subjects', function () {
    return new \App\Http\Resources\SubjectCollection(\App\Models\Subject::all());
})->middleware('auth:sanctum')->name('api.subjects');
Route::get('/subject/{id}', function ($id) {
    return new \App\Http\Resources\SubjectResource(\App\Models\Subject::findOrFail($id));
})->middleware('auth:sanctum')->name('api.subject.id');
Route::post('/subject/new', function () {
    $id = \App\Models\Subject::create([
        'subject' => Request::input('subject')
    ]);
    return new \App\Http\Resources\SubjectResource($id);
})->middleware(['auth:sanctum', 'admin'])->name('api.subject.new');
Route::delete('/subject/{id}/delete', function ($id) {
    \App\Models\Subject::findOrFail($id)->forceDelete();
    return [
        'status' => 'completed'
    ];
})->middleware(['auth:sanctum', 'admin'])->name('api.subject.delete');

Route::get('/notes', function () {
    return new \App\Http\Resources\NoteCollection(\App\Models\Note::all());
})->middleware(['auth:sanctum', 'admin'])->name('api.notes');
Route::get('/note/{id}', function ($id) { // This model uses UUIDs as their primary key called 'id'
    return new \App\Http\Resources\NoteResource(\App\Models\Note::findOrFail($id));
})->middleware('auth:sanctum')->name('api.note.id');

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
})->middleware('auth:sanctum')->name('api.groups');
Route::get('/group/{name}', function ($name) {
    return new \App\Http\Resources\GroupResource(\App\Models\Group::firstWhere('name', $name));
})->middleware('auth:sanctum')->name('api.group.name');
Route::get('/group/{name}/users', function ($name) {
    return new \App\Http\Resources\GroupUserResource(\App\Models\Group::firstWhere('name', $name));
})->middleware('auth:sanctum')->name('api.group.users');

Route::get('/tasks', function () {
    return new \App\Http\Resources\TaskCollection(\App\Models\Task::all());
})->middleware('auth:sanctum')->name('api.tasks');
Route::get('/task/{id}', function ($id) {
    return new \App\Http\Resources\TaskResource(\App\Models\Task::query()->find($id));
})->middleware('auth:sanctum')->name('api.task.uuid');
Route::post('/task/new', function () {
    $yeet = \App\Models\Task::query()->create([
        'task' => Request::input('task'),
        'details' => Request::input('details'),
        'user_id' => Request::user()->id,
        'due' => \Carbon\Carbon::parse(Request::input('due')),
        'complete' => Request::input('complete') ? null : false
    ]);
    return new \App\Http\Resources\TaskResource($yeet);
})->middleware('auth:sanctum')->name('api.task.new');
Route::patch('/task/{id}/complete', function ($id) {
    \App\Models\Task::query()->where('user_id', Request::user()->id)->find($id)->update([
        'complete' => true
    ]);
    return new \App\Http\Resources\TaskResource(\App\Models\Task::query()->findOrFail($id));
})->middleware('auth:sanctum')->name('api.task.complete');
Route::patch('/task/{id}/update', function ($id) {
    \App\Models\Task::query()->where('user_id', Request::user()->id)->find($id)->update([
        'task' => Request::input('task'),
        'details' => Request::input('details'),
        'due' => Request::input('due'),
    ]);
    return new \App\Http\Resources\TaskResource(\App\Models\Task::query()->findOrFail($id));
})->middleware('auth:sanctum')->name('api.task.update');

Route::get('/replies', function () {
    return new \App\Http\Resources\ReplyResource(\App\Models\Reply::all());
})->middleware('auth:sanctum')->name('api.replies');
Route::get('/reply/{id}', function ($id) {
    return new \App\Http\Resources\ReplyResource(\App\Models\Reply::findOrFail($id));
})->middleware('auth:sanctum')->name('api.reply.id');

Route::get('/tags', function () {
    return new \App\Http\Resources\TagCollection(\App\Models\Tag::all());
})->middleware('auth:sanctum')->name('api.tags');
Route::get('/tag/{tag}', function ($tag) {
    return new \App\Http\Resources\TagResource(\App\Models\Tag::query()->firstWhere('tag', $tag));
})->middleware('auth:sanctum')->name('api.tag.tag');
Route::delete('/tag/{tag}/delete', function ($tag) {
    \App\Models\Tag::query()->firstWhere('tag', $tag)->where('user_id', Request::user()->id)->delete();
    return [
        'status' => 'deleted'
    ];
})->middleware('auth:sanctum')->name('api.tag.delete');

Route::get('/responses', function () {
    return new \App\Http\Resources\ResponseCollection(\App\Models\Response::all());
})->middleware('auth:sanctum')->name('api.responses');
Route::get('/response/{id}', function ($id) {
    return new \App\Http\Resources\ResponseResource(\App\Models\Response::findOrFail($id));
})->middleware('auth:sanctum')->name('api.response.id');
Route::get('/response/blog/{id}', function ($id) {
    return new \App\Http\Resources\ResponseCollection(\App\Models\Response::where('blog_id', $id));
})->middleware('auth:sanctum')->name('api.response.blog.id');
Route::get('/response/user/{id}', function ($id) {
    return new \App\Http\Resources\ResponseCollection(\App\Models\Response::where('user_id', $id));
})->middleware('auth:sanctum')->name('api.response.user.id');

Route::get('/discussions', function () {
    return new \App\Http\Resources\DiscussionCollection(\App\Models\Discussion::all());
})->middleware('auth:sanctum')->name('api.discussions');
Route::get('/discussions/group/{group}', function ($group) {
    return new \App\Http\Resources\DiscussionCollection(
        \App\Models\Discussion::where('group_id', \App\Models\Group::query()->firstWhere('name', $group)->id)
    );
})->middleware('auth:sanctum')->name('api.discussion.group');

Route::get('/webhooks/current', function () {
    return new \App\Http\Resources\WebhookCollection(\App\Models\Webhook::all()->where('user_id', Request::user()->id));
})->middleware('auth:sanctum')->name('api.webhooks.current');
Route::get('/webhooks/user/{id}', function ($id) {
    return new \App\Http\Resources\WebhookCollection(\App\Models\Webhook::where('user_id', $id)->get());
})->middleware(['auth:sanctum', 'admin'])->name('api.webhooks.user.id');

Route::get('/kanbans', function () {
    return new \App\Http\Resources\KanbanCollection(\App\Models\Kanban::all()->where('user_id', Request::user()->id));
})->middleware('auth:sanctum')->name('api.kanbans');
Route::get('/kanban/{kanban}', function ($kanban) {
    return new \App\Http\Resources\KanbanResource(\App\Models\Kanban::findOrFail($kanban));
})->middleware('auth:sanctum')->name('api.kanban.kanban');

Route::get('/kanban/{kanban}/groups', function ($kanban) {
    return new \App\Http\Resources\KanbanGroupCollection(\App\Models\Kanban::find($kanban));
})->middleware('auth:sanctum')->name('api.kanban.groups.all');
Route::get('/kanban/{kanban}/group/{group}', function ($kanban, $group) {

})->middleware('auth:sanctum')->name('api.kanban.group');

Route::get('/institutions', function () {
    return new \App\Http\Resources\InstitutionCollection(\App\Models\Institution::all());
})->middleware('auth:sanctum')->name('api.institutions');
Route::get('/institution/{joincode}', function ($joincode) {
    return new \App\Http\Resources\InstitutionResource(\App\Models\Institution::firstWhere('joincode', $joincode));
})->middleware('auth:sanctum')->name('api.institutions.joincode');

Route::get('/likes', function () {
    return new \App\Http\Resources\LikeCollection(\App\Models\Like::all());
})->middleware('auth:sanctum')->name('api.likes');
Route::get('/likes/post/{id}', function ($id) {
    return new \App\Http\Resources\LikeCollection(\App\Models\Like::query()->where('post_id', $id));
})->middleware('auth:sanctum')->name('api.likes.post');
Route::get('/likes/user/{id}', function ($id) {
    return new \App\Http\Resources\LikeCollection(\App\Models\Like::query()->where('user_id', $id));
})->middleware('auth:sanctum')->name('api.likes.user');

// NEEDS TO BE DOCUMENTED
Route::get('/review/{id}', function ($id) {
    return new \App\Http\Resources\ReviewResource(\App\Models\Review::query()->first($id));
})->middleware('auth:sanctum');
Route::get('/reviews', function () {
    return new \App\Http\Resources\ReviewCollection(\App\Models\Review::all());
})->middleware('auth:sanctum');
Route::get('/reviews/{rating}', function (int $rating) {
    return new \App\Http\Resources\ReviewCollection(\App\Models\Review::query()->where('rating', $rating));
})->middleware('auth:sanctum');
Route::post('/review/{slug}/new', function ($slug) {
    $id = \App\Models\Product::query()->firstWhere('slug', $slug)->id;

    $r = \App\Models\Review::query()->create([
        'user_id' => Request::user()->id,
        'product_id' => $id,
        'review' => Request::input('review'),
        'rating' => Request::input('rating')
    ]);

    return new \App\Http\Resources\ReviewResource($r);
})->middleware('auth:sanctum');

Route::get('/product/{slug}', function ($slug) {
    return new \App\Http\Resources\ProductResource(\App\Models\Product::query()->firstWhere('slug', $slug));
})->middleware('auth:sanctum');
Route::patch('/product/{slug}/inactive', function ($slug) {
    \App\Models\Product::query()
        ->where('active', true)
        ->where('user_id', Request::user()->id)
        ->firstWhere('slug', $slug)
        ->update([
        'active' => false
    ]);

    return new \App\Http\Resources\ProductResource(\App\Models\Product::query()->firstWhere('slug', $slug));
})->middleware('auth:sanctum');
Route::patch('/product/{slug}/active', function ($slug) {
    \App\Models\Product::query()
        ->where('active', false)
        ->where('user_id', Request::user()->id)
        ->firstWhere('slug', $slug)
        ->update([
            'active' => true
        ]);

    return new \App\Http\Resources\ProductResource(\App\Models\Product::query()->firstWhere('slug', $slug));
})->middleware('auth:sanctum');

Route::get('/placement/{slug}', function ($slug) {
    return new \App\Http\Resources\PlacementResource(\App\Models\Placement::query()->firstWhere('slug', $slug));
})->middleware('auth:sanctum');
Route::get('/placements/active', function () {
    return new \App\Http\Resources\PlacementCollection(\App\Models\Placement::query()
        ->where('active', true)
        ->where('open', true));
});