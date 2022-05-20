<?php

namespace App\Jobs;

use App\Models\Webhook;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
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

    public function __construct(Webhook $webhook)
    {
        $this->webhook = $webhook;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Http::post('https://discord.com/api/webhooks/914187384835420211/aUjMOW2HNugOC163Rf3ziggluhvTtzROxAoku9AWR258sGTf6Ec6u2DaOKTzx-G6hhTC', [
//            'content' => "New post!",
//            'embeds' => [
//                [
//                    'title' => ,
//                    'description' => ,
//                    'color' => '7506394',
//                    'url' => ,
//                ]
//            ],
        ]);
    }
}
