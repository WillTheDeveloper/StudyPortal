<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kanban') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="px-4 sm:px-0">
                            <h2 class="text-lg font-medium text-gray-900">Kanban</h2>

                            <x-button>
                                Edit Kanban
                            </x-button>

                            <form action="{{ route('kanban.delete', $kanban->id) }}" method="post">
                                @csrf
                                <x-button>
                                    Delete Kanban
                                </x-button>
                            </form>

                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    @foreach($groups as $group)
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        {{$group->group}} (id-{{$group->id}})
                                                    </th>
                                                    @endforeach
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($group->Item as $item)
                                                        <tr class="bg-white">

                                                            <td class="px-6 py-2">
                                                                <div class="w-full flex items-center justify-between p-3 space-x-6 border border-gray-500">
                                                                    <div class="flex-1 truncate">
                                                                        <div class="flex items-center space-x-3">
                                                                            <h3 class="text-gray-900 text-sm font-medium truncate">{{$item->item}}</h3>
                                                                            <span class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">(id = {{$item->id}})</span>
                                                                        </div>
                                                                        <p class="mt-1 text-gray-500 text-sm truncate">Added {{$item->created_at->diffForHumans()}}</p>
                                                                    </div>
                                                                </div>
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
    </div>
</x-app-layout>