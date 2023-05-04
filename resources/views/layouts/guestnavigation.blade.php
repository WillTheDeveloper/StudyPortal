<div x-data="{mobilenav: false}">
    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex items-center gap-x-12">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://studyportal.s3.eu-west-2.amazonaws.com/logo_banner_style_v1.png" alt="">
                </a>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="{{route('home')}}" class="text-sm font-semibold leading-6 text-gray-900">Home</a>

                    <a href="{{route('features')}}" class="text-sm font-semibold leading-6 text-gray-900">Features</a>

                    <a href="{{route('blog')}}" class="text-sm font-semibold leading-6 text-gray-900">Blog</a>

                    <a href="{{route('shop')}}" class="text-sm font-semibold leading-6 text-gray-900">Shop</a>

                    <a href="{{route('contact')}}" class="text-sm font-semibold leading-6 text-gray-900">Contact</a>
                </div>
            </div>
            <div class="flex lg:hidden">
                <button x-on:click="mobilenav = true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            @guest
            <div class="hidden lg:flex">
                <a href="{{route('login')}}" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
            </div>
            @endguest
            @auth
            <div class="hidden lg:flex">
                <a href="{{route('login')}}" class="text-sm font-semibold leading-6 text-gray-900">Go to dashboard <span aria-hidden="true">&rarr;</span></a>
            </div>
            @endauth
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden" role="dialog" aria-modal="true" x-show="mobilenav" x-cloak>
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-10"></div>
            <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Study Portal</span>
                        <img class="h-8 w-auto" src="https://studyportal.s3.eu-west-2.amazonaws.com/logo_banner_style_v1.png" alt="">
                    </a>
                    <button x-on:click="mobilenav = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="{{route('home')}}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Home</a>

                            <a href="{{route('features')}}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>

                            <a href="{{route('blog')}}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Blog</a>

                            <a href="{{route('shop')}}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Shop</a>

                            <a href="{{route('contact')}}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contact</a>
                        </div>
                        @guest
                        <div class="py-6">
                            <a href="{{route('login')}}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
                        </div>
                        @endguest
                        @auth
                        <div class="py-6">
                            <a href="{{route('login')}}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Go to dashboard</a>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

</div>