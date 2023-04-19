<x-new-user-layout>

    <div class="min-h-full" x-data="{newmodal:false}">


        <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-show="newmodal" x-cloak>
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0"></div>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 sm:pl-16">
                        <!--
                          Slide-over panel, show/hide based on slide-over state.

                          Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                            From: "translate-x-full"
                            To: "translate-x-0"
                          Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                            From: "translate-x-0"
                            To: "translate-x-full"
                        -->
                        <div class="pointer-events-auto w-screen max-w-2xl">
                            <form class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl" action="{{route('todo.new')}}" method="post">
                                @csrf
                                <div class="flex-1">
                                    <!-- Header -->
                                    <div class="bg-gray-50 px-4 py-6 sm:px-6">
                                        <div class="flex items-start justify-between space-x-3">
                                            <div class="space-y-1">
                                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">New task</h2>
                                                <p class="text-sm text-gray-500">Get started by filling in the information below to create your new task.</p>
                                            </div>
                                            <div class="flex h-7 items-center">
                                                <button type="button" class="text-gray-400 hover:text-gray-500" @click="newmodal = false">
                                                    <span class="sr-only">Close panel</span>
                                                    <!-- Heroicon name: outline/x-mark -->
                                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider container -->
                                    <div class="space-y-6 py-6 sm:space-y-0 sm:divide-y sm:divide-gray-200 sm:py-0">
                                        <!-- Project name -->
                                        <div class="space-y-1 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:space-y-0 sm:px-6 sm:py-5">
                                            <div>
                                                <label for="task" class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">Task</label>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <input type="text" name="task" id="task" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                        </div>

                                        <!-- Project description -->
                                        <div class="space-y-1 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:space-y-0 sm:px-6 sm:py-5">
                                            <div>
                                                <label for="additional" class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">Additional details</label>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <textarea id="additional" name="additional" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                            </div>
                                        </div>

                                        <div class="space-y-1 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:space-y-0 sm:px-6 sm:py-5">
                                            <div>
                                                <label for="duedate" class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">Due date</label>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <input type="date" name="duedate" id="duedate" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Action buttons -->
                                <div class="flex-shrink-0 border-t border-gray-200 px-4 py-5 sm:px-6">
                                    <div class="flex justify-end space-x-3">
                                        <button type="button" @click="newmodal = false" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
                                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="mt-8 flex flex-col">

                    <div class="pb-4">
                        <div class="sm:hidden">
                            <label for="tabs" class="sr-only">Select a tab</label>
                            <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                            <select id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option selected>Active</option>

                                <option>Completed</option>

                                <option>Archived</option>
                            </select>
                        </div>
                        <div class="hidden sm:block">
                            <div class="border-b border-gray-200">
                                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                    <button @click="newmodal = true" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">New</button>
                                    <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                                    <a href="{{route('todo.all')}}" class="border-indigo-500 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">Active</a>

                                    <a href="{{route('todo.completed')}}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Completed</a>

                                    <a href="{{route('todo.archived')}}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Archived</a>
                                </nav>
                            </div>
                        </div>
                    </div>


                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">

                                <table class="min-w-full table-fixed divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="min-w-[12rem] pl-3 py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">Task</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Details</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Due</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    <!-- Selected: "bg-gray-50" -->

                                    @foreach($all as $a)
                                        <tr>
                                            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                            <td class="whitespace-nowrap py-4 pr-3 pl-3 text-sm font-medium text-gray-900">{{$a->task}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$a->details}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$a->due->diffForHumans()}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$a->created_at->diffForHumans()}}</td>
                                            <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <form action="{{route('todo.mark-as-complete', $a->id)}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="text-indigo-600 hover:text-indigo-900">Mark as completed</button>
                                                </form>
                                                <br>
                                                <form action="{{route('todo.mark-as-archive', $a->id)}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
</x-new-user-layout>
