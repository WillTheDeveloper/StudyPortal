<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--            {{ __('Reports') }}--}}
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
            <main class="flex-1 pb-8" x-data="{command: false}" @keyup.shift.enter.window="command = true" @keyup.esc.window="command = false">

                <!-- Page header -->
                {{--<div class="bg-white shadow">
                    <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                        <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                            --}}{{--<div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
                                <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Add money</button>
                                <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Send money</button>
                            </div>--}}{{--
                        </div>
                    </div>
                </div>--}}



                <div class="mt-8">
                    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h2 class="text-lg leading-6 font-medium text-gray-900">Overview</h2>
                        <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                            <!-- Card -->

                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/scale -->
                                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Total reports</dt>
                                                <dd>
                                                    <div class="text-lg font-medium text-gray-900">{{$stats->count()}}</div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-5 py-3">
                                    <div class="text-sm">
                                        <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900"> View all reports </a>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/scale -->
                                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Reports unresolved</dt>
                                                <dd>
                                                    <div class="text-lg font-medium text-gray-900">{{$stats->where('reports.resolved', 0)->count()}}</div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-5 py-3">
                                    <div class="text-sm">
                                        <a href="{{route('reports.unresolved')}}" class="font-medium text-cyan-700 hover:text-cyan-900"> View all unresolved </a>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/scale -->
                                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Reports resolved</dt>
                                                <dd>
                                                    <div class="text-lg font-medium text-gray-900">{{$stats->where('reports.resolved', 1)->count()}}</div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-5 py-3">
                                    <div class="text-sm">
                                        <a href="{{route('reports.resolved')}}" class="font-medium text-cyan-700 hover:text-cyan-900"> View all resolved </a>
                                    </div>
                                </div>
                            </div>

                            <!-- More items... -->
                        </div>
                    </div>

                    <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Recent reports</h2>

                    {{--<!-- Activity list (smallest breakpoint only) -->
                    <div class="shadow sm:hidden">
                        <ul role="list" class="mt-2 divide-y divide-gray-200 overflow-hidden shadow sm:hidden">
                            @foreach($notifications as $notif)
                                <li>
                                    <a href="#" class="block px-4 py-4 bg-white hover:bg-gray-50">
                                    <span class="flex items-center space-x-4">
                                      <span class="flex-1 flex space-x-2 truncate">
                                        <!-- Heroicon name: solid/cash -->
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                          <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="flex flex-col text-gray-500 text-sm truncate">
                                          <span class="truncate">{{json_encode($notif->data['user'])}} posted {{json_encode($notif->data['title'])}}</span>
                                          <span><span class="text-gray-900 font-medium">$20,000</span> USD</span>
                                          <time datetime="2020-07-11">{{$notif->created_at->format('h:m - D n M')}}</time>
                                        </span>
                                      </span>
                                        <!-- Heroicon name: solid/chevron-right -->
                                      <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                      </svg>
                                    </span>
                                    </a>
                                </li>
                            @endforeach

                            <!-- More transactions... -->
                        </ul>

                        <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200" aria-label="Pagination">
                            {{$notifications->links()}}
                            <div class="flex-1 flex justify-between">
                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500"> Previous </a>
                                <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500"> Next </a>
                            </div>
                        </nav>
                    </div>--}}

                    <!-- Activity table (small breakpoint and up) -->
                    <div class="hidden sm:block">
                        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex flex-col mt-2">
                                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activity</th>
                                            <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Post</th>
                                            <th class="hidden px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider md:block">Status</th>
                                            <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($reports as $notif)
                                            <tr class="bg-white">
                                                <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <div class="flex">
                                                        <a href="{{route('report.details', $notif->id)}}" class="group inline-flex space-x-2 truncate text-sm">
                                                            <!-- Heroicon name: solid/cash -->
                                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                                            </svg>
                                                            <p class="text-gray-500 truncate group-hover:text-gray-900">
                                                                {{$notif->comment}} - {{$notif->reason}}</p>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                                    <span class="text-gray-900 font-medium"><a href="{{route('community.post', $notif->Post->slug)}}">{{$notif->Post->title}}</a></span>
                                                </td>
                                                @switch($notif->resolved)
                                                    @case(1)
                                                        <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block">
                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 capitalize"> resolved </span>
                                                        </td>
                                                    @break(1)
                                                    @case(0)
                                                        <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block">
                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 capitalize"> unresolved </span>
                                                        </td>
                                                    @break(0)
                                                @endswitch
                                                <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                                    <time>{{$notif->created_at->diffForHumans()}}</time>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- More transactions... -->
                                        </tbody>
                                    </table>
                                    <!-- Pagination -->
                                    <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
{{--                                        {{$notifications->links()}}--}}
                                        {{--<div class="hidden sm:block">
                                            <p class="text-sm text-gray-700">
                                                Showing
                                                <span class="font-medium">1</span>
                                                to
                                                <span class="font-medium">10</span>
                                                of
                                                <span class="font-medium">20</span>
                                                results
                                            </p>
                                        </div>
                                        <div class="flex-1 flex justify-between sm:justify-end">
                                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
                                            <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
                                        </div>--}}
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
