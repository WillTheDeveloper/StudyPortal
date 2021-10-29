<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timetable') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    This is your timetable for this week!

                    {{--@foreach(auth()->user()->Timetable() as $slot)
                        <p>{{$slot->name}}</p>
                    @endforeach--}}



                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Time
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Monday
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tuesday
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Wednesday
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Thursday
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Friday
                                            </th>
                                            {{--<th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>--}}
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr class="bg-white">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                9:00 -> 10:00
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            {{--<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            </td>--}}
                                        </tr>

                                        <tr class="bg-white">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                10:00 -> 11:00
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                        </tr>

                                        <tr class="bg-white">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                11:00 -> 12:00
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                        </tr>

                                        <tr class="bg-white">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                12:00 -> 13:00
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                        </tr>

                                        <tr class="bg-white">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                13:00->14:00
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>Computer Science</b><br>
                                                Laura<br>
                                                Room 251
                                            </td>
                                        </tr>

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
</x-app-layout>
