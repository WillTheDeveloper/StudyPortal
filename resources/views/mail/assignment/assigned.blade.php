@component('mail::message')
# You have a new assignment

You have a new assignment for {{$data->Subject->subject}}.

Due date: {{$data->duedate->format('d/m/y')}} ({{$data->duedate->diffForHumans()}})

Task: {{$data->title}}

Details: {{$data->details}}

@component('mail::button', ['url' => route('assignments.manage', $data->id)])
View Assignment
@endcomponent

Thanks,<br>
Study Portal Assignment Management Team
@endcomponent
