<x-app-layout>
    <div class="min-h-full">

        <!-- Main column -->
        <div class="lg:pl-64 flex flex-col">
            <!-- Search header -->
            <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
                <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
                <button @click="menu = true" type="button"
                        class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu-alt-1 -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h8m-8 6h16"/>
                    </svg>
                </button>
                <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
                    <div class="flex-1 flex">
                        <form class="w-full flex md:ml-0" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                    <!-- Heroicon name: solid/search -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <input id="search-field" name="search-field"
                                       class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 sm:text-sm"
                                       placeholder="Search" type="search">
                            </div>
                        </form>
                    </div>
                    <div class="flex items-center">
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button @click="profile = true" type="button"
                                        class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                         src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                         alt="">
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
                            <div x-show="profile" x-cloak
                                 class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                                 role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                 tabindex="-1">
                                <div class="py-1" role="none">
                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                       tabindex="-1" id="user-menu-item-0">View profile</a>
                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                       tabindex="-1" id="user-menu-item-1">Settings</a>
                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                       tabindex="-1" id="user-menu-item-2">Notifications</a>
                                </div>
                                <div class="py-1" role="none">
                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                       tabindex="-1" id="user-menu-item-3">Get desktop app</a>
                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                       tabindex="-1" id="user-menu-item-4">Support</a>
                                </div>
                                <div class="py-1" role="none">
                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                       tabindex="-1" id="user-menu-item-5">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (auth()->user()->is_tutor)
                <div class="pt-5 px-5">
                    <form action="{{route('group.new.discussion', $id)}}" method="post" class="relative">
                        @csrf
                        <div class="border border-gray-300 rounded-lg shadow-sm overflow-hidden focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
                            <label for="title" class="sr-only">Title</label>
                            <input type="text" name="title" id="title" class="block w-full border-0 pt-2.5 text-lg font-medium placeholder-gray-500 focus:ring-0" placeholder="Title">
                            <label for="description" class="sr-only">Description</label>
                            <textarea rows="2" name="description" id="description" class="block w-full border-0 py-0 resize-none placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Write a description..."></textarea>

                            <!-- Spacer element to match the height of the toolbar -->
                            <div aria-hidden="true">
                                <div class="py-2">
                                    <div class="h-9"></div>
                                </div>
                                <div class="h-px"></div>
                            </div>
                        </div>

                        <div class="absolute bottom-0 inset-x-px">
                            <div class="border-t border-gray-200 px-2 py-2 flex justify-between items-center space-x-3 sm:px-3">
                                <div class="flex-shrink-0">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endif

            <div class="mt-4 px-5">
                <h1 class="sr-only">Recent discussions</h1>
                <ul role="list" class="space-y-4">
                    @foreach($board as $d)
                    <li class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg">
                        <article aria-labelledby="question-title-81614">
                            <div>
                                <div class="flex space-x-3">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900">
                                            <a href="{{route('community.profile', $d->User->id)}}" class="hover:underline">{{$d->User->name}}</a>
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            <a href="#" class="hover:underline">
                                                <time datetime="{{$d->created_at}}">{{$d->created_at->format('N D M Y')}}</time>
                                            </a>
                                        </p>
                                    </div>
                                    @if(auth()->user()->is_tutor)
                                    <div class="flex-shrink-0 self-center flex" x-data="{dropdown:false}">
                                        <div class="relative inline-block text-left">
                                            <div>
                                                <button @click="dropdown = true" @click.away="dropdown = false" type="button" class="-m-2 p-2 rounded-full flex items-center text-gray-400 hover:text-gray-600" id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                                    <span class="sr-only">Open options</span>
                                                    <!-- Heroicon name: solid/dots-vertical -->
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
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
                                            <div x-show="dropdown" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">
                                                <div class="py-1" role="none">
                                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                    @switch($d->locked)
                                                        @case(1)
                                                            <form method="post" action="{{route('discussions.unlock', $d->id)}}">
                                                                @csrf
                                                                <button type="submit" class="text-gray-700 flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                                                    <!-- Heroicon name: solid/star -->
                                                                    <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                    </svg>
                                                                    <span>Unlock</span>
                                                                </button>
                                                            </form>
                                                            @break(1)
                                                        @case(0)
                                                            <form method="post" action="{{route('discussions.lock', $d->id)}}">
                                                                @csrf
                                                                <button type="submit" class="text-gray-700 flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                                                    <!-- Heroicon name: solid/star -->
                                                                    <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                    </svg>
                                                                    <span>Lock</span>
                                                                </button>
                                                            </form>
                                                            @break(0)
                                                    @endswitch
                                                    <form method="post" action="{{route('discussions.delete', $d->id)}}">
                                                        @csrf
                                                        <button type="submit" class="text-gray-700 flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                                            <!-- Heroicon name: solid/code -->
                                                            <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                            </svg>
                                                            <span>Delete</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <h2 id="question-title-81614" class="mt-4 text-base font-medium text-gray-900">{{$d->title}}</h2>
                            </div>
                            <div class="mt-2 text-sm text-gray-700 space-y-4">
                                <p>{{$d->body}}</p>
                            </div>
                            <div>
                                {{--<div class="flow-root mt-6">
                                    <ul role="list" class="-my-5 divide-y divide-gray-200">
                                        @foreach($d->Reply as $r)
                                        <li class="py-5">
                                            <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                                                <h3 class="text-sm font-semibold text-gray-800">
                                                    <a href="#" class="hover:underline focus:outline-none">
                                                        <!-- Extend touch target to entire panel -->
                                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                                        {{$r->User->name}} replied:
                                                    </a>
                                                </h3>
                                                <p class="mt-1 text-sm text-gray-600 line-clamp-2">{{$r->message}}</p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>--}}
                                <div class="mt-6">
                                    <a href="{{route('discussions.replies', $d->id)}}" class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> View all {{$d->Reply->count()}} replies.</a>
                                </div>
                            </div>
                        </article>
                    </li>
                    @endforeach
                    <!-- More questions... -->
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
