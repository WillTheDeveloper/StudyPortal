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
                    This is your timetable for this week! <br> (Current time: {{now()->locale('gb_uk')->format('H:i')}})

                    <br>

                    <x-button>Edit Timetable</x-button>

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

                                        @forelse(auth()->user()->Timetable()->get()->sortBy('start') as $timetable)
                                        <tr class="bg-white">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{$timetable->start->format('h:i')}} - {{$timetable->end->format('h:i')}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>{{$timetable->Subject->subject}}</b><br>
                                                {{$timetable->User->name}}<br>
                                                @isset($timetable->room)
                                                    Room {{$timetable->room}}
                                                @endisset
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>{{$timetable->Subject->subject}}</b><br>
                                                {{$timetable->User->name}}<br>
                                                @isset($timetable->room)
                                                    Room {{$timetable->room}}
                                                @endisset
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>{{$timetable->Subject->subject}}</b><br>
                                                {{$timetable->User->name}}<br>
                                                @isset($timetable->room)
                                                    Room {{$timetable->room}}
                                                @endisset
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>{{$timetable->Subject->subject}}</b><br>
                                                {{$timetable->User->name}}<br>
                                                @isset($timetable->room)
                                                    Room {{$timetable->room}}
                                                @endisset
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <b>{{$timetable->Subject->subject}}</b><br>
                                                {{$timetable->User->name}}<br>
                                                @isset($timetable->room)
                                                    Room {{$timetable->room}}
                                                @endisset
                                            </td>
                                            {{--<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            </td>--}}
                                        </tr>
                                        @empty
                                            <button type="button" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
                                                </svg>
                                                <span class="mt-2 block text-sm font-medium text-gray-900">
                                                    Create a new timetable
                                                  </span>
                                            </button>
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
</x-app-layout>
