<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Webhook extends Controller
{
    public function all()
    {
        return view('webhooks', [
            'hooks' => \App\Models\Webhook::query()->where('user_id', auth()->id())->orderByDesc('name')->paginate(10)
        ]);
    }

    public function new()
    {
        return view('webhooks.new');
    }

    public function createWebhook(Request $request)
    {
        \App\Models\Webhook::query()->create([
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
        \App\Models\Webhook::query()->find($id)->delete();
        return redirect(route('webhook.all'));
    }

    public function enablePost($id)
    {
        \App\Models\Webhook::query()->find($id)->update(
            [
                'posts' => 1
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function disablePost($id)
    {
        \App\Models\Webhook::query()->find($id)->update(
            [
                'posts' => 0
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function enableComments($id)
    {
        \App\Models\Webhook::query()->find($id)->update(
            [
                'comments' => 1
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function disableComments($id)
    {
        \App\Models\Webhook::query()->find($id)->update(
            [
                'comments' => 0
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function enableAssignments($id)
    {
        \App\Models\Webhook::query()->find($id)->update(
            [
                'assignments' => 1
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function disableAssignments($id)
    {
        \App\Models\Webhook::query()->find($id)->update(
            [
                'assignments' => 0
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function enableBlog($id)
    {
        \App\Models\Webhook::query()->find($id)->update(
            [
                'blog' => 1
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function disableBlog($id)
    {
        \App\Models\Webhook::query()->find($id)->update(
            [
                'blog' => 0
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function enableWebhook($id)
    {
        \App\Models\Webhook::query()->find($id)->update(
            [
                'active' => 1
            ]
        );
        return redirect(route('webhook.all'));
    }

    public function disableWebhook($id)
    {
        \App\Models\Webhook::query()->find($id)->update(
            [
                'active' => 0
            ]
        );
        return redirect(route('webhook.all'));
    }
}
