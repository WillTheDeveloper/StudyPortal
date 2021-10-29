<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-24 px-4 grid items-center grid-cols-1 gap-y-16 gap-x-8 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8 lg:grid-cols-2">
            <div>
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{$user->name}}</h2>
                @isset($user->bio)
                    <p class="mt-4 text-gray-500">{{$user->bio}}</p>
                @endisset

                <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
                    @isset($user->username)
                        <div class="border-t border-gray-200 pt-4">
                            <dt class="font-medium text-gray-900">Username</dt>
                            <dd class="mt-2 text-sm text-gray-500">{{$user->username}}</dd>
                        </div>
                    @endisset

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Subjects</dt>
                        <dd class="mt-2 text-sm text-gray-500">
                            @foreach($user->Subject as $subject)
                                {{$subject->subject}}<br>
                            @endforeach
                        </dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Posts</dt>
                        <dd class="mt-2 text-sm text-gray-500">{{$user->Post->count()}}</dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Comments</dt>
                        <dd class="mt-2 text-sm text-gray-500">{{$user->Comment->count()}}</dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Includes</dt>
                        <dd class="mt-2 text-sm text-gray-500">Wood card tray and 3 refill packs</dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Considerations</dt>
                        <dd class="mt-2 text-sm text-gray-500">Made from natural materials. Grain and color vary with each item.</dd>
                    </div>
                </dl>
            </div>
            <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
                <p>{{$user->name}}'s Posts.</p> <br>

                @foreach($user->Post as $post)
                    <a href="{{ route('community.post', $post->id) }}"><b>{{$post->title}}</b></a><br>
                    <p>{{$post->body}}</p><br>
                @endforeach
            </div>
        </div>
    </div>


</x-app-layout>