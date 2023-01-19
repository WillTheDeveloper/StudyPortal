<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Group') }}
        </h2>
    </x-slot>

    {{--<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
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
                        <div class="flex-shrink-0 flex items-center">
                            <img class="block lg:hidden h-8 w-auto" src="https://studyportal.s3.eu-west-2.amazonaws.com/logo_banner_style_v1.png" alt="Workflow">
                            <img class="hidden lg:block h-8 w-auto" src="https://studyportal.s3.eu-west-2.amazonaws.com/logo_banner_style_v1.png" alt="Workflow">
                        </div>
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
                            Dashboard
                        </h1>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    Manage groups

                    <br>

                    @if (auth()->user()->is_tutor)
                        <a href="{{ route('groups.create') }}">
                            <x-button>Create Group</x-button>
                        </a>
                    @endif

                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white shadow overflow-hidden sm:rounded-md">
                        <ul role="list" class="divide-y divide-gray-200">

                            @forelse(auth()->user()->Group()->get() as $group)

                            <li>
                                <a href="/groups/manage/{{$group->id}}" class="block hover:bg-gray-50">
                                    <div class="px-4 py-4 flex items-center sm:px-6">
                                        <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                                            <div class="truncate">
                                                <div class="flex text-sm">
                                                    <p class="font-medium text-indigo-600 truncate">{{$group->name}}</p>
                                                    <p class="ml-1 flex-shrink-0 font-normal text-gray-500">
                                                        in {{$group->Subject->subject}}
                                                    </p>
                                                </div>
                                                <div class="mt-2 flex">
                                                    <div class="flex items-center text-sm text-gray-500">
                                                        <!-- Heroicon name: solid/calendar -->
                                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                        </svg>
                                                        <p>
                                                            This group has {{$group->User->count()}} students.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-5 flex-shrink-0">
                                            <!-- Heroicon name: solid/chevron-right -->
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </li>
                                @empty

                            <!-- This example requires Tailwind CSS v2.0+ -->
                                <div class="max-w-lg mx-auto">
                                    <h2 class="text-lg font-medium text-gray-900">Create a group</h2>
                                    <p class="mt-1 text-sm text-gray-500">Here are a few ideas to get you started.</p>
                                    <ul role="list" class="mt-6 border-t border-b border-gray-200 divide-y divide-gray-200">
                                        <li>
                                            <div class="relative group py-4 flex items-start space-x-3">
                                                <div class="flex-shrink-0">
                                                  <span class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-pink-500">
                                                    <!-- Heroicon name: outline/speakerphone -->
                                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                                    </svg>
                                                  </span>
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <a href="#">
                                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                                            Different classes
                                                        </a>
                                                    </div>
                                                    <p class="text-sm text-gray-500">This will allow you to assign assignments to students in your class.</p>
                                                </div>
                                                <div class="flex-shrink-0 self-center">
                                                    <!-- Heroicon name: solid/chevron-right -->
                                                    <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="relative group py-4 flex items-start space-x-3">
                                                <div class="flex-shrink-0">
                                                  <span class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-purple-500">
                                                    <!-- Heroicon name: outline/terminal -->
                                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                  </span>
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <a href="#">
                                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                                            Student Projects
                                                        </a>
                                                    </div>
                                                    <p class="text-sm text-gray-500">Something really expensive that will ultimately get cancelled.</p>
                                                </div>
                                                <div class="flex-shrink-0 self-center">
                                                    <!-- Heroicon name: solid/chevron-right -->
                                                    <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="relative group py-4 flex items-start space-x-3">
                                                <div class="flex-shrink-0">
                                                  <span class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-yellow-500">
                                                    <!-- Heroicon name: outline/calendar -->
                                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                  </span>
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <a href="#">
                                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                                            Events
                                                        </a>
                                                    </div>
                                                    <p class="text-sm text-gray-500">If you have any events upcoming and you need a group for it.</p>
                                                </div>
                                                <div class="flex-shrink-0 self-center">
                                                    <!-- Heroicon name: solid/chevron-right -->
                                                    <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="mt-6 flex">
                                        <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 mb-5">Or just create a group<span aria-hidden="true"> &rarr;</span></a>
                                    </div>
                                </div>


                            @endforelse

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>