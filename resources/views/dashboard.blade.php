<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
            <main class="flex-1 pb-8" x-data="{command: false}" @keyup.shift.enter.window="command = true" @keyup.esc.window="command = false">

                <div x-show="command" x-cloak>
                    <!--
  This example requires Tailwind CSS v3.0+

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
                    <div class="fixed inset-0 z-10 overflow-y-auto p-4 sm:p-6 md:p-20" role="dialog" aria-modal="true">
                        <!--
                          Background overlay, show/hide based on modal state.

                          Entering: "ease-out duration-300"
                            From: "opacity-0"
                            To: "opacity-100"
                          Leaving: "ease-in duration-200"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-25 transition-opacity" aria-hidden="true"></div>

                        <!--
                          Command palette, show/hide based on modal state.

                          Entering: "ease-out duration-300"
                            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            To: "opacity-100 translate-y-0 sm:scale-100"
                          Leaving: "ease-in duration-200"
                            From: "opacity-100 translate-y-0 sm:scale-100"
                            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        -->
                        <div class="mx-auto max-w-xl transform overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all">
                            <div class="relative">
                                <!-- Heroicon name: solid/search -->
                                <svg class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                                <input type="text" class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-800 placeholder-gray-400 focus:ring-0 sm:text-sm" placeholder="Search..." role="combobox" aria-expanded="false" aria-controls="options">
                            </div>

                            <!-- Default state, show/hide based on command palette state -->
                            <div class="border-t border-gray-100 py-14 px-6 text-center text-sm sm:px-14">
                                <!-- Heroicon name: outline/globe -->
                                <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="mt-4 font-semibold text-gray-900">Search for stuff associated with your account</p>
                                <p class="mt-2 text-gray-500">Quickly access different tools by using this.</p>
                            </div>

                            <!-- Results, show/hide based on command palette state -->
                            <ul class="max-h-80 scroll-pt-11 scroll-pb-2 space-y-2 overflow-y-auto pb-2" id="options" role="listbox">
                                <li>
                                    <h2 class="bg-gray-100 py-2.5 px-4 text-xs font-semibold text-gray-900">Assignments</h2>
                                    <ul class="mt-2 text-sm text-gray-800">
                                        <!-- Active: "bg-indigo-600 text-white" -->
                                        @foreach(auth()->user()->Assignment()->get() as $a)
                                            <li class="cursor-default select-none px-4 py-2" id="option-1" role="option" tabindex="-1">{{$a->title}}</li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <h2 class="bg-gray-100 py-2.5 px-4 text-xs font-semibold text-gray-900">Notes</h2>
                                    <ul class="mt-2 text-sm text-gray-800">
                                        <!-- Active: "bg-indigo-600 text-white" -->
                                        @foreach(auth()->user()->Note()->get() as $n)
                                            <li class="cursor-default select-none px-4 py-2" id="option-3" role="option" tabindex="-1">{{$n->name}}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>

                            <!-- Empty state, show/hide based on command palette state -->
                            <div class="border-t border-gray-100 py-14 px-6 text-center text-sm sm:px-14">
                                <!-- Heroicon name: outline/emoji-sad -->
                                <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="mt-4 font-semibold text-gray-900">No results found</p>
                                <p class="mt-2 text-gray-500">We couldn’t find anything with that term. Please try again.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-8">
                    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
{{--                        <h2 class="text-lg leading-6 font-medium text-gray-900">Overview</h2>--}}

                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="rounded-lg bg-white overflow-hidden shadow">
                            <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
                            <div class="bg-white p-6">
                                <div class="sm:flex sm:items-center sm:justify-between">
                                    <div class="sm:flex sm:space-x-5">
                                        <div class="flex-shrink-0">
                                            <img class="mx-auto h-20 w-20 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                        </div>
                                        <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                            <p class="text-sm font-medium text-gray-600">Welcome back,</p>
                                            <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{auth()->user()->name}}</p>
                                            @switch(auth()->user()->hasVerifiedEmail())
                                                @case(1)
                                                    <p class="text-sm font-medium text-green-600">Verified User</p>
                                                    @break(1)
                                                @case(0)
                                                    <p class="text-sm font-medium text-red-600">Unverified. Please verify your email.</p>
                                                    @break(0)
                                            @endswitch
                                        </div>
                                    </div>
                                    <div class="mt-5 flex justify-center sm:mt-0">
                                        <a href="{{route('community.profile', auth()->id())}}" class="flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> View profile </a>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 bg-gray-50 grid grid-cols-1 divide-y divide-gray-200 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">
                                <div class="px-6 py-5 text-sm font-medium text-center">
                                    <span class="text-gray-900">{{auth()->user()->Assignment()->where('assignment_user.user_id', auth()->id())->where('assignment_user.submitted_on', null)->count()}}</span>
                                    <span class="text-gray-600">Assignments due</span>
                                </div>

                                <div class="px-6 py-5 text-sm font-medium text-center">
                                    <span class="text-gray-900">{{auth()->user()->Post()->count()}}</span>
                                    <span class="text-gray-600">Posts</span>
                                </div>

                                <div class="px-6 py-5 text-sm font-medium text-center">
                                    <span class="text-gray-900">{{auth()->user()->Comment()->count()}}</span>
                                    <span class="text-gray-600">Comments made</span>
                                </div>
                            </div>
                        </div>


                    </div>

                    <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Recent activity</h2>

                    <!-- Activity list (smallest breakpoint only) -->
                    <div class="shadow sm:hidden">
                        <ul role="list" class="mt-2 divide-y divide-gray-200 overflow-hidden shadow sm:hidden">
                            @foreach($notifications as $notif)
                            <li>
                                <a href="#" class="block px-4 py-4 bg-white hover:bg-gray-50">
                                    <span class="flex items-center space-x-4">
                                      <span class="flex-1 flex space-x-2 truncate">
                                        <!-- Heroicon name: solid/cash -->
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                          <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="flex flex-col text-gray-500 text-sm truncate">
                                          <span class="truncate">{{json_encode($notif->data['user'])}} posted {{json_encode($notif->data['title'])}}</span>
{{--                                          <span><span class="text-gray-900 font-medium">$20,000</span> USD</span>--}}
                                          <time datetime="2020-07-11">{{$notif->created_at->format('h:m - D n M')}}</time>
                                        </span>
                                      </span>
                                        <!-- Heroicon name: solid/chevron-right -->
                                      <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                      </svg>
                                    </span>
                                </a>
                            </li>
                        @endforeach

                            <!-- More transactions... -->
                        </ul>

                        <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200" aria-label="Pagination">
                            {{$notifications->links()}}
                            {{--<div class="flex-1 flex justify-between">
                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500"> Previous </a>
                                <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500"> Next </a>
                            </div>--}}
                        </nav>
                    </div>

                    <!-- Activity table (small breakpoint and up) -->
                    <div class="hidden sm:block">
                        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex flex-col mt-2">
                                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activity</th>
                                            {{--<th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                            <th class="hidden px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider md:block">Status</th>--}}
                                            <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($notifications as $notif)
                                        <tr class="bg-white">
                                            <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <div class="flex">
                                                    <a href="#" class="group inline-flex space-x-2 truncate text-sm">
                                                        <!-- Heroicon name: solid/cash -->
                                                        {{--<svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                                        </svg>--}}
                                                        <p class="text-gray-500 truncate group-hover:text-gray-900">
                                                            {{json_encode($notif->data['user'])}} posted {{json_encode($notif->data['title'])}}</p>
                                                    </a>
                                                </div>
                                            </td>
                                            {{--<td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                                <span class="text-gray-900 font-medium">$20,000 </span>
                                                USD
                                            </td>
                                            <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 capitalize"> success </span>
                                            </td>--}}
                                            <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                                <time datetime="2020-07-11">{{$notif->created_at->format('h:m - D n M')}}</time>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <!-- More transactions... -->
                                        </tbody>
                                    </table>
                                    <!-- Pagination -->
                                    <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
                                        {{$notifications->links()}}
                                        {{--<div class="hidden sm:block">
                                            <p class="text-sm text-gray-700">
                                                Showing
                                                <span class="font-medium">1</span>
                                                to
                                                <span class="font-medium">10</span>
                                                of
                                                <span class="font-medium">20</span>
                                                results
                                            </p>
                                        </div>
                                        <div class="flex-1 flex justify-between sm:justify-end">
                                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
                                            <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
                                        </div>--}}
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
