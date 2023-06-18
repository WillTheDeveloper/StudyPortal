<x-new-user-layout>
    <div>
        <h3 class="text-base font-semibold leading-6 text-gray-900">Expenses overview</h3>
        <dl class="mt-5 grid grid-cols-1 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow md:grid-cols-3 md:divide-x md:divide-y-0">
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">Total Spend</dt>
                <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                        £{{$spendthismonth}}
                        <span class="ml-2 text-sm font-medium text-gray-500">from £{{$spendlastmonth}}</span>
                    </div>

                    <div class="inline-flex items-baseline rounded-full px-2.5 py-0.5 text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                        <svg class="-ml-1 mr-0.5 h-5 w-5 flex-shrink-0 self-center text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only"> Increased by </span>
                        {{$diffinspend}}%
                    </div>
                </dd>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">Total Income</dt>
                <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                        £{{$totalincome}}
                        <span class="ml-2 text-sm font-medium text-gray-500">from 56.14%</span>
                    </div>

                    <div class="inline-flex items-baseline rounded-full px-2.5 py-0.5 text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                        <svg class="-ml-1 mr-0.5 h-5 w-5 flex-shrink-0 self-center text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only"> Increased by </span>
                        2.02%
                    </div>
                </dd>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">Estimated leftover</dt>
                <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                        £{{$remaining}}
                        <span class="ml-2 text-sm font-medium text-gray-500">from 28.62%</span>
                    </div>

                    <div class="inline-flex items-baseline rounded-full px-2.5 py-0.5 text-sm font-medium bg-red-100 text-red-800 md:mt-2 lg:mt-0">
                        <svg class="-ml-1 mr-0.5 h-5 w-5 flex-shrink-0 self-center text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only"> Decreased by </span>
                        4.05%
                    </div>
                </dd>
            </div>
        </dl>
    </div>




    <div class="px-4 sm:px-1 lg:px-1 pt-6">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Spending by category</h1>
                <p class="mt-2 text-sm text-gray-700">A table of placeholder stock market data that does not make any sense.</p>
            </div>
            <div class="mt-4 sm:flex-none">
                <a href="{{route('expense.income.add')}}">
                    <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add income</button>
                </a>
            </div>
            <div class="mt-4 sm:flex-none pl-3">
                <a href="{{route('expense.purchase.add')}}">
                    <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add purchase</button>
                </a>
            </div>
            <div class="mt-4 sm:flex-none pl-3">
                <a href="{{route('expense.category.manage')}}">
                    <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit categories</button>
                </a>
            </div>
            <div class="mt-4 sm:flex-none pl-3">
                <a>
                    <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Manage cards</button>
                </a>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                        <tr>
                            <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Category</th>
                            {{--<th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Company</th>
                            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Share</th>--}}
                            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Percentage</th>
                            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Spend</th>
                            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Purchases</th>
                            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Last month</th>
                            <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-0">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($categories as $category)
                        <tr>
                            <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-0">{{$category->title}}</td>
                            {{--<td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">Chase &amp; Co.</td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">CAC</td>--}}
                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{round($spendthismonth > 0 ? $category->Purchase->sum('cost') / $spendthismonth * 100: 0, 2)}}%</td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">£{{$category->Purchase->sum('cost')}}</td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{$category->Purchase->count()}}</td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">£{{$category->Purchase->sum('cost')}}</td>
                            <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                <a href="{{route('expense.category.detail', $category->id)}}" class="text-indigo-600 hover:text-indigo-900">Details<span class="sr-only">, {{$category->title}}</span></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</x-new-user-layout>
