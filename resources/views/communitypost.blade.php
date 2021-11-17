<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
        </h2>
    </x-slot>

    <div class="py-10" x-data="{newcomment:false}">
        <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
            <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                <nav aria-label="Sidebar" class="sticky top-4 divide-y divide-gray-300">
                    <div class="pb-8 space-y-1">



                        <a @click="newcomment = true"
                           class="bg-blue-500 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                           aria-current="page">
                            <!-- Heroicon name: outline/home -->
                            <span class="truncate">
                            New Comment
                          </span>
                        </a>


                        <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-600 hover:bg-gray-50" -->
                        <a href="{{ route('community') }}"
                           class="bg-gray-200 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                           aria-current="page">
                            <!-- Heroicon name: outline/home -->
                            <svg class="text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="truncate">
                Home
              </span>
                        </a>

                        <a href="{{ route('community.popular') }}"
                           class="text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/fire -->
                            <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                            </svg>
                            <span class="truncate">
                Popular
              </span>
                        </a>

                        <a href="{{ route('community.communities') }}"
                           class="text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/user-group -->
                            <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <span class="truncate">
                Communities
              </span>
                        </a>

                        <a href="{{ route('community.trending') }}"
                           class="text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/trending-up -->
                            <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            <span class="truncate">
                Trending
              </span>
                        </a>
                    </div>
                    <div class="pt-10">
                        <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider"
                           id="communities-headline">
                            My Subjects
                        </p>
                        <div class="mt-3 space-y-2" aria-labelledby="communities-headline">

                            @foreach(auth()->user()->Subject()->get() as $subject)
                                <a href="{{ route('community.subject', $subject->id) }}"
                                   class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                <span class="truncate">
                                  {{$subject->subject}}
                                </span>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </nav>
            </div>

            <div class="flow-root lg:col-span-8">
                <ul role="list" class="-mb-8">
                    <li>
                        <div class="relative pb-8">
                            <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                            <div class="relative flex items-start space-x-3">
                                <div class="relative">
                                    <img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white" src="https://images.unsplash.com/photo-1520785643438-5bf77931f493?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="">

                                    <span class="absolute -bottom-0.5 -right-1 bg-white rounded-tl px-0.5 py-px">
                                      <!-- Heroicon name: solid/chat-alt -->
                                      <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                      </svg>
                                    </span>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div>
                                        <div class="text-sm">
                                            <a href="#" class="font-medium text-gray-900">Eduardo Benz</a>
                                        </div>
                                        <p class="mt-0.5 text-sm text-gray-500">
                                            Commented 6d ago
                                        </p>
                                    </div>
                                    <div class="mt-2 text-sm text-gray-700">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt nunc ipsum tempor purus vitae id. Morbi in vestibulum nec varius. Et diam cursus quis sed purus nam.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="fixed inset-0 overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-cloak x-show="newcomment">
            <div class="absolute inset-0 overflow-hidden">
                <!-- Background overlay, show/hide based on slide-over state. -->
                <div class="absolute inset-0" aria-hidden="true">
                    <div class="fixed inset-y-0 pl-16 max-w-full right-0 flex">
                        <!--
                          Slide-over panel, show/hide based on slide-over state.

                          Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                            From: "translate-x-full"
                            To: "translate-x-0"
                          Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                            From: "translate-x-0"
                            To: "translate-x-full"
                        -->
                        <div class="w-screen max-w-md">
                            <form class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl">
                                <div class="flex-1 h-0 overflow-y-auto">
                                    <div class="py-6 px-4 bg-indigo-700 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <h2 class="text-lg font-medium text-white" id="slide-over-title">
                                                New Comment
                                            </h2>
                                            <div class="ml-3 h-7 flex items-center">
                                                <button @click="newcomment = false" type="button" class="bg-indigo-700 rounded-md text-indigo-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                                                    <span class="sr-only">Close panel</span>
                                                    <!-- Heroicon name: outline/x -->
                                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-1">
                                            <p class="text-sm text-indigo-300">
                                                Create a new comment by filling out the text box below.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex-1 flex flex-col justify-between">
                                        <div class="px-4 divide-y divide-gray-200 sm:px-6">
                                            <div class="space-y-6 pt-6 pb-5">
                                                <div>
                                                    <label for="project-name" class="block text-sm font-medium text-gray-900">
                                                        Project name
                                                    </label>
                                                    <div class="mt-1">
                                                        <input type="text" name="project-name" id="project-name" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="description" class="block text-sm font-medium text-gray-900">
                                                        Description
                                                    </label>
                                                    <div class="mt-1">
                                                        <textarea id="description" name="description" rows="4" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border border-gray-300 rounded-md"></textarea>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h3 class="text-sm font-medium text-gray-900">
                                                        Team Members
                                                    </h3>
                                                    <div class="mt-2">
                                                        <div class="flex space-x-2">
                                                            <a href="#" class="rounded-full hover:opacity-75">
                                                                <img class="inline-block h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Tom Cook">
                                                            </a>

                                                            <a href="#" class="rounded-full hover:opacity-75">
                                                                <img class="inline-block h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Whitney Francis">
                                                            </a>

                                                            <a href="#" class="rounded-full hover:opacity-75">
                                                                <img class="inline-block h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Leonard Krasner">
                                                            </a>

                                                            <a href="#" class="rounded-full hover:opacity-75">
                                                                <img class="inline-block h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Floyd Miles">
                                                            </a>

                                                            <a href="#" class="rounded-full hover:opacity-75">
                                                                <img class="inline-block h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Emily Selman">
                                                            </a>

                                                            <button type="button" class="flex-shrink-0 bg-white inline-flex h-8 w-8 items-center justify-center rounded-full border-2 border-dashed border-gray-200 text-gray-400 hover:text-gray-500 hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                <span class="sr-only">Add team member</span>
                                                                <!-- Heroicon name: solid/plus-sm -->
                                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <fieldset>
                                                    <legend class="text-sm font-medium text-gray-900">
                                                        Privacy
                                                    </legend>
                                                    <div class="mt-2 space-y-5">
                                                        <div class="relative flex items-start">
                                                            <div class="absolute flex items-center h-5">
                                                                <input id="privacy-public" name="privacy" aria-describedby="privacy-public-description" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" checked>
                                                            </div>
                                                            <div class="pl-7 text-sm">
                                                                <label for="privacy-public" class="font-medium text-gray-900">
                                                                    Public access
                                                                </label>
                                                                <p id="privacy-public-description" class="text-gray-500">
                                                                    Everyone with the link will see this project.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="relative flex items-start">
                                                                <div class="absolute flex items-center h-5">
                                                                    <input id="privacy-private-to-project" name="privacy" aria-describedby="privacy-private-to-project-description" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                                </div>
                                                                <div class="pl-7 text-sm">
                                                                    <label for="privacy-private-to-project" class="font-medium text-gray-900">
                                                                        Private to project members
                                                                    </label>
                                                                    <p id="privacy-private-to-project-description" class="text-gray-500">
                                                                        Only members of this project would be able to access.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="relative flex items-start">
                                                                <div class="absolute flex items-center h-5">
                                                                    <input id="privacy-private" name="privacy" aria-describedby="privacy-private-to-project-description" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                                </div>
                                                                <div class="pl-7 text-sm">
                                                                    <label for="privacy-private" class="font-medium text-gray-900">
                                                                        Private to you
                                                                    </label>
                                                                    <p id="privacy-private-description" class="text-gray-500">
                                                                        You are the only one able to access this project.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="pt-4 pb-6">
                                                <div class="flex text-sm">
                                                    <a href="#" class="group inline-flex items-center font-medium text-indigo-600 hover:text-indigo-900">
                                                        <!-- Heroicon name: solid/link -->
                                                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="ml-2">
                          Copy link
                        </span>
                                                    </a>
                                                </div>
                                                <div class="mt-4 flex text-sm">
                                                    <a href="#" class="group inline-flex items-center text-gray-500 hover:text-gray-900">
                                                        <!-- Heroicon name: solid/question-mark-circle -->
                                                        <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="ml-2">
                          Learn more about sharing
                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 px-4 py-4 flex justify-end">
                                    <button @click="newcomment = false" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Cancel
                                    </button>
                                    <button type="submit" class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>