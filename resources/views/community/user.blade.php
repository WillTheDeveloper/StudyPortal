<x-new-user-layout>
    {{--<!-- This example requires Tailwind CSS v2.0+ -->
    <div>
        <div>
            <img class="h-32 w-full object-cover lg:h-48" src="https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="">
        </div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                <div class="flex">
                    <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                </div>
                <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                    <div class="sm:hidden md:block mt-6 min-w-0 flex-1">
                        <h1 class="text-2xl font-bold text-gray-900 truncate">
                            {{$user->name}}
                            @if ($user->is_moderator)
                                <span class="text-grape-500">(Moderator)</span>
                            @endif
                            @if ($user->is_admin)
                                <span class="text-red-500">(Admin)</span>
                            @endif
                            @if ($user->is_tutor)
                                <span class="text-green-500">(Tutor)</span>
                            @endif
                        </h1>
                    </div>
                    @if($user->id == auth()->id())
                        <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                            <button @click="settings = true" type="button" class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                                <!-- Heroicon name: solid/mail -->
                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                                <span>Settings</span>
                            </button>
                        </div>
                    @endif
                    @if(!$user->id == auth()->id() | request()->has('preview'))
                        <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                            <button type="button" class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                                <!-- Heroicon name: solid/mail -->
                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                                <span>Email</span>
                            </button>
                            <button type="button" class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                                <!-- Heroicon name: solid/phone -->
                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                <span>Call</span>
                            </button>
                        </div>
                    @endif()
                </div>
            </div>
            <div class="hidden sm:block md:hidden mt-6 min-w-0 flex-1">
                <h1 class="text-2xl font-bold text-gray-900 truncate">
                    {{$user->name}}
                </h1>
            </div>

            <dl class="mt-3 mb-1 grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Posts
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{$user->Post->count()}}
                    </dd>
                </div>

                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Comments
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{$user->Comment->count()}}
                    </dd>
                </div>

                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Total Views
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{$user->Post->sum('views')}}
                    </dd>
                </div>
            </dl>

        </div>
    </div>


            @isset($user->bio)
            <!-- This example requires Tailwind CSS v2.0+ -->
            <section class="overflow-hidden">
                <div class="relative max-w-7xl mx-auto pt-10 px-4 sm:px-6 lg:px-8 lg:pt-20">
                    <div class="relative lg:flex lg:items-center">
                        <div class="relative lg:ml-10">
                            <svg class="absolute top-0 left-0 transform -translate-x-8 -translate-y-24 h-36 w-36 text-indigo-200 opacity-50" stroke="currentColor" fill="none" viewBox="0 0 144 144" aria-hidden="true">
                                <path stroke-width="2" d="M41.485 15C17.753 31.753 1 59.208 1 89.455c0 24.664 14.891 39.09 32.109 39.09 16.287 0 28.386-13.03 28.386-28.387 0-15.356-10.703-26.524-24.663-26.524-2.792 0-6.515.465-7.446.93 2.327-15.821 17.218-34.435 32.11-43.742L41.485 15zm80.04 0c-23.268 16.753-40.02 44.208-40.02 74.455 0 24.664 14.891 39.09 32.109 39.09 15.822 0 28.386-13.03 28.386-28.387 0-15.356-11.168-26.524-25.129-26.524-2.792 0-6.049.465-6.98.93 2.327-15.821 16.753-34.435 31.644-43.742L121.525 15z" />
                            </svg>
                            <blockquote class="relative">
                                <div class="text-2xl leading-9 font-medium text-gray-900">
                                    <p>{{$user->bio}}</p>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </section>
            @endisset


            <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-gray-100">
        <div class="max-w-2xl py-3 px-4 grid  gap-y-2 gap-x-8 sm:px-6 lg:max-w-7xl lg:px-8 ">

            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Recent posts</h3>
                --}}{{--<p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit quam corrupti consectetur.</p>--}}{{--
            </div>
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach($posts as $post)
                    <li class="relative bg-white py-5 px-4 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                        <div class="flex justify-between space-x-3">
                            <div class="min-w-0 flex-1">
                                <a href="{{route('community.post', $post->slug)}}" class="block focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900 truncate">{{$post->title}}</p>
                                    <p class="text-sm text-gray-500 truncate">{{$post->Subject->subject}}</p>
                                </a>
                            </div>
                            <time datetime="2021-01-27T16:35" class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</time>
                        </div>
                        <div class="mt-1">
                            <p class="line-clamp-2 text-sm text-gray-600">{{$post->body}}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
--}}{{--                {{$posts->links()}}--}}{{--

            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Recent comments</h3>
                --}}{{--<p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit quam corrupti consectetur.</p>--}}{{--
            </div>
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach($comments as $comment)
                    <li class="relative bg-white py-5 px-4 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                        <div class="flex justify-between space-x-3">
                            <div class="min-w-0 flex-1">
                                <a href="{{route('community.post', $comment->Post->slug)}}" class="block focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900 truncate">From "{{$comment->Post->title}}"</p>
--}}{{--                                    <p class="text-sm text-gray-500 truncate">Velit placeat sit ducimus non sed</p>--}}{{--
                                </a>
                            </div>
                            <time datetime="2021-01-27T16:35" class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">{{$comment->created_at->diffForHumans()}}</time>
                        </div>
                        <div class="mt-1">
                            <p class="line-clamp-2 text-sm text-gray-600">{{$comment->comment}}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>

        </div>
    </div>

            --}}{{--THIS IS THE SETTINGS SLIDEOUT--}}{{--
            @if(auth()->id() == $user->id)

            <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-cloak x-show="settings">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0"></div>

                <div class="fixed inset-0 overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 sm:pl-16">
                            <!--
                              Slide-over panel, show/hide based on slide-over state.

                              Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                                From: "translate-x-full"
                                To: "translate-x-0"
                              Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                                From: "translate-x-0"
                                To: "translate-x-full"
                            -->
                            <div class="pointer-events-auto w-screen max-w-2xl">
                                <form class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl" method="post" action="{{route('community.update-privacy', auth()->id())}}">
                                    @csrf
                                    <div class="flex-1">
                                        <!-- Header -->
                                        <div class="bg-gray-50 px-4 py-6 sm:px-6">
                                            <div class="flex items-start justify-between space-x-3">
                                                <div class="space-y-1">
                                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Profile settings</h2>
                                                </div>
                                                <div class="flex h-7 items-center">
                                                    <button @click="settings = false" type="button" class="text-gray-400 hover:text-gray-500">
                                                        <span class="sr-only">Close panel</span>
                                                        <!-- Heroicon name: outline/x -->
                                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Divider container -->
                                        <div class="space-y-6 py-6 sm:space-y-0 sm:divide-y sm:divide-gray-200 sm:py-0">
                                            <!-- Project description -->
                                            <div class="space-y-1 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:space-y-0 sm:px-6 sm:py-5">
                                                <div>
                                                    <label for="bio" class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2"> Bio </label>
                                                </div>
                                                <div class="sm:col-span-2">
                                                    <textarea id="bio" name="bio" rows="3" class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{$user->bio}}</textarea>
                                                </div>
                                            </div>

                                            <!-- Privacy -->
                                            <fieldset class="space-y-2 px-4 sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:space-y-0 sm:px-6 sm:py-5">
                                                <legend class="sr-only">Account Privacy</legend>
                                                <div class="text-sm font-medium text-gray-900" aria-hidden="true">Account Privacy</div>
                                                <div class="space-y-5 sm:col-span-2">
                                                    <div class="space-y-5 sm:mt-0">
                                                        <div class="relative flex items-start">
                                                            <div class="absolute flex h-5 items-center">
                                                                <input id="private-access" @checked('private') value="true" name="privacy" aria-describedby="public-access-description" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" checked>
                                                            </div>
                                                            <div class="pl-7 text-sm">
                                                                <label for="public-access" class="font-medium text-gray-900"> Public </label>
                                                                <p id="public-access-description" class="text-gray-500">People will be able to see an overview of your account on your profile</p>
                                                            </div>
                                                        </div>
                                                        <div class="relative flex items-start">
                                                            <div class="absolute flex h-5 items-center">
                                                                <input id="private-access" @checked('private') value="false" name="privacy" aria-describedby="private-access-description" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            </div>
                                                            <div class="pl-7 text-sm">
                                                                <label for="private-access" class="font-medium text-gray-900"> Private </label>
                                                                <p id="private-access-description" class="text-gray-500">Only you will be able to see an overview of your account</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="space-y-2 px-4 sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:space-y-0 sm:px-6 sm:py-5">
                                                <legend class="sr-only">Contact buttons</legend>
                                                <div class="text-sm font-medium text-gray-900" aria-hidden="true">Contact Privacy</div>
                                                <div class="space-y-5 sm:col-span-2">
                                                    <div class="space-y-5 sm:mt-0">
                                                        <div class="relative flex items-start">
                                                            <div class="absolute flex h-5 items-center">
                                                                <input id="public-access" name="contact" @checked('contact') value="true" aria-describedby="public-access-description" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            </div>
                                                            <div class="pl-7 text-sm">
                                                                <label for="public-access" class="font-medium text-gray-900"> Public visibility </label>
                                                                <p id="public-access-description" class="text-gray-500">People will be able to obtain your email and contact you via your profile</p>
                                                            </div>
                                                        </div>
                                                        <div class="relative flex items-start">
                                                            <div class="absolute flex h-5 items-center">
                                                                <input id="private-access" name="contact" @checked('contact') value="false" aria-describedby="private-access-description" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                            </div>
                                                            <div class="pl-7 text-sm">
                                                                <label for="private-access" class="font-medium text-gray-900"> Hidden visibility </label>
                                                                <p id="private-access-description" class="text-gray-500">Your email will be hidden from your profile from anyone.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <!-- Action buttons -->
                                    <div class="flex-shrink-0 border-t border-gray-200 px-4 py-5 sm:px-6">
                                        <div class="flex justify-end space-x-3">
                                            <a href="?preview" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Preview</a>
                                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif


        </div>
    </div>--}}

            <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
            <!--
              This example requires updating your template:

              ```
              <html class="h-full bg-gray-100">
              <body class="h-full">
              ```
            -->
            <div class="min-h-full">
                <header class=" pb-24">
                    <div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
                        {{--<div class="hidden border-t border-white border-opacity-20 py-5 lg:block">
                            <div class="grid grid-cols-3 items-center gap-8">
                                <div class="col-span-2">
                                    <nav class="flex space-x-4">
                                        <!-- Current: "text-white", Default: "text-indigo-100" -->
                                        <a href="#" class="text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10" aria-current="page">Home</a>

                                        <a href="#" class="text-indigo-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10">Profile</a>

                                        <a href="#" class="text-indigo-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10">Resources</a>

                                        <a href="#" class="text-indigo-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10">Company Directory</a>

                                        <a href="#" class="text-indigo-100 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10">Openings</a>
                                    </nav>
                                </div>
                                <div>
                                    <div class="mx-auto w-full max-w-md">
                                        <label for="mobile-search" class="sr-only">Search</label>
                                        <div class="relative text-white focus-within:text-gray-600">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                <!-- Heroicon name: mini/magnifying-glass -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <input id="mobile-search" class="block w-full rounded-md border border-transparent bg-white bg-opacity-20 py-2 pl-10 pr-3 leading-5 text-gray-900 placeholder-white focus:border-transparent focus:bg-opacity-100 focus:placeholder-gray-500 focus:outline-none focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                    </div>

                </header>
                <main class="-mt-24 pb-8 pt-4">
                    <div class="mx-auto px-5 sm:px-6 lg:px-8">
                        <h1 class="sr-only">Page title</h1>
                        <!-- Main 3 column grid -->
                        <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-3 lg:gap-8">
                            <!-- Left column -->
                            <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                                <section aria-labelledby="section-1-title">
                                    <h2 class="sr-only" id="section-1-title">Section title</h2>
                                    <div class="overflow-hidden rounded-lg bg-white shadow">
                                        <div class="p-6">
                                            <!-- Your content -->

                                            <div class="grid gap-16 pt-3 lg:grid-cols-3 lg:gap-x-5 lg:gap-y-12">

                                                @forelse($posts as $post)
                                                <div>
                                                    <div>
                                                        <a href="#" class="inline-block">
                                                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">Article</span>
                                                        </a>
                                                    </div>
                                                    <a href="#" class="mt-4 block">
                                                        <p class="text-xl font-semibold text-gray-900">{{$post->title}}</p>
                                                        <p class="mt-3 text-base text-gray-500">{{$post->body}}</p>
                                                    </a>
                                                    <div class="mt-6 flex items-center">
                                                        <div>
                                                            <div class="flex space-x-1 text-sm text-gray-500">
                                                                <time datetime="2020-03-16">{{$post->created_at->diffForHumans()}}</time>
                                                                <span aria-hidden="true">&middot;</span>
                                                                <span>6 min read</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @empty

                                                    <div class="rounded-md bg-blue-50 p-4 col-span-3">
                                                        <div class="flex">
                                                            <div class="flex-shrink-0">
                                                                <!-- Heroicon name: mini/information-circle -->
                                                                <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd" d="M19 10.5a8.5 8.5 0 11-17 0 8.5 8.5 0 0117 0zM8.25 9.75A.75.75 0 019 9h.253a1.75 1.75 0 011.709 2.13l-.46 2.066a.25.25 0 00.245.304H11a.75.75 0 010 1.5h-.253a1.75 1.75 0 01-1.709-2.13l.46-2.066a.25.25 0 00-.245-.304H9a.75.75 0 01-.75-.75zM10 7a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                                </svg>
                                                            </div>
                                                            <div class="ml-3 flex-1 md:flex md:justify-between">
                                                                <p class="text-sm text-blue-700">{{$user->name}} has not posted anything yet :)</p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                @endforelse

                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <!-- Right column -->
                            <div class="grid grid-cols-1 gap-4">
                                <section aria-labelledby="section-2-title">
                                    <h2 class="sr-only" id="section-2-title">Section title</h2>
                                    <div class="overflow-hidden rounded-lg bg-white shadow">
                                        <div class="p-6">
                                            <!-- Your content -->
                                            <div class="space-y-6">
                                                <img class="mx-auto h-40 w-40 rounded-full xl:h-56 xl:w-56" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                                                <div class="space-y-2">
                                                    <div class="space-y-1 text-lg font-medium leading-6">
                                                        <h3>{{$user->name}}</h3>
                                                        <p class="text-indigo-600">Student</p>
                                                    </div>
                                                    <ul role="list" class="flex justify-center space-x-5">
                                                        <li>
                                                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                                                <span class="sr-only">Twitter</span>
                                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                                    <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                                                <span class="sr-only">LinkedIn</span>
                                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                                    <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </main>
            </div>






</x-new-user-layout>
