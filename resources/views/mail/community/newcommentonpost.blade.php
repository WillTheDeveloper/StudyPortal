@component('mail::message')
# {{$data->User->name}} just commented on your post

{{$data->User->name}} just commented:

"{{$data->comment}}" on your post called "{{$data->Post->title}}".

@component('mail::button', ['url' => route('community.post', $data->Post->id)])
View Post
@endcomponent

Thanks,
Study Portal Developers who created this!
@endcomponent
