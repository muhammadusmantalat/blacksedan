@extends('frontend.layout.app')
@section('title', 'index')
@section('content')
    <style>
        .form_content_page .input_style {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 5px;
            border: none;
            background: none;
            border-bottom: 2px solid white;
        }

        .form_content_page thead td {
            font-weight: 700;
        }
    </style>
    <!-- #pagetitle -->
    <div id="pagetitle" class="page-title bg-image">
        <div class="container">
            <div class="page-title-inner">
                <div class="page-title-holder">
                    <h1 class="page-title">Reservation Form</h1>
                </div>
                <ul class="ct-breadcrumb">
                    <li><a class="breadcrumb-entry" href="https://blacksedans.ca/">Black Sedan Limousine
                            Services</a></li>
                    <li><span class="breadcrumb-entry">Reservation Form</span></li>

                </ul>
            </div>
        </div>
    </div>
    <div id="content" class="site-content form_content_page">
        <div class="container">
            <form action="{{ route('confirmBooking') }}" method="POST" id="myForm">
                <input type="hidden" name="payment_option" id="payment_option" value="">
                @if ($tripType == 'one_way')
                    <div id="primary">
                        <div class="elementor-container elementor-column-gap-default">
                            @csrf
                            <div class="col-md-12 reserv-form">
                                <div class="elementor-widget-container ">
                                    <div class="ct-pricing-layout3" data-wow-delay="ms"
                                        style="background-color: #000; margin: 50px 0;">
                                        <div class="pricing-meta">
                                            <h3 class="pricing-title">Subtotal</h3>
                                        </div>
                                        <div class="pricing-price">CAD {{ number_format($totalAmount, 2, '.', '') }}<span></span>
                                        </div>
                                        <div class="small text-white my-3 px-3 text-center">
                                            <p class="mb-0"><strong>Tax and Gratuity Included!</strong></p>
                                            <p>Please Note: 5% GST and 15% Gratuity have been added to the total cost. Any additional charged will be applied at an hourly rate plus GST and Gratuity.</p>
                                        </div>
                                        
                                        <div class="pricing-holder">
                                            <ul class="pricing-feature">
                                                <li class=""><i class="fac fac-check"></i><strong>Distance:</strong>
                                                    {{ round($distance, 2) }} km</li>
                                                <li class=""><i class="fac fac-check"></i><strong>Airport
                                                        Pick-up:</strong>
                                                    {{ strtoupper($airPortpickup) }}
                                                </li>
                                                <li class=""><i class="fac fac-check"></i><strong>Base Price:</strong>
                                                    CAD {{ number_format($basePrice, 2, '.', '') }}
                                                </li>
                                                <li class=""><i class="fac fac-check"></i><strong>Airport
                                                        Charges:</strong>
                                                    CAD {{ number_format($airPortCharges ?? 0, 2, '.', '') }}
                                                </li>
                                                <li class=""><i class="fac fac-check"></i><strong>Trip Type:</strong>
                                                    @if ($tripType == 'one_way')
                                                        One Way Trip
                                                    @endif
                                                </li>
                                               @if (!empty(session('bookingData.flight_number')))
                                                    <li class=""><i class="fac fac-check"></i><strong>Flight Number:</strong>
                                                        {{ session('bookingData.flight_number') }}
                                                    </li>
                                                @endif

                                                <li class=""><i class="fac fac-check"></i><strong>Pick-up:</strong>
                                                    {{ $pickupLocation }}
                                                </li>
                                                <li class=""><i class="fac fac-check"></i><strong>Drop-off:</strong>
                                                    {{ $dropoffLocation }}</li>
                                            </ul>
                                            <p style="color:#fff; font-size: 12px;"><strong>Note:</strong> Payment will be
                                                charged 24 hours before the trip.</p>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="cwcc-button" style="width: 100%;"
                                                        onclick="setPaymentOption('no_card')">Confirm Without Credit
                                                        Card</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="cwthcc-button" style="width: 100%;"
                                                        onclick="setPaymentOption('with_card')">Confirm With Credit
                                                        Card</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div id="primary" class="col-12">
                        <div class="elementor-container elementor-column-gap-default">
                            @csrf
                            <div class="col-md-12 reserv-form">
                                <div class="elementor-widget-container ">
                                    <div class="ct-pricing-layout3" data-wow-delay="ms"
                                        style="background-color: #000; margin: 50px 0;">
                                        <div class="pricing-meta">
                                            <h3 class="pricing-title">Subtotal</h3>
                                        </div>
                                        <div class="pricing-price">
                                            CAD {{ number_format($totalAmount, 2, '.', '') }}<span></span>
                                        </div>
                                        @if($tripType == 'by_hour')
                                            <div class="small text-white my-3 px-3 text-center">
                                                <p class="mb-0"><strong>Tax and Gratuity Included!</strong></p>
                                                <p>Please Note: 5% GST and 15% Gratuity have been added to the total cost. Any additional charged will be applied at an hourly rate plus GST and Gratuity.</p>
                                            </div>
                                        @else
                                            <div class="small text-white my-3 px-3 text-center">
                                                <p class="mb-0"><strong>Tax and Gratuity Included!</strong></p>
                                                <p>Please Note: 5% GST and 15% Gratuity have been added to the total cost. Any additional charged will be applied at an hourly rate plus GST and Gratuity.</p>
                                            </div>
                                        @endif
                                        <div class="pricing-holder">
                                            <ul class="pricing-feature">
                                                <li class=""><i class="fac fac-check"></i><strong>Airport
                                                        Pick-up:</strong>
                                                    {{ strtoupper($airPortpickup) }}
                                                </li>
                                                <li class=""><i class="fac fac-check"></i><strong>Base Price:</strong>
                                                    CAD {{ number_format($basePrice, 2, '.', '') }}
                                                </li>
                                                <li class=""><i class="fac fac-check"></i><strong>Airport
                                                        Charges:</strong>
                                                    CAD {{ number_format($airPortCharges ?? 0, 2, '.', '') }}
                                                </li>
                                                <li class=""><i class="fac fac-check"></i><strong>Trip Type:</strong>
                                                    @if ($tripType == 'by_hour')
                                                        By Hours Trip
                                                    @endif
                                                </li>
                                                <li class=""><i class="fac fac-check"></i><strong>Hours
                                                        Duration:</strong>
                                                    {{ $hoursDuration }}
                                                </li>
                                               @if (!empty(session('bookingData.flight_number')))
                                                    <li class=""><i class="fac fac-check"></i><strong>Flight Number:</strong>
                                                        {{ session('bookingData.flight_number') }}
                                                    </li>
                                                @endif

                                                <li class=""><i class="fac fac-check"></i><strong>Pick-up:</strong>
                                                    {{ $pickupLocation }}
                                                </li>

                                            </ul>
                                            <p style="color:#fff; font-size: 12px;"><strong>Note:</strong> Payment will be
                                                charged 24 hours before the trip.</p>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="cwcc-button" style="width: 100%;"
                                                        onclick="setPaymentOption('no_card')">Confirm Without Credit
                                                        Card</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="cwthcc-button" style="width: 100%;"
                                                        onclick="setPaymentOption('with_card')">Confirm With Credit
                                                        Card</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </form>

        </div>
    </div>
@endsection
@section('js')

    <script>
        function setPaymentOption(option) {
            document.getElementById('payment_option').value = option;
        }
        $(document).ready(function() {
            $('.checkoption').click(function() {
                $('.checkoption').not(this).prop('checked', false);
            });
        });
        document.getElementById('myForm').addEventListener('submit', function(event) {
            var creditCardInput = document.getElementById('creditCard');
            var creditCardValue = creditCardInput.value;

            var regex = /^[\d]{4}-[\d]{4}-[\d]{4}-[\d]{4}$/;

            if (!regex.test(creditCardValue)) {
                alert('Invalid credit card format. Please use the format XXXXXXXXXXXXXXXX');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
@endsection
