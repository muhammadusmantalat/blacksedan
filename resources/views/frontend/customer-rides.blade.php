@extends('frontend.layout.app')
@section('title', 'Customer Rides')
@section('content')

<style>

    .pac-container{
        z-index: 300000000 !important;
        /* display: block !important; */
    }
    /* Tabs*/
    section {
        padding: 10px 0;
    }

    section .section-title {
        text-align: center;
        margin-bottom: 50px;
        text-transform: uppercase;
    }

    #tabs {
        color: black;
    }

    #tabs h6.section-title {
        color: black;
    }

    #tabs .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: black;
        background-color: transparent;
        border-color: black;
        border-bottom: 4px solid !important;
        font-size: 20px;
        font-weight: bold;
    }

    #tabs .nav-tabs .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
        color: black;
        font-size: 20px;
    }

    .tab-pane .titles {
        font-weight: bold;
    }

    .tab-pane .tag {
        font-size: 0.8rem;
        color: white;
        background-color: black;
    }

    .modal-setting{
        background-color: rgba(0, 0, 0, 0.308);
        position: fixed !important;
        overflow: auto !important;
        scrollbar-width: none;
    }

    .modal-setting::-webkit-scrollbar {
        display: none; /* For Chrome, Safari, and Opera */
    }

    @media screen and (max-width: 576px) {
        .tab-pane .button-text {
            font-size: 0.7rem;
        }
    }
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- Confirmation Modal -->
<div class="modal fade modal-setting" id="cancelRideModal" tabindex="-1" role="dialog" aria-labelledby="cancelRideModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Ride Cancellation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to cancel this ride?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" id="confirmCancelRide">Yes, Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Ride Modal -->
<div class="modal fade modal-setting" id="editRideModal" tabindex="-1" role="dialog" aria-labelledby="editRideModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document"> <!-- Added modal-dialog-scrollable -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Ride</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editRideForm" method="POST" action="{{route('customer.rides.edit')}}">
                    @csrf
                    <input type="hidden" id="bookingId" name="booking_id">

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name:</label>
                            <input type="text" class="form-control" id="firstName" name="fname">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name:</label>
                            <input type="text" class="form-control" id="lastName" name="lname">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Pickup Location:</label>
                            <input type="text" class="form-control autocomplete" id="pickupLocation" name="pickup_location" readonly>
                            <input type="hidden" id="pickupLat" name="pickup_latitude">
                            <input type="hidden" id="pickupLng" name="pickup_longitude">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Dropoff Location:</label>
                            <input type="text" class="form-control autocomplete" id="dropoffLocation" name="dropOff_location" readonly>
                            <input type="hidden" id="dropoffLat" name="dropoff_latitude">
                            <input type="hidden" id="dropoffLng" name="dropoff_longitude">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Flight No:</label>
                            <input type="text" class="form-control" id="flightNumber" name="flight_number">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Pickup Date:</label>
                            <input type="date" class="form-control" id="pickupdate" name="pickup_date" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Pickup Time:</label>
                            <input type="time" class="form-control" id="pickuptime" name="pickup_time">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Phone Number:</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phone_number">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Special Instructions:</label>
                            <textarea class="form-control" id="instructions" name="instruction"></textarea>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tabs -->
<div class="container">
    <h5 class="mt-5">Rides</h5>
</div>
<section id="tabs">

    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Upcomings Rides</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                            role="tab" aria-controls="nav-contact" aria-selected="false">Past Rides</a>
                        {{-- <a class="nav-item nav-link" id="nav-book-now-tab" data-toggle="tab"         href="#nav-book-now"
                            role="tab" aria-controls="nav-book-now" aria-selected="false">Book Now</a> --}}
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        @if($upComingBookings->isEmpty())
                        <div class="py-3 text-center">
                            <h5 class="text-danger">No records found!</h5>
                        </div>
                    @else
                    @foreach ($upComingBookings as $data)
                    <div class="py-3 border-bottom row">
                        <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                            <h6 class="titles m-0">First Name:</h6>
                            <p class="m-0 ml-3">{{$data->first_name}}</p>
                        </div>
                        <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                            <h6 class="titles m-0">Last Name:</h6>
                            <p class="m-0 ml-3">{{$data->last_name}}</p>
                        </div>
                        <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                            <h6 class="titles m-0">Pickup Location:</h6>
                            <p class="m-0 ml-3">{{$data->pickup_location}}</p>
                        </div>
                        <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                            <h6 class="titles m-0">Dropoff Location:</h6>
                            <p class="m-0 ml-3">{{$data->dropOff_location}}</p>
                        </div>
                        <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                            <h6 class="titles m-0">Flight No:</h6>
                            <p class="m-0 ml-3">{{$data->flight_number}}</p>
                        </div>
                        <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                            <h6 class="titles m-0">Email:</h6>
                            <p class="m-0 ml-3">{{$data->email}}</p>
                        </div>
                        <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                            <h6 class="titles m-0">Phone Number:</h6>
                            <p class="m-0 ml-3">{{$data->phone_number}}</p>
                        </div>
                        <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                            <h6 class="titles m-0">Pickup Date:</h6>
                            <p class="m-0 ml-3">{{$data->pickup_date}}</p>
                        </div>
                        <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                            <h6 class="titles m-0">Pickup Time:</h6>
                            <p class="m-0 ml-3">{{$data->pickup_time}}</p>
                        </div>
                        <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                            <h6 class="titles m-0">Special instructions:</h6>
                            <p class="m-0 ml-3">{{$data->instruction}}</p>
                        </div>
                
                        <div class="mt-3 col-12 d-flex justify-content-end">
                            <!-- Edit Ride Button with Data -->
                            <button class="edit-ride-btn rounded py-3 text-nowrap button-text mr-3" 
                                data-booking='@json($data)'>
                                Edit Ride
                            </button>
                            {{-- <button class="rounded py-3 text-nowrap button-text cancel-ride" data-id="{{ $data->id }}">Cancel Ride</button> --}}
                            
                            <a href="{{ route('cancelRideIndex', ['id' => $data->id]) }}" 
                                onclick="return confirmCancelRide(event, this);">
                                <button class="edit-ride-btn rounded py-3 text-nowrap button-text mr-3" >
                                Cancel Ride
                            </button>
                             </a>
                        </div>
                    </div>
                @endforeach
                
                    @endif
                    
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        @if($completeBookings->isEmpty() && $cancleBookings->isEmpty())
                            <div class="py-3 text-center">
                                <h5 class="text-danger">No records found!</h5>
                            </div>
                        @else
                                @foreach($cancleBookings as $data)
                                <div class="py-3 border-bottom row">
                                    <div class="col-12 mb-3">
                                        @php
                                            $color = $data->status == 'cancelled' ? 'bg-danger' : 'bg-success'
                                        @endphp
                                        <span class="tag p-1 px-5 {{$color}} rounded">{{$data->status}}</span>
                                    </div>
                                    <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                                        <h6 class="titles m-0">First Name:</h6>
                                        <p class="m-0 ml-3">{{$data->first_name}}</p>
                                    </div>
                                    <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                                        <h6 class="titles m-0">Last Name:</h6>
                                        <p class="m-0 ml-3">{{$data->last_name}}</p>
                                    </div>
                                    <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                                        <h6 class="titles m-0">Pickup Location:</h6>
                                        <p class="m-0 ml-3">{{$data->pickup_location}}</p>
                                    </div>
                                    <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                                        <h6 class="titles m-0">Dropoff Location:</h6>
                                        <p class="m-0 ml-3">{{$data->dropOff_location}}</p>
                                    </div>
                                    <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                                        <h6 class="titles m-0">Flight No:</h6>
                                        <p class="m-0 ml-3">{{$data->flight_number}}</p>
                                    </div>
                                    <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                                        <h6 class="titles m-0">Email:</h6>
                                        <p class="m-0 ml-3">{{$data->email}}</p>
                                    </div>
                                    <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                                        <h6 class="titles m-0">Phone Number:</h6>
                                        <p class="m-0 ml-3">{{$data->phone_number}}</p>
                                    </div>
                                    <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                                        <h6 class="titles m-0">Pickup Date:</h6>
                                        <p class="m-0 ml-3">{{$data->pickup_date}}</p>
                                    </div>
                                    <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                                        <h6 class="titles m-0">Pickup Time:</h6>
                                        <p class="m-0 ml-3">{{$data->pickup_time}}</p>
                                    </div>
                                    <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                                        <h6 class="titles m-0">Special instructions:</h6>
                                        <p class="m-0 ml-3">{{$data->instruction}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    {{-- <div class="tab-pane fade" id="nav-book-now" role="tabpanel"          aria-labelledby="nav-book-now-tab">
                        <div class="text-center">
                            <a href="{{url('/')}}">
                                <button class="edit-ride-btn rounded py-3 text-nowrap button-text mr-3" >
                                Book Now
                            </button>
                        </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    



    <script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll(".edit-ride-btn");

    editButtons.forEach(button => { 
        button.addEventListener("click", function () {
            let bookingData = JSON.parse(this.getAttribute("data-booking"));

            document.getElementById("bookingId").value = bookingData.id;
            document.getElementById("firstName").value = bookingData.first_name;
            document.getElementById("lastName").value = bookingData.last_name;
            document.getElementById("pickupLocation").value = bookingData.pickup_location;
            document.getElementById("dropoffLocation").value = bookingData.dropOff_location;
            document.getElementById("flightNumber").value = bookingData.flight_number;
            document.getElementById("email").value = bookingData.email;
            document.getElementById("phoneNumber").value = bookingData.phone_number;
            document.getElementById("pickupdate").value = bookingData.pickup_date;
            const pickupTime = bookingData.pickup_time?.slice(0, 5);
            document.getElementById("pickuptime").value = pickupTime;
            document.getElementById("instructions").value = bookingData.instruction;

            // Show Bootstrap Modal
            // Alternative Modal Show Method
    document.getElementById("editRideModal").classList.add("show");
    document.getElementById("editRideModal").style.display = "block";
        });
    });
});

$(".close").on("click", function () {
    document.getElementById("editRideModal").classList.remove("show");
    document.getElementById("editRideModal").style.display = "none";
});


</script>
</section>
<!-- ./Tabs -->
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

<script>
    $('#editRideModal').on('shown.bs.modal', function() {
        function initAutocomplete() {
            $(".autocomplete").each(function() {
                let input = this;
                let autocomplete = new google.maps.places.Autocomplete(input);

                autocomplete.addListener("place_changed", function () {
                    let place = autocomplete.getPlace();
                    if (!place.geometry) return;

                    let lat = place.geometry.location.lat();
                    let lng = place.geometry.location.lng();

                    if (input.id === "pickupLocation") {
                        $("#pickupLat").val(lat);
                        $("#pickupLng").val(lng);
                    } else if (input.id === "dropoffLocation") {
                        $("#dropoffLat").val(lat);
                        $("#dropoffLng").val(lng);
                    }
                });
            });
        }
        initAutocomplete();
    });

    document.addEventListener("DOMContentLoaded", function () {
        const editButtons = document.querySelectorAll(".edit-ride-btn");

        editButtons.forEach(button => { 
            button.addEventListener("click", function () {
                let bookingData = JSON.parse(this.getAttribute("data-booking"));

                document.getElementById("bookingId").value = bookingData.id;
                document.getElementById("firstName").value = bookingData.first_name;
                document.getElementById("lastName").value = bookingData.last_name;
                document.getElementById("pickupLocation").value = bookingData.pickup_location;
                document.getElementById("dropoffLocation").value = bookingData.dropOff_location;
                document.getElementById("flightNumber").value = bookingData.flight_number;
                document.getElementById("email").value = bookingData.email;
                document.getElementById("phoneNumber").value = bookingData.phone_number;
                document.getElementById("instructions").value = bookingData.instruction;

                // Show Bootstrap Modal
                // Alternative Modal Show Method
                document.getElementById("editRideModal").classList.add("show");
                document.getElementById("editRideModal").style.display = "block";
            });
        });
    });

    $(".close").on("click", function () {
        document.getElementById("editRideModal").classList.remove("show");
        document.getElementById("editRideModal").style.display = "none";
    });

    function confirmCancelRide(event, element) {
        event.preventDefault(); // Prevent immediate navigation
    
        if (confirm("Are you sure you want to cancel this ride?")) {
            window.location.href = element.href; // Navigate to cancel ride route
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        let rideId = null;
    
        // Open the confirmation modal when "Cancel Ride" button is clicked
        document.querySelectorAll(".cancel-ride").forEach(button => {
            button.addEventListener("click", function () {
                rideId = this.getAttribute("data-id"); // Get ride ID
                const modal = new bootstrap.Modal(document.getElementById("cancelRideModal"));
                modal.show();
            });
        });
    
        // On "Yes, Cancel" button click, send AJAX request
        document.getElementById("confirmCancelRide").addEventListener("click", function () {
            if (!rideId) return;
    
            fetch("{{ route('cancelRideIndex', ':id') }}".replace(':id', rideId), {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}" // Laravel CSRF Protection
                },
                body: JSON.stringify({ ride_id: rideId })
            })
            .then(response => response.json())
            .then(data => {
    if (data.status === "success") {
        toastr.success("Ride cancelled successfully!");
        const modal = new bootstrap.Modal(document.getElementById("cancelRideModal"));
        modal.hide();
        location.reload(); // Reload page to update UI
    } else {
        toastr.error(data.message || "Failed to cancel the ride.");
    }
})
.catch(error => {
    console.error("Error:", error);

    if (error.response && error.response.data) {
        // Show error message from server response
        toastr.error(error.response.data.message || "An unexpected error occurred.");
    } else {
        toastr.error("Something went wrong. Please try again.");
    }
});

        });
    });

    $(document).ready(function() {
        $('.magnific-popup').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });

    // Remove or comment out the problematic script
    // <script src="https://google.com/pagead/form-data/1003091628?gtm=45be53d3za200&gcd=13l3l3l3l1l1&dma=0&tag_exp=102482433~102587591~102717422~102788824~102813109~102814060~102825837~102879719&npa=0&frm=0&auid=1656482691.1739533329&uaa=x86&uab=64&uafvl=Chromium%3B134.0.6998.89%7CNot%253AA-Brand%3B24.0.0.0%7CGoogle%2520Chrome%3B134.0.6998.89&uamb=0&uam=&uap=Windows&uapv=10.0.0&uaw=0"></script>
</script>
<script type="text/javascript"
src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places"></script>
<script>
    $('#editRideModal').on('shown.bs.modal', function() {
        function initAutocomplete() {
            $(".autocomplete").each(function() {
                let input = this;
                let autocomplete = new google.maps.places.Autocomplete(input);

                autocomplete.addListener("place_changed", function () {
                    let place = autocomplete.getPlace();
                    if (!place.geometry) return;

                    let lat = place.geometry.location.lat();
                    let lng = place.geometry.location.lng();

                    if (input.id === "pickupLocation") {
                        $("#pickupLat").val(lat);
                        $("#pickupLng").val(lng);
                    } else if (input.id === "dropoffLocation") {
                        $("#dropoffLat").val(lat);
                        $("#dropoffLng").val(lng);
                    }
                });
            });
        }
        initAutocomplete();
    });

    document.addEventListener("DOMContentLoaded", function () {
        const editButtons = document.querySelectorAll(".edit-ride-btn");

        editButtons.forEach(button => { 
            button.addEventListener("click", function () {
                let bookingData = JSON.parse(this.getAttribute("data-booking"));

                document.getElementById("bookingId").value = bookingData.id;
                document.getElementById("firstName").value = bookingData.first_name;
                document.getElementById("lastName").value = bookingData.last_name;
                document.getElementById("pickupLocation").value = bookingData.pickup_location;
                document.getElementById("dropoffLocation").value = bookingData.dropOff_location;
                document.getElementById("flightNumber").value = bookingData.flight_number;
                document.getElementById("email").value = bookingData.email;
                document.getElementById("phoneNumber").value = bookingData.phone_number;
                document.getElementById("instructions").value = bookingData.instruction;

                // Show Bootstrap Modal
                // Alternative Modal Show Method
                document.getElementById("editRideModal").classList.add("show");
                document.getElementById("editRideModal").style.display = "block";
            });
        });
    });

    $(".close").on("click", function () {
        document.getElementById("editRideModal").classList.remove("show");
        document.getElementById("editRideModal").style.display = "none";
    });

    function confirmCancelRide(event, element) {
        event.preventDefault(); // Prevent immediate navigation
    
        if (confirm("Are you sure you want to cancel this ride?")) {
            window.location.href = element.href; // Navigate to cancel ride route
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        let rideId = null;
    
        // Open the confirmation modal when "Cancel Ride" button is clicked
        document.querySelectorAll(".cancel-ride").forEach(button => {
            button.addEventListener("click", function () {
                rideId = this.getAttribute("data-id"); // Get ride ID
                const modal = new bootstrap.Modal(document.getElementById("cancelRideModal"));
                modal.show();
            });
        });
    
        // On "Yes, Cancel" button click, send AJAX request
        document.getElementById("confirmCancelRide").addEventListener("click", function () {
            if (!rideId) return;
    
            fetch("{{ route('cancelRideIndex', ':id') }}".replace(':id', rideId), {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}" // Laravel CSRF Protection
                },
                body: JSON.stringify({ ride_id: rideId })
            })
            .then(response => response.json())
            .then(data => {
    if (data.status === "success") {
        toastr.success("Ride cancelled successfully!");
        const modal = new bootstrap.Modal(document.getElementById("cancelRideModal"));
        modal.hide();
        location.reload(); // Reload page to update UI
    } else {
        toastr.error(data.message || "Failed to cancel the ride.");
    }
})
.catch(error => {
    console.error("Error:", error);

    if (error.response && error.response.data) {
        // Show error message from server response
        toastr.error(error.response.data.message || "An unexpected error occurred.");
    } else {
        toastr.error("Something went wrong. Please try again.");
    }
});

        });
    });

    $(document).ready(function() {
        $('.magnific-popup').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        $("#pickup_latitudeArea").addClass("d-none");
        $("#pickup_longitudeArea").addClass("d-none");
        $("#dropoff_latitudeArea").addClass("d-none");
        $("#dropoff_longitudeArea").addClass("d-none");
    });

    // ########## Google map code ##############
    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {
        var albertaBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(48.999647, -118.088306), // Southwest corner of Alberta
            new google.maps.LatLng(60.000848, -110.001746) // Northeast corner of Alberta
        );

        // One Way Pickup
        var pickupInput = document.getElementById('pickupLocation');
        var pickupAutocomplete = new google.maps.places.Autocomplete(pickupInput, {
            bounds: albertaBounds,
            strictBounds: true
        });

        pickupAutocomplete.addListener('place_changed', function() {
            var place = pickupAutocomplete.getPlace();
            $('#pickupLat').val(place.geometry.location.lat());
            $('#pickupLng').val(place.geometry.location.lng());

            $("#pickup_latitudeArea").removeClass("d-none");
            $("#pickup_longitudeArea").removeClass("d-none");
        });

        // One Way Dropoff
        var dropoffInput = document.getElementById('dropoffLocation');
        var dropoffAutocomplete = new google.maps.places.Autocomplete(dropoffInput, {
            bounds: albertaBounds,
            strictBounds: true
        });

        dropoffAutocomplete.addListener('place_changed', function() {
            var place = dropoffAutocomplete.getPlace();
            $('#dropoffLat').val(place.geometry.location.lat());
            $('#dropoffLng').val(place.geometry.location.lng());

            $("#dropoff_latitudeArea").removeClass("d-none");
            $("#dropoff_longitudeArea").removeClass("d-none");
        });
    }
</script>
@endsection