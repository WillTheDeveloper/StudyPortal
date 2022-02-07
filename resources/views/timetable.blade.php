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
                                            <button type="button" class="focus:outline-none ml-6 rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add event</button>
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
                                <div class="flex flex-auto flex-col overflow-auto bg-white">
                                    <div style="width: 165%" class="flex max-w-full flex-none flex-col sm:max-w-none md:max-w-full">
                                        <div class="sticky top-0 z-10 flex-none bg-white shadow ring-1 ring-black ring-opacity-5 sm:pr-8">
                                            <div class="grid grid-cols-7 text-sm leading-6 text-gray-500 sm:hidden">
                                                <button type="button" class="flex flex-col items-center pt-2 pb-3">M <span class="mt-1 flex h-8 w-8 items-center justify-center font-semibold text-gray-900">10</span></button>
                                                <button type="button" class="flex flex-col items-center pt-2 pb-3">T <span class="mt-1 flex h-8 w-8 items-center justify-center font-semibold text-gray-900">11</span></button>
                                                <button type="button" class="flex flex-col items-center pt-2 pb-3">W <span class="mt-1 flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 font-semibold text-white">12</span></button>
                                                <button type="button" class="flex flex-col items-center pt-2 pb-3">T <span class="mt-1 flex h-8 w-8 items-center justify-center font-semibold text-gray-900">13</span></button>
                                                <button type="button" class="flex flex-col items-center pt-2 pb-3">F <span class="mt-1 flex h-8 w-8 items-center justify-center font-semibold text-gray-900">14</span></button>
                                                <button type="button" class="flex flex-col items-center pt-2 pb-3">S <span class="mt-1 flex h-8 w-8 items-center justify-center font-semibold text-gray-900">15</span></button>
                                                <button type="button" class="flex flex-col items-center pt-2 pb-3">S <span class="mt-1 flex h-8 w-8 items-center justify-center font-semibold text-gray-900">16</span></button>
                                            </div>

                                            <div class="-mr-px hidden grid-cols-7 divide-x divide-gray-100 border-r border-gray-100 text-sm leading-6 text-gray-500 sm:grid">
                                                <div class="col-end-1 w-14"></div>
                                                <div class="flex items-center justify-center py-3">
                                                    <span>Monday</span>
                                                </div>
                                                <div class="flex items-center justify-center py-3">
                                                    <span>Tuesday</span>
                                                </div>
                                                <div class="flex items-center justify-center py-3">
                                                    <span class="flex items-baseline">Wednesday</span>
                                                </div>
                                                <div class="flex items-center justify-center py-3">
                                                    <span>Thursday</span>
                                                </div>
                                                <div class="flex items-center justify-center py-3">
                                                    <span>Friday</span>
                                                </div>
                                                <div class="flex items-center justify-center py-3">
                                                    <span>Saturday</span>
                                                </div>
                                                <div class="flex items-center justify-center py-3">
                                                    <span>Sunday</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-auto">
                                            <div class="sticky left-0 w-14 flex-none bg-white ring-1 ring-gray-100"></div>
                                            <div class="grid flex-auto grid-cols-1 grid-rows-1">
                                                <!-- Horizontal lines -->
                                                <div class="col-start-1 col-end-2 row-start-1 grid divide-y divide-gray-100" style="grid-template-rows: repeat(21, minmax(3.5rem, 1fr))">
                                                    <div class="row-end-1 h-7"></div>
                                                    <div>
                                                        <div class="sticky left-0 -mt-2.5 -ml-14 w-14 pr-2 text-right text-xs leading-5 text-gray-400">7AM</div>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="sticky left-0 -mt-2.5 -ml-14 w-14 pr-2 text-right text-xs leading-5 text-gray-400">8AM</div>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="sticky left-0 -mt-2.5 -ml-14 w-14 pr-2 text-right text-xs leading-5 text-gray-400">9AM</div>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="sticky left-0 -mt-2.5 -ml-14 w-14 pr-2 text-right text-xs leading-5 text-gray-400">10AM</div>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="sticky left-0 -mt-2.5 -ml-14 w-14 pr-2 text-right text-xs leading-5 text-gray-400">11AM</div>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="sticky left-0 -mt-2.5 -ml-14 w-14 pr-2 text-right text-xs leading-5 text-gray-400">12PM</div>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="sticky left-0 -mt-2.5 -ml-14 w-14 pr-2 text-right text-xs leading-5 text-gray-400">1PM</div>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="sticky left-0 -mt-2.5 -ml-14 w-14 pr-2 text-right text-xs leading-5 text-gray-400">2PM</div>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="sticky left-0 -mt-2.5 -ml-14 w-14 pr-2 text-right text-xs leading-5 text-gray-400">3PM</div>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="sticky left-0 -mt-2.5 -ml-14 w-14 pr-2 text-right text-xs leading-5 text-gray-400">4PM</div>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="sticky left-0 -mt-2.5 -ml-14 w-14 pr-2 text-right text-xs leading-5 text-gray-400">5PM</div>
                                                    </div>
                                                    <div></div>
                                                </div>

                                                <!-- Vertical lines -->
                                                <div class="col-start-1 col-end-2 row-start-1 hidden grid-cols-7 grid-rows-1 divide-x divide-gray-100 sm:grid sm:grid-cols-7">
                                                    <div class="col-start-1 row-span-full"></div>
                                                    <div class="col-start-2 row-span-full"></div>
                                                    <div class="col-start-3 row-span-full"></div>
                                                    <div class="col-start-4 row-span-full"></div>
                                                    <div class="col-start-5 row-span-full"></div>
                                                    <div class="col-start-6 row-span-full"></div>
                                                    <div class="col-start-7 row-span-full"></div>
                                                    <div class="col-start-8 row-span-full w-8"></div>
                                                </div>

                                                <!-- Events -->
                                                <ol class="col-start-1 col-end-2 row-start-1 grid grid-cols-1 sm:grid-cols-7 sm:pr-8" style="grid-template-rows: 1.75rem repeat(288, minmax(0, 1fr)) auto">
                                                    <li class="relative mt-px flex sm:col-start-3" style="grid-row: 74 / span 18">
                                                        <a href="#" class="group absolute inset-1 flex flex-col overflow-y-auto rounded-lg bg-blue-50 p-2 text-xs leading-5 hover:bg-blue-100">
                                                            <p class="order-1 font-semibold text-blue-700">Breakfast</p>
                                                            <p class="text-blue-500 group-hover:text-blue-700"><time datetime="2022-01-12T06:00">6:00 AM</time></p>
                                                        </a>
                                                    </li>
                                                    <li class="relative mt-px flex sm:col-start-3" style="grid-row: 92 / span 30">
                                                        <a href="#" class="group absolute inset-1 flex flex-col overflow-y-auto rounded-lg bg-pink-50 p-2 text-xs leading-5 hover:bg-pink-100">
                                                            <p class="order-1 font-semibold text-pink-700">Flight to Paris</p>
                                                            <p class="text-pink-500 group-hover:text-pink-700"><time datetime="2022-01-12T07:30">7:30 AM</time></p>
                                                        </a>
                                                    </li>
                                                </ol>
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
