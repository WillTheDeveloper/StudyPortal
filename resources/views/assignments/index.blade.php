@php use Carbon\Carbon; @endphp
<x-new-user-layout>

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="px-4 sm:px-0">

                    @if (auth()->user()->is_tutor)
                        <a href="{{route('assignment.create')}}">
                            <button type="submit" class="rounded-full bg-white px-3 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Create assignment</button>
                        </a>
                        @endif

                        <div>
                            <div class="sm:hidden">
                                <label for="tabs" class="sr-only">Select a tab</label>
                                <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                                <select id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                    <option>My Account</option>
                                    <option>Company</option>
                                    <option selected>Team Members</option>
                                    <option>Billing</option>
                                </select>
                            </div>
                            <div class="hidden sm:block">
                                <div class="border-b border-gray-200">
                                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                        <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                                        <a href="{{route('assignments.completed')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 group inline-flex items-center border-b-2 py-4 px-1 text-sm font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-300">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="pl-1">Completed</span>
                                        </a>
                                        <a href="{{route('assignments')}}" class="border-yellow-500 text-yellow-600 group inline-flex items-center border-b-2 py-4 px-1 text-sm font-medium" aria-current="page">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="pl-1">Due</span>
                                        </a>
                                        <a href="{{route('assignments.late')}}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 group inline-flex items-center border-b-2 py-4 px-1 text-sm font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-300">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                            </svg>
                                            <span class="pl-1">Late</span>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>


                        <ul role="list" class="divide-y divide-gray-100">
                            @foreach($assignments as $a)
                            <li class="flex items-center justify-between gap-x-6 py-5">
                                <div class="min-w-0">
                                    <div class="flex items-start gap-x-3">
                                        <p class="text-sm font-semibold leading-6 text-gray-900">{{$a->title}}</p>
{{--                                        <p class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">Complete</p>--}}
                                    </div>
                                    <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                        <p class="whitespace-nowrap">Due on <time datetime="2023-03-17T00:00Z">{{Carbon::createFromDate($a->duedate)->toFormattedDateString()}}</time></p>
                                        <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
                                            <circle cx="1" cy="1" r="1" />
                                        </svg>
                                        <p class="truncate">Created by {{$a->User->first()->name}}</p>
                                    </div>
                                </div>
                                @if(auth()->user()->is_tutor ?? auth()->user()->is_admin)
                                <div class="flex flex-none items-center gap-x-4" x-data="{dropdown:false}">
                                    <a href="{{route('assignments.manage', $a->id)}}" class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">View<span class="sr-only">, {{$a->title}}</span></a>
                                    <div class="relative flex-none">
                                        <button x-on:click="dropdown = true" type="button" class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900" id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                            <span class="sr-only">Open options</span>
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                            </svg>
                                        </button>

                                        <!--
                                          Dropdown menu, show/hide based on menu state.

                                          Entering: "transition ease-out duration-100"
                                            From: "transform opacity-0 scale-95"
                                            To: "transform opacity-100 scale-100"
                                          Leaving: "transition ease-in duration-75"
                                            From: "transform opacity-100 scale-100"
                                            To: "transform opacity-0 scale-95"
                                        -->
                                        <div x-cloak x-show="dropdown" x-on:click.away="dropdown = false" class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">
                                            <!-- Active: "bg-gray-50", Not Active: "" -->
                                            <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-0-item-0">Edit<span class="sr-only">, GraphQL API</span></a>
                                            <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-0-item-1">Move<span class="sr-only">, GraphQL API</span></a>
                                            <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-0-item-2">Delete<span class="sr-only">, GraphQL API</span></a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
    
</x-new-user-layout>
