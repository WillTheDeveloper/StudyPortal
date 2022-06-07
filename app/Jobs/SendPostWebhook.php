<?php

namespace App\Jobs;

use App\Models\Webhook;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendPostWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $webhook;

    protected $post;

    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($post)
    {
        foreach (\Auth::user()->Webhook()->get() as $w)
        {
            Http::post($w->url, [
                'content' => "New post!",
                'embeds' => [
                    [
                        'title' => $post->title,
                        'description' => $post->body,
                        'color' => '7506394',
                        'url' => route('community.post', $post->id),
                    ]
                ],
            ]);
        }
    }
}
