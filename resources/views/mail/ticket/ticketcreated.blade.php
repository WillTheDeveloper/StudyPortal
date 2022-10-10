@component('mail::message')
# Ticket successfully created

Hello, {{$data->Student->name}}.

Your ticket has been created.

**Question:** {{$data->question}}

**Details:** {{$data->details}}

**Tutor:** {{$data->Tutor->name}}

**Status:** {{Str::ucfirst($data->status)}}

@component('mail::button', ['url' => route('ticket.id', $data->id)])
Open ticket
@endcomponent

For reference, your ticket identifier is: {{$data->id}}

The incorrect use of the ticketing system may lead to your access to the feature being revoked. Please use it for its intended use.

Thanks,<br>
Study Portal Support Ticketing System
@endcomponent
