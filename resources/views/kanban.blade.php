<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kanban') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="px-4 sm:px-0">
                            <h2 class="text-lg font-medium text-gray-900">My Kanbans</h2>

                            <a href="{{ route('kanban.create') }}">
                            <x-button>
                                Create Kanban
                            </x-button>
                            </a>

                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Description
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Status
                                                    </th>
                                                    <th scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                @forelse($kanban as $item)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{$item->name}}
                                                                </div>
                                                                <div class="text-sm text-gray-500">
                                                                    Created at: {{$item->created_at->diffForHumans()}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{$item->description}}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                          Active
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="{{ route('kanban.view', $item->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                                    </td>
                                                </tr>
                                                @empty
                                                    <!-- This example requires Tailwind CSS v2.0+ -->
                                                    <div>
                                                        <ul role="list" class="mt-6 border-t border-b border-gray-200 py-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
                                                            <li class="flow-root">
                                                                <div class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                                                    <div class="flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-lg bg-pink-500">
                                                                        <!-- Heroicon name: outline/view-list -->
                                                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="text-sm font-medium text-gray-900">
                                                                            <a href="#" class="focus:outline-none">
                                                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                                                Create a List<span aria-hidden="true"> &rarr;</span>
                                                                            </a>
                                                                        </h3>
                                                                        <p class="mt-1 text-sm text-gray-500">Another to-do system you’ll try but eventually give up on.</p>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li class="flow-root">
                                                                <div class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                                                    <div class="flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-lg bg-yellow-500">
                                                                        <!-- Heroicon name: outline/calendar -->
                                                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="text-sm font-medium text-gray-900">
                                                                            <a href="#" class="focus:outline-none">
                                                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                                                Create a Calendar<span aria-hidden="true"> &rarr;</span>
                                                                            </a>
                                                                        </h3>
                                                                        <p class="mt-1 text-sm text-gray-500">Stay on top of your deadlines, or don’t — it’s up to you.</p>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li class="flow-root">
                                                                <div class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                                                    <div class="flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-lg bg-green-500">
                                                                        <!-- Heroicon name: outline/photograph -->
                                                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="text-sm font-medium text-gray-900">
                                                                            <a href="#" class="focus:outline-none">
                                                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                                                Create a Gallery<span aria-hidden="true"> &rarr;</span>
                                                                            </a>
                                                                        </h3>
                                                                        <p class="mt-1 text-sm text-gray-500">Great for mood boards and inspiration.</p>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li class="flow-root">
                                                                <div class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                                                    <div class="flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-lg bg-blue-500">
                                                                        <!-- Heroicon name: outline/view-boards -->
                                                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="text-sm font-medium text-gray-900">
                                                                            <a href="#" class="focus:outline-none">
                                                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                                                Create a Board<span aria-hidden="true"> &rarr;</span>
                                                                            </a>
                                                                        </h3>
                                                                        <p class="mt-1 text-sm text-gray-500">Track tasks in different stages of your project.</p>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li class="flow-root">
                                                                <div class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                                                    <div class="flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-lg bg-indigo-500">
                                                                        <!-- Heroicon name: outline/table -->
                                                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="text-sm font-medium text-gray-900">
                                                                            <a href="#" class="focus:outline-none">
                                                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                                                Create a Spreadsheet<span aria-hidden="true"> &rarr;</span>
                                                                            </a>
                                                                        </h3>
                                                                        <p class="mt-1 text-sm text-gray-500">Lots of numbers and things — good for nerds.</p>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li class="flow-root">
                                                                <div class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                                                    <div class="flex-shrink-0 flex items-center justify-center h-16 w-16 rounded-lg bg-purple-500">
                                                                        <!-- Heroicon name: outline/clock -->
                                                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="text-sm font-medium text-gray-900">
                                                                            <a href="#" class="focus:outline-none">
                                                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                                                Create a Timeline<span aria-hidden="true"> &rarr;</span>
                                                                            </a>
                                                                        </h3>
                                                                        <p class="mt-1 text-sm text-gray-500">Get a birds-eye-view of your procrastination.</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>