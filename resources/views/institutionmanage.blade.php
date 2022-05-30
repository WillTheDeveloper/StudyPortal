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
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">{{$institution->institution}}'s statistics</h3>
        <dl class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 md:grid-cols-3 md:divide-y-0 md:divide-x">
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">Students</dt>
                <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                        {{$institution->User->where('is_tutor', 0)->count()}}
                    </div>
                </dd>
            </div>

            <div class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">Tutors</dt>
                <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                        {{$institution->User->where('is_tutor', 1)->count()}}
                    </div>
                </dd>
            </div>

            <div class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">Total</dt>
                <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                        {{$institution->User->count()}}
                    </div>
                </dd>
            </div>
        </dl>
    </div>


            <div class="flex-1 xl:overflow-y-auto">
                <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:py-12 lg:px-8">
                    <h1 class="text-3xl font-extrabold text-blue-gray-900">Account</h1>

                    <form class="mt-6 space-y-8 divide-y divide-y-blue-gray-200">
                        <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-6 sm:gap-x-6">
                            <div class="sm:col-span-6">
                                <h2 class="text-xl font-medium text-blue-gray-900">Profile</h2>
                                <p class="mt-1 text-sm text-blue-gray-500">This information will be displayed publicly so be careful what you share.</p>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium text-blue-gray-900"> First name </label>
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium text-blue-gray-900"> Last name </label>
                                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div class="sm:col-span-6">
                                <label for="username" class="block text-sm font-medium text-blue-gray-900"> Username </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-blue-gray-300 bg-blue-gray-50 text-blue-gray-500 sm:text-sm"> workcation.com/ </span>
                                    <input type="text" name="username" id="username" autocomplete="username" value="lisamarie" class="flex-1 block w-full min-w-0 border-blue-gray-300 rounded-none rounded-r-md text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <label for="photo" class="block text-sm font-medium text-blue-gray-900"> Photo </label>
                                <div class="mt-1 flex items-center">
                                    <img class="inline-block h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2.5&w=256&h=256&q=80" alt="">
                                    <div class="ml-4 flex">
                                        <div class="relative bg-white py-2 px-3 border border-blue-gray-300 rounded-md shadow-sm flex items-center cursor-pointer hover:bg-blue-gray-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-blue-gray-50 focus-within:ring-blue-500">
                                            <label for="user-photo" class="relative text-sm font-medium text-blue-gray-900 pointer-events-none">
                                                <span>Change</span>
                                                <span class="sr-only"> user photo</span>
                                            </label>
                                            <input id="user-photo" name="user-photo" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                        </div>
                                        <button type="button" class="ml-3 bg-transparent py-2 px-3 border border-transparent rounded-md text-sm font-medium text-blue-gray-900 hover:text-blue-gray-700 focus:outline-none focus:border-blue-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-gray-50 focus:ring-blue-500">Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <label for="description" class="block text-sm font-medium text-blue-gray-900"> Description </label>
                                <div class="mt-1">
                                    <textarea id="description" name="description" rows="4" class="block w-full border border-blue-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                                </div>
                                <p class="mt-3 text-sm text-blue-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
                            </div>

                            <div class="sm:col-span-6">
                                <label for="url" class="block text-sm font-medium text-blue-gray-900"> URL </label>
                                <input type="text" name="url" id="url" class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <div class="pt-8 grid grid-cols-1 gap-y-6 sm:grid-cols-6 sm:gap-x-6">
                            <div class="sm:col-span-6">
                                <h2 class="text-xl font-medium text-blue-gray-900">Personal Information</h2>
                                <p class="mt-1 text-sm text-blue-gray-500">This information will be displayed publicly so be careful what you share.</p>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="email-address" class="block text-sm font-medium text-blue-gray-900"> Email address </label>
                                <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div class="sm:col-span-3">
                                <label for="phone-number" class="block text-sm font-medium text-blue-gray-900"> Phone number </label>
                                <input type="text" name="phone-number" id="phone-number" autocomplete="tel" class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div class="sm:col-span-3">
                                <label for="country" class="block text-sm font-medium text-blue-gray-900"> Country </label>
                                <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option></option>
                                    <option>United States</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                </select>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="language" class="block text-sm font-medium text-blue-gray-900"> Language </label>
                                <input type="text" name="language" id="language" class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <p class="text-sm text-blue-gray-500 sm:col-span-6">This account was created on <time datetime="2017-01-05T20:35:40">January 5, 2017, 8:35:40 PM</time>.</p>
                        </div>

                        <div class="pt-8 flex justify-end">
                            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-blue-gray-900 hover:bg-blue-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Cancel</button>
                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>

</x-app-layout>