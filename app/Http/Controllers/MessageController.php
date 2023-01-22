<?php

namespace App\Http\Controllers;

use App\Mail\NewTicketMessage;
use App\Models\Message;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function create($ticket, Request $request)
    {
        $this->authorize('create', \App\Models\Message::class);

        $d = Message::query()->create([
            'ticket_id' => $ticket,
            'user_id' => auth()->id(),
            'message' => $request->input('message')
        ]);

        Mail::to([
            Ticket::query()->find($ticket)->Student->email,
            Ticket::query()->find($ticket)->Tutor->email
        ])->send(new NewTicketMessage($d));

        return redirect(route('ticket.id', $ticket));
    }
}
