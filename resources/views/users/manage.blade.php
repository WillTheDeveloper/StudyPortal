<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage users') }}
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
                <form method="post" action="{{ route('user.update', $user->id) }}">
                    @csrf
                <!-- Page title & actions -->
                <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="flex-1 min-w-0">
                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                            Manage User
                        </h1>
                    </div>
                    <div class="mt-4 flex sm:mt-0 sm:ml-4">
                        {{--<button type="button"
                                class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
                            Share
                        </button>--}}
                        <button type="submit"
                                class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                            Update
                        </button>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                {{--                    Manage users--}}

                <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                    <div>
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">User Information</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
                                        </div>
                                        <div class="mt-5 border-t border-gray-200">
                                            <dl class="sm:divide-y sm:divide-gray-200">
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Full name</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->name}}</dd>
                                                </div>
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Username</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->username}}</dd>
                                                </div>
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Email address</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->email}}</dd>
                                                </div>
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Institution</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->Institution->institution}}</dd>
                                                </div>
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Account created</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->created_at->format('h:m - n D M Y')}}</dd>
                                                </div>
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Posts created</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->Post->count()}}</dd>
                                                </div>
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Comments created</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->Comment->count()}}</dd>
                                                </div>
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Reports associated</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->Report->count()}}</dd>
                                                </div>
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Bio</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->bio}}</dd>
                                                </div>
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Permission level</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        <fieldset class="space-y-5">
                                                            <legend class="sr-only">Permission level</legend>
                                                            <div class="relative flex items-start">
                                                                <div class="flex items-center h-5">
                                                                    <input id="tutor" @checked(old('tutor', $user->is_tutor)) aria-describedby="comments-description" name="tutor" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                </div>
                                                                <div class="ml-3 text-sm">
                                                                    <label for="tutor" class="font-medium text-gray-700">Tutor</label>
                                                                    <p id="comments-description" class="text-gray-500">This user is a tutor for a college</p>
                                                                </div>
                                                            </div>
                                                            <div class="relative flex items-start">
                                                                <div class="flex items-center h-5">
                                                                    <input id="moderator" @checked(old('moderator', $user->is_moderator)) aria-describedby="candidates-description" name="moderator" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                </div>
                                                                <div class="ml-3 text-sm">
                                                                    <label for="moderator" class="font-medium text-gray-700">Moderator</label>
                                                                    <p id="candidates-description" class="text-gray-500">Moderate the content</p>
                                                                </div>
                                                            </div>
                                                            <div class="relative flex items-start">
                                                                <div class="flex items-center h-5">
                                                                    <input id="admin" @checked(old('admin', $user->is_admin)) aria-describedby="offers-description" name="admin" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                </div>
                                                                <div class="ml-3 text-sm">
                                                                    <label for="admin" class="font-medium text-gray-700">Admin</label>
                                                                    <p id="offers-description" class="text-gray-500">Manage the platform</p>
                                                                </div>
                                                            </div>
                                                            <div class="relative flex items-start">
                                                                <div class="flex items-center h-5">
                                                                    <input id="banned" @checked(old('banned', $user->is_banned)) aria-describedby="offers-description" name="banned" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                </div>
                                                                <div class="ml-3 text-sm">
                                                                    <label for="banned" class="font-medium text-red-600">Banned</label>
                                                                    <p id="offers-description" class="text-red-400">Restrict user</p>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </main>
        </div>
    </div>
</x-app-layout>
