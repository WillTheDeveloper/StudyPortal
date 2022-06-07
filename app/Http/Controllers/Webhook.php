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
}
