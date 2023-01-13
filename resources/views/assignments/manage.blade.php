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

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="px-4 sm:px-0">
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                <div class="px-4 py-5 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Manage Assignment
                                    </h3>
                                </div>
                                <div class="border-t border-gray-200">
                                    <dl>
                                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Subject
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$assignment->Subject->subject}}
                                            </dd>
                                        </div>
                                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Due for
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$assignment->duedate->format('D d M Y - h:i')}}
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
                                                Assignment
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$assignment->title}}
                                            </dd>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Details
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$assignment->details}}
                                            </dd>
                                        </div>
                                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Attachments
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                        <div class="w-0 flex-1 flex items-center">
                                                            <!-- Heroicon name: solid/paper-clip -->
                                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                                            </svg>
                                                            <span class="ml-2 flex-1 w-0 truncate">
                                                              resume_back_end_developer.pdf
                                                            </span>
                                                        </div>
                                                        <div class="ml-4 flex-shrink-0">
                                                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                                Download
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                        <div class="w-0 flex-1 flex items-center">
                                                            <!-- Heroicon name: solid/paper-clip -->
                                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                                            </svg>
                                                            <span class="ml-2 flex-1 w-0 truncate">
                                                              coverletter_back_end_developer.pdf
                                                            </span>
                                                        </div>
                                                        <div class="ml-4 flex-shrink-0">
                                                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                                Download
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </dd>
                                        </div>
                                    </dl>
                                </div>

                                @if (!auth()->user()->is_tutor)
                                    <x-button>Upload work</x-button>
                                @endif

                                @if (auth()->user()->is_tutor)
                                    <a href="{{ route('assignment.edit', $assignment->id) }}">
                                        <x-button>Edit Assignment</x-button>
                                    </a>

                                    <form action="{{ route('assignment.delete', $assignment->id) }}" method="post">
                                        @csrf
                                        <x-button>Delete Assignment</x-button>
                                    </form>

                                @endif
                            </div>

                        </div>

                        @if (auth()->user()->is_tutor)
                        <br>

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Submitted
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">View</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($assignment->User as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$user->name}}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{$user->email}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if (isset($user->submitted_at))
                                        <div class="text-sm text-gray-900">Submitted</div>
                                        <div class="text-sm text-gray-500">At: {{$user->submitted_at}}</div>
                                    @else
                                        <div class="text-sm text-gray-900">Not submitted</div>
                                        <div class="text-sm text-gray-500">N/A</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($user->pivot->has_seen)
                                        @case('0')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Not seen
                                        </span>
                                        @break
                                        @case('1')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Seen
                                        </span>
                                        @break
                                        @default
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            Unknown
                                        </span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">View</a>
                                </td>
                            </tr>
                            @endforeach



                            <!-- More people... -->
                            </tbody>
                        </table>

                        <br>

                        <x-button>Add Student</x-button>
                        <x-button>Remove Student</x-button>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
