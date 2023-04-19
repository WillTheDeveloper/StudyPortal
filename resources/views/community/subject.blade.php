<x-new-user-layout>
    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
            <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                <nav aria-label="Sidebar" class="sticky top-4 divide-y divide-gray-300">
                    <div class="pb-8 space-y-1">
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

                        <a href="#"
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

                        <a href="#"
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

                        <a href="#"
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
            <main class="lg:col-span-9 xl:col-span-6">
                <div class="px-4 sm:px-0">
                    <div class="sm:hidden">
                        <label for="question-tabs" class="sr-only">Select a tab</label>
                        <select id="question-tabs"
                                class="block w-full rounded-md border-gray-300 text-base font-medium text-gray-900 shadow-sm focus:border-rose-500 focus:ring-rose-500">
                            <option selected>Recent</option>

                            <option>Most Liked</option>

                            <option>Most Answers</option>
                        </select>
                    </div>
                    <div class="hidden sm:block">
                        <nav class="relative z-0 rounded-lg shadow flex divide-x divide-gray-200" aria-label="Tabs">
                            <!-- Current: "text-gray-900", Default: "text-gray-500 hover:text-gray-700" -->
                            <a href="#" aria-current="page"
                               class="text-gray-900 rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center hover:bg-gray-50 focus:z-10">
                                <span>Recent</span>
                                <span aria-hidden="true" class="bg-rose-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                            </a>

                            <a href="#"
                               class="text-gray-500 hover:text-gray-700 group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center hover:bg-gray-50 focus:z-10">
                                <span>Most Liked</span>
                                <span aria-hidden="true"
                                      class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>
                            </a>

                            <a href="#"
                               class="text-gray-500 hover:text-gray-700 rounded-r-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center hover:bg-gray-50 focus:z-10">
                                <span>Most Answers</span>
                                <span aria-hidden="true"
                                      class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>
                            </a>
                        </nav>
                    </div>
                </div>
                <div class="mt-4">
                    <h1 class="sr-only">Recent questions</h1>
                    <ul role="list" class="space-y-4">
                        @forelse($posts as $post)
                            <li class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg" x-data="{dropdown: false}">
                                <article aria-labelledby="question-title-81614">
                                    <div>
                                        <div class="flex space-x-3">
                                            <div class="flex-shrink-0">
                                                <img class="h-10 w-10 rounded-full"
                                                     src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                     alt="">
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <p class="text-sm font-medium text-gray-900">
                                                    <a href="{{ route('community.profile', $post->User->id) }}" class="hover:underline">{{$post->User->name}}</a>
                                                </p>
                                                <p class="text-sm text-gray-500">
                                                    <a href="{{ route('community.post', $post->id) }}" class="hover:underline">
                                                        <time datetime="{{$post->created_at}}">Posted {{$post->created_at->diffForHumans()}} on <a href="{{ route('community.subject', $post->Subject->id) }}"><b>{{$post->Subject->subject}}</b></a></time>
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="flex-shrink-0 self-center flex">
                                                <div class="relative inline-block text-left">
                                                    <div>
                                                        <button @click="dropdown = true" @click.away="dropdown = false" type="button"
                                                                class="-m-2 p-2 rounded-full flex items-center text-gray-400 hover:text-gray-600"
                                                                id="options-menu-0-button" aria-expanded="false"
                                                                aria-haspopup="true">
                                                            <span class="sr-only">Open options</span>
                                                            <!-- Heroicon name: solid/dots-vertical -->
                                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
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
                                                    <div x-show="dropdown" x-cloak class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                         role="menu" aria-orientation="vertical"
                                                         aria-labelledby="options-menu-0-button" tabindex="-1">
                                                        <div class="py-1" role="none">
                                                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                            <a href="#" class="text-gray-700 flex px-4 py-2 text-sm"
                                                               role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                                                <!-- Heroicon name: solid/star -->
                                                                <svg class="mr-3 h-5 w-5 text-gray-400"
                                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                     fill="currentColor" aria-hidden="true">
                                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                                </svg>
                                                                <span>Add to favorites</span>
                                                            </a>
                                                            <a href="#" class="text-gray-700 flex px-4 py-2 text-sm"
                                                               role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                                                <!-- Heroicon name: solid/code -->
                                                                <svg class="mr-3 h-5 w-5 text-gray-400"
                                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                     fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                          d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                                                          clip-rule="evenodd"/>
                                                                </svg>
                                                                <span>Embed</span>
                                                            </a>
                                                            <a href="#" class="text-gray-700 flex px-4 py-2 text-sm"
                                                               role="menuitem" tabindex="-1" id="options-menu-0-item-2">
                                                                <!-- Heroicon name: solid/flag -->
                                                                <svg class="mr-3 h-5 w-5 text-gray-400"
                                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                     fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                          d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                                                          clip-rule="evenodd"/>
                                                                </svg>
                                                                <span>Report content</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 id="question-title-81614" class="mt-4 text-base font-medium text-gray-900">
                                            {{$post->title}}
                                        </h2>
                                    </div>
                                    <div class="mt-2 text-sm text-gray-700 space-y-4">
                                        <p>{{$post->body}}</p>
                                    </div>
                                    <div class="mt-6 flex justify-between space-x-8">
                                        <div class="flex space-x-6">
                                            <span class="inline-flex items-center text-sm">
                                              <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                <!-- Heroicon name: solid/thumb-up -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                     aria-hidden="true">
                                                  <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                                </svg>
                                                <span class="font-medium text-gray-900">{{$post->Like()->count()}}</span>
                                                <span class="sr-only">likes</span>
                                              </button>
                                            </span>
                                            <span class="inline-flex items-center text-sm">
                                                  <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                    <!-- Heroicon name: solid/chat-alt -->
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                         aria-hidden="true">
                                                      <path fill-rule="evenodd"
                                                            d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                            clip-rule="evenodd"/>
                                                    </svg>
                                                    <span class="font-medium text-gray-900">{{$post->Comments()->count()}}</span>
                                                    <span class="sr-only">comments</span>
                                                  </button>
                                                </span>
                                            <span class="inline-flex items-center text-sm">
                                              <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                <!-- Heroicon name: solid/eye -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                     aria-hidden="true">
                                                  <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                  <path fill-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd"/>
                                                </svg>
                                                <span class="font-medium text-gray-900">1</span>
                                                <span class="sr-only">views</span>
                                              </button>
                                            </span>
                                        </div>
                                        <div class="flex text-sm">
                                            <span class="inline-flex items-center text-sm">
                                              <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                <!-- Heroicon name: solid/share -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                     aria-hidden="true">
                                                  <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                                                </svg>
                                                <span class="font-medium text-gray-900">Share</span>
                                              </button>
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            </li>

                            @empty

                            <span class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{--<svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
                                </svg>--}}
                                <span class="mt-2 block text-sm font-medium text-gray-900">
                                No posts here yet
                              </span>
                            </span>

                    @endforelse

                    <!-- More questions... -->
                    </ul>
                </div>
            </main>
        </div>
    </div>
</x-new-user-layout>
