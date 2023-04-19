<x-new-user-layout>
            <main class="flex-1">
                <form method="post" action="{{ route('user.update', $user->id) }}">
                    @csrf
                <!-- Page title & actions -->
                <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="flex-1 min-w-0">
                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                            Manage User
                        </h1>
                    </div>
                    <div class="mt-4 flex sm:mt-0 sm:ml-4">
                        {{--<button type="button"
                                class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
                            Share
                        </button>--}}
                        <button type="submit"
                                class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                            Update
                        </button>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                {{--                    Manage users--}}

                <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                    <div>
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">User Information</h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
                                        </div>
                                        <div class="mt-5 border-t border-gray-200">
                                            <dl class="sm:divide-y sm:divide-gray-200">
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Full name</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->name}}</dd>
                                                </div>
                                                @isset($user->username)
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Username</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->username}}</dd>
                                                </div>
                                                @endisset
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Email address</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->email}}</dd>
                                                </div>
                                                @isset($user->Institution()->institution)
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Institution</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->Institution->institution}}</dd>
                                                </div>
                                                @endisset
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Account created</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->created_at->format('h:m - n D M Y')}}</dd>
                                                </div>
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Posts created</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->Post->count()}}</dd>
                                                </div>
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Comments created</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->Comment->count()}}</dd>
                                                </div>
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Reports associated</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->Report->count()}}</dd>
                                                </div>
                                                @isset($user->bio)
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Bio</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->bio}}</dd>
                                                </div>
                                                @endisset
                                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                    <dt class="text-sm font-medium text-gray-500">Permission level</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        <fieldset class="space-y-5">
                                                            <legend class="sr-only">Permission level</legend>
                                                            <div class="relative flex items-start">
                                                                <div class="flex items-center h-5">
                                                                    <input id="tutor" @checked(old('tutor', $user->is_tutor)) aria-describedby="comments-description" name="tutor" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                </div>
                                                                <div class="ml-3 text-sm">
                                                                    <label for="tutor" class="font-medium text-gray-700">Tutor</label>
                                                                    <p id="comments-description" class="text-gray-500">This user is a tutor for a college</p>
                                                                </div>
                                                            </div>
                                                            <div class="relative flex items-start">
                                                                <div class="flex items-center h-5">
                                                                    <input id="moderator" @checked(old('moderator', $user->is_moderator)) aria-describedby="candidates-description" name="moderator" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                </div>
                                                                <div class="ml-3 text-sm">
                                                                    <label for="moderator" class="font-medium text-gray-700">Moderator</label>
                                                                    <p id="candidates-description" class="text-gray-500">Moderate the content</p>
                                                                </div>
                                                            </div>
                                                            <div class="relative flex items-start">
                                                                <div class="flex items-center h-5">
                                                                    <input id="admin" @checked(old('admin', $user->is_admin)) aria-describedby="offers-description" name="admin" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                </div>
                                                                <div class="ml-3 text-sm">
                                                                    <label for="admin" class="font-medium text-gray-700">Admin</label>
                                                                    <p id="offers-description" class="text-gray-500">Manage the platform</p>
                                                                </div>
                                                            </div>
                                                            <div class="relative flex items-start">
                                                                <div class="flex items-center h-5">
                                                                    <input id="banned" @checked(old('banned', $user->is_banned)) aria-describedby="offers-description" name="banned" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                </div>
                                                                <div class="ml-3 text-sm">
                                                                    <label for="banned" class="font-medium text-red-600">Banned</label>
                                                                    <p id="offers-description" class="text-red-400">Restrict user</p>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </main>
</x-new-user-layout>
