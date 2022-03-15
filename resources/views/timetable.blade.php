<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timetable') }}
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
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="flex h-full flex-col">
                                <header class="relative z-20 flex flex-none items-center justify-between border-b border-gray-200 py-4 px-6">
                                    <h1 class="text-lg font-semibold text-gray-900">
                                        <time datetime="2022-01">{{now()->monthName}} {{now()->year}}</time>
                                    </h1>
                                    <div class="flex items-center">
                                        <div class="hidden md:ml-4 md:flex md:items-center">
                                            <div class="ml-6 h-6 w-px bg-gray-300"></div>
                                            <a type="button" class="focus:outline-none ml-6 rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add lesson</a>
                                        </div>
                                        <div class="relative ml-6 md:hidden">
                                            <button type="button" class="-mx-2 flex items-center rounded-full border border-transparent p-2 text-gray-400 hover:text-gray-500" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                                                <span class="sr-only">Open menu</span>
                                                <!-- Heroicon name: solid/dots-horizontal -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </header>
                                <div class="px-4 sm:px-6 lg:px-8">
                                    <div class="mt-8 flex flex-col">
                                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                                    <table class="min-w-full">
                                                        <thead class="bg-white">
                                                        <tr>
                                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Subject</th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Room</th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Tutor</th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Start/End</th>
                                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                                <span class="sr-only">Edit</span>
                                                            </th>
                                                        </tr>
                                                        </thead>


                                                        <tbody class="bg-white">
                                                        <tr class="border-t border-gray-200">
                                                            <th colspan="5" scope="colgroup" class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">Monday</th>
                                                        </tr>

                                                        @foreach($monday->sortBy('start') as $m)
                                                            <tr class="border-t border-gray-300">
                                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$m->Subject->subject}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$m->room}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$m->start->format('h')}} - {{$m->end->format('h')}}</td>
                                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                        <tr class="border-t border-gray-200">
                                                            <th colspan="5" scope="colgroup" class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">Tuesday</th>
                                                        </tr>

                                                        @foreach($tuesday->sortBy('start') as $tu)
                                                            <tr class="border-t border-gray-300">
                                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$m->Subject->subject}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$m->room}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$m->start->format('h')}} - {{$m->end->format('h')}}</td>
                                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        <tr class="border-t border-gray-200">
                                                            <th colspan="5" scope="colgroup" class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">Wednesday</th>
                                                        </tr>

                                                        @foreach($wednesday->sortBy('start') as $w)
                                                            <tr class="border-t border-gray-300">
                                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$m->Subject->subject}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$m->room}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$m->start->format('h')}} - {{$m->end->format('h')}}</td>
                                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                        <tr class="border-t border-gray-200">
                                                            <th colspan="5" scope="colgroup" class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">Thursday</th>
                                                        </tr>

                                                        @foreach($thursday->sortBy('start') as $th)
                                                            <tr class="border-t border-gray-300">
                                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$m->Subject->subject}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$m->room}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$m->start->format('h')}} - {{$m->end->format('h')}}</td>
                                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                        <tr class="border-t border-gray-200">
                                                            <th colspan="5" scope="colgroup" class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">Friday</th>
                                                        </tr>

                                                        @foreach($friday->sortBy('start') as $f)
                                                            <tr class="border-t border-gray-300">
                                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$m->Subject->subject}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$m->room}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$m->start->format('h')}} - {{$m->end->format('h')}}</td>
                                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

        </div>
    </div>
    </div>
    </div>
</x-app-layout>
