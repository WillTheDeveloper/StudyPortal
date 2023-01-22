<?php

namespace App\Http\Controllers;

use App\Models\Webhook;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function all()
    {
        return view('webhooks', [
            'hooks' => Webhook::query()->where('user_id', auth()->id())->orderByDesc('name')->paginate(10)
        ]);
    }

    public function new()
    {
        return view('webhooks.new');
    }

    public function createWebhook(Request $request)
    {
        Webhook::query()->create([
            'user_id' => auth()->id(),
            'url' => $request->input('url'),
            'name' => $request->input('name'),
            'posts' => 0,
            'comments' => 0,
            'assignments' => 0,
            'blog' => 0,
            'active' => 0
        ])->save();
        return redirect(route('webhook.all'));
    }

    public function deleteWebhook($id)
    {
       Webhook::query()->find($id)->delete();
        return redirect(route('webhook.all'));
    }

    public function enablePost($id)
    {
        Webhook::query()->find($id)->update(
            [
                'posts' => 1
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function disablePost($id)
    {
        Webhook::query()->find($id)->update(
            [
                'posts' => 0
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function enableComments($id)
    {
        Webhook::query()->find($id)->update(
            [
                'comments' => 1
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function disableComments($id)
    {
        Webhook::query()->find($id)->update(
            [
                'comments' => 0
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function enableAssignments($id)
    {
        Webhook::query()->find($id)->update(
            [
                'assignments' => 1
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function disableAssignments($id)
    {
        Webhook::query()->find($id)->update(
            [
                'assignments' => 0
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function enableBlog($id)
    {
        Webhook::query()->find($id)->update(
            [
                'blog' => 1
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function disableBlog($id)
    {
        Webhook::query()->find($id)->update(
            [
                'blog' => 0
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function enableWebhook($id)
    {
        Webhook::query()->find($id)->update(
            [
                'active' => 1
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function disableWebhook($id)
    {
        Webhook::query()->find($id)->update(
            [
                'active' => 0
            ]
        );
        return redirect(route('webhook.all'));
    }
}
