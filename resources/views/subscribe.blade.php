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

                    <form action="{{ route('subscribe') }}" method="post" id="form">
                        @csrf
                        <input hidden name="pm" id="pm" value="">
                        <input type="radio" name="stripe" id="monthly" value="price_1JiiBJDEx6ZR0UQMWtdBytdf" checked>
                        <label for="monthly">Monthly Subscription</label>
                        <br>
                        <input type="radio" name="stripe" id="yearly" value="price_1JiiBTDEx6ZR0UQMy05iqT0h">
                        <label for="yearly">Yearly Subscription</label>
                        <br>

                        <label for="card-holder-name">Cardholder name</label>
                        <br>
                        <input id="card-holder-name" type="text">

                        <br>
                        <label for="card-element">Card details</label>
                        <br>
                        <!-- Stripe Elements Placeholder -->
                        <div id="card-element"></div>

                        <button id="card-button" data-secret="{{ $intent->client_secret }}">
                            Subscribe
                        </button>
                    </form>
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
                    let boop = setupIntent.payment_method;
                    /*let pm =  document.getElementById('pm');
                    pm.value = boop.value;*/
                }
            });
        </script>
    @endpush()

</x-app-layout>