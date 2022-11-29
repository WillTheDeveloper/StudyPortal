<!doctype html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Study Portal</title>
    <meta name="description" content="Study Portal is a platform, built for students, by students. Giving students the tools they need to get through education."/>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body x-data="{profile: false, nav: false}">

<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button -->
                <button @click="nav = true; profile = false" @click.away="nav = false" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                      Icon when menu is closed.

                      Heroicon name: outline/menu

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                      Icon when menu is open.

                      Heroicon name: outline/x

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-8 w-auto" src="https://studyportal.s3.eu-west-2.amazonaws.com/logo_banner_style_v1.png" alt="Workflow">
                    <img class="hidden lg:block h-8 w-auto" src="https://studyportal.s3.eu-west-2.amazonaws.com/logo_banner_style_v1.png" alt="Workflow">
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                    <a href="{{route('home')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Home
                    </a>
                    <a href="{{route('features')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Features
                    </a>
                    <a href="{{route('blog')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Blog
                    </a>
                    <a href="{{route('shop')}}" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Shop
                    </a>
                    <a href="{{route('contact')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Contact
                    </a>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                @auth()
                <button type="button" class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: outline/bell -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
                @endauth

                <!-- Profile dropdown -->
                <div class="ml-3 relative">
                    <div>
                        <button @click="profile = true; nav = false" @click.away="profile = false" type="button" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </button>
                    </div>

                    <!--
                      Dropdown menu, show/hide based on menu state.

                      Entering: "transition ease-out duration-200"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                      Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    <div x-show="profile"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale 100"
                         x-transition:leave="transform ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         x-cloak
                         class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        @auth()
                            <a href="{{route('community.profile', auth()->id())}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="{{route('profile')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                        @else
                            <a href="{{route('login')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Login</a>
                            <a href="{{route('register')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Register</a>
                        @endauth()
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="nav" x-cloak class="sm:hidden" id="mobile-menu">
        <div class="pt-2 pb-4 space-y-1">
            <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" -->
            <a href="{{route('home')}}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Home</a>
            <a href="{{route('features')}}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Features</a>
            <a href="{{route('blog')}}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Blog</a>
            <a href="{{route('shop')}}" class="bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Shop</a>
            <a href="{{route('contact')}}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Contact</a>
        </div>
    </div>
</nav>

<main class="pb-24" x-data="{filters:false, sort:false}">
    <!-- Filters -->
    <section aria-labelledby="filter-heading" class="grid items-center border-t border-b border-gray-200">
        <h2 id="filter-heading" class="sr-only">Filters</h2>
        <div class="relative col-start-1 row-start-1 py-4">
            <div class="mx-auto flex max-w-7xl space-x-6 divide-x divide-gray-200 px-4 text-sm sm:px-6 lg:px-8">
                <div>
                    <button @click="filters = true" type="button" class="group flex items-center font-medium text-gray-700" aria-controls="disclosure-1" aria-expanded="false">
                        <!-- Heroicon name: mini/funnel -->
                        <svg class="mr-2 h-5 w-5 flex-none text-gray-400 group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z" clip-rule="evenodd" />
                        </svg>
                        2 Filters
                    </button>
                </div>
                <div class="pl-6">
                    <button type="button" class="text-gray-500">Clear all</button>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-200 py-10" id="disclosure-1" x-show="filters" x-cloak>
            <div class="mx-auto grid max-w-7xl grid-cols-2 gap-x-4 px-4 text-sm sm:px-6 md:gap-x-6 lg:px-8">
                <div class="grid auto-rows-min grid-cols-1 gap-y-10 md:grid-cols-2 md:gap-x-6">
                    <fieldset>
                        <legend class="block font-medium">Price</legend>
                        <div class="space-y-6 pt-6 sm:space-y-4 sm:pt-4">
                            <div class="flex items-center text-base sm:text-sm">
                                <input id="price-0" name="price[]" value="0" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="price-0" class="ml-3 min-w-0 flex-1 text-gray-600">$0 - $25</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="price-1" name="price[]" value="25" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="price-1" class="ml-3 min-w-0 flex-1 text-gray-600">$25 - $50</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="price-2" name="price[]" value="50" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="price-2" class="ml-3 min-w-0 flex-1 text-gray-600">$50 - $75</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="price-3" name="price[]" value="75" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="price-3" class="ml-3 min-w-0 flex-1 text-gray-600">$75+</label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="block font-medium">Color</legend>
                        <div class="space-y-6 pt-6 sm:space-y-4 sm:pt-4">
                            <div class="flex items-center text-base sm:text-sm">
                                <input id="color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="color-0" class="ml-3 min-w-0 flex-1 text-gray-600">White</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="color-1" name="color[]" value="beige" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="color-1" class="ml-3 min-w-0 flex-1 text-gray-600">Beige</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="color-2" name="color[]" value="blue" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" checked>
                                <label for="color-2" class="ml-3 min-w-0 flex-1 text-gray-600">Blue</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="color-3" name="color[]" value="brown" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="color-3" class="ml-3 min-w-0 flex-1 text-gray-600">Brown</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="color-4" name="color[]" value="green" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="color-4" class="ml-3 min-w-0 flex-1 text-gray-600">Green</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="color-5" name="color[]" value="purple" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="color-5" class="ml-3 min-w-0 flex-1 text-gray-600">Purple</label>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="grid auto-rows-min grid-cols-1 gap-y-10 md:grid-cols-2 md:gap-x-6">
                    <fieldset>
                        <legend class="block font-medium">Size</legend>
                        <div class="space-y-6 pt-6 sm:space-y-4 sm:pt-4">
                            <div class="flex items-center text-base sm:text-sm">
                                <input id="size-0" name="size[]" value="xs" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="size-0" class="ml-3 min-w-0 flex-1 text-gray-600">XS</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="size-1" name="size[]" value="s" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" checked>
                                <label for="size-1" class="ml-3 min-w-0 flex-1 text-gray-600">S</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="size-2" name="size[]" value="m" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="size-2" class="ml-3 min-w-0 flex-1 text-gray-600">M</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="size-3" name="size[]" value="l" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="size-3" class="ml-3 min-w-0 flex-1 text-gray-600">L</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="size-4" name="size[]" value="xl" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="size-4" class="ml-3 min-w-0 flex-1 text-gray-600">XL</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="size-5" name="size[]" value="2xl" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="size-5" class="ml-3 min-w-0 flex-1 text-gray-600">2XL</label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="block font-medium">Category</legend>
                        <div class="space-y-6 pt-6 sm:space-y-4 sm:pt-4">
                            <div class="flex items-center text-base sm:text-sm">
                                <input id="category-0" name="category[]" value="all-new-arrivals" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="category-0" class="ml-3 min-w-0 flex-1 text-gray-600">All New Arrivals</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="category-1" name="category[]" value="tees" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="category-1" class="ml-3 min-w-0 flex-1 text-gray-600">Tees</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="category-2" name="category[]" value="objects" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="category-2" class="ml-3 min-w-0 flex-1 text-gray-600">Objects</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="category-3" name="category[]" value="sweatshirts" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="category-3" class="ml-3 min-w-0 flex-1 text-gray-600">Sweatshirts</label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="category-4" name="category[]" value="pants-and-shorts" type="checkbox" class="h-4 w-4 flex-shrink-0 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="category-4" class="ml-3 min-w-0 flex-1 text-gray-600">Pants &amp; Shorts</label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="col-start-1 row-start-1 py-4">
            <div class="mx-auto flex max-w-7xl justify-end px-4 sm:px-6 lg:px-8">
                <div class="relative inline-block">
                    <div class="flex">
                        <button @click="sort = true" type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" id="menu-button" aria-expanded="false" aria-haspopup="true">
                            Sort
                            <!-- Heroicon name: mini/chevron-down -->
                            <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
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
                    <div x-show="sort" x-cloak class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <!--
                              Active: "bg-gray-100", Not Active: ""

                              Selected: "font-medium text-gray-900", Not Selected: "text-gray-500"
                            -->
                            <a href="#" class="font-medium text-gray-900 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Most Popular</a>

                            <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Best Rating</a>

                            <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">Newest</a>

                            <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Price: Low to High</a>

                            <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-4">Price: High to Low</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product grid -->
    <section aria-labelledby="products-heading" class="mx-auto max-w-7xl overflow-hidden sm:px-6 lg:px-8">
        <h2 id="products-heading" class="sr-only">Products</h2>

        <div class="-mx-px grid grid-cols-2 border-l border-gray-200 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">

            @foreach($items as $i)
            <div class="group relative border-r border-b border-gray-200 p-4 sm:p-6">
                <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-gray-200 group-hover:opacity-75">
                    <img src="https://tailwindui.com/img/ecommerce-images/category-page-05-image-card-01.jpg" alt="TODO" class="h-full w-full object-cover object-center">
                </div>
                <div class="pt-10 pb-4 text-center">
                    <h3 class="text-sm font-medium text-gray-900">
                        <a href="{{route('shop.product', $i->slug)}}">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            {{$i->name}}
                        </a>
                    </h3>
                    <div class="mt-3 flex flex-col items-center">
                        <p class="sr-only">{{$i->Review->average('rating')}} out of 5 stars</p>
                        <div class="flex items-center">
                            <!-- Heroicon name: mini/star -->
                            <svg class="text-yellow-400 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                            </svg>

                            <!-- Heroicon name: mini/star -->
                            <svg class="text-yellow-400 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                            </svg>

                            <!-- Heroicon name: mini/star -->
                            <svg class="text-yellow-400 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                            </svg>

                            <!-- Heroicon name: mini/star -->
                            <svg class="text-yellow-400 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                            </svg>

                            <!-- Heroicon name: mini/star -->
                            <svg class="text-yellow-400 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">{{$i->Review->count()}} reviews</p>
                    </div>
                    @auth()
                        <p class="mt-4 text-base font-medium text-gray-900">£{{$i->price}}</p>
                    @endauth

                    @guest()
                        <p class="mt-4 text-base font-medium text-gray-900">Please login</p>
                    @endguest

                </div>
            </div>
            @endforeach

            <!-- More products... -->
        </div>
    </section>

    <!-- Pagination -->
    <nav aria-label="Pagination" class="mx-auto mt-6 flex max-w-7xl justify-between px-4 text-sm font-medium text-gray-700 sm:px-6 lg:px-8">
        <div class="min-w-0 flex-1">
            <a href="#" class="inline-flex h-10 items-center rounded-md border border-gray-300 bg-white px-4 hover:bg-gray-100 focus:border-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-25 focus:ring-offset-1 focus:ring-offset-indigo-600">Previous</a>
        </div>
        <div class="hidden space-x-2 sm:flex">
            <!-- Current: "border-indigo-600 ring-1 ring-indigo-600", Default: "border-gray-300" -->
            <a href="#" class="inline-flex h-10 items-center rounded-md border border-gray-300 bg-white px-4 hover:bg-gray-100 focus:border-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-25 focus:ring-offset-1 focus:ring-offset-indigo-600">1</a>
            <a href="#" class="inline-flex h-10 items-center rounded-md border border-gray-300 bg-white px-4 hover:bg-gray-100 focus:border-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-25 focus:ring-offset-1 focus:ring-offset-indigo-600">2</a>
            <a href="#" class="inline-flex h-10 items-center rounded-md border border-indigo-600 bg-white px-4 ring-1 ring-indigo-600 hover:bg-gray-100 focus:border-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-25 focus:ring-offset-1 focus:ring-offset-indigo-600">3</a>
            <span class="inline-flex h-10 items-center px-1.5 text-gray-500">...</span>
            <a href="#" class="inline-flex h-10 items-center rounded-md border border-gray-300 bg-white px-4 hover:bg-gray-100 focus:border-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-25 focus:ring-offset-1 focus:ring-offset-indigo-600">8</a>
            <a href="#" class="inline-flex h-10 items-center rounded-md border border-gray-300 bg-white px-4 hover:bg-gray-100 focus:border-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-25 focus:ring-offset-1 focus:ring-offset-indigo-600">9</a>
            <a href="#" class="inline-flex h-10 items-center rounded-md border border-gray-300 bg-white px-4 hover:bg-gray-100 focus:border-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-25 focus:ring-offset-1 focus:ring-offset-indigo-600">10</a>
        </div>
        <div class="flex min-w-0 flex-1 justify-end">
            <a href="#" class="inline-flex h-10 items-center rounded-md border border-gray-300 bg-white px-4 hover:bg-gray-100 focus:border-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-25 focus:ring-offset-1 focus:ring-offset-indigo-600">Next</a>
        </div>
    </nav>
</main>