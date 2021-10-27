<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscribe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Here you can subscribe for a Study Portal student licence.

                    <div>
                        <div class="max-w-2xl mx-auto pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                            <h2 class="sr-only">Checkout</h2>

                            <form action="{{ route('subscribe') }}" method="post" id="form" class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                                @csrf
                                <div>
                                    <!-- Payment -->
                                    <div class="mt-10 border-t border-gray-200 pt-10">
                                        <h2 class="text-lg font-medium text-gray-900">Details</h2>

                                        <div class="mt-6 grid grid-cols-4 gap-y-6 gap-x-4">

                                            <div class="col-span-4">
                                                <label for="card-holder-name" class="block text-sm font-medium text-gray-700">Name on card</label>
                                                <div class="mt-1">
                                                    <input type="text" id="card-holder-name" name="name-on-card" autocomplete="cc-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mt-10 border-t border-gray-200 pt-10">
                                        <fieldset>
                                            <legend class="text-lg font-medium text-gray-900">
                                                Select subscription type
                                            </legend>

                                            <div class="flex flex-row space-x-12 p-4">
                                                <label class="relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none w-full">
                                                    <input type="radio" name="stripe" value="price_1JiiBJDEx6ZR0UQMWtdBytdf" class="absolute top-5 right-5 text-indigo-600" />
                                                    <div class="flex-1 flex">
                                                        <div class="flex flex-col">
                                                            <span id="delivery-method-0-label" class="block text-sm font-medium text-gray-900"> Monthly </span>
                                                            <span id="delivery-method-0-description-0" class="mt-1 flex items-center text-sm text-gray-500"> Charged every month </span>
                                                            <span id="delivery-method-0-description-1" class="mt-6 text-sm font-medium text-gray-900"> £2.00 per month </span>
                                                        </div>
                                                    </div>
                                                </label>

                                                <label class="relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none w-full">
                                                    <input type="radio" name="stripe" value="price_1JiiBTDEx6ZR0UQMy05iqT0h" class="absolute top-5 right-5 text-indigo-600" />
                                                    <div class="flex-1 flex">
                                                        <div class="flex flex-col">
                                                            <span id="delivery-method-1-label" class="block text-sm font-medium text-gray-900"> Yearly </span>
                                                            <span id="delivery-method-1-description-0" class="mt-1 flex items-center text-sm text-gray-500"> 365 days </span>
                                                            <span id="delivery-method-1-description-1" class="mt-6 text-sm font-medium text-gray-900"> £20.00 </span>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>

                                        </fieldset>
                                    </div>

                                    <label for="card-element">Card details</label>
                                    <div id="card-element"></div>


                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="card-button" data-secret="{{ $intent->client_secret }}">
                                        Subscribe
                                    </button>


                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>






@push('scripts')
        <script src="https://js.stripe.com/v3/"></script>

        <script>
            const stripe = Stripe('pk_test_51JigTbDEx6ZR0UQMON8747rMqwu9GZnTq8qSdCgeDcPIeHKLAvbMBgkDkchp7rpcvaMWcHvvC2flJYTTOrr6iZQM00GLOiFPcK');

            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');

            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;

            cardButton.addEventListener('click', async (e) => {
                const { setupIntent, error } = await stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: { name: cardHolderName.value }
                        }
                    }
                );

                if (error) {
                    // Error stuff
                } else {
                    console.log(stripe.paymentMethod.id());
                }
            });
        </script>
    @endpush()

</x-app-layout>