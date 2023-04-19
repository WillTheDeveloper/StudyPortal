<x-new-user-layout>
    <div class="min-h-full" x-data="{ like: true }">

        @if (session()->has('liked'))
            <!-- Global notification live region, render this permanently at the end of the document -->
            <div aria-live="assertive"
                class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6" x-show="like">
                <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
                    <!--
                  Notification panel, dynamically insert this into the live region when it needs to be displayed

                  Entering: "transform ease-out duration-300 transition"
                    From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                    To: "translate-y-0 opacity-100 sm:translate-x-0"
                  Leaving: "transition ease-in duration-100"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                    <div
                        class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: outline/check-circle -->
                                    <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="text-sm font-medium text-gray-900">Liked post</p>
                                </div>
                                <div class="ml-4 flex flex-shrink-0">
                                    <button @click="like = false" type="button"
                                        class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        <span class="sr-only">Close</span>
                                        <!-- Heroicon name: mini/x-mark -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
            <main class="flex-1">
                <!-- Page title & actions -->
                {{-- <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="flex-1 min-w-0">
                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                            Community
                        </h1>
                    </div>
                    --}}{{-- <div class="mt-4 flex sm:mt-0 sm:ml-4">
                        <button type="button"
                                class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
                            Share
                        </button>
                        <button type="button"
                                class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                            Create
                        </button>
                    </div> --}}{{--
                </div> --}}
                <div class="py-10" x-data="{ newpost: false }">
                    <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                            <nav aria-label="Sidebar" class="sticky top-4 divide-y divide-gray-300">
                                <div class="pb-8 space-y-1">


                                    <a @click="newpost = true"
                                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium group flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer"
                                        aria-current="page">
                                        <!-- Heroicon name: outline/home -->
                                        <span class="truncate">
                                            New Post
                                        </span>
                                    </a>


                                    <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-600 hover:bg-gray-50" -->
                                    <a href="{{ route('community') }}"
                                        class="bg-gray-200 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                                        aria-current="page">
                                        <!-- Heroicon name: outline/home -->
                                        <svg class="text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        <span class="truncate">
                                            Home
                                        </span>
                                    </a>

                                    <a href="{{ route('community.popular') }}"
                                        class="text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                        <!-- Heroicon name: outline/fire -->
                                        <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                                        </svg>
                                        <span class="truncate">
                                            Popular
                                        </span>
                                    </a>

                                    <a href="{{ route('community.communities') }}"
                                        class="text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                        <!-- Heroicon name: outline/user-group -->
                                        <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span class="truncate">
                                            Communities
                                        </span>
                                    </a>

                                    <a href="{{ route('community.trending') }}"
                                        class="text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                        <!-- Heroicon name: outline/trending-up -->
                                        <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        <span class="truncate">
                                            Trending
                                        </span>
                                    </a>


                                    <a href="{{ route('placements') }}"
                                        class="text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                        <!-- Heroicon name: outline/user-group -->
                                        <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span class="truncate">
                                            Placements
                                        </span>
                                    </a>


                                </div>
                                <div class="pt-10">
                                    <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider"
                                        id="communities-headline">
                                        My Subjects
                                    </p>
                                    <div class="mt-3 space-y-2" aria-labelledby="communities-headline">

                                        @foreach (auth()->user()->Subject()->get() as $subject)
                                            <a href="{{ route('community.subject', $subject->id) }}"
                                                class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                                <span class="truncate">
                                                    {{ $subject->subject }}
                                                </span>
                                            </a>
                                        @endforeach

                                    </div>
                                </div>
                            </nav>
                        </div>
                        <main class="lg:col-span-9 xl:col-span-6" x-data="{ look: false }"
                            @keyup.shift.enter.window="look = true" @keyup.esc.window="look = false">


                            <div x-cloak x-show="look">
                                <div class="fixed inset-0 z-10 overflow-y-auto p-4 sm:p-6 md:p-20" role="dialog"
                                    aria-modal="true">
                                    <!--
                                      Background overlay, show/hide based on modal state.

                                      Entering: "ease-out duration-300"
                                        From: "opacity-0"
                                        To: "opacity-100"
                                      Leaving: "ease-in duration-200"
                                        From: "opacity-100"
                                        To: "opacity-0"
                                    -->
                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-25 transition-opacity"
                                        aria-hidden="true"></div>

                                    <!--
                                      Command palette, show/hide based on modal state.

                                      Entering: "ease-out duration-300"
                                        From: "opacity-0 scale-95"
                                        To: "opacity-100 scale-100"
                                      Leaving: "ease-in duration-200"
                                        From: "opacity-100 scale-100"
                                        To: "opacity-0 scale-95"
                                    -->
                                    <div
                                        class="mx-auto max-w-xl transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all">
                                        <form action="{{ route('community.search') }}" method="get">
                                            <div class="relative">
                                                <!-- Heroicon name: solid/search -->
                                                <svg class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <input id="search" name="search" type="search"
                                                    class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-800 placeholder-gray-400 focus:ring-0 sm:text-sm"
                                                    placeholder="Search..." role="combobox" aria-expanded="false"
                                                    aria-controls="options">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h1 class="sr-only">Recent questions</h1>
                                <ul role="list" class="space-y-4">
                                    @forelse($posts as $post)
                                        <li class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg"
                                            x-data="{ dropdown: false, edit: false, content: true }">
                                            <article aria-labelledby="question-title-81614">
                                                <div>
                                                    <div class="flex space-x-3">
                                                        <div class="flex-shrink-0">
                                                            <img class="h-10 w-10 rounded-full"
                                                                src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                                alt="">
                                                        </div>
                                                        <div class="min-w-0 flex-1">
                                                            <p class="text-sm font-medium text-gray-900">
                                                                <a href="{{ route('community.profile', $post->User->id) }}"
                                                                    class="hover:underline">{{ $post->User->name }}</a>
                                                            </p>
                                                            <p class="text-sm text-gray-500">
                                                                <a href="{{ route('community.post', $post->slug) }}"
                                                                    class="hover:underline">
                                                                    <time datetime="{{ $post->created_at }}">
                                                                        Posted {{ $post->created_at->diffForHumans() }}
                                                                        on
                                                                        <a
                                                                            href="{{ route('community.subject', $post->Subject->id) }}"><b>{{ $post->Subject->subject }}</b></a>
                                                                    </time>
                                                                </a>
                                                            </p>
                                                        </div>
                                                        <div class="flex-shrink-0 self-center flex">
                                                            <div class="relative inline-block text-left">
                                                                <div>
                                                                    <button @click="dropdown = true"
                                                                        @click.away="dropdown = false" type="button"
                                                                        class="-m-2 p-2 rounded-full flex items-center text-gray-400 hover:text-gray-600"
                                                                        id="options-menu-0-button"
                                                                        aria-expanded="false" aria-haspopup="true">
                                                                        <span class="sr-only">Open options</span>
                                                                        <!-- Heroicon name: solid/dots-vertical -->
                                                                        <svg class="h-5 w-5"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 20 20" fill="currentColor"
                                                                            aria-hidden="true">
                                                                            <path
                                                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                                        </svg>
                                                                    </button>
                                                                </div>

                                                                <!--
                                                                  Dropdown menu, show/hide based on menu state.

                                                                  Entering: "transition ease-out duration-100"
                                                                    From: "transform opacity-0 scale-95"
                                                                    To: "transform opacity-100 scale-100"
                                                                  Leaving: "transition ease-in duration-75"
                                                                    From: "transform opacity-100 scale-100"
                                                                    To: "transform opacity-0 scale-95"
                                                                -->
                                                                <div x-show="dropdown" x-cloak
                                                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                                    role="menu" aria-orientation="vertical"
                                                                    aria-labelledby="options-menu-0-button"
                                                                    tabindex="-1">
                                                                    <div class="py-1" role="none">
                                                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                                        @if ($post->user_id == auth()->id())
                                                                            <a href="#"
                                                                                x-on:click="edit = true; content = false"
                                                                                class="text-gray-700 flex px-4 py-2 text-sm"
                                                                                role="menuitem" tabindex="-1"
                                                                                id="options-menu-0-item-0">
                                                                                <!-- Heroicon name: solid/star -->
                                                                                <svg class="mr-3 h-5 w-5 text-gray-400"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 20 20"
                                                                                    fill="currentColor"
                                                                                    aria-hidden="true">
                                                                                    <path
                                                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                                </svg>
                                                                                <span>Edit</span>
                                                                            </a>
                                                                        @endif

                                                                        @if (auth()->user()->is_admin)
                                                                            <form
                                                                                action="{{ route('community.delete', $post->slug) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <a class="text-gray-700 flex px-4 py-2 text-sm"
                                                                                    role="menuitem" tabindex="-1"
                                                                                    id="options-menu-0-item-1">
                                                                                    <!-- Heroicon name: solid/code -->
                                                                                    <svg class="mr-3 h-5 w-5 text-gray-400"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        viewBox="0 0 20 20"
                                                                                        fill="currentColor"
                                                                                        aria-hidden="true">
                                                                                        <path fill-rule="evenodd"
                                                                                            d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                                                                            clip-rule="evenodd" />
                                                                                    </svg>
                                                                                    <button type="submit">Delete
                                                                                    </button>
                                                                                </a>
                                                                            </form>
                                                                        @endif
                                                                        <a href="{{ route('community.report', $post->id) }}"
                                                                            class="text-gray-700 flex px-4 py-2 text-sm"
                                                                            role="menuitem1" tabindex="-1"
                                                                            id="options-menu-0-item-2">
                                                                            <!-- Heroicon name: solid/flag -->
                                                                            <svg class="mr-3 h-5 w-5 text-gray-400"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor"
                                                                                aria-hidden="true">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>
                                                                            <span>Report content</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        @foreach ($post->Tag()->get() as $t)
                                                            <span
                                                                class="mt-2 inline-flex items-center rounded bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-800">{{ $t->tag }}</span>
                                                        @endforeach
                                                    </div>

                                                    <h2 id="question-title-81614" x-show="content"
                                                        class="mt-2 text-base font-medium text-gray-900">
                                                        {{ $post->title }}
                                                    </h2>
                                                </div>
                                                <div class="mt-2 text-sm text-gray-700 space-y-4">
                                                    <p x-show="content">{{ $post->body }}</p>
                                                </div>

                                                <div x-show="edit" x-cloak>
                                                    <form method="post"
                                                        action="{{ route('community.post.update', $post->slug) }}">
                                                        @csrf
                                                        <div>
                                                            <label for="title"
                                                                class="block text-sm font-medium text-gray-700">Title</label>
                                                            <div class="mt-1">
                                                                <input type="text" name="title" id="title"
                                                                    value="{{ $post->title }}"
                                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                                    placeholder="you@example.com">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label for="body"
                                                                class="block text-sm font-medium text-gray-700">Add
                                                                your comment</label>
                                                            <div class="mt-1">
                                                                <textarea rows="4" name="body" id="body"
                                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{{ $post->body }}</textarea>
                                                            </div>
                                                        </div>

                                                        <button type="submit"
                                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                            Update
                                                        </button>
                                                    </form>
                                                </div>

                                                <div class="mt-6 flex justify-between space-x-8">
                                                    <div class="flex space-x-6">
                                                        <span class="inline-flex items-center text-sm">
                                                            <form method="post"
                                                                action="{{ route('community.like', $post->slug) }}">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                                    <!-- Heroicon name: solid/thumb-up -->
                                                                    <svg class="h-5 w-5"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 20 20" fill="currentColor"
                                                                        aria-hidden="true">
                                                                        <path
                                                                            d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                                                    </svg>
                                                                    <span
                                                                        class="font-medium text-gray-900">{{ $post->Like()->count() }}</span>
                                                                    <span class="sr-only">likes</span>
                                                                </button>
                                                            </form>
                                                        </span>
                                                        <span class="inline-flex items-center text-sm">
                                                            <a href="{{ route('community.post', $post->slug) }}"
                                                                type="button"
                                                                class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                                <!-- Heroicon name: solid/chat-alt -->
                                                                <svg class="h-5 w-5"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20" fill="currentColor"
                                                                    aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                                <span
                                                                    class="font-medium text-gray-900">{{ $post->Comments()->count() }}</span>
                                                                <span class="sr-only">comments</span>
                                                            </a>
                                                        </span>
                                                        <span class="inline-flex items-center text-sm">
                                                            <button type="button"
                                                                class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                                <!-- Heroicon name: solid/eye -->
                                                                <svg class="h-5 w-5"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20" fill="currentColor"
                                                                    aria-hidden="true">
                                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                                <span
                                                                    class="font-medium text-gray-900">{{ $post->views }}</span>
                                                                <span class="sr-only">views</span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    {{-- <div class="flex text-sm">
                    <span class="inline-flex items-center text-sm">
                      <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                        <!-- Heroicon name: solid/share -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             aria-hidden="true">
                          <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                        </svg>
                        <span class="font-medium text-gray-900">Share</span>
                      </button>
                    </span>
                                                    </div> --}}
                                                </div>
                                            </article>
                                        </li>
                                    @empty
                                        <!-- This example requires Tailwind CSS v2.0+ -->
                                        <button @click="newpost = true" type="button"
                                            class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <svg class="mx-auto h-12 w-12 text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" stroke="currentColor"
                                                fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
                                            </svg>
                                            <span class="mt-2 block text-sm font-medium text-gray-900">
                                                Click here to create a new post!
                                            </span>
                                        </button>

                                    @endforelse

                                    <!-- More questions... -->
                                </ul>
                            </div>

                            {{ $posts->links() }}

                        </main>
                        <aside class="hidden xl:block xl:col-span-4">
                            <div class="sticky top-4 space-y-4">
                                <section aria-labelledby="who-to-follow-heading">
                                    <div class="bg-white rounded-lg shadow">
                                        <div class="p-6">
                                            <h2 id="who-to-follow-heading"
                                                class="text-base font-medium text-gray-900">
                                                Who to follow
                                            </h2>
                                            <div class="mt-6 flow-root">
                                                <ul role="list" class="-my-4 divide-y divide-gray-200">
                                                    @foreach ($users as $user)
                                                        <li class="flex items-center py-4 space-x-3">
                                                            <div class="flex-shrink-0">
                                                                <img class="h-8 w-8 rounded-full"
                                                                    src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                                    alt="">
                                                            </div>
                                                            <div class="min-w-0 flex-1">
                                                                <p class="text-sm font-medium text-gray-900">
                                                                    <a href="#">{{ $user->name }}</a>
                                                                </p>
                                                                @isset($user->username)
                                                                    <p class="text-sm text-gray-500">
                                                                        <a
                                                                            href="{{ route('community.profile', $user->id) }}">@
                                                                            {{ $user->username }}</a>
                                                                    </p>
                                                                @endisset
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <button type="button"
                                                                    class="inline-flex items-center px-3 py-0.5 rounded-full bg-rose-50 text-sm font-medium text-rose-700 hover:bg-rose-100">
                                                                    <!-- Heroicon name: solid/plus-sm -->
                                                                    <svg class="-ml-1 mr-0.5 h-5 w-5 text-rose-400"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 20 20" fill="currentColor"
                                                                        aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                    <span>
                                                                        Follow
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                    <!-- More people... -->
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                                <section aria-labelledby="trending-heading">
                                    <div class="bg-white rounded-lg shadow">
                                        <div class="p-6">
                                            <h2 id="trending-heading" class="text-base font-medium text-gray-900">
                                                Trending
                                            </h2>
                                            <div class="mt-6 flow-root">
                                                <ul role="list" class="-my-4 divide-y divide-gray-200">
                                                    <li class="flex py-4 space-x-3">
                                                        <div class="flex-shrink-0">
                                                            <img class="h-8 w-8 rounded-full"
                                                                src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                                alt="Floyd Miles">
                                                        </div>
                                                        <div class="min-w-0 flex-1">
                                                            <p class="text-sm text-gray-800">What books do you have on
                                                                your
                                                                bookshelf just to look smarter than you actually
                                                                are?</p>
                                                            <div class="mt-2 flex">
                                                                <span class="inline-flex items-center text-sm">
                                                                    <button type="button"
                                                                        class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                                        <!-- Heroicon name: solid/chat-alt -->
                                                                        <svg class="h-5 w-5"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 20 20" fill="currentColor"
                                                                            aria-hidden="true">
                                                                            <path fill-rule="evenodd"
                                                                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                                                clip-rule="evenodd" />
                                                                        </svg>
                                                                        <span
                                                                            class="font-medium text-gray-900">291</span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <!-- More posts... -->
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                            </div>
                        </aside>
                    </div>


                    <div class="fixed inset-0 overflow-hidden" aria-labelledby="slide-over-title" role="dialog"
                        aria-modal="true" x-show="newpost"
                        x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                        x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" x-cloak>
                        <div class="absolute inset-0 overflow-hidden">
                            <!-- Background overlay, show/hide based on slide-over state. -->
                            <div class="absolute inset-0" aria-hidden="true">
                                <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16">
                                    <!--
                                      Slide-over panel, show/hide based on slide-over state.

                                      Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                                        From: "translate-x-full"
                                        To: "translate-x-0"
                                      Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                                        From: "translate-x-0"
                                        To: "translate-x-full"
                                    -->
                                    <div class="w-screen max-w-2xl">
                                        <form class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll"
                                            action="{{ route('community.new') }}" method="post">
                                            @csrf
                                            <div class="flex-1">
                                                <!-- Header -->
                                                <div class="px-4 py-6 bg-gray-400 sm:px-6">
                                                    <div class="flex items-start justify-between space-x-3">
                                                        <div class="space-y-1">
                                                            <h2 class="text-lg font-medium text-gray-900"
                                                                id="slide-over-title">
                                                                New Post
                                                            </h2>
                                                            <p class="text-sm text-gray-500">
                                                                Create a new post by filling out the form below.
                                                            </p>
                                                        </div>
                                                        <div class="h-7 flex items-center">
                                                            <button type="button"
                                                                class="text-gray-400 hover:text-gray-500"
                                                                @click="newpost = false">
                                                                <span class="sr-only">Close panel</span>
                                                                <!-- Heroicon name: outline/x -->
                                                                <svg class="h-6 w-6"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    aria-hidden="true">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Divider container -->
                                                <div
                                                    class="py-6 space-y-6 sm:py-0 sm:space-y-0 sm:divide-y sm:divide-gray-200">
                                                    <!-- Project name -->
                                                    <div
                                                        class="space-y-1 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                                                        <div>
                                                            <label for="project-name"
                                                                class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">
                                                                Title
                                                            </label>
                                                        </div>
                                                        <div class="sm:col-span-2">
                                                            <input type="text" name="title" id="title"
                                                                class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                                        </div>
                                                    </div>

                                                    <!-- Project description -->
                                                    <div
                                                        class="space-y-1 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                                                        <div>
                                                            <label for="project-description"
                                                                class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">
                                                                Text
                                                            </label>
                                                        </div>
                                                        <div class="sm:col-span-2">
                                                            <textarea id="text" name="text" rows="5"
                                                                class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border border-gray-300 rounded-md"></textarea>
                                                        </div>
                                                    </div>

                                                    <!-- Team members -->
                                                    <div
                                                        class="space-y-2 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:px-6 sm:py-5">
                                                        <div>
                                                            <h3 class="text-sm font-medium text-gray-900">
                                                                Subject
                                                            </h3>
                                                        </div>

                                                        <div>
                                                            <select id="subject" name="subject"
                                                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                                @foreach (auth()->user()->Subject()->get() as $subject)
                                                                    <option value="{{ $subject->id }}">
                                                                        {{ $subject->subject }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <!-- Team members -->
                                                    <div
                                                        class="space-y-2 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:px-6 sm:py-5">
                                                        <div>
                                                            <h3 class="text-sm font-medium text-gray-900">
                                                                Tag
                                                            </h3>
                                                        </div>

                                                        <div>
                                                            <select id="tag" name="tag"
                                                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                                <option selected value="">None</option>
                                                                @foreach (auth()->user()->Tag()->get() as $tag)
                                                                    <option value="{{ $tag->id }}">
                                                                        {{ $tag->tag }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>

                                                    @if (!auth()->user()->Subject()->exists())
                                                        <div class="rounded-md bg-yellow-50 p-4">
                                                            <div class="flex">
                                                                <div class="flex-shrink-0">
                                                                    <!-- Heroicon name: solid/exclamation -->
                                                                    <svg class="h-5 w-5 text-yellow-400"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 20 20" fill="currentColor"
                                                                        aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </div>
                                                                <div class="ml-3">
                                                                    <h3 class="text-sm font-medium text-yellow-800">
                                                                        Join
                                                                        a community.</h3>
                                                                    <div class="mt-2 text-sm text-yellow-700">
                                                                        <p>It looks like you are not part of any
                                                                            communities, please join one in order to
                                                                            send a post! <a class="font-bold underline"
                                                                                href="{{ route('community.communities') }}">Visit
                                                                                communities page.</a></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            @if ($errors->all())
                                                <div class="rounded-md bg-red-50 p-4">
                                                    <div class="flex">
                                                        <div class="flex-shrink-0">
                                                            <!-- Heroicon name: solid/x-circle -->
                                                            <svg class="h-5 w-5 text-red-400"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        <div class="ml-3">
                                                            <h3 class="text-sm font-medium text-red-800">There
                                                                were {{ $errors->count() }} errors with your
                                                                submission</h3>
                                                            <div class="mt-2 text-sm text-red-700">
                                                                <ul role="list" class="list-disc pl-5 space-y-1">
                                                                    @foreach ($errors->all() as $e)
                                                                        <li>{{ $e }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <!-- Action buttons -->
                                            <div class="flex-shrink-0 px-4 border-t border-gray-200 py-5 sm:px-6">
                                                <div class="space-x-3 flex justify-end">
                                                    <button @click="newpost = false" type="button"
                                                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        Cancel
                                                    </button>
                                                    <button type="submit"
                                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        Create
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </main>
        </div>
</x-new-user-layout>
