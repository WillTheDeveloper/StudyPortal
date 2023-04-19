<x-new-user-layout>
            <div class="px-5 py-5">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Manage your webhooks</h3>
                        <div class="mt-2 max-w-xl text-sm text-gray-500">
                            <p>Here you can create and manage your {{auth()->user()->Webhook()->count()}} webhooks.</p>
                        </div>
                        <div class="mt-5">
                            <a href="{{route('webhook.all')}}" type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm">Manage webhooks</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-5">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Delete your account</h3>
                        <div class="mt-2 max-w-xl text-sm text-gray-500">
                            <p>Once you delete your account, you will lose all data associated with it.</p>
                        </div>
                        <div class="mt-5">
                            <a href="{{route('user.confirm-delete')}}" type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm">Delete account</a>
                        </div>
                    </div>
                </div>
            </div>
</x-new-user-layout>
