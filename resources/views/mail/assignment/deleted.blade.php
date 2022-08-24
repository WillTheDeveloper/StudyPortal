@component('mail::message')
# An assignment has been deleted

The assignment titled "*{{$data->title}}*" has been deleted.

It was created {{$data->created_at->diffForHumans()}} and has now been deleted.

@component('mail::button', ['url' => route('assignments')])
My assignments
@endcomponent

Thanks,<br>
Study Portal Assignment Management Team
@endcomponent
