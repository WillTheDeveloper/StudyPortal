<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Observers\NewCommentOnYourPost;
use App\Observers\NewPostOnYourSubject;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /*protected $observers = [
        Post::class => [NewPostOnYourSubject::class],
        Comment::class => [NewCommentOnYourPost::class]
    ];*/
}
