<!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
<div class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true" x-show="menu">
    <!--
      Off-canvas menu overlay, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>

    <!--
      Off-canvas menu, show/hide based on off-canvas menu state.

      Entering: "transition ease-in-out duration-300 transform"
        From: "-translate-x-full"
        To: "translate-x-0"
      Leaving: "transition ease-in-out duration-300 transform"
        From: "translate-x-0"
        To: "-translate-x-full"
    -->
    <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
        <!--
          Close button, show/hide based on off-canvas menu state.

          Entering: "ease-in-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="absolute top-0 right-0 -mr-12 pt-2">
            <button @click="menu = false" type="button"
                    class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                <span class="sr-only">Close sidebar</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="flex-shrink-0 flex items-center px-4">
{{--            <img class="h-8 w-auto"--}}
{{--                 src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg" alt="Workflow">--}}
        </div>
        <div x-show="menu" class="mt-5 flex-1 h-0 overflow-y-auto">
            <nav class="px-2">
                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('timetable')" :active="request()->routeIs('timetable')">
                        {{ __('Timetable') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('assignments')" :active="request()->routeIs('assignments')">
                        {{ __('Assignments') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('calendar')" :active="request()->routeIs('calendar')">
                        {{ __('Calendar') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('kanban.list')" :active="request()->routeIs('kanban.list')">
                        {{ __('Kanban') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('todo.all')" :active="request()->routeIs('todo.all')">
                        {{ __('Todo') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('note.show')" :active="request()->routeIs('note.show')">
                        {{ __('Notes') }}
                    </x-responsive-nav-link>

                    @if (auth()->user()->is_tutor)
                        <x-responsive-nav-link :href="route('groups')" :active="request()->routeIs('groups')">
                            {{ __('Groups') }}
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('exam')" :active="request()->routeIs('exam')">
                            {{ __('Exams') }}
                        </x-responsive-nav-link>
                    @endif

                    @if (auth()->user()->is_admin)
                        <x-responsive-nav-link :href="route('users')" :active="request()->routeIs('users')">
                            {{ __('Users') }}
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('reports.overview')" :active="request()->routeIs('reports.overview')">
                            {{ __('Reports') }}
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('institution.manage')" :active="request()->routeIs('institution.manage')">
                            {{ __('Institutions') }}
                        </x-responsive-nav-link>
                    @endif

                    <x-responsive-nav-link :href="route('community')" :active="request()->routeIs('community')">
                        {{ __('Community') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('resources')" :active="request()->routeIs('resources')">
                        {{ __('Resources') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('tickets')" :active="request()->routeIs('tickets')">
                        {{ __('Tickets') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('profile')" :active="request()->routeIs('profile')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    {{--@if (!auth()->user()->subscribed('default'))
                        <x-responsive-nav-link :href="route('subscribe')" :active="request()->routeIs('subscribe')">
                            {{ __('Subscribe') }}
                        </x-responsive-nav-link>
                    @endif--}}
                </div>
                <div class="mt-8">
                    <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider"
                        id="mobile-teams-headline">
                        Teams
                    </h3>
                    <div class="mt-1 space-y-1" role="group" aria-labelledby="mobile-teams-headline">
                        @foreach(auth()->user()->Group()->get() as $group)
                            <a href="#"
                               class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
                                <span class="truncate">
                              {{$group->name}}
                            </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="flex-shrink-0 w-14" aria-hidden="true">
        <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
</div>

<!-- Static sidebar for desktop -->
<div class="hidden lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 lg:border-r lg:border-gray-200 lg:pt-5 lg:pb-4 lg:bg-gray-100">
    <div class="flex items-center flex-shrink-0 px-6">
        {{--<img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg"
             alt="Workflow">--}}
        <img class="h-8 w-auto" src="https://studyportal.s3.eu-west-2.amazonaws.com/logo_banner_style_v1.png"
             alt="Study Portal logo">
    </div>
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="mt-6 h-0 flex-1 flex flex-col overflow-y-auto">
        <!-- User account dropdown -->
        <div class="px-3 relative inline-block text-left">
            <div>
                <button @click="profile = true" type="button"
                        class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500"
                        id="options-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="flex w-full justify-between items-center">
              <span class="flex min-w-0 items-center justify-between space-x-3">
                <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"
                     src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                     alt="">
                <span class="flex-1 flex flex-col min-w-0">
                  <span class="text-gray-900 text-sm font-medium truncate">{{auth()->user()->name}}</span>
                    @isset(auth()->user()->username)
                        <span class="text-gray-500 text-sm truncate">@ {{auth()->user()->username}}</span>
                    @endisset
                </span>
              </span>
                <!-- Heroicon name: solid/selector -->
              <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                   xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                      clip-rule="evenodd"/>
              </svg>
            </span>
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
            <div x-show="profile" @click.away="profile = false" x-cloak
                 class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                 role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">
                <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a href="{{ route('profile') }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                       tabindex="-1" id="options-menu-item-0">View profile</a>
                    <a href="{{route('settings')}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                       id="options-menu-item-1">Settings</a>
                    <a href="{{ route('notifications.view') }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                       id="options-menu-item-2">Notifications</a>
                </div>
                <div class="py-1" role="none">
                    <a href="{{route('keys.view')}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                       id="options-menu-item-3">API Keys</a>
                    <a href="{{route('support')}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                       id="options-menu-item-4">Support</a>
                </div>
                <div class="py-1" role="none">
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                       id="options-menu-item-5">Logout</a>
                </div>
            </div>
        </div>
        <!-- Sidebar Search -->
        <div class="px-3 mt-5">
            <form action="{{route('community.search')}}" method="get">
                <label for="search" class="sr-only">Search</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none" aria-hidden="true">
                        <!-- Heroicon name: solid/search -->
                        <svg class="mr-3 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <input type="text" name="search" id="search"
                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-9 sm:text-sm border-gray-300 rounded-md"
                           placeholder="Search">
                </div>
            </form>
        </div>
        <!-- Navigation -->
        <nav class="px-3 mt-6">
            <div class="space-y-1">
                <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-700 hover:text-gray-900 hover:bg-gray-50" -->
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('timetable')" :active="request()->routeIs('timetable')">
                    {{ __('Timetable') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('assignments')" :active="request()->routeIs('assignments')">
                    {{ __('Assignments') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('calendar')" :active="request()->routeIs('calendar')">
                    {{ __('Calendar') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('kanban.list')" :active="request()->routeIs('kanban.list')">
                    {{ __('Kanban') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('todo.all')" :active="request()->routeIs('todo.all')">
                    {{ __('Todo') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('note.show')" :active="request()->routeIs('note.show')">
                    {{ __('Notes') }}
                </x-responsive-nav-link>

                @if (auth()->user()->is_tutor)
                        <x-responsive-nav-link :href="route('groups')" :active="request()->routeIs('groups')">
                            {{ __('Groups') }}
                        </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('exam')" :active="request()->routeIs('exam')">
                        {{ __('Exams') }}
                    </x-responsive-nav-link>
                @endif

                @if (auth()->user()->is_admin)
                        <x-responsive-nav-link :href="route('users')" :active="request()->routeIs('users')">
                            {{ __('Users') }}
                        </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('reports.overview')" :active="request()->routeIs('reports.overview')">
                        {{ __('Reports') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('institution.manage')" :active="request()->routeIs('institution.manage')">
                        {{ __('Institutions') }}
                    </x-responsive-nav-link>
                @endif

                <x-responsive-nav-link :href="route('community')" :active="request()->routeIs('community')">
                    {{ __('Community') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('resources')" :active="request()->routeIs('resources')">
                    {{ __('Resources') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('tickets')" :active="request()->routeIs('tickets')">
                    {{ __('Tickets') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('profile')" :active="request()->routeIs('profile')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                {{--@if (!auth()->user()->subscribed('default'))
                    <x-responsive-nav-link :href="route('subscribe')" :active="request()->routeIs('subscribe')">
                        {{ __('Subscribe') }}
                    </x-responsive-nav-link>
                @endif--}}
            </div>
            <div class="mt-8">
                @if(auth()->user()->Group()->count() > 0)
                <!-- Secondary navigation -->
                <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider"
                    id="desktop-teams-headline">
                    My groups
                </h3>
                <div class="mt-1 space-y-1" role="group" aria-labelledby="desktop-teams-headline">
                    @foreach(auth()->user()->Group()->get() as $group)
                        <a href="{{route('group.discussion', $group->id)}}"
                           class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                            <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
                            <span class="truncate">
                            {{$group->name}}
                          </span>
                        </a>
                    @endforeach
                </div>
                @endif
            </div>
        </nav>
    </div>
</div>


{{--
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('timetable')" :active="request()->routeIs('timetable')">
                        {{ __('Timetable') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('assignments')" :active="request()->routeIs('assignments')">
                        {{ __('Assignments') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('kanban.list')" :active="request()->routeIs('kanban.list')">
                        {{ __('Kanban') }}
                    </x-nav-link>
                </div>

                @if (auth()->user()->is_tutor)
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('groups')" :active="request()->routeIs('groups')">
                            {{ __('Groups') }}
                        </x-nav-link>
                    </div>
                @endif

                @if (auth()->user()->is_admin)
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('users')" :active="request()->routeIs('users')">
                            {{ __('Users') }}
                        </x-nav-link>
                    </div>
                @endif

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('community')" :active="request()->routeIs('community')">
                        {{ __('Community') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('profile')" :active="request()->routeIs('profile')">
                        {{ __('Profile') }}
                    </x-nav-link>
                </div>

                @if (!auth()->user()->subscribed('default'))
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('subscribe')" :active="request()->routeIs('subscribe')">
                            {{ __('Subscribe') }}
                        </x-nav-link>
                    </div>
                @endif

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('timetable')" :active="request()->routeIs('timetable')">
                {{ __('Timetable') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('assignments')" :active="request()->routeIs('assignments')">
                {{ __('Assignments') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('kanban.list')" :active="request()->routeIs('kanban.list')">
                {{ __('Kanban') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('community')" :active="request()->routeIs('community')">
                {{ __('Community') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('profile')" :active="request()->routeIs('profile')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            @if (!auth()->user()->subscribed('default'))
                <x-responsive-nav-link :href="route('subscribe')" :active="request()->routeIs('subscribe')">
                    {{ __('Subscribe') }}
                </x-responsive-nav-link>
            @endif

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
--}}
