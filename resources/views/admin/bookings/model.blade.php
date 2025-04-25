<div class="modal-content">
    <div class="modal-header justify-content-center">
        <h5 class="modal-title">Booking Details</h5>
    </div>
    <div class="modal-body">
        <div class="container table-responsive">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th scope="col">Service Type</th>
                        <td>{{ $booking->vehicle->name }}</td>
                    </tr>

                    <tr>
                        <th scope="col">Trip Type</th>
                        <td>
                            @if ($booking->trip_type == 'by_hour')
                                <span>By Hour</span>
                            @else
                                <span>One Way</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Airport Charges</th>
                        <td>
                            @if ($booking->air_port_charges > 0)
                                <span>${{ $booking->air_port_charges }}</span>
                            @else
                                <span>No Charges Found!</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th scope="col">Duration</th>
                        <td>
                            @if ($booking->duration_hours > 0)
                                <span>{{ $booking->duration_hours }} hours</span>
                            @else
                                <span>No Duration Found!</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Airport PickUp</th>
                        <td>
                            @if ($booking->airport_pickup == 'yes')
                                <span>Yes</span>
                            @else
                                <span>No</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">First Name</th>
                        <td>{{ $booking->first_name }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Last Name</th>
                        <td>{{ $booking->last_name }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Email</th>
                        <td>{{ $booking->email }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Phone Number</th>
                        <td>{{ $booking->phone_number }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Instructions</th>
                        <td>{{ $booking->instruction }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Pickup Date</th>
                        <td>{{ $booking->pickup_date }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Pickup Time</th>
                        <td>{{ \Carbon\Carbon::parse($booking->pickup_time)->format('h:i A') }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Pickup Location</th>
                        <td>{{ $booking->pickup_location }}</td>
                    </tr>
                    <tr>
                        <th scope="col">DropOff Location</th>
                        <td>{{ $booking->dropOff_location ?? 'No Data Found!' }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Flight Number</th>
                        <td>{{ $booking->flight_number ?? 'No Data Found!' }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Cardholder Name</th>
                        <td>{{ $booking->card_holder_number ?? 'No Data Found!' }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Card No</th>
                        <td>{{ $booking->card_number ?? 'No Data Found!' }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Expire Month</th>
                        <td>{{ $booking->exp_month ?? 'No Data Found!' }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Expire Year</th>
                        <td>{{ $booking->exp_year ?? 'No Data Found!' }}</td>
                    </tr>
                    <tr>
                        <th scope="col">CVV</th>
                        <td>{{ $booking->cvv ?? 'No Data Found!' }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Card Type</th>
                        <td>{{ $booking->card_type ?? 'No Data Found!' }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Distance</th>
                        <td>
                            @if ($booking->distance == null)
                                <span>No Data Found!</span>
                            @else
                                {{ $booking->distance }} km
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Total Amount</th>
                        <td>${{ $booking->total_amount }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Destination</th>
                        <td>
                            @if ($booking->destination == null)
                                <span>No Data Found!</span>
                            @else
                                {{ $booking->destination }} km
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Reason For Cancellation</th>
                        <td>
                            @if ($booking->reason)
                                <p>{{ $booking->reason }}</p>
                            @else
                                <span class="text-danger">No Reason Found!</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
</div>
