@component('mail::message')
# {{$data->User->name}} replied to your ticket

{{$data->User->name}} has just replied to your ticket regarding the "{{$data->Ticket->question}}" question with:

{{$data->message}}

@component('mail::button', ['url' => route('ticket.id', $data->Ticket->id)])
View Ticket
@endcomponent

For reference, your ticket identifier is: {{$data->id}}

The incorrect use of the ticketing system may lead to your access to the feature being revoked. Please use it for its intended use.

Thanks,<br>
Study Portal Support Ticketing System
@endcomponent
