<x-new-user-layout>
            <main class="flex-1">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="flex h-full flex-col">
                                <header class="relative z-20 flex flex-none items-center justify-between border-b border-gray-200 py-4 px-6">
                                    <h1 class="text-lg font-semibold text-gray-900">
                                        Add lesson
                                    </h1>


                                </header>
                            </div>

                            <main class="max-w-lg mx-auto pt-10 pb-12 px-4 lg:pb-16">
                                <form action="{{ route('timetable.create') }}" method="post">
                                    @csrf
                                    <div class="space-y-6">
                                        <div>
                                            <h1 class="text-lg leading-6 font-medium text-gray-900">Add lesson to timetable</h1>
                                            <p class="mt-1 text-sm text-gray-500">Let’s get started by filling in the information below to add a lesson to the timetable</p>
                                        </div>

                                        <div>
                                            <label for="project-name" class="block text-sm font-medium text-gray-700"> Subject </label>
                                            <div class="mt-1">
                                                <div>
                                                    <select id="subject" name="subject" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                        @foreach($subjects as $s)
                                                            <option value="{{$s->id}}">{{$s->subject}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="weekday" class="block text-sm font-medium text-gray-700"> Weekday </label>
                                            <div class="mt-1">
                                                <div>
                                                    <select id="weekday" name="weekday" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                        <option selected value="Monday">Monday</option>
                                                        <option value="Tuesday">Tuesday</option>
                                                        <option value="Wednesday">Wednesday</option>
                                                        <option value="Thursday">Thursday</option>
                                                        <option value="Friday">Friday</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="room" class="block text-sm font-medium text-gray-700"> Room </label>
                                            <div class="mt-1">
                                                <div>
                                                    <input type="text" id="room" name="room">
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="start" class="block text-sm font-medium text-gray-700"> Start Time </label>
                                            <div class="mt-1">
                                                <div>
                                                    <input type="time" id="start" name="start">
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="end" class="block text-sm font-medium text-gray-700"> End time </label>
                                            <div class="mt-1">
                                                <div>
                                                    <input type="time" id="end" name="end">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex justify-end">
                                            <a href="{{ route('timetable') }}" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Cancel</a>
                                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Add to timetable</button>
                                        </div>
                                    </div>
                                </form>
                            </main>

                        </div>
                    </div>
                </div>
            </main>
</x-new-user-layout>
