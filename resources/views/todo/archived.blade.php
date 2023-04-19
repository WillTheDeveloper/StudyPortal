<x-new-user-layout>
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
                                    <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                                    <a href="{{route('todo.all')}}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Active</a>

                                    <a href="{{route('todo.completed')}}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Completed</a>

                                    <a href="{{route('todo.archived')}}" class="border-indigo-500 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">Archived</a>
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
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Deleted</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    <!-- Selected: "bg-gray-50" -->

                                    @foreach($archived as $a)
                                        <tr>
                                            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                            <td class="whitespace-nowrap py-4 pr-3 pl-3 text-sm font-medium text-gray-900">{{$a->task}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$a->details}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$a->deleted_at->diffForHumans()}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$a->created_at->diffForHumans()}}</td>
                                            <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <form action="{{route('todo.restore', $a->id)}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="text-indigo-600 hover:text-indigo-900">Restore</button>
                                                </form>
                                                <form action="{{route('todo.delete-archive', $a->id)}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete forever</button>
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
</x-new-user-layout>
