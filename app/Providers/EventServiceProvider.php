<?php

namespace App\Providers;

use App\Models\Assignment;
use App\Models\Comment;
use App\Models\Post;
use App\Notifications\PostCreated;
use App\Observers\AssignmentObserver;
use App\Observers\CommentObserver;
use App\Observers\PostObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Laravel\Cashier\Events\WebhookHandled;
use Laravel\Cashier\Events\WebhookReceived;

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
        Post::observe(PostObserver::class);
        Assignment::observe(AssignmentObserver::class);
        Comment::observe(CommentObserver::class);
    }
}
