<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignments') }}
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
            <main class="flex-1">
                <!-- Page title & actions -->
                <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="flex-1 min-w-0">
                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                            Assignments
                        </h1>
                    </div>
                    {{--<div class="mt-4 flex sm:mt-0 sm:ml-4">
                        <button type="button"
                                class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
                            Share
                        </button>
                        <button type="button"
                                class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                            Create
                        </button>
                    </div>--}}
                </div>

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="px-4 sm:px-0">
                        {{--                        <h2 class="text-lg font-medium text-gray-900">My Assignments</h2>--}}

                        @if (auth()->user()->is_tutor)
                            <a href="{{ route('assignment.create') }}">
                                <x-button>Create Assignment</x-button>
                            </a>
                        @endif

                        <!-- Tabs -->
                        <div class="sm:hidden">
                            <label for="tabs" class="sr-only">Select a tab</label>
                            <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                            <select id="tabs" name="tabs"
                                    class="mt-4 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                                <option>Completed</option>

                                <option>Due</option>

                                <option selected>Late</option>
                            </select>
                        </div>
                        <div class="hidden sm:block">
                            <div class="border-b border-gray-200">
                                <nav class="mt-2 -mb-px flex space-x-8" aria-label="Tabs">
                                    <!-- Current: "border-purple-500 text-purple-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200" -->
                                    <a href="{{route('assignments.completed')}}"
                                       class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                        Completed

                                        <!-- Current: "bg-purple-100 text-purple-600", Default: "bg-gray-100 text-gray-900" -->
{{--                                        <span class="bg-gray-100 text-gray-900 hidden ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">2</span>--}}
                                    </a>

                                    <a href="{{route('assignments')}}"
                                       class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                        Due

{{--                                        <span class="bg-purple-100 text-purple-600 hidden ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">{{$assignments->count()}}</span>--}}
                                    </a>

                                    <a href="{{route('assignments.late')}}"
                                       class="border-purple-500 text-purple-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                        Late

{{--                                        <span class="bg-gray-100 text-gray-900 hidden ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">6</span>--}}
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Stacked list -->
                    <ul role="list"
                        class="mt-5 border-t border-gray-200 divide-y divide-gray-200 sm:mt-0 sm:border-t-0">
                        @forelse($assignments as $assignment)
                            <li>
                                <a href="{{ route('assignments.manage', $assignment->id) }}" class="group block">
                                    <div class="flex items-center py-5 px-4 sm:py-6 sm:px-0">
                                        <div class="min-w-0 flex-1 flex items-center">
                                            {{--<div class="flex-shrink-0">
                                                <img class="h-12 w-12 rounded-full group-hover:opacity-75" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            </div>--}}
                                            <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                                <div>
                                                    <p class="text-sm font-medium text-purple-600 truncate">{{$assignment->title}}</p>
                                                    <p class="mt-2 flex items-center text-sm text-gray-500">
                                                        <!-- Heroicon name: solid/mail -->
                                                        {{--<svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                        </svg>--}}
                                                        <span>{{$assignment->details}}</span>
                                                    </p>
                                                </div>
                                                <div class="hidden md:block">
                                                    <div>
                                                        <p class="text-sm text-gray-900">
                                                            Due for
                                                            <time>{{$assignment->duedate->format('D d M')}}
                                                                at {{$assignment->duedate->format('H:00')}}</time>
                                                        </p>
                                                        <p class="mt-2 flex items-center text-sm text-gray-500">
                                                            <!-- Heroicon name: solid/check-circle -->
                                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                 fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                      clip-rule="evenodd"/>
                                                            </svg>
                                                            {{$assignment->Subject->subject}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <!-- Heroicon name: solid/chevron-right -->
                                            <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-700"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="text-center py-10">
                                <h3 class="mt-2 text-sm font-medium text-gray-900">No assignments due</h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    Good job! You have no assignments
                                </p>
                            </div>
                        @endforelse
                    </ul>

                    {{$assignments->links()}}

                    {{--<!-- Pagination -->
                    <nav class="border-t border-gray-200 px-4 flex items-center justify-between sm:px-0"
                         aria-label="Pagination">
                        <div class="-mt-px w-0 flex-1 flex">
                            <a href="#"
                               class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-200">
                                <!-- Heroicon name: solid/arrow-narrow-left -->
                                <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                                Previous
                            </a>
                        </div>
                        <div class="hidden md:-mt-px md:flex">
                            <a href="#"
                               class="border-purple-500 text-purple-600 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium"
                               aria-current="page">
                                1
                            </a>
                            <!-- Current: "border-purple-500 text-purple-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200" -->
                            <a href="#"
                               class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">
                                2
                            </a>
                            <a href="#"
                               class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">
                                3
                            </a>
                            <a href="#"
                               class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">
                                4
                            </a>
                            <a href="#"
                               class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">
                                5
                            </a>
                            <a href="#"
                               class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">
                                6
                            </a>
                        </div>
                        <div class="-mt-px w-0 flex-1 flex justify-end">
                            <a href="#"
                               class="border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-200">
                                Next
                                <!-- Heroicon name: solid/arrow-narrow-right -->
                                <svg class="ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>
                        </div>
                    </nav>
                </div>--}}

                </div>
        </div>
    </div>
    </div>
</x-app-layout>
