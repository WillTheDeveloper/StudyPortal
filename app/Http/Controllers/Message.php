<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Message extends Controller
{
    public function create($ticket, Request $request)
    {
        \App\Models\Message::query()->create([
            'ticket_id' => $ticket,
            'user_id' => auth()->id(),
            'message' => $request->input('message')
        ]);

        return redirect(route('ticket.id', $ticket));
    }
}
