<x-new-guest-layout>

<main class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24">
    <div class="text-center">
        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline">Read our</span>
            <span class="block text-grape-600 xl:inline">blog</span>
        </h1>
        <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
            Check out some our blog posts where we give updates on events and Study Portal itself!
        </p>
    </div>
</main>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <div class="absolute inset-0">
        <div class="bg-white h-1/3 sm:h-2/3"></div>
    </div>
    <div class="relative max-w-7xl mx-auto">
        <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
            @forelse($articles as $a)
            <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                <div class="flex-shrink-0">
{{--                    https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80--}}
                    <img class="h-48 w-full object-cover" src="{{$a->url}}" alt="">
                </div>
                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-indigo-600">
                            <a href="?type={{$a->content_type}}" class="hover:underline"> {{Str::upper($a->content_type)}} </a>
                        </p>
                        <a href="{{route('blog.show', $a->slug)}}" class="block mt-2">
                            <p class="text-xl font-semibold text-gray-900 line-clamp-3">{{$a->title}}</p>
                            <p class="mt-3 text-base text-gray-500 line-clamp-2">{{$a->body}}</p>
                        </a>
                    </div>
                    <div class="mt-6 flex items-center">
                        <div class="flex-shrink-0">
                            <a href="#">
                                <span class="sr-only">{{$a->User->name}}</span>
                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </a>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">
                                <a href="{{route('community.profile', $a->User->id)}}" class="hover:underline"> {{$a->User->name}} </a>
                            </p>
                            <div class="flex space-x-1 text-sm text-gray-500">
                                <time datetime="2020-03-16"> {{$a->created_at->format('n M Y')}} </time>
                                <span aria-hidden="true"> &middot; </span>
                                <span> 6 min read </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @empty
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No blog posts</h3>
                    <p class="mt-1 text-sm text-gray-500">Check back later to see if anything has been posted!</p>
                </div>
            @endforelse

        </div>

        <div class="pt-3">
            {{$articles->links()}}
        </div>

        {{--<div class="bg-white sm:rounded-lg pt-16">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="renew-subscription-label">Receive notifications for new blog posts</h3>
                <div class="mt-2 sm:flex sm:items-start sm:justify-between">
                    <div class="max-w-xl text-sm text-gray-500">
                        <p id="renew-subscription-description">Enable this if you want to retrieve direct notifications of when a new blog post is created.</p>
                    </div>
                    <div class="mt-5 sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:flex sm:items-center">
                        <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                        <button type="button" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" role="switch" aria-checked="false" aria-labelledby="renew-subscription-label" aria-describedby="renew-subscription-description">
                            <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                            <span aria-hidden="true" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>
</div>

</x-new-guest-layout>

