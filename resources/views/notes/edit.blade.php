<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

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
            <main class="flex-1" x-data="{banner: true, help: false}">

                <div class="relative bg-indigo-600" x-show="banner" x-cloak>
                    <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                        <div class="pr-16 sm:text-center sm:px-16">
                            <p class="font-medium text-white">
                                <span class="md:hidden"> Notes is getting an upgrade </span>
                                <span class="hidden md:inline"> Big news! We're excited to announce markdown support! </span>
                                <span class="block sm:ml-2 sm:inline-block">
                                  <a href="#" class="text-white font-bold underline" x-on:click="help = true"> Learn more <span aria-hidden="true">&rarr;</span></a>
                                </span>
                            </p>
                        </div>
                        <div class="absolute inset-y-0 right-0 pt-1 pr-1 flex items-start sm:pt-1 sm:pr-2 sm:items-start">
                            <button type="button" class="flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white" x-on:click="banner = false">
                                <span class="sr-only">Dismiss</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <form action="{{route('notes.save', $notes->id)}}" method="post">
                    @csrf
                    <div class="">
                        <div class="flex items-center" aria-orientation="horizontal" role="tablist">
                            <!-- Selected: "text-gray-900 bg-gray-100 hover:bg-gray-200", Not Selected: "text-gray-500 hover:text-gray-900 bg-white hover:bg-gray-100" -->
                            <button id="tabs-1-tab-1" class="text-gray-500 hover:text-gray-900 bg-white hover:bg-gray-100 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md" aria-controls="tabs-1-panel-1" role="tab" type="button">Write</button>
                            <!-- Selected: "text-gray-900 bg-gray-100 hover:bg-gray-200", Not Selected: "text-gray-500 hover:text-gray-900 bg-white hover:bg-gray-100" -->
                            <button id="tabs-1-tab-2" class="text-gray-500 hover:text-gray-900 bg-white hover:bg-gray-100 ml-2 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md" aria-controls="tabs-1-panel-2" role="tab" type="button">Preview</button>

                            <!-- These buttons are here simply as examples and don't actually do anything. -->
                            <div class="ml-auto flex items-center space-x-5">
                                <div class="flex items-center">
                                    <button type="button" class="-m-2.5 w-10 h-10 rounded-full inline-flex items-center justify-center text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">Insert link</span>
                                        <!-- Heroicon name: solid/link -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex items-center">
                                    <button type="button" class="-m-2.5 w-10 h-10 rounded-full inline-flex items-center justify-center text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">Insert code</span>
                                        <!-- Heroicon name: solid/code -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex items-center">
                                    <button type="button" class="-m-2.5 w-10 h-10 rounded-full inline-flex items-center justify-center text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">Mention someone</span>
                                        <!-- Heroicon name: solid/at-symbol -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div id="tabs-1-panel-1" class="p-0.5 -m-0.5 rounded-lg" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                                <label for="comment" class="sr-only">Comment</label>
                                <div>
                                    <textarea rows="5" name="comment" id="comment" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Add your comment...">{{$notes->notes}}</textarea>
                                </div>
                            </div>
                            {{--<div id="tabs-1-panel-2" class="p-0.5 -m-0.5 rounded-lg" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
                                <div class="border-b">
                                    <div class="mx-px mt-px px-3 pt-2 pb-12 text-sm leading-5 text-gray-800">Preview content will render here.</div>
                                </div>
                            </div>--}}
                        </div>
                    </div>
                    <div class="mt-2 flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                    </div>
                </form>


                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="fixed inset-0 overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-show="help" x-cloak>
                    <div class="absolute inset-0 overflow-hidden">
                        <!--
                          Background overlay, show/hide based on slide-over state.

                          Entering: "ease-in-out duration-500"
                            From: "opacity-0"
                            To: "opacity-100"
                          Leaving: "ease-in-out duration-500"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
                        <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                            <!--
                              Slide-over panel, show/hide based on slide-over state.

                              Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                                From: "translate-x-full"
                                To: "translate-x-0"
                              Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                                From: "translate-x-0"
                                To: "translate-x-full"
                            -->
                            <div class="pointer-events-auto relative w-screen max-w-md">
                                <!--
                                  Close button, show/hide based on slide-over state.

                                  Entering: "ease-in-out duration-500"
                                    From: "opacity-0"
                                    To: "opacity-100"
                                  Leaving: "ease-in-out duration-500"
                                    From: "opacity-100"
                                    To: "opacity-0"
                                -->
                                <div class="absolute top-0 left-0 -ml-8 flex pt-4 pr-2 sm:-ml-10 sm:pr-4">
                                    <button type="button" class="rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white" x-on:click="help = false">
                                        <span class="sr-only">Close panel</span>
                                        <!-- Heroicon name: outline/x -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                                    <div class="bg-gray-50">
                                        <div class="max-w-7xl mx-auto py-12 px-4 divide-y divide-gray-200 sm:px-6 lg:py-16 lg:px-8">
                                            <h2 class="text-3xl font-extrabold text-gray-900">Markdown support</h2>
                                            <div class="mt-8">
                                                <dl class="divide-y divide-gray-200">
                                                    <div class="pt-6 pb-8 md:grid md:grid-cols-12 md:gap-8">
                                                        <dt class="text-base font-medium text-gray-900 md:col-span-5">What is markdown?</dt>
                                                        <dd class="mt-2 md:mt-0 md:col-span-7">
                                                            <p class="text-base text-gray-500">Markdown is really easy way to nicely format content!</p>
                                                        </dd>
                                                    </div>

                                                    <div class="pt-6 pb-8 md:grid md:grid-cols-12 md:gap-8">
                                                        <dt class="text-base font-medium text-gray-900 md:col-span-5">How do you do a header?</dt>
                                                        <dd class="mt-2 md:mt-0 md:col-span-7">
                                                            <p class="text-base text-gray-500">An example: "# Header name".</p>
                                                        </dd>
                                                    </div>

                                                    <div class="pt-6 pb-8 md:grid md:grid-cols-12 md:gap-8">
                                                        <dt class="text-base font-medium text-gray-900 md:col-span-5">Do you have use markdown?</dt>
                                                        <dd class="mt-2 md:mt-0 md:col-span-7">
                                                            <p class="text-base text-gray-500">Nope, it's totally optional. You can just write plain text.</p>
                                                        </dd>
                                                    </div>

                                                    <!-- More questions... -->
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
</x-app-layout>
