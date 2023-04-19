<x-new-user-layout>
            <main class="flex-1">
                <!-- Page title & actions -->
                <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="flex-1 min-w-0">
                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                            Your notifications
                        </h1>
                    </div>
                    <div class="mt-4 flex sm:mt-0 sm:ml-4">
                        <form method="post" action="{{ route('notifications.markallasread') }}">
                            @csrf
                            <button type="submit"
                                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                                Mark all as read
                            </button>
                        </form>
                    </div>
                </div>

                <ul role="list" class="divide-y divide-gray-200">
                    @forelse($notify as $notification)
                        <li class="relative bg-white py-5 px-4 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                            <div class="flex justify-between space-x-3">
                                <div class="min-w-0 flex-1">
                                    <a href="#" class="block focus:outline-none">
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        <p class="text-sm font-medium text-gray-900 truncate">{{json_encode($notification->data['title'])}}</p>
                                        <p class="text-sm text-gray-500 truncate">{{json_encode($notification->data['user'], true)}}</p>
                                    </a>
                                </div>
                                <time datetime="2021-01-27T16:35" class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">
                                    {{$notification->created_at->diffForHumans()}}</time>
                            </div>
                            <div class="mt-1">
                                <p class="line-clamp-2 text-sm text-gray-600">{{json_encode($notification->data['body'])}}</p>
                            </div>
                        </li>
                    @empty
                        <div class="text-center pt-4">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No notifications</h3>
                            <p class="mt-1 text-sm text-gray-500">Your all caught up!</p>
                        </div>
                    @endforelse
                </ul>
            </main>
</x-new-user-layout>
