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

    public function createWebhook()
    {
        return redirect(route('webhook.all'));
    }

    public function deleteWebhook()
    {
        return redirect(route('webhook.all'));
    }

    public function enablePost($id)
    {
        return redirect(route('webhook.all'));
    }

    public function disablePost($id)
    {
        return redirect(route('webhook.all'));
    }

    public function enableComments($id)
    {
        return redirect(route('webhook.all'));
    }

    public function disableComments($id)
    {
        return redirect(route('webhook.all'));
    }

    public function enableAssignments($id)
    {
        return redirect(route('webhook.all'));
    }

    public function disableAssignments($id)
    {
        return redirect(route('webhook.all'));
    }

    public function enableBlog($id)
    {
        return redirect(route('webhook.all'));
    }

    public function disableBlog($id)
    {
        return redirect(route('webhook.all'));
    }

    public function enableWebhook($id)
    {
        return redirect(route('webhook.all'));
    }

    public function disableWebhook($id)
    {
        return redirect(route('webhook.all'));
    }
}
