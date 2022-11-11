<?php

namespace App\Http\Controllers;

use App\Mail\NewTicketMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Message extends Controller
{
    public function create($ticket, Request $request)
    {
        $this->authorize('create', \App\Models\Message::class);

        $d = \App\Models\Message::query()->create([
            'ticket_id' => $ticket,
            'user_id' => auth()->id(),
            'message' => $request->input('message')
        ]);

        Mail::to([
            \App\Models\Ticket::query()->find($ticket)->Student->email,
            \App\Models\Ticket::query()->find($ticket)->Tutor->email
        ])->send(new NewTicketMessage($d));

        return redirect(route('ticket.id', $ticket));
    }
}
