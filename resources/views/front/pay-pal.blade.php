@extends('front.master')

@section('content')

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 my-5">

                <div class="container">
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script
                        src="https://www.paypal.com/sdk/js?client-id=AQJbHg-nkBSCgvY5gY0zJxRCNHKGGIpyFj30GxPkVb8WFI9Nie3iKrkPGY3wo9AgVqPSf5jzovOsA9DM&currency=USD">
                    </script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: {{ Session::get('price'); }} // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {

                             window.location.href="http://hotel_booking_management_system.test/payment/success?booking=${booking}";
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection
