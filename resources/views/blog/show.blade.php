<!doctype html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Blog | Study Portal</title>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body x-data="{profile: false, nav: false}">

<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button -->
                <button @click="nav = true; profile = false" @click.away="nav = false" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                      Icon when menu is closed.

                      Heroicon name: outline/menu

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                      Icon when menu is open.

                      Heroicon name: outline/x

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-8 w-auto" src="https://studyportal.s3.eu-west-2.amazonaws.com/logo_banner_style_v1.png" alt="Workflow">
                    <img class="hidden lg:block h-8 w-auto" src="https://studyportal.s3.eu-west-2.amazonaws.com/logo_banner_style_v1.png" alt="Workflow">
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                    <a href="{{route('home')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Home
                    </a>
                    <a href="{{route('features')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Features
                    </a>
                    <a href="{{route('blog')}}" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Blog
                    </a>
                    <a href="{{route('contact')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Contact
                    </a>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <button type="button" class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: outline/bell -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>

                <!-- Profile dropdown -->
                <div class="ml-3 relative">
                    <div>
                        <button @click="profile = true; nav = false" @click.away="profile = false" type="button" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </button>
                    </div>

                    <!--
                      Dropdown menu, show/hide based on menu state.

                      Entering: "transition ease-out duration-200"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                      Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    <div x-show="profile"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale 100"
                         x-transition:leave="transform ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         x-cloak
                         class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        @auth()
                            <a href="{{route('community.profile', auth()->id())}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="{{route('profile')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                        @else
                            <a href="{{route('login')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Login</a>
                            <a href="{{route('register')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Register</a>
                        @endauth()
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="nav" x-cloak class="sm:hidden" id="mobile-menu">
        <div class="pt-2 pb-4 space-y-1">
            <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" -->
            <a href="{{route('home')}}" class="bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Home</a>
            <a href="{{route('features')}}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Features</a>
            <a href="{{route('blog')}}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Blog</a>
            <a href="{{route('contact')}}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Contact</a>
        </div>
    </div>
</nav>

<div class="bg-white overflow-hidden">
    <div class="relative max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
{{--        <div class="hidden lg:block bg-gray-50 absolute top-0 bottom-0 left-3/4 w-screen"></div>--}}
        <div class="mx-auto text-base max-w-prose lg:grid lg:grid-cols-2 lg:gap-8 lg:max-w-none">
            <div>
                <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">{{Str::upper($content->content_type)}}</h2>
                <h3 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{$content->title}}</h3>
            </div>
        </div>
        @auth()
            @if (auth()->user()->is_admin)
                <form method="post" action="{{route('blog.make-hidden', $content->slug)}}">
                    @csrf
                    <x-button>Hide</x-button>
                </form>
                @switch($content->replies)
                    @case(0)
                        <form method="post" action="{{route('blog.enable-replies', $content->slug)}}">
                            @csrf
                            <x-button>Enable</x-button>
                        </form>
                    @break(0)
                    @case(1)
                        <form method="post" action="{{route('blog.disable-replies', $content->slug)}}">
                            @csrf
                            <x-button>Disable</x-button>
                        </form>
                    @break(1)
                @endswitch
            @endif
        @endauth()
        <div class="mt-8 lg:grid lg:grid-cols-2 lg:gap-8">
            <div class="relative lg:row-start-1 lg:col-start-2">
                <svg class="hidden lg:block absolute top-0 right-0 -mt-20 -mr-20" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                    <defs>
                        <pattern id="de316486-4a29-4312-bdfc-fbce2132a2c1" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#de316486-4a29-4312-bdfc-fbce2132a2c1)" />
                </svg>
                <div class="relative text-base mx-auto max-w-prose lg:max-w-none">
                    <figure>
                        <div class="aspect-w-12 aspect-h-7 lg:aspect-none">
                            <img class="rounded-lg shadow-lg object-cover object-center" src="https://images.unsplash.com/photo-1546913199-55e06682967e?ixlib=rb-1.2.1&auto=format&fit=crop&crop=focalpoint&fp-x=.735&fp-y=.55&w=1184&h=1376&q=80" alt="Whitney leaning against a railing on a downtown street" width="1184" height="1376">
                        </div>
                        <figcaption class="mt-3 flex text-sm text-gray-500">
                            <!-- Heroicon name: solid/camera -->
                            <svg class="flex-none w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Photograph by Marcus O’Leary</span>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="mt-8 lg:mt-0">
                <div class="text-base max-w-prose mx-auto lg:max-w-none">
                    <p class="text-lg text-gray-500">{{ $content->body }}</p>
                </div>
            </div>
        </div>

        @if ($content->replies)

            @auth()
            <div class="flex items-start space-x-4 pt-4">
                <div class="flex-shrink-0">
                    <img class="inline-block h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </div>
                <div class="min-w-0 flex-1">
                    <form action="{{route('blog.response.create', $content->slug)}}" class="relative" method="post">
                        @csrf
                        <div class="border border-gray-300 rounded-lg shadow-sm overflow-hidden focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
                            <label for="comment" class="sr-only">Add your comment</label>
                            <textarea rows="3" name="comment" id="comment" class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm" placeholder="Add your comment..."></textarea>

                            <!-- Spacer element to match the height of the toolbar -->
                            <div class="py-2" aria-hidden="true">
                                <!-- Matches height of button in toolbar (1px border + 36px content height) -->
                                <div class="py-px">
                                    <div class="h-9"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Post</button>
                        </div>
                    </form>
                </div>
            </div>
            @endauth()

            @guest()
                    <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="pt-4">
                    <div class="rounded-md bg-yellow-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: solid/exclamation -->
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-yellow-800">Authentication required</h3>
                                <div class="mt-2 text-sm text-yellow-700">
                                    <p>Responses for this blog post are enabled but require authentication in order to respond to it. <a href="{{route('login')}}" class="underline">You can login here.</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endguest()

                    <div class="bg-white pt-16">
            <div>
                <h2 class="sr-only">Responses</h2>

                <div class="-my-10">
                    @foreach($content->Response()->get() as $r)
                    <div class="flex text-sm text-gray-500 space-x-4">
                        <div class="flex-none py-10">
                            <img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="w-10 h-10 bg-gray-100 rounded-full">
                        </div>
                        <div class="flex-1 py-3">
                            <h3 class="font-medium text-gray-900">{{$r->User->name}}</h3>
                            <p><time datetime="2021-07-16">{{$r->created_at->diffForHumans()}}</time></p>

                            <div class="mt-4 prose prose-sm max-w-none text-gray-500">
                                <p>{{$r->response}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

        @else
            <div class="inset-x-0 pb-2 pt-20 sm:pb-5">
                <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                    <div class="p-2 rounded-lg bg-red-400 shadow-lg sm:p-3">
                        <div class="flex items-center justify-between flex-wrap">
                            <div class="w-0 flex-1 flex items-center">
                                <p class="ml-3 font-medium text-white truncate">
                                    <span class="md:hidden"> Responses have been disabled for this blog post.</span>
                                    <span class="hidden md:inline"> Responses have been disabled for this blog post. </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>


