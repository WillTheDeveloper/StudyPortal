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

            <div class="bg-white">
                <div class="max-w-7xl mx-auto py-24 sm:px-2 lg:px-4">
                    <div class="max-w-2xl mx-auto px-4 lg:max-w-none">
                        <div class="max-w-3xl">
                            <h2 class="font-semibold text-gray-500">Support</h2>
                            <p class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">How to use assignments</p>
                            <p class="mt-4 text-gray-500">Assignments allow students to hand in work to tutor.</p>
                        </div>

                        @switch(auth()->user()->is_tutor)
                            @case(1)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-blue-100 text-blue-800">Support adapted for tutors</span>


                                <div class="space-y-16 pt-10 mt-10 border-t border-gray-200 sm:pt-16 sm:mt-16">
                                    <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-center">
                                        <div class="mt-6 lg:mt-0 lg:col-span-5 xl:col-span-4">
                                            <h3 class="text-lg font-medium text-gray-900">1. Visit the assignment section</h3>
                                            <p class="mt-2 text-sm text-gray-500">When you are on your dashboard, you will have an option on the left called "timetable" pressing on this will take you to where you need to be for step 2.</p>
                                            <a href="{{route('timetable')}}"><x-button>Visit timetable section</x-button></a>
                                        </div>
                                        <div class="flex-auto lg:col-span-7 xl:col-span-8">
                                            <div class="aspect-w-5 aspect-h-2 rounded-lg bg-gray-100 overflow-hidden">
                                                <img src="{{asset('images/timetable_support01.png')}}" alt="Printed photo of bag being tossed into the sky on top of grass." class="object-center object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-center">
                                        <div class="mt-6 lg:mt-0 lg:col-span-5 xl:col-span-4">
                                            <h3 class="text-lg font-medium text-gray-900">2. Press "Create assignment"</h3>
                                            <p class="mt-2 text-sm text-gray-500">This will open a blank timetable if you have no lessons already. Press "Add lesson" located in the top right to visit the form to add a lesson to your timetable.</p>
                                            <a href="{{route('timetable.add')}}"><x-button>Add lesson here</x-button></a>
                                        </div>
                                        <div class="flex-auto lg:col-span-7 xl:col-span-8">
                                            <div class="aspect-w-5 aspect-h-2 rounded-lg bg-gray-100 overflow-hidden">
                                                <img src="{{asset('images/timetable_support02.png')}}" alt="Double stitched black canvas hook loop." class="object-center object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-center">
                                        <div class="mt-6 lg:mt-0 lg:col-span-5 xl:col-span-4">
                                            <h3 class="text-lg font-medium text-gray-900">3. Fill in the details and select a subject.</h3>
                                            <p class="mt-2 text-sm text-gray-500">Fill in the form with the information that is required and when its completed, hit add lesson to view it appear on your timetable. <b>If no subjects are available, you can add these <a class="text-indigo-500" href="{{route('community.communities')}}">here</a></b>.</p>
                                            <a href="{{route('timetable')}}"><x-button>See your timetable!</x-button></a>
                                        </div>
                                        <div class="flex-auto lg:col-span-7 xl:col-span-8">
                                            <div class="aspect-w-5 aspect-h-2 rounded-lg bg-gray-100 overflow-hidden">
                                                <img src="{{asset('images/timetable_support03.png')}}" alt="Black canvas body with chrome zipper and key ring." class="object-center object-cover">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @break(1)
                            @case(0)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-blue-100 text-blue-800">Support adapted for students</span>



                                <div class="space-y-16 pt-10 mt-10 border-t border-gray-200 sm:pt-16 sm:mt-16">
                                    <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-center">
                                        <div class="mt-6 lg:mt-0 lg:col-span-5 xl:col-span-4">
                                            <h3 class="text-lg font-medium text-gray-900">1. Visit the assignment section</h3>
                                            <p class="mt-2 text-sm text-gray-500">When you are on your dashboard, you will have an option on the left called "timetable" pressing on this will take you to where you need to be for step 2.</p>
                                            <a href="{{route('timetable')}}"><x-button>Visit timetable section</x-button></a>
                                        </div>
                                        <div class="flex-auto lg:col-span-7 xl:col-span-8">
                                            <div class="aspect-w-5 aspect-h-2 rounded-lg bg-gray-100 overflow-hidden">
                                                <img src="{{asset('images/timetable_support01.png')}}" alt="Printed photo of bag being tossed into the sky on top of grass." class="object-center object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-center">
                                        <div class="mt-6 lg:mt-0 lg:col-span-5 xl:col-span-4">
                                            <h3 class="text-lg font-medium text-gray-900">2. Press "Add lesson"</h3>
                                            <p class="mt-2 text-sm text-gray-500">This will open a blank timetable if you have no lessons already. Press "Add lesson" located in the top right to visit the form to add a lesson to your timetable.</p>
                                            <a href="{{route('timetable.add')}}"><x-button>Add lesson here</x-button></a>
                                        </div>
                                        <div class="flex-auto lg:col-span-7 xl:col-span-8">
                                            <div class="aspect-w-5 aspect-h-2 rounded-lg bg-gray-100 overflow-hidden">
                                                <img src="{{asset('images/timetable_support02.png')}}" alt="Double stitched black canvas hook loop." class="object-center object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-center">
                                        <div class="mt-6 lg:mt-0 lg:col-span-5 xl:col-span-4">
                                            <h3 class="text-lg font-medium text-gray-900">3. Fill in the details and select a subject.</h3>
                                            <p class="mt-2 text-sm text-gray-500">Fill in the form with the information that is required and when its completed, hit add lesson to view it appear on your timetable. <b>If no subjects are available, you can add these <a class="text-indigo-500" href="{{route('community.communities')}}">here</a></b>.</p>
                                            <a href="{{route('timetable')}}"><x-button>See your timetable!</x-button></a>
                                        </div>
                                        <div class="flex-auto lg:col-span-7 xl:col-span-8">
                                            <div class="aspect-w-5 aspect-h-2 rounded-lg bg-gray-100 overflow-hidden">
                                                <img src="{{asset('images/timetable_support03.png')}}" alt="Black canvas body with chrome zipper and key ring." class="object-center object-cover">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break(0)
                        @endswitch


                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
