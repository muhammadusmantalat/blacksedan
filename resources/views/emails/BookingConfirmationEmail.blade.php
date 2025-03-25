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
                display: flex;
                flex-direction: column;
            }

            .block {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="major-container" style="background-color:#edf2f7; padding: 25px 90px; margin: 0px;">
        <p style="color: #3d4852; font-weight: bold; font-size: 1.2rem; text-align: center; margin: 0;">BlackSedan</p>
        <div class="main-container" style="background: #fff; margin: 25px auto; padding: 50px;"
            class="justify-content-center text-center">
            <div class="logo" style="margin-bottom: 12px;width:100%">
                <img src="https://blacksedans.ca/wp-content/uploads/2020/10/Black_Sedan_logo.png" alt="Company Logo"
                    height="50" width="auto">
            </div>
            <div class="container">
                <div class="block">
                    <h5 style="color: #000; font-size: 1.25rem; font-weight: bold; margin-bottom: 14px;">Black Sedan
                    </h5>
                    <p style="margin: 8px 0px; color:#000;">1608 Marlyn way NE, Calgary</p>
                    <p style="margin: 8px 0px; color:#000;">+1 825-735-5538</p>
                    <p style="margin: 8px 0px; mailto:color:#000;">info@blacksedans.ca</p>
                    <p style="margin: 8px 0px; color:#000;">https://blacksedans.ca/</p>
                    <p style="margin: 8px 0px; color:#000;">GST: 89950 4831 RT 0001</p>
                </div>
                <div class="block" style="width: 50%;">
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
            <div style="height: 2px; background: #eee; margin-top: 15px; margin-bottom: 20px;"></div>
            <div class="container">
                <div class="block">
                    <h5 style="color: #000; font-size: 1.25rem; font-weight: bold; margin-top:0; margin-bottom: 14px;">
                        Customer
                        Details:</h5>
                    <p style="margin: 8px 0px; color:#000; font-weight: 600;">First Name: <span
                            style="font-weight: 400;">{{ $booking->first_name }}</span></p>
                    <p style="margin: 8px 0px; color:#000; font-weight: 600;">Last Name: <span
                            style="font-weight: 400;">{{ $booking->last_name }}</span></p>
                    <p style="margin: 8px 0px; color:#000; font-weight: 600;">Email: <span
                            style="font-weight: 400;">{{ $booking->email }}</span></p>
                    <p style="margin: 8px 0px; color:#000; font-weight: 600;">Phone Number: <span
                            style="font-weight: 400;">{{ $booking->phone_number }}</span></p>
                    <p style="margin: 8px 0px; color:#000; font-weight: 600;">Instruction: <span
                            style="font-weight: 400;">{{ $booking->instruction }}</span></p>
                </div>
                <div class="block" class="credit">
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

                        <span style="font-weight: 400;">{{ $booking->card_number ?? 'No Information Found!' }}</span>

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
            <div style="margin: 18px 0px;">
                <div style="border: 1px solid black; width: 100%;">
                    <p
                        style="border-bottom: 1px solid black; background-color: #eee; font-weight: 700; padding: 8px 15px;">
                        Company</p>
                    <p style="color:#000; padding: 8px 15px;"> Meet Information: Complimentary airport meet and greet
                        service. A
                        chauffeur bearing a printed meet and greet sign will meet in one of two places, depending on the
                        flight.
                        Domestic Arrivals: Guests will be met just prior to baggage claim. International Arrivals:
                        Guests
                        will
                        be met directly outside of Customs. </p>
                </div>
            </div>
            <div>
                <p style="margin: 8px 0px; color:#000; font-weight: 600;">Pickup Location: <span
                        style="font-weight: 400;">{{ $booking->pickup_location }}</span></p>
                <p style="margin: 8px 0px; color:#000; font-weight: 600;">Drop-Off Location: <span
                        style="font-weight: 400;">{{ $booking->dropOff_location ?? 'No DropOff location Found!' }}</span>
                </p>
                @if (!empty($booking->flight_number))
                    <p style="margin: 8px 0px; color:#000; font-weight: 600;">Flight Number: <span
                        style="font-weight: 400;">{{ $booking->flight_number ?? 'No flight number location Found!' }}</span>
                    </p>
                @endif
            </div>
            <div style="height: 2px; background: #eee; margin-bottom: 17px; margin-top: 16px;"></div>
            <div style="display: flex; justify-content: end; align-items: center;">
                <h4
                    style="color:#000; width:100%; text-align:right; font-size: 1.25rem; font-weight: bold; margin-bottom: 14px;">
                    Estimated Charges</h4>
            </div>
            <div style="display: flex; justify-content: end;">
                <div
                    style="flex-direction: column; justify-content: end; align-items: center; text-align:right;width:100%">
                    @if ($booking->trip_type == 'one_way')
                        <p
                            style="margin: 8px 0px; color:#000; font-weight: 600; padding-bottom: 5px; width:100%; text-align:right;">
                            Base Price: <span
                                style="font-weight: 400;">CAD {{ number_format($booking->base_price, 2, '.', '') }}</span>
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
                            Distance: <span style="font-weight: 400;">{{ round($booking->distance ?? 0, 2) }}</span>
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
                            CAD {{ number_format($booking->gratuity ?? 0, 2, '.', '') }}
                            </span>
                        </p>
                    @endif
                    @if ($booking->trip_type == 'by_hour')
                        <p
                            style="margin: 8px 0px; color:#000; font-weight: 600; padding-bottom: 5px; width:100%; text-align:right;">
                            Gratuity 15%: <span style="font-weight: 400;">
                            CAD {{ number_format($booking->gratuity ?? 0, 2, '.', '') }}
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
            <div style="height: 2px; background: #eee; margin-bottom: 17px; margin-top: 16px;"></div>
            <div style="margin-top: 8px; color:#000;"> <strong style="color:#000;">Note:</strong>
                <p style="color:#000;"> Payment will be charged 24 hours before the trip. If you need a booking within
                    24
                    hours.
                    Please call us directly at: +1 825-735-5538</p>
                <!-- Cancel Ride Button -->
                <div style="height: 2px; background: #eee; margin-bottom: 17px; margin-top: 16px;"></div>
                <div style="text-align: center;">
                    <a href="{{ route('cancelRideIndex', $booking->id) }}"
                        style="display: inline-block; padding: 10px 20px; font-size: 16px; font-weight: bold; color: white; background-color: red; text-decoration: none; border-radius: 5px;">Cancel
                        Ride</a>
                </div>
                <p style="color:#000; text-align: center;"> You have 24 hours from the time of booking to cancel the
                    ride.</p>
                <div style="height: 2px; background: #eee; margin-top: 15px; margin-bottom: 20px;"></div>
                <h4 style="color:#000; font-size: 1.25rem; font-weight: bold; margin-bottom: 14px;">Terms & Conditions
                </h4>
                <div style="margin-top: 8px; color:#000;">
                    <p>Please contact Blacksedans if any of the above information is inaccurate. All changes or
                        inaccuracies
                        in
                        reservations must be emailed to mailto:info@blacksedans.ca or call us at +1 825-735-5538.</p>
                </div>
                <div style="margin-top: 8px; color:#000;">
                    <p><strong>Acceptance of Service:</strong> This is a copy of your confirmation, not an invoice. By
                        receiving
                        this confirmation, you are accepting accountability for the charges, detailed above, including
                        any
                        overages after services are rendered.</p>
                </div>
                <div style="margin-top: 8px; color:#000;">
                    <p><strong>Billing:</strong> All reservations are on an hourly basis if retained after drop off;
                        billing
                        for
                        any overages takes place in half hour increments. Credit cards are pre-authorized for one cent
                        at
                        the
                        time of booking and three days prior to your reserved time pre-authorized for the full
                        reservation
                        amount. Final billing will be processed on the business day following service if there is
                        pending
                        amount
                        or additional service charges.</p>
                </div>
                <div style="margin-top: 8px; color:#000;">
                    <p><strong>Cancelation/Change: </strong>Reservations will be billed in full if a cancelation /
                        change
                        notice
                        is not confirmed up to twenty-four hours in advance of your reserved time. A cancelation /
                        change
                        notice
                        does not take effect until confirmed by the Blacksedans representative.</p>
                </div>
                <div style="margin-top: 8px; color:#000;">
                    <p><strong>Smoking and Damages:</strong> Smoking and vaping is not permitted in any of our vehicles.
                        You
                        will be subject to a significant vehicle recovery fee to cover the extensive cost of restoring
                        vehicles
                        to a neutral scent. Vandalizing or damaging any part of a vehicle is subject to additional
                        charges
                        for
                        repair / replacement.</p>
                </div>
                <div style="margin-top: 8px; color:#000;">
                    <p><strong>Lost Items:</strong> Blacksedans will not be held responsible for any loss or damage to
                        personal
                        articles. Any found items will be kept and available for pickup.</p>
                </div>
                <div style="margin-top: 8px; color:#000;">
                    <p><strong>Feedback:</strong> Any and all feedback is appreciated. We encourage you to share your
                        experience
                        at mailto:info@blacksedans.ca or call us at +1 825-735-5538.</p>
                </div>
                <div style="margin-top: 8px; color:#000;">
                    <p><strong>Confidentiality Notice:</strong> This message and any attachments are solely for the
                        intended
                        recipient and may contain confidential or privileged information. If you are not the intended
                        recipient,
                        any disclosure, copying, use, or distribution of the information included in this message and
                        any
                        attachment is prohibited. If you have received this communication in error, please notify us by
                        reply
                        email and immediately and permanently delete this message and any attachments.</p>
                </div>
            </div>
        </div>
        <p style="text-align: center; font-size: 0.9rem; color: #b0adc5;">
            © 2024 BlackSedan. All rights reserved.
        </p>
    </div>
</body>

</html>
