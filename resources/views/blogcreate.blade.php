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

<main class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24">
    <div class="text-center">
        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline">Create something</span>
            <span class="block text-grape-600 xl:inline">amazing</span>
        </h1>
    </div>

    <form class="space-y-8 divide-y divide-gray-200" method="post" action="{{route('blog.save')}}">
        @csrf
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="slug" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Slug </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm"> studyportal.com/blog/ </span>
                                <input type="text" name="slug" id="slug" autocomplete="slug" class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Title </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg flex rounded-md shadow-sm">
                                <input type="text" name="title" id="title" autocomplete="title" class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="content" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Content </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <textarea id="content" name="content" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Type </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select id="type" name="type" autocomplete="type" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                <option>Article</option>
                                <option>Update</option>
                                <option>Announcement</option>
                            </select>
                        </div>
                    </div>

                    <fieldset class="border-t border-b border-gray-200">
                        <legend class="sr-only">Notifications</legend>
                        <div class="divide-y divide-gray-200">
                            <div class="relative flex items-start py-4">
                                <div class="min-w-0 flex-1 text-sm">
                                    <label for="visible" class="font-medium text-gray-700">Visible</label>
                                    <p id="comments-description" class="text-gray-500">Allow users to view the blog post.</p>
                                </div>
                                <div class="ml-3 flex items-center h-5">
                                    <input id="visible" aria-describedby="comments-description" name="visible" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                            </div>
                            <div class="relative flex items-start py-4">
                                <div class="min-w-0 flex-1 text-sm">
                                    <label for="responses" class="font-medium text-gray-700">Responses</label>
                                    <p id="candidates-description" class="text-gray-500">Allow users to respond to this blog.</p>
                                </div>
                                <div class="ml-3 flex items-center h-5">
                                    <input id="responses" aria-describedby="candidates-description" name="responses" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <x-button>Create</x-button>
    </form>

</main>
