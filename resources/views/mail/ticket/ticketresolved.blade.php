@component('mail::message')
# Ticket has been resolved

Hello, {{$data->Student->name}}.

This is a notification regarding one of your tickets.

The following ticket status has been marked as resolved.

**Question:** {{$data->question}}

**Tutor:** {{$data->Tutor->name}}

**Status:** {{Str::ucfirst($data->status)}}

@component('mail::button', ['url' => route('ticket.id', $data->id)])
View ticket
@endcomponent

For reference, your ticket identifier is: {{$data->id}}

The incorrect use of the ticketing system may lead to your access to the feature being revoked. Please use it for its intended use.

Thanks,<br>
Study Portal Support Ticketing System
@endcomponent
