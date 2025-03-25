<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Default styles for larger screens */
        .container {
            display: flex;
            flex-direction: row;
            /* Default layout for larger screens */
        }

        .block {
            width: 50%;
        }

        @media (max-width: 576px) {
            .major-container {
                padding: 20px !important;
            }

            .main-container {
                width: 100% !important;
                padding: 10px !important;
            }

            .container {
                flex-direction: column;
            }

            .block {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="major-container" style="background-color:#edf2f7; padding: 25px 50px; margin: 0px;">
        <p style="color: #3d4852; font-weight: bold; font-size: 1.2rem; text-align: center; margin: 0;">BlackSedan</p>
        <div style="display: flex; justify-content: center;">
            <div class="main-container" style="background: #fff; margin: 25px 0px; padding: 50px;">
                <div class="logo" style="width: 100%;">
                    <img src="https://blacksedans.ca/wp-content/uploads/2020/10/Black_Sedan_logo.png" alt="Company Logo"
                        height="50" width="auto">
                </div>
                <div class="container">
                    <div class="block">
                        <h5 style="color: #000; font-size: 1.25rem; font-weight: bold; margin-bottom: 14px;">Black Sedan
                        </h5>
                        <p style="margin: 8px 0; color: #000;">1608 Marlyn way NE, Calgary</p>
                        <p style="margin: 8px 0; color: #000;">+1 825-735-5538</p>
                        <p style="margin: 8px 0; color: #mailto:000;">info@blacksedans.ca</p>
                        <p style="margin: 8px 0; color: #000;">https://blacksedans.ca/</p>
                        <p style="margin: 8px 0; color: #000;">GST: 89950 4831 RT 0001</p>
                    </div>
                    <div class="block">
                        <h5 style="color: #000; font-size: 1.25rem; font-weight: bold; margin-bottom: 14px;">Booking
                            Confirmations:
                        </h5>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">Vehicle Type:
                            <span style="font-weight: 400;">{{ $booking->vehicle->name }}</span>
                        </p>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">Pickup Date:
                            <span style="font-weight: 400;">{{ $booking->pickup_date }}</span>
                        </p>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">Pickup Time:
                            <span style="font-weight: 400;">{{ $booking->pickup_time }}</span>
                        </p>
                        <p style="margin: 8px 0px; color:#000; font-weight: 600;">Trip Type:
                            <span style="font-weight: 400;">
                                {{ $booking->trip_type == 'by_hour' ? 'By Hour' : 'One Way' }}
                            </span>
                        </p>
                        <p style="margin: 8px 0px; color:#000; font-weight: 600;">Airport Pick-Up:
                            <span style="font-weight: 400;">
                                {{ $booking->airport_pickup == 'yes' ? 'Yes' : 'No' }}
                            </span>
                        </p>
                        <p style="margin: 8px 0px; color:#000; font-weight: 600;">Duration:
                            <span style="font-weight: 400;">
                                {{ $booking->duration_hours > 0 ? $booking->duration_hours . ' hours' : 'No Duration Found!' }}
                            </span>
                        </p>
                    </div>
                </div>
                <div style="height: 2px; background: #eee; margin: 15px 0 20px;"></div>
                <div class="container">
                    <div class="block">
                        <h5 style="color: #000; font-size: 1.25rem; font-weight: bold; margin: 0 0 14px;">Customer
                            Details:</h5>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">First Name:
                            <span style="font-weight: 400;">{{ $booking->first_name }}</span>
                        </p>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">Last Name:
                            <span style="font-weight: 400;">{{ $booking->last_name }}</span>
                        </p>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">Email:
                            <span style="font-weight: 400;">{{ $booking->email }}</span>
                        </p>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">Phone Number:
                            <span style="font-weight: 400;">{{ $booking->phone_number }}</span>
                        </p>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">Instruction:
                            <span style="font-weight: 400;">{{ $booking->instruction }}</span>
                        </p>
                    </div>
                    <div class="block">
                        <h5 style="color: #000; font-size: 1.25rem; font-weight: bold; margin: 0 0 14px;">Credit Card
                            Details:
                        </h5>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">Card Type:
                            <span style="font-weight: 400;">{{ $booking->card_type ?? 'No Information Found!' }}</span>
                        </p>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">Cardholder Name:
                            <span
                                style="font-weight: 400;">{{ $booking->card_holder_number ?? 'No Information Found!' }}</span>
                        </p>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">Card Number:

                            <span
                                style="font-weight: 400;">{{ $booking->card_number ?? 'No Information Found!' }}</span>

                        </p>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">Exp Month:
                            <span style="font-weight: 400;">{{ $booking->exp_month ?? 'No Information Found!' }}</span>
                        </p>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">Exp Year:
                            <span style="font-weight: 400;">{{ $booking->exp_year ?? 'No Information Found!' }}</span>
                        </p>
                        <p style="margin: 8px 0; color: #000; font-weight: 600;">CVV:
                            <span style="font-weight: 400;">{{ $booking->cvv ?? 'No Information Found!' }}</span>
                        </p>
                    </div>
                </div>
                <div style="margin: 18px 0;">
                    <div style="border: 1px solid black; width: 100%;">
                        <p
                            style="border-bottom: 1px solid black; background-color: #eee; font-weight: 700; padding: 8px 15px;">
                            Company</p>
                        <p style="color: #000; padding: 8px 15px;">
                            Meet Information: Complimentary airport meet and greet service. A chauffeur bearing a
                            printed meet
                            and
                            greet sign will meet in one of two places, depending on the flight. Domestic Arrivals:
                            Guests will
                            be
                            met just prior to baggage claim. International Arrivals: Guests will be met directly outside
                            of
                            Customs.
                        </p>
                    </div>
                </div>
                <div>
                    <p style="margin: 8px 0; color: #000; font-weight: 600;">Pickup Location:
                        <span style="font-weight: 400;">{{ $booking->pickup_location }}</span>
                    </p>
                    <p style="margin: 8px 0; color: #000; font-weight: 600;">Drop-Off Location:
                        <span
                            style="font-weight: 400;">{{ $booking->dropOff_location ?? 'No DropOff location Found!' }}</span>
                    </p>
                    @if (!empty($booking->flight_number))
                        <p style="margin: 8px 0px; color:#000; font-weight: 600;">Flight Number: <span
                            style="font-weight: 400;">{{ $booking->flight_number ?? 'No flight number location Found!' }}</span>
                        </p>
                    @endif
                </div>
                <div style="height: 2px; background: #eee; margin: 16px 0 17px;"></div>
                <div style="display: flex; justify-content: end; align-items: center;">
                    <h4
                        style="color: #000; width: 100%; text-align: right; font-size: 1.25rem; font-weight: bold; margin-bottom: 14px;">
                        Estimated Charges
                    </h4>
                </div>
                <div style="display: flex; justify-content: end;">
                    <div
                        style="flex-direction: column; justify-content: end; align-items: center; text-align:right;width:100%">
                        @if ($booking->trip_type == 'one_way')
                            <p
                                style="margin: 8px 0px; color:#000; font-weight: 600; padding-bottom: 5px; width:100%; text-align:right;">
                                Base Price: <span style="font-weight: 400;">CAD {{ round($booking->base_price, 2) }}</span>
                            </p>
                        @else
                            <p
                                style="margin: 8px 0px; color:#000; font-weight: 600; padding-bottom: 5px; width:100%; text-align:right;">
                                Base Price: <span
                                    style="font-weight: 400;">CAD {{ number_format($booking->base_price, 2, '.', '') }}</span>
                            </p>
                        @endif

                        @if ($booking->trip_type == 'one_way')
                            <p
                                style="margin: 8px 0px; color:#000; font-weight: 600; padding-bottom: 5px; width:100%; text-align:right;">
                                Per KM Price: <span
                                    style="font-weight: 400;">CAD {{ $booking->vehicle->price_per_kilometer }}</span>
                            </p>
                            <p
                                style="margin: 8px 0px; color:#000; font-weight: 600; padding-bottom: 5px; width:100%; text-align:right;">
                                Distance: <span
                                    style="font-weight: 400;">{{ round($booking->distance ?? 0, 2) }}</span>
                            </p>
                        @else
                            <p
                                style="margin: 8px 0px; color:#000; font-weight: 600; padding-bottom: 5px; width:100%; text-align:right;">
                                Duration: <span style="font-weight: 400;">
                                    {{ $booking->duration_hours > 0 ? $booking->duration_hours . ' hours' : 'No Duration Found!' }}</span>
                            </p>
                        @endif
                        <p
                            style="margin: 8px 0px; color:#000; font-weight: 600; padding-bottom: 5px; width:100%; text-align:right;">
                            Airport Charges: <span
                                style="font-weight: 400;">CAD {{ number_format($booking->air_port_charges ?? 0, 2, '.', '') }}
                            </span>
                        </p>
                        <p
                            style="margin: 8px 0px; color:#000; font-weight: 600; padding-bottom: 5px; width:100%; text-align:right;">
                            Subtotal: <span style="font-weight: 400;">
                            CAD {{ number_format($booking->subtotal ?? 0, 2, '.', '') }}
                            </span>
                        </p>

                        <p
                            style="margin: 8px 0px; color:#000; font-weight: 600; padding-bottom: 5px; width:100%; text-align:right;">
                            GST 5%:
                            <span style="font-weight: 400;">
                            CAD {{ number_format($booking->tax ?? 0, 2, '.', '') }}
                            </span>
                        </p>
                        
                        @if ($booking->trip_type == 'one_way')
                            <p
                                style="margin: 8px 0px; color:#000; font-weight: 600; padding-bottom: 5px; width:100%; text-align:right;">
                                Gratuity 15%: <span style="font-weight: 400;">
                                CAD {{ round($booking->gratuity ?? 0, 2) }}
                                </span>
                            </p>
                        @endif
                        <div style="height: 2px; background: #eee; margin-top: 15px; margin-bottom: 20px;"></div>
                        <p
                            style="margin: 8px 0px; color:#000; font-weight: 600; padding-bottom: 5px; width:100%; text-align:right;">
                            Total: <span
                                style="font-weight: 400;">CAD {{ number_format($booking->total_amount, 2, '.', '') }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <p style="text-align: center; font-size: 0.9rem; color: #b0adc5; width: 100%;">
            © 2024 BlackSedan. All rights reserved.
        </p>
    </div>
</body>

</html>
