<!doctype html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Pricing | Study Portal</title>
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
                    <a href="/" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Home
                    </a>
                    <a href="/features" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Features
                    </a>
                    <a href="/pricing" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Pricing
                    </a>
                    <a href="/contact" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Contact
                    </a>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <button type="button" class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: outline/bell -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>

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
                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                        @else
                            <a href="/login" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Login</a>
                            <a href="/register" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Register</a>
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
            <a href="/" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Home</a>
            <a href="/features" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Features</a>
            <a href="/pricing" class="bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Pricing</a>
            <a href="/contact" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Contact</a>
        </div>
    </div>
</nav>

{{--<main class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24">
    <div class="text-center">
        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline">Pricing should be</span>
            <span class="block text-indigo-600 xl:inline">simple</span>
        </h1>
        <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
            We are passionate to enable students to collaborate on work and be able to support each other all the time in one place.
        </p>
    </div>
</main>--}}





<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white">
    <main>
        <!-- Pricing section -->
        <div>
            <div class="relative bg-indigo-600">
                <!-- Overlapping background -->
                <div aria-hidden="true" class="hidden absolute bg-gray-50 w-full h-6 bottom-0 lg:block"></div>

                <div class="relative max-w-2xl mx-auto pt-16 px-4 text-center sm:pt-32 sm:px-6 lg:max-w-7xl lg:px-8">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-6xl">
                        <span class="block lg:inline">Pricing made,</span>
                        <span class="block lg:inline">simple.</span>
                    </h1>
                    <p class="mt-4 text-xl text-indigo-100">Everything you need, nothing you don't. Pick a plan that best suits your business.</p>
                </div>

                <h2 class="sr-only">Plans</h2>

                <!-- Cards -->
                <div class="relative mt-8 max-w-2xl mx-auto px-4 pb-8 sm:mt-12 sm:px-6 lg:max-w-7xl lg:px-8 lg:pb-0">
                    <!-- Decorative background -->
                    <div aria-hidden="true" class="hidden absolute top-4 bottom-6 left-8 right-8 inset-0 bg-indigo-700 rounded-tl-lg rounded-tr-lg lg:block"></div>

                    <div class="relative space-y-6 lg:space-y-0 lg:grid lg:grid-cols-3">
                        <div class="bg-indigo-700 lg:bg-transparent pt-6 px-6 pb-3 rounded-lg lg:px-8 lg:pt-12">
                            <div>
                                <h3 class="text-white text-sm font-semibold uppercase tracking-wide">Standard</h3>
                                <div class="flex flex-col items-start sm:flex-row sm:items-center sm:justify-between lg:flex-col lg:items-start">
                                    <div class="mt-3 flex items-center">
                                        <p class="text-white text-4xl font-extrabold tracking-tight">£0</p>
                                        <div class="ml-4">
                                            <p class="text-white text-sm">Free user account</p>
                                        </div>
                                    </div>
                                    <a href="/register" class="bg-white text-indigo-600 hover:bg-indigo-50 mt-6 w-full inline-block py-2 px-8 border border-transparent rounded-md shadow-sm text-center text-sm font-medium sm:mt-0 sm:w-auto lg:mt-6 lg:w-full">Register new account</a>
                                </div>
                            </div>
                            <h4 class="sr-only">Features</h4>
                            <ul role="list" class="border-indigo-500 divide-indigo-500 divide-opacity-75 mt-7 border-t divide-y lg:border-t-0">
                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-200 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-white ml-4 text-sm font-medium">Basic account access</span>
                                </li>

                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-200 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-white ml-4 text-sm font-medium">Manage your own timetable</span>
                                </li>

                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-200 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-white ml-4 text-sm font-medium">View discussions</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-white ring-2 ring-indigo-700 shadow-md pt-6 px-6 pb-3 rounded-lg lg:px-8 lg:pt-12">
                            <div>
                                <h3 class="text-indigo-600 text-sm font-semibold uppercase tracking-wide">Student</h3>
                                <div class="flex flex-col items-start sm:flex-row sm:items-center sm:justify-between lg:flex-col lg:items-start">
                                    <div class="mt-3 flex items-center">
                                        <p class="text-indigo-600 text-4xl font-extrabold tracking-tight">£2</p>
                                        <div class="ml-4">
                                            <p class="text-gray-700 text-sm">GBP / mo</p>
                                            <p class="text-gray-500 text-sm">Billed yearly (£20)</p>
                                        </div>
                                    </div>
                                    <a href="#" class="bg-indigo-600 text-white hover:bg-indigo-700 mt-6 w-full inline-block py-2 px-8 border border-transparent rounded-md shadow-sm text-center text-sm font-medium sm:mt-0 sm:w-auto lg:mt-6 lg:w-full">Subscribe as Student</a>
                                </div>
                            </div>
                            <h4 class="sr-only">Features</h4>
                            <ul role="list" class="border-gray-200 divide-gray-200 mt-7 border-t divide-y lg:border-t-0">
                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-500 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-600 ml-4 text-sm font-medium">Full account access</span>
                                </li>

                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-500 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-600 ml-4 text-sm font-medium">Managed timetable</span>
                                </li>

                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-500 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-600 ml-4 text-sm font-medium">Collaborate with others</span>
                                </li>

                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-500 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-600 ml-4 text-sm font-medium">View work placements in your area</span>
                                </li>

                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-500 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-600 ml-4 text-sm font-medium">See all your assignments</span>
                                </li>

                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-500 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-600 ml-4 text-sm font-medium">Manage your profile</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-indigo-700 lg:bg-transparent pt-6 px-6 pb-3 rounded-lg lg:px-8 lg:pt-12">
                            <div>
                                <h3 class="text-white text-sm font-semibold uppercase tracking-wide">Insitution</h3>
                                <div class="flex flex-col items-start sm:flex-row sm:items-center sm:justify-between lg:flex-col lg:items-start">
                                    <a href="#" class="bg-white text-indigo-600 hover:bg-indigo-50 mt-6 w-full inline-block py-2 px-8 border border-transparent rounded-md shadow-sm text-center text-sm font-medium sm:mt-0 sm:w-auto lg:mt-6 lg:w-full">Contact Sales Team</a>
                                </div>
                            </div>
                            <h4 class="sr-only">Features</h4>
                            <ul role="list" class="border-indigo-500 divide-indigo-500 divide-opacity-75 mt-7 border-t divide-y lg:border-t-0">
                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-200 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-white ml-4 text-sm font-medium">Manage all accounts in institution</span>
                                </li>

                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-200 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-white ml-4 text-sm font-medium">Manage student timetables</span>
                                </li>

                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-200 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-white ml-4 text-sm font-medium">Manage work placements in your area</span>
                                </li>

                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-200 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-white ml-4 text-sm font-medium">Create accounts for tutors</span>
                                </li>

                                <li class="py-3 flex items-center">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="text-indigo-200 w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-white ml-4 text-sm font-medium">Manage student assignments</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feature comparison -->
            <section aria-labelledby="mobile-comparison-heading" class="lg:hidden">
                <h2 id="mobile-comparison-heading" class="sr-only">Feature comparison</h2>

                <div class="mt-16 max-w-2xl mx-auto px-4 space-y-16 sm:px-6">
                    <div class="border-t border-gray-200">
                        <div class="border-transparent -mt-px pt-6 border-t-2 sm:w-1/2">
                            <h3 class="text-gray-900 text-sm font-bold">Standard</h3>
                            <p class="mt-2 text-sm text-gray-500">Basic account with standard tools for students</p>
                        </div>
                        <h4 class="mt-10 text-sm font-bold text-gray-900">Catered for students</h4>

                        <div class="mt-6 relative">
                            <!-- Fake card background -->
                            <div aria-hidden="true" class="hidden absolute inset-0 pointer-events-none sm:block">
                                <div class="shadow absolute right-0 w-1/2 h-full bg-white rounded-lg"></div>
                            </div>

                            <div class="ring-1 ring-black ring-opacity-5 shadow relative py-3 px-4 bg-white rounded-lg sm:p-0 sm:bg-transparent sm:rounded-none sm:ring-0 sm:shadow-none">
                                <dl class="divide-y divide-gray-200">
                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Tax Savings</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Easy to use accounting</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Multi-accounts</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <span class="text-gray-900 text-sm font-medium">3 accounts</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Invoicing</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <span class="text-gray-900 text-sm font-medium">3 invoices</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Exclusive offers</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/x -->
                                            <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">No</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">6 months free advisor</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/x -->
                                            <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">No</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Mobile and web access</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/x -->
                                            <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">No</span>
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            <!-- Fake card border -->
                            <div aria-hidden="true" class="hidden absolute inset-0 pointer-events-none sm:block">
                                <div class="ring-1 ring-black ring-opacity-5 absolute right-0 w-1/2 h-full rounded-lg"></div>
                            </div>
                        </div>

                        <h4 class="mt-10 text-sm font-bold text-gray-900">Other perks</h4>

                        <div class="mt-6 relative">
                            <!-- Fake card background -->
                            <div aria-hidden="true" class="hidden absolute inset-0 pointer-events-none sm:block">
                                <div class="shadow absolute right-0 w-1/2 h-full bg-white rounded-lg"></div>
                            </div>

                            <div class="ring-1 ring-black ring-opacity-5 shadow relative py-3 px-4 bg-white rounded-lg sm:p-0 sm:bg-transparent sm:rounded-none sm:ring-0 sm:shadow-none">
                                <dl class="divide-y divide-gray-200">
                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">24/7 customer support</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Instant notifications</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Budgeting tools</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Digital receipts</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Pots to separate money</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/x -->
                                            <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">No</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Free bank transfers</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/x -->
                                            <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">No</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Business debit card</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/x -->
                                            <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">No</span>
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            <!-- Fake card border -->
                            <div aria-hidden="true" class="hidden absolute inset-0 pointer-events-none sm:block">
                                <div class="ring-1 ring-black ring-opacity-5 absolute right-0 w-1/2 h-full rounded-lg"></div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200">
                        <div class="border-indigo-600 -mt-px pt-6 border-t-2 sm:w-1/2">
                            <h3 class="text-indigo-600 text-sm font-bold">Scale</h3>
                            <p class="mt-2 text-sm text-gray-500">The best financial services for your thriving business.</p>
                        </div>
                        <h4 class="mt-10 text-sm font-bold text-gray-900">Catered for business</h4>

                        <div class="mt-6 relative">
                            <!-- Fake card background -->
                            <div aria-hidden="true" class="hidden absolute inset-0 pointer-events-none sm:block">
                                <div class="shadow-md absolute right-0 w-1/2 h-full bg-white rounded-lg"></div>
                            </div>

                            <div class="ring-2 ring-indigo-600 shadow-md relative py-3 px-4 bg-white rounded-lg sm:p-0 sm:bg-transparent sm:rounded-none sm:ring-0 sm:shadow-none">
                                <dl class="divide-y divide-gray-200">
                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Tax Savings</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Easy to use accounting</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Multi-accounts</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <span class="text-indigo-600 text-sm font-medium">Unlimited accounts</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Invoicing</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <span class="text-indigo-600 text-sm font-medium">Unlimited invoices</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Exclusive offers</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">6 months free advisor</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Mobile and web access</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            <!-- Fake card border -->
                            <div aria-hidden="true" class="hidden absolute inset-0 pointer-events-none sm:block">
                                <div class="ring-2 ring-indigo-600 absolute right-0 w-1/2 h-full rounded-lg"></div>
                            </div>
                        </div>

                        <h4 class="mt-10 text-sm font-bold text-gray-900">Other perks</h4>

                        <div class="mt-6 relative">
                            <!-- Fake card background -->
                            <div aria-hidden="true" class="hidden absolute inset-0 pointer-events-none sm:block">
                                <div class="shadow-md absolute right-0 w-1/2 h-full bg-white rounded-lg"></div>
                            </div>

                            <div class="ring-2 ring-indigo-600 shadow-md relative py-3 px-4 bg-white rounded-lg sm:p-0 sm:bg-transparent sm:rounded-none sm:ring-0 sm:shadow-none">
                                <dl class="divide-y divide-gray-200">
                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">24/7 customer support</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Instant notifications</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Budgeting tools</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Digital receipts</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Pots to separate money</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Free bank transfers</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Business debit card</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            <!-- Fake card border -->
                            <div aria-hidden="true" class="hidden absolute inset-0 pointer-events-none sm:block">
                                <div class="ring-2 ring-indigo-600 absolute right-0 w-1/2 h-full rounded-lg"></div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200">
                        <div class="border-transparent -mt-px pt-6 border-t-2 sm:w-1/2">
                            <h3 class="text-gray-900 text-sm font-bold">Growth</h3>
                            <p class="mt-2 text-sm text-gray-500">Convenient features to take your business to the next level.</p>
                        </div>
                        <h4 class="mt-10 text-sm font-bold text-gray-900">Catered for business</h4>

                        <div class="mt-6 relative">
                            <!-- Fake card background -->
                            <div aria-hidden="true" class="hidden absolute inset-0 pointer-events-none sm:block">
                                <div class="shadow absolute right-0 w-1/2 h-full bg-white rounded-lg"></div>
                            </div>

                            <div class="ring-1 ring-black ring-opacity-5 shadow relative py-3 px-4 bg-white rounded-lg sm:p-0 sm:bg-transparent sm:rounded-none sm:ring-0 sm:shadow-none">
                                <dl class="divide-y divide-gray-200">
                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Tax Savings</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Easy to use accounting</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Multi-accounts</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <span class="text-gray-900 text-sm font-medium">7 accounts</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Invoicing</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <span class="text-gray-900 text-sm font-medium">10 invoices</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Exclusive offers</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">6 months free advisor</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex items-center justify-between sm:grid sm:grid-cols-2">
                                        <dt class="pr-4 text-sm font-medium text-gray-600">Mobile and web access</dt>
                                        <dd class="flex items-center justify-end sm:px-4 sm:justify-center">
                                            <!-- Heroicon name: solid/x -->
                                            <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">No</span>
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            <!-- Fake card border -->
                            <div aria-hidden="true" class="hidden absolute inset-0 pointer-events-none sm:block">
                                <div class="ring-1 ring-black ring-opacity-5 absolute right-0 w-1/2 h-full rounded-lg"></div>
                            </div>
                        </div>

                        <h4 class="mt-10 text-sm font-bold text-gray-900">Other perks</h4>

                        <div class="mt-6 relative">
                            <!-- Fake card background -->
                            <div aria-hidden="true" class="hidden absolute inset-0 pointer-events-none sm:block">
                                <div class="shadow absolute right-0 w-1/2 h-full bg-white rounded-lg"></div>
                            </div>

                            <div class="ring-1 ring-black ring-opacity-5 shadow relative py-3 px-4 bg-white rounded-lg sm:p-0 sm:bg-transparent sm:rounded-none sm:ring-0 sm:shadow-none">
                                <dl class="divide-y divide-gray-200">
                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">24/7 customer support</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Instant notifications</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Budgeting tools</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Digital receipts</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Pots to separate money</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Free bank transfers</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/x -->
                                            <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">No</span>
                                        </dd>
                                    </div>

                                    <div class="py-3 flex justify-between sm:grid sm:grid-cols-2">
                                        <dt class="text-sm font-medium text-gray-600 sm:pr-4">Business debit card</dt>
                                        <dd class="text-center sm:px-4">
                                            <!-- Heroicon name: solid/x -->
                                            <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">No</span>
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            <!-- Fake card border -->
                            <div aria-hidden="true" class="hidden absolute inset-0 pointer-events-none sm:block">
                                <div class="ring-1 ring-black ring-opacity-5 absolute right-0 w-1/2 h-full rounded-lg"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section aria-labelledby="comparison-heading" class="hidden lg:block">
                <h2 id="comparison-heading" class="sr-only">Feature comparison</h2>

                <div class="mt-24 max-w-7xl mx-auto px-8">
                    <div class="w-full border-t border-gray-200 flex items-stretch">
                        <div class="-mt-px w-1/4 py-6 pr-4 flex items-end">
                            <h3 class="mt-auto text-sm font-bold text-gray-900">Catered for students</h3>
                        </div>

                        <div aria-hidden="true" class="pr-4 -mt-px pl-4 w-1/4">
                            <div class="border-transparent py-6 border-t-2">
                                <p class="text-gray-900 text-sm font-bold">Standard</p>
                                <p class="mt-2 text-sm text-gray-500">All your basic tools for a student.</p>
                            </div>
                        </div>

                        <div aria-hidden="true" class="pr-4 -mt-px pl-4 w-1/4">
                            <div class="border-indigo-600 py-6 border-t-2">
                                <p class="text-indigo-600 text-sm font-bold">Student</p>
                                <p class="mt-2 text-sm text-gray-500">Collaborate with other students like you with extra tools to support you.</p>
                            </div>
                        </div>

                        <div aria-hidden="true" class="-mt-px pl-4 w-1/4">
                            <div class="border-transparent py-6 border-t-2">
                                <p class="text-gray-900 text-sm font-bold">Institution</p>
                                <p class="mt-2 text-sm text-gray-500">The whole package for a institution that covers all there students.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <!-- Fake card backgrounds -->
                        <div class="absolute inset-0 flex items-stretch pointer-events-none" aria-hidden="true">
                            <div class="w-1/4 pr-4"></div>
                            <div class="w-1/4 px-4">
                                <div class="w-full h-full bg-white rounded-lg shadow"></div>
                            </div>
                            <div class="w-1/4 px-4">
                                <div class="w-full h-full bg-white rounded-lg shadow-md"></div>
                            </div>
                            <div class="w-1/4 pl-4">
                                <div class="w-full h-full bg-white rounded-lg shadow"></div>
                            </div>
                        </div>

                        <table class="relative w-full">
                            <caption class="sr-only">
                                Business feature comparison
                            </caption>
                            <thead>
                            <tr class="text-left">
                                <th scope="col">
                                    <span class="sr-only">Feature</span>
                                </th>

                                <th scope="col">
                                    <span class="sr-only">Starter plan</span>
                                </th>

                                <th scope="col">
                                    <span class="sr-only">Scale plan</span>
                                </th>

                                <th scope="col">
                                    <span class="sr-only">Growth plan</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                            <tr key="Tax Savings">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">Tax Savings</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>
                            </tr>

                            <tr key="Easy to use accounting">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">Easy to use accounting</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>
                            </tr>

                            <tr key="Multi-accounts">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">Multi-accounts</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <span class="text-gray-900 text-sm font-medium">3 accounts</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <span class="text-indigo-600 text-sm font-medium">Unlimited accounts</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <span class="text-gray-900 text-sm font-medium">7 accounts</span>
                    </span>
                                </td>
                            </tr>

                            <tr key="Invoicing">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">Invoicing</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <span class="text-gray-900 text-sm font-medium">3 invoices</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <span class="text-indigo-600 text-sm font-medium">Unlimited invoices</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <span class="text-gray-900 text-sm font-medium">10 invoices</span>
                    </span>
                                </td>
                            </tr>

                            <tr key="Exclusive offers">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">Exclusive offers</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/x -->
                      <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">No</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>
                            </tr>

                            <tr key="6 months free advisor">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">6 months free advisor</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/x -->
                      <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">No</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>
                            </tr>

                            <tr key="Mobile and web access">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">Mobile and web access</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/x -->
                      <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">No</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/x -->
                      <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">No</span>
                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <!-- Fake card borders -->
                        <div class="absolute inset-0 flex items-stretch pointer-events-none" aria-hidden="true">
                            <div class="w-1/4 pr-4"></div>
                            <div class="w-1/4 px-4">
                                <div class="w-full h-full rounded-lg ring-1 ring-black ring-opacity-5"></div>
                            </div>
                            <div class="w-1/4 px-4">
                                <div class="w-full h-full rounded-lg ring-2 ring-indigo-600 ring-opacity-100"></div>
                            </div>
                            <div class="w-1/4 pl-4">
                                <div class="w-full h-full rounded-lg ring-1 ring-black ring-opacity-5"></div>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-10 text-sm font-bold text-gray-900">Other perks</h3>

                    <div class="mt-6 relative">
                        <!-- Fake card backgrounds -->
                        <div class="absolute inset-0 flex items-stretch pointer-events-none" aria-hidden="true">
                            <div class="w-1/4 pr-4"></div>
                            <div class="w-1/4 px-4">
                                <div class="w-full h-full bg-white rounded-lg shadow"></div>
                            </div>
                            <div class="w-1/4 px-4">
                                <div class="w-full h-full bg-white rounded-lg shadow-md"></div>
                            </div>
                            <div class="w-1/4 pl-4">
                                <div class="w-full h-full bg-white rounded-lg shadow"></div>
                            </div>
                        </div>

                        <table class="relative w-full">
                            <caption class="sr-only">
                                Perk comparison
                            </caption>
                            <thead>
                            <tr class="text-left">
                                <th scope="col">
                                    <span class="sr-only">Perk</span>
                                </th>

                                <th scope="col">
                                    <span class="sr-only">Starter plan</span>
                                </th>

                                <th scope="col">
                                    <span class="sr-only">Scale plan</span>
                                </th>

                                <th scope="col">
                                    <span class="sr-only">Growth plan</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                            <tr key="24/7 customer support">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">24/7 customer support</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>
                            </tr>

                            <tr key="Instant notifications">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">Instant notifications</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>
                            </tr>

                            <tr key="Budgeting tools">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">Budgeting tools</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>
                            </tr>

                            <tr key="Digital receipts">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">Digital receipts</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>
                            </tr>

                            <tr key="Pots to separate money">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">Pots to separate money</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/x -->
                      <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">No</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>
                            </tr>

                            <tr key="Free bank transfers">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">Free bank transfers</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/x -->
                      <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">No</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/x -->
                      <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">No</span>
                    </span>
                                </td>
                            </tr>

                            <tr key="Business debit card">
                                <th scope="row" class="w-1/4 py-3 pr-4 text-left text-sm font-medium text-gray-600">Business debit card</th>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/x -->
                      <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">No</span>
                    </span>
                                </td>

                                <td class="px-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/check -->
                      <svg class="mx-auto h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">Yes</span>
                    </span>
                                </td>

                                <td class="pl-4 relative w-1/4 py-0 text-center">
                    <span class="relative w-full h-full py-3">
                      <!-- Heroicon name: solid/x -->
                      <svg class="mx-auto h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                      <span class="sr-only">No</span>
                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <!-- Fake card borders -->
                        <div class="absolute inset-0 flex items-stretch pointer-events-none" aria-hidden="true">
                            <div class="w-1/4 pr-4"></div>
                            <div class="w-1/4 px-4">
                                <div class="w-full h-full rounded-lg ring-1 ring-black ring-opacity-5"></div>
                            </div>
                            <div class="w-1/4 px-4">
                                <div class="w-full h-full rounded-lg ring-2 ring-indigo-600 ring-opacity-100"></div>
                            </div>
                            <div class="w-1/4 pl-4">
                                <div class="w-full h-full rounded-lg ring-1 ring-black ring-opacity-5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Logo cloud -->
        <div class="max-w-2xl mx-auto py-12 px-4 sm:px-6 lg:max-w-7xl lg:py-32 lg:px-8">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5">
                <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                    <img class="h-12" src="https://tailwindui.com/img/logos/tuple-logo-gray-400.svg" alt="Tuple">
                </div>
                <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                    <img class="h-12" src="https://tailwindui.com/img/logos/mirage-logo-gray-400.svg" alt="Mirage">
                </div>
                <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                    <img class="h-12" src="https://tailwindui.com/img/logos/statickit-logo-gray-400.svg" alt="StaticKit">
                </div>
                <div class="col-span-1 flex justify-center md:col-span-3 lg:col-span-1">
                    <img class="h-12" src="https://tailwindui.com/img/logos/transistor-logo-gray-400.svg" alt="Transistor">
                </div>
                <div class="col-span-2 flex justify-center md:col-span-3 lg:col-span-1">
                    <img class="h-12" src="https://tailwindui.com/img/logos/workcation-logo-gray-400.svg" alt="Workcation">
                </div>
            </div>
        </div>

        <!-- FAQs -->
        <section aria-labelledby="faq-heading" class="bg-gray-900">
            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="max-w-2xl lg:mx-auto lg:text-center">
                    <h2 id="faq-heading" class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        Frequently asked questions
                    </h2>
                    <p class="mt-4 text-gray-400">Ac euismod vel sit maecenas id pellentesque eu sed consectetur. Malesuada adipiscing sagittis vel nulla nec. Urna, sed a lectus elementum blandit et.</p>
                </div>
                <div class="mt-20">
                    <dl class="space-y-10 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:gap-y-10">
                        <div>
                            <dt class="font-semibold text-white">
                                What&#039;s the best thing about Switzerland?
                            </dt>
                            <dd class="mt-3 text-gray-400">
                                I don&#039;t know, but the flag is a big plus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.
                            </dd>
                        </div>

                        <!-- More questions... -->
                    </dl>
                </div>
            </div>
        </section>

        <div class="bg-white">
            <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 lg:py-32 lg:px-8 lg:flex lg:items-center">
                <div class="lg:w-0 lg:flex-1">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Sign up for our newsletter
                    </h2>
                    <p class="mt-3 max-w-3xl text-lg text-gray-500">
                        Our newsletters have information regarding updates and other important information.
                    </p>
                </div>
                <div class="mt-8 lg:mt-0 lg:ml-8">
                    <form class="sm:flex">
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email-address" type="email" autocomplete="email" required class="w-full px-5 py-3 border border-gray-300 shadow-sm placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs rounded-md" placeholder="Enter your email">
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                            <button type="submit" class="w-full flex items-center justify-center py-3 px-5 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Sign up
                            </button>
                        </div>
                    </form>
                    <p class="mt-3 text-sm text-gray-500">
                        We care about the protection of your data. Read our
                        <a href="#" class="font-medium underline">
                            Privacy Policy.
                        </a>
                    </p>
                </div>
            </div>
        </div>





        <!-- This example requires Tailwind CSS v2.0+ -->
        <footer class="bg-white">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
                <div class="flex justify-center space-x-6 md:order-2">

                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>

                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>

                    <a href="https://github.com/WillTheDeveloper" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                    </a>

                </div>
                <div class="mt-8 md:mt-0 md:order-1">
                    <p class="text-center text-base text-gray-400">
                        &copy; {{now()->year}} Study Portal, Inc. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </main>
</div>




</body>