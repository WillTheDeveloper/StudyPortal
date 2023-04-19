<x-new-user-layout>

    <!-- Main column -->
    <div class="lg:pl-64 flex flex-col" x-data="{likes:false, commented:true}">

        @if(session()->has('commented'))
        <!-- Global notification live region, render this permanently at the end of the document -->
        <div aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6" x-show="commented">
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
                <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: outline/check-circle -->
                                <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm font-medium text-gray-900">Created comment</p>
                                <p class="mt-1 text-sm text-gray-500">Anyone who looks at this post can see your comment now.</p>
                            </div>
                            <div class="ml-4 flex flex-shrink-0">
                                <button @click="commented = false" type="button" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <span class="sr-only">Close</span>
                                    <!-- Heroicon name: mini/x-mark -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif


        <div x-show="likes" x-cloak class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0"></div>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 sm:pl-16">

                        <div class="pointer-events-auto w-screen max-w-md">
                            <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                                <div class="p-6">
                                    <div class="flex items-start justify-between">
                                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Users who liked this post</h2>
                                        <div class="ml-3 flex h-7 items-center">
                                            <button @click="likes = false" type="button" class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:ring-2 focus:ring-indigo-500">
                                                <span class="sr-only">Close panel</span>
                                                <!-- Heroicon name: outline/x-mark -->
                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul role="list" class="flex-1 divide-y divide-gray-200 overflow-y-auto">

                                    @foreach($post->Like as $l)
                                    <li x-data="{menu:false}">
                                        <div class="group relative flex items-center py-6 px-5">
                                            <a href="#" class="-m-1 block flex-1 p-1">
                                                <div class="absolute inset-0 group-hover:bg-gray-50" aria-hidden="true"></div>
                                                <div class="relative flex min-w-0 flex-1 items-center">
                                                      <span class="relative inline-block flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                          <!-- Online: "bg-green-400", Offline: "bg-gray-300" -->
                                                        <span class="bg-green-400 absolute top-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-white" aria-hidden="true"></span>
                                                      </span>
                                                    <div class="ml-4 truncate">
                                                        <p class="truncate text-sm font-medium text-gray-900">{{$l->User->name}}</p>
                                                        @isset($l->User->username)
                                                            <p class="truncate text-sm text-gray-500">@ {{$l->User->username}}</p>
                                                        @endisset
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="relative ml-2 inline-block flex-shrink-0 text-left">
                                                <button @click="menu = true" type="button" class="group relative inline-flex h-8 w-8 items-center justify-center rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                                    <span class="sr-only">Open options menu</span>
                                                    <span class="flex h-full w-full items-center justify-center rounded-full">
                                                        <!-- Heroicon name: mini/ellipsis-vertical -->
                                                        <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                          <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                                        </svg>
                                                      </span>
                                                </button>

                                                <!--
                                                  Dropdown panel, show/hide based on dropdown state.

                                                  Entering: "transition ease-out duration-100"
                                                    From: "transform opacity-0 scale-95"
                                                    To: "transform opacity-100 scale-100"
                                                  Leaving: "transition ease-in duration-75"
                                                    From: "transform opacity-100 scale-100"
                                                    To: "transform opacity-0 scale-95"
                                                -->
                                                <div x-show="menu" @click.away="menu = false" class="absolute top-0 right-9 z-10 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">
                                                    <div class="py-1" role="none">
                                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                        <a href="{{route('community.profile', $l->User->id)}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-0">View profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                    <!-- More people... -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="py-10" x-data="{newcomment:false}">
        <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
            <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                <nav aria-label="Sidebar" class="sticky top-4 divide-y divide-gray-300">
                    <div class="pb-8 space-y-1">
                        <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-600 hover:bg-gray-50" -->
                        <a href="{{ route('community') }}"
                           class="bg-gray-200 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                           aria-current="page">
                            <!-- Heroicon name: outline/home -->
                            <svg class="text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
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
                                      d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
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
                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
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
                                      d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            <span class="truncate">
                Trending
              </span>
                        </a>
                    </div>
                    <div class="pt-10">
                        <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider"
                           id="communities-headline">
                            My Subjects
                        </p>
                        <div class="mt-3 space-y-2" aria-labelledby="communities-headline">

                            @foreach(auth()->user()->Subject()->get() as $subject)
                                <a href="{{ route('community.subject', $subject->id) }}"
                                   class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                <span class="truncate">
                                  {{$subject->subject}}
                                </span>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </nav>
            </div>

            <div class="flow-root lg:col-span-8">

                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg" x-data="{button: true, create: false}">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">{{$post->title}}</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">{{$post->User->name}}'s post.</p>
                        @foreach($post->Tag()->get() as $t)
                            <span class="inline-flex items-center rounded bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-800">{{$t->tag}}</span>
                        @endforeach
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                        <dl class="sm:divide-y sm:divide-gray-200">
                            <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Subject</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$post->Subject->subject}}</dd>
                            </div>
                            <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Posted at</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$post->created_at->diffForHumans()}}</dd>
                            </div>
                            <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Message</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$post->body}}</dd>
                            </div>
                            <div @click="likes = true" class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Likes</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$post->Like->count()}}</dd>
                            </div>
                            @if($errors->all())
                                <div class="rounded-md bg-red-50 p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: solid/x-circle -->
                                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-red-800">There were {{$errors->count()}} errors with your submission</h3>
                                            <div class="mt-2 text-sm text-red-700">
                                                <ul role="list" class="list-disc pl-5 space-y-1">
                                                    @foreach($errors->all() as $e)
                                                        <li>{{$e}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div x-show="button" x-cloak class="py-2 sm:py-3 sm:grid sm:grid-cols-3 bg-gray-500 sm:gap-4 sm:px-6">
                                <dt @click="button = false; create = true" class="text-sm font-medium text-white">New Comment</dt>
                            </div>
                            <form method="post" action="{{ route('community.comment.new', $post->id) }}">
                                @csrf
                                <div x-show="create" x-cloak class="py-4 sm:py-5 bg-gray-500 sm:gap-4 sm:px-6">
                                    <div class="mt-1">
                                        <textarea rows="4" cols="4" name="comment" placeholder="Enter your comment..." id="comment" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="w-full">
                                <div x-show="create" x-cloak class="py-2 sm:py-3 sm:grid bg-gray-700  sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-white text-left">Post comment</dt>
                                </div>
                                </button>
                            </form>
                        </dl>
                    </div>
                </div>

                <ul role="list" class="divide-y divide-gray-200 py-5">
                    @foreach($post->Comments->sortByDesc('created_at') as $p)
                    <li class="relative bg-white py-5 px-4 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600" x-data="{menu: false, edit: false, content: true}" x-on:click="menu=true" x-on:click.away="menu=false">
                        <div class="flex justify-between space-x-3">
                            <div class="min-w-0 flex-1" x-show="content">
                                <a href="#" class="block focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900 truncate">{{$p->comment}}</p>
                                    <p class="text-sm text-gray-500 truncate">{{$p->User->name}}</p>
                                    @if ($post->user_id == $p->user_id)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800"> Original Poster </span>
                                    @endif
                                    @if ($p->User->is_admin)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800"> Admin </span>
                                    @endif
                                    @if($p->User->is_moderator)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800"> Moderator </span>
                                    @endif
                                    @if ($p->User->is_tutor)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800"> Tutor </span>
                                    @endif
                                </a>
                            </div>
                            <time datetime="2021-01-27T16:35" class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">{{$p->created_at->diffForHumans()}}</time>
                        </div>
                       {{-- <div class="mt-1">
                            <p class="line-clamp-2 text-sm text-gray-600">{{$p->body}}</p>
                        </div>--}}

                        @if($p->user_id == auth()->id())
                        <span x-show="menu" x-cloak class="relative z-0 inline-flex shadow-sm rounded-md">
                          <button x-on:click="content=false; edit=true; menu=false" type="button" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Edit</button>
                            <form method="post" action="{{ route('community.comment.delete', $p->id) }}">
                                @csrf
                                <button type="submit" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Delete</button>
                            </form>
                        </span>


                            <div x-show="edit" x-cloak>
                                <form method="post" action="{{ route('community.comment.update', $p->id) }}">
                                    @csrf
                                    <div>
                                        <label for="comment" class="block text-sm font-medium text-gray-700">Edit your comment</label>
                                        <div class="mt-1">
                                            <textarea rows="4" name="comment" id="comment" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{{$p->comment}}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                                </form>
                            </div>
                        @endif
                    </li>
                    @endforeach

                    <!-- More messages... -->
                </ul>
            </div>
        </div>
    </div>
    </div>
</x-new-user-layout>
