<x-new-guest-layout>

<main class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24">
    <div class="text-center">
        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline">Enabling students to</span>
            <span class="block text-grape-600 xl:inline">collaborate</span>
        </h1>
        <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
            We are passionate to enable students to collaborate on work and be able to support each other all the time in one place.
        </p>
        <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
            @guest()
                <div class="rounded-md shadow">
                    <a href="{{route('register')}}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                        Register
                    </a>
                </div>
                <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                    <a href="{{route('blog')}}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-grape-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                        Blog
                    </a>
                </div>
            @endguest
            @auth()
                    <div class="rounded-md shadow">
                        <a href="{{route('dashboard')}}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-grape-600 hover:bg-grape-700 md:py-4 md:text-lg md:px-10">
                            Dashboard
                        </a>
                    </div>
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                        <a href="{{route('settings')}}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-purple-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                            Settings
                        </a>
                    </div>
            @endauth
        </div>
    </div>
</main>

<div class="relative bg-gray-50 pt-4 overflow-hidden sm:pt-24 lg:pt-8 bg-gradient-to-t from-grape-300 to-white">
    <div class="mx-auto max-w-md px-4 text-center sm:px-6 sm:max-w-3xl lg:px-8 lg:max-w-7xl">
        <div class="mt-12 -mb-10 sm:-mb-24 lg:-mb-80">
            <img class="rounded-lg shadow-xl ring-1 ring-black ring-opacity-5" src="{{asset('images/dashboard01.png')}}" alt="">
        </div>
    </div>
</div>


<!-- This example requires Tailwind CSS v2.0+ -->
<section class="py-12 bg-gray-50 overflow-hidden md:py-20 lg:py-24 bg-gradient-to-t from-purple-400 to-grape-300">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <svg class="absolute top-full right-full transform translate-x-1/3 -translate-y-1/4 lg:translate-x-1/2 xl:-translate-y-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" role="img" aria-labelledby="svg-workcation">
            <title id="svg-workcation">Workcation</title>
            <rect width="404" height="404" fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />
        </svg>

        <div class="relative">
{{--            <img class="mx-auto h-8" src="https://tailwindui.com/img/logos/workcation-logo-indigo-600-mark-gray-800-and-indigo-600-text.svg" alt="Workcation">--}}
            <blockquote class="mt-10">
                <div class="max-w-3xl mx-auto text-center text-2xl leading-9 font-medium text-white">
                    <p>
                        &ldquo;My new favourite platform to get support on. Everyone is super helpful and the platform just works really well since its aimed at students.&rdquo;
                    </p>
                </div>
                <footer class="mt-8">
                    <div class="md:flex md:items-center md:justify-center">
                        {{--<div class="md:flex-shrink-0">
                            <img class="mx-auto h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>--}}
                        <div class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">
                            <div class="text-base font-medium text-gray-900">William Burton</div>

                            <svg class="hidden md:block mx-1 h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M11 0h3L9 20H6l5-20z" />
                            </svg>

                            <div class="text-base font-medium text-gray-600">Student, College</div>
                        </div>
                    </div>
                </footer>
            </blockquote>
        </div>
    </div>
</section>




<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white pt-16 pb-32 overflow-hidden bg-gradient-to-b from-purple-400 to-blue-300">
    <div class="relative">
        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
            <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-16 lg:max-w-none lg:mx-0 lg:px-0">
                <div>
                    <div>
            {{--<span class="h-12 w-12 rounded-md flex items-center justify-center bg-indigo-600">
              <!-- Heroicon name: outline/inbox -->
              <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
              </svg>
            </span>--}}
                    </div>
                    <div class="mt-6">
                        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">
                            Collaboration leads to success
                        </h2>
                        <p class="mt-4 text-lg text-white">
                            Enabling students to talk to each other and support one another with work while having the resources they need to support them during there studying years will be very beneficial for them and people yet to join the platform.
                        </p>
                        <div class="mt-6">
                            <a href="{{route('features')}}" class="inline-flex px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                Read more!
                            </a>
                        </div>
                    </div>
                </div>
                {{--<div class="mt-8 border-t border-gray-200 pt-6">
                    <blockquote>
                        <div>
                            <p class="text-base text-gray-500">
                                &ldquo;Cras velit quis eros eget rhoncus lacus ultrices sed diam. Sit orci risus aenean curabitur donec aliquet. Mi venenatis in euismod ut.&rdquo;
                            </p>
                        </div>
                        <footer class="mt-3">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1509783236416-c9ad59bae472?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                                </div>
                                <div class="text-base font-medium text-gray-700">
                                    Marcia Hill, Digital Marketing Manager
                                </div>
                            </div>
                        </footer>
                    </blockquote>
                </div>--}}
            </div>
            <div class="mt-12 sm:mt-16 lg:mt-0">
                <div class="pl-4 -mr-48 sm:pl-6 md:-mr-16 lg:px-0 lg:m-0 lg:relative lg:h-full">
                    <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none" src="{{asset('images/community01.png')}}" alt="Inbox user interface">
                </div>
            </div>
        </div>
    </div>
    <div class="mt-24">
        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
            <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-32 lg:max-w-none lg:mx-0 lg:px-0 lg:col-start-2">
                <div>
                    <div>
            {{--<span class="h-12 w-12 rounded-md flex items-center justify-center bg-indigo-600">
              <!-- Heroicon name: outline/sparkles -->
              <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
              </svg>
            </span>--}}
                    </div>
                    <div class="mt-6">
                        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">
                            Gain access to basic tools
                        </h2>
                        <p class="mt-4 text-lg text-white">
                            You can't have a massive platform based around collaboration if you don't have the basic needs of a student implemented alongside it. This is a platform that has it all and does it all right. Students need to know when there lessons are, so we implemented timetables.
                        </p>
                        <div class="mt-6">
                            <a href="{{route('register')}}" class="inline-flex px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                Register
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 sm:mt-16 lg:mt-0 lg:col-start-1">
                <div class="pr-4 -ml-48 sm:pr-6 md:-ml-16 lg:px-0 lg:m-0 lg:relative lg:h-full">
                    <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-auto lg:max-w-none" src="{{asset('images/sidebar02.png')}}" alt="Customer profile user interface">
                </div>
            </div>
        </div>
    </div>
</div>


<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white py-16 sm:py-24 lg:py-32 bg-gradient-to-b from-blue-300 to-green-300">
    <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
        <h2 class="text-base font-semibold tracking-wider text-indigo-600 uppercase">Collaborate</h2>
        <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
            Everything you need to support yourself and others
        </p>
        <p class="mt-5 max-w-prose mx-auto text-xl text-gray-600">
            Here at Study Portal, we believe that collaboration is important. Below are all the features that you have access to when you join this platform.
        </p>
        <div class="mt-12">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div class="pt-6">
                    <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                        <div class="-mt-6">
                            <div>
                <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                  <!-- Heroicon name: outline/cloud-upload -->
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                  </svg>
                </span>
                            </div>
                            <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Easy to use</h3>
                            <p class="mt-5 text-base text-gray-500">
                                We support students from colleges all the way up to universities. Not everyone is technical, so we made it easy to use for everyone.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                        <div class="-mt-6">
                            <div>
                <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                  <!-- Heroicon name: outline/lock-closed -->
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                  </svg>
                </span>
                            </div>
                            <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Data protection</h3>
                            <p class="mt-5 text-base text-gray-500">
                                We ensure that all the data is kept secure meaning that you can use this platform with confidence.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                        <div class="-mt-6">
                            <div>
                <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                  <!-- Heroicon name: outline/refresh -->
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                  </svg>
                </span>
                            </div>
                            <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Timetables</h3>
                            <p class="mt-5 text-base text-gray-500">
                                Everyone has access to a timetable that they can either edit themselves or have there tutor or institution manage it for them.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                        <div class="-mt-6">
                            <div>
                <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                  <!-- Heroicon name: outline/shield-check -->
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                  </svg>
                </span>
                            </div>
                            <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Privacy settings</h3>
                            <p class="mt-5 text-base text-gray-500">
                                Some people like to keep themselves private so we have implemented privacy settings to support this.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                        <div class="-mt-6">
                            <div>
                <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                  <!-- Heroicon name: outline/cog -->
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </span>
                            </div>
                            <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Shared resources</h3>
                            <p class="mt-5 text-base text-gray-500">
                                Each institution will have an area to share resources amongst students. Such as assignment briefs.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                        <div class="-mt-6">
                            <div>
                <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                  <!-- Heroicon name: outline/server -->
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                  </svg>
                </span>
                            </div>
                            <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Community area</h3>
                            <p class="mt-5 text-base text-gray-500">
                                People will have access to an area where they can reach out to other people doing a similar course to them for support.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="bg-gradient-to-b from-green-300 to-blue-300">
    <div class="mx-auto max-w-7xl py-6 px-4 text-center sm:px-6 lg:px-8 lg:py-6">
        <div class="space-y-8 sm:space-y-12">
            <div class="space-y-5 sm:mx-auto sm:max-w-xl sm:space-y-4 lg:max-w-5xl">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Study Portal Team</h2>
                <p class="text-xl text-gray-800">Official members of the Study Portal Team who made this project a reality from day 1.</p>
                <p class="text-xs text-gray-800">Last updated: 6th December 2022 @ 11:00</p>
            </div>
            <ul role="list" class="mx-auto grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-4 md:gap-x-6 lg:max-w-5xl lg:gap-x-8 lg:gap-y-12 xl:grid-cols-6">
                <li>
                    <div class="space-y-4">
                        <img class="mx-auto h-20 w-20 rounded-full lg:h-24 lg:w-24" src="https://avatars.githubusercontent.com/u/78596837?s=400&u=c0fca7a84dd40ca39dbe8a27d049ab2518d287b2&v=4" alt="">
                        <div class="space-y-2">
                            <div class="text-xs font-medium lg:text-sm">
                                <h3>Will Burton</h3>
                                <p class="text-indigo-600">Founder / CEO</p>
                                <p class="text-gray-600">1,046 commits</p>
                                <p class="text-green-600">364,575++</p>
                                <p class="text-red-600">322,116--</p>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- More people... -->
            </ul>
        </div>
    </div>
</div>


<div class="bg-gradient-to-b from-blue-300 to-green-300">
    <div class="mx-auto max-w-7xl py-6 px-4 text-center sm:px-6 lg:px-8 lg:py-6">
        <div class="space-y-8 sm:space-y-12">
            <div class="space-y-5 sm:mx-auto sm:max-w-xl sm:space-y-4 lg:max-w-5xl">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Our contributors</h2>
                <p class="text-xl text-gray-800">Group of open source developers who support and have contributed to this project.</p>
                <p class="text-xs text-gray-800">Last updated: 15th January 2023 @ 16:30</p>
            </div>
            <ul role="list" class="mx-auto grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-4 md:gap-x-6 lg:max-w-5xl lg:gap-x-8 lg:gap-y-12 xl:grid-cols-6">
                <li>
                    <div class="space-y-4">
                        <img class="mx-auto h-20 w-20 rounded-full lg:h-24 lg:w-24" src="https://avatars.githubusercontent.com/u/91018726?v=4" alt="">
                        <div class="space-y-2">
                            <div class="text-xs font-medium lg:text-sm">
                                <h3>mauro-balades</h3>
                                <p class="text-gray-600">3 commits</p>
                                <p class="text-green-600">8++</p>
                                <p class="text-red-600">3--</p>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="space-y-4">
                        <img class="mx-auto h-20 w-20 rounded-full lg:h-24 lg:w-24" src="https://avatars.githubusercontent.com/u/41681216?v=4" alt="">
                        <div class="space-y-2">
                            <div class="text-xs font-medium lg:text-sm">
                                <h3>pussy-cats</h3>
                                <p class="text-gray-600">2 commits</p>
                                <p class="text-green-600">79++</p>
                                <p class="text-red-600">31--</p>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="space-y-4">
                        <img class="mx-auto h-20 w-20 rounded-full lg:h-24 lg:w-24" src="https://avatars.githubusercontent.com/u/5357529?v=4" alt="">
                        <div class="space-y-2">
                            <div class="text-xs font-medium lg:text-sm">
                                <h3>Gruce</h3>
                                <p class="text-gray-600">1 commits</p>
                                <p class="text-green-600">438++</p>
                                <p class="text-red-600">9,680--</p>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="space-y-4">
                        <img class="mx-auto h-20 w-20 rounded-full lg:h-24 lg:w-24" src="https://avatars.githubusercontent.com/u/84431594?v=4" alt="">
                        <div class="space-y-2">
                            <div class="text-xs font-medium lg:text-sm">
                                <h3>kkumar-gcc</h3>
                                <p class="text-gray-600">2 commits</p>
                                <p class="text-green-600">18,803++</p>
                                <p class="text-red-600">18,795--</p>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- More people... -->
            </ul>
        </div>
    </div>
</div>



<div class="bg-gradient-to-b from-green-300 to-gray-300">
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
<footer class="bg-gray-300">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
        <div class="flex justify-center space-x-6 md:order-2">

            <a href="#" class="text-black hover:text-gray-500">
                <span class="sr-only">Instagram</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                </svg>
            </a>

            <a href="#" class="text-black hover:text-gray-500">
                <span class="sr-only">Twitter</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                </svg>
            </a>

            <a href="https://github.com/WillTheDeveloper" class="text-black hover:text-gray-500">
                <span class="sr-only">GitHub</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                </svg>
            </a>

        </div>
        <div class="mt-8 md:mt-0 md:order-1">
            <p class="text-center text-base text-black">
                &copy; {{now()->year}} Study Portal, Inc. All rights reserved.
            </p>
        </div>
    </div>
</footer>

</x-new-guest-layout>>
