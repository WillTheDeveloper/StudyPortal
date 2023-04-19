<x-new-user-layout>
            <main class="flex-1">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="flex h-full flex-col">
                                <header class="relative z-20 flex flex-none items-center justify-between border-b border-gray-200 py-4 px-6">
                                    <h1 class="text-lg font-semibold text-gray-900">
                                        <time datetime="2022-01">{{now()->monthName}} {{now()->year}}</time>
                                    </h1>
                                    <div class="flex items-center">
                                        <div class="hidden md:ml-4 md:flex md:items-center">
                                            <div class="ml-6 h-6 w-px bg-gray-300"></div>
                                            <a href="{{route('timetable.add')}}" type="button" class="focus:outline-none ml-6 rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add lesson</a>
                                        </div>
                                        <div class="relative ml-6 md:hidden">
                                            <div class="md:ml-4 md:flex md:items-center">
                                                <div class="ml-6 w-px bg-gray-300"></div>
                                                <a href="{{route('timetable.add')}}" type="button" class="focus:outline-none ml-6 rounded-md border border-transparent bg-indigo-600 py-1 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add lesson</a>
                                            </div>
                                        </div>
                                    </div>
                                </header>
                                <div class="px-4 sm:px-6 lg:px-8">
                                    <div class="mt-8 flex flex-col">
                                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                                    <table class="min-w-full">
                                                        <thead class="bg-white">
                                                        <tr>
                                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Subject</th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Room</th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Tutor</th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Start/End</th>
                                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                                <span class="sr-only">Edit</span>
                                                            </th>
                                                        </tr>
                                                        </thead>


                                                        <tbody class="bg-white">
                                                        <tr class="border-t border-gray-200">
                                                            <th colspan="5" scope="colgroup" class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">Monday</th>
                                                        </tr>

                                                        @foreach($monday->sortBy('start') as $m)
                                                            <tr class="border-t border-gray-300">
                                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$m->Subject->subject}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$m->room}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$m->start->format('h')}} - {{$m->end->format('h')}}</td>
                                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                        <tr class="border-t border-gray-200">
                                                            <th colspan="5" scope="colgroup" class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">Tuesday</th>
                                                        </tr>

                                                        @foreach($tuesday->sortBy('start') as $tu)
                                                            <tr class="border-t border-gray-300">
                                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$tu->Subject->subject}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$tu->room}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$tu->start->format('h')}} - {{$tu->end->format('h')}}</td>
                                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        <tr class="border-t border-gray-200">
                                                            <th colspan="5" scope="colgroup" class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">Wednesday</th>
                                                        </tr>

                                                        @foreach($wednesday->sortBy('start') as $w)
                                                            <tr class="border-t border-gray-300">
                                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$w->Subject->subject}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$w->room}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$w->start->format('h')}} - {{$w->end->format('h')}}</td>
                                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                        <tr class="border-t border-gray-200">
                                                            <th colspan="5" scope="colgroup" class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">Thursday</th>
                                                        </tr>

                                                        @foreach($thursday->sortBy('start') as $th)
                                                            <tr class="border-t border-gray-300">
                                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$th->Subject->subject}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$th->room}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$th->start->format('h')}} - {{$th->end->format('h')}}</td>
                                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                        <tr class="border-t border-gray-200">
                                                            <th colspan="5" scope="colgroup" class="bg-gray-50 px-4 py-2 text-left text-sm font-semibold text-gray-900 sm:px-6">Friday</th>
                                                        </tr>

                                                        @foreach($friday->sortBy('start') as $f)
                                                            <tr class="border-t border-gray-300">
                                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$f->Subject->subject}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$f->room}}</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">#</td>
                                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$f->start->format('h')}} - {{$f->end->format('h')}}</td>
                                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

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
            </main>
</x-new-user-layout>
