<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('assignment.update', $assignment->id) }}" method="post">
                        @csrf
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="px-4 sm:px-0">
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 sm:px-6">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                            Edit Assignment
                                        </h3>
                                    </div>
                                    <div class="border-t border-gray-200">
                                        <dl>
                                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Subject
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    {{--                                                {{$assignment->Subject->subject}}--}}
                                                    <select name="subject-select">
                                                        <option selected value="{{$assignment->Subject->id}}">{{$assignment->Subject->subject}}</option>
                                                        @foreach($subjects as $subject)
                                                            <option value="{{$subject->id}}">{{$subject->subject}}</option>
                                                        @endforeach
                                                    </select>
                                                </dd>
                                            </div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Due for
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    {{$assignment->duedate->format('D d M Y - h:i')}}
                                                    {{--                                                <input name="duedate" type="date">--}}
                                                </dd>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Email address
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    margotfoster@example.com
                                                </dd>
                                            </div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Assignment Title
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <input name="title" type="text" value="{{$assignment->title}}">
                                                </dd>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Details
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <textarea name="details">{{$assignment->details}}</textarea>
                                                </dd>
                                            </div>
                                        </dl>
                                    </div>

                                </div>
                                <x-button type="submit">Update Assignment</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
