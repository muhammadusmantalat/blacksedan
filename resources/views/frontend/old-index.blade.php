@extends('frontend.layout.app')
@section('title', 'index')
@section('content')

    {{-- <body --}}
    {{-- class="page-template-default page page-id-5439 redux-page  site-h16 body-default-font heading-default-font header-sticky  btn-type-gradient  fixed-footer  mobile-header-light elementor-default elementor-kit-4700 elementor-page elementor-page-5439"> --}}
    <div id="page" class="site">
        <!-- #pagetitle -->
        <div id="pagetitle" class="page-title bg-image">
            <div class="container">
                <div class="page-title-inner">
                    <div class="page-title-holder">
                        <h1 class="page-title">Reservation Form</h1>
                    </div>
                    <ul class="ct-breadcrumb">
                        <li><span class="breadcrumb-entry"><strong> Black Sedan - Calgary Limo Online Booking</strong> made easy! Follow our simple <strong> <a href="https://blacksedans.ca/how-to-make-a-reservation-on-calgary-limo/">Limo Booking Procedure</a> </strong> to reserve your luxury ride in minutes. Wondering <strong>How to Book a Limousine in Calgary?</strong> Just choose your vehicle, select your trip type, enter pick-up and drop-off details, get a quote and confirm. Our streamlined <strong>Limo Reservation Procedure in Calgary</strong> ensures a hassle-free experience, giving you quick access to professional limousine services anytime, anywhere. Book now and enjoy a premium ride</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- #content -->
        <div id="content" class="site-content">
            <div class="container">
                <div class="row">
                    <div id="primary" class="col-12">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="col-md-12 reserv-form">
                                    <div class="ct-contact-form-layout1 style7">
                                        @if (session('message'))
                                            <div class="alert alert-{{ session('status') ? 'success' : 'danger' }} alert-dismissible fade show"
                                                role="alert">
                                                {{ session('message') }}
                                                <button type="button" class="close text-danger" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <form action="{{ route('booking') }}" method="post" id="registrationForm">
                                            <input type="hidden" name="trip_type" id="tripTypeInput" value="one_way">
                                            @csrf
                                            <div class="getaquoteform">
                                                <h4 style="color: #fff;">Please fill out the form below to receive a quotation and book your limo service:</h4>
                                                <div class="row">
                                                    <div class="input-filled col-lg-6 col-md-6">
                                                        <label>Choose Car*</label>
                                                        <select class="form-control" name="vehicle_id">
                                                            <option value="">-- Select Car --</option>
                                                            @foreach ($vehicles as $vehicle)
                                                                <option value="{{ $vehicle->id }}">{{ $vehicle->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Airport Pickup Option -->
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 d-flex align-items-center">
                                                        <label>Is it airport pickup?</label>
                                                        <div class="ml-3">
                                                            <label class="radio-inline mr-2">
                                                                <input type="radio" name="airport_pickup" value="yes">
                                                                Yes
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="airport_pickup" value="no">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-lg-12 col-md-12 d-flex align-items-center">
                                                        <strong class="text-danger">An additional airport fee of $10 will be
                                                            applied for Sedans, and $15 for Luxury Full-Size SUVs.</strong>

                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Option Buttons -->
                                                <div class="col-12 row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <button type="button" id="oneWayButton"
                                                            class="btn btn-primary btn-block mb-2">One Way Trip</button>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <button type="button" id="byHourButton"
                                                            class="btn btn-secondary btn-block mb-2">By Hour Trip</button>
                                                    </div>
                                                </div>
                                                <hr />

                                                <!-- Default Fields for One Way -->
                                                <div id="oneWayFields" class="tripFields">
                                                    <h4 style="color: #fff;">Enter Ride Details</h4>
                                                    <div class="row">
                                                        <div class="input-filled col-lg-6 col-md-6">
                                                            <label>Pickup Date<span>*</span></label>
                                                            <input size="40" class="wpcf7-form-control" type="date" name="pickup_date" min="{{ \Carbon\Carbon::now()->toDateString() }}" />
                                                        </div>
                                                        <div class="input-filled col-lg-6 col-md-6">
                                                            <label>Pickup Time<span>*</span></label>
                                                            <input size="40" class="wpcf7-form-control" type="time" name="pickup_time" />
                                                        </div>
                                                        <div class="input-filled col-lg-6 col-md-6">
                                                            <label>Pickup Location *</label>
                                                            <input size="40" id="pickup_autocomplete"
                                                                class="wpcf7-form-control" type="text"
                                                                name="pickup_location" />
                                                        </div>
                                                        <input type="hidden" id="pickup_latitude" name="pickup_latitude"
                                                            class="form-control">
                                                        <input type="hidden" id="pickup_longitude" name="pickup_longitude"
                                                            class="form-control">
                                                        <div class="input-filled col-lg-6 col-md-6">
                                                            <label>Drop-off Location *</label>
                                                            <input size="40" class="wpcf7-form-control" type="text"
                                                                name="dropOff_location" id="dropoff_autocomplete" />
                                                        </div>
                                                        <input type="hidden" id="dropoff_latitude"
                                                            name="dropoff_latitude" class="form-control">
                                                        <input type="hidden" id="dropoff_longitude"
                                                            name="dropoff_longitude" class="form-control">

                                                    </div>
                                                </div>
                                                <!-- Fields for By The Hour (Initially Hidden) -->
                                                <div id="byHourFields" class="tripFields" style="display: none;">
                                                    <h4 style="color: #fff;">Enter Ride Duration Details</h4>
                                                    <div class="row">
                                                        <div class="input-filled col-lg-6 col-md-6">
                                                            <label>Duration (Hours)<span>*</span></label>
                                                            <select class="wpcf7-form-control" name="duration_hours">
                                                                <option value="" disabled selected>Select Duration
                                                                </option>
                                                                <!-- Generate options dynamically for hours using a Blade loop -->
                                                                @for ($i = 2; $i <= 12; $i++)
                                                                    <option value="{{ $i }}">{{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>

                                                        <div class="input-filled col-lg-6 col-md-6">
                                                            <label>Pickup Date<span>*</span></label>
                                                            <input size="40" class="wpcf7-form-control"
                                                                type="date" name="pickup_date"
                                                                min="{{ \Carbon\Carbon::now()->toDateString() }}" />
                                                        </div>
                                                        <div class="input-filled col-lg-6 col-md-6">
                                                            <label>Pickup Time<span>*</span></label>
                                                            <input size="40" class="wpcf7-form-control"
                                                                type="time" name="pickup_time" />
                                                        </div>
                                                        <div class="input-filled col-lg-6 col-md-6">
                                                            <label>Pickup Location *</label>
                                                            <input size="40" id="hour_pickup_autocomplete"
                                                                class="wpcf7-form-control" type="text"
                                                                name="pickup_location" />
                                                        </div>
                                                        <div class="form-group d-none pickup_latitudeArea">
                                                            <input type="text" id="hour_pickup_latitude"
                                                                name="pickup_latitude" class="form-control">
                                                        </div>
                                                        <div class="form-group d-none pickup_longitudeArea">
                                                            <input type="text" id="hour_pickup_longitude"
                                                                name="pickup_longitude" class="form-control">
                                                        </div>
                                                        <div class="input-filled col-lg-12 col-md-12">
                                                            <label>More Details About Destinations<span>*</span></label>
                                                            <textarea size="40" class="wpcf7-form-control" name="destination"></textarea>
                                                        </div>
                            
                                                    </div>
                                                </div>

                                                <hr />
                                                <div class="row">
                                                    <div class="input-filled col-12">
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fac fac-cloud-upload-alt space-right"></i> Get a
                                                            Quote</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #primary -->
                </div>
            </div>
        </div>
    </div>
    {{-- </body> <!-- #page --> --}}
@endsection
<script type='text/javascript' src={{ asset('public/admin/assets/js/elementor-assets-js-frontend.min.js') }}
    id='elementor-frontend-js'></script>

@section('js')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <script>
        // Set default trip type as "one_way"

        $(document).ready(function() {
            // Initially set trip type to 'one_way'
            $('#tripTypeInput').val('one_way');

            // Show fields for One Way Trip and hide By Hour Trip fields by default
            $('#oneWayFields').show();
            $('#byHourFields').hide();

            // Handle One Way button click
            $('#oneWayButton').click(function() {
                $('#oneWayFields').show();
                $('#byHourFields').hide();

                // Change button colors
                $('#oneWayButton').addClass('btn-primary').removeClass('btn-secondary');
                $('#byHourButton').addClass('btn-secondary').removeClass('btn-primary');

                // Set trip_type to 'one_way'
                $('#tripTypeInput').val('one_way');
            });

            // Handle By Hour button click
            $('#byHourButton').click(function() {
                $('#byHourFields').show();
                $('#oneWayFields').hide();

                // Change button colors
                $('#byHourButton').addClass('btn-primary').removeClass('btn-secondary');
                $('#oneWayButton').addClass('btn-secondary').removeClass('btn-primary');

                // Set trip_type to 'by_hour'
                $('#tripTypeInput').val('by_hour');
            });

            // Before form submission, remove irrelevant fields based on trip type
            $('#registrationForm').on('submit', function() {
                if ($('#tripTypeInput').val() === 'one_way') {
                    // Remove By Hour fields
                    $('#byHourFields input, #byHourFields textarea').remove();
                } else if ($('#tripTypeInput').val() === 'by_hour') {
                    // Remove One Way fields
                    $('#oneWayFields input').remove();
                }
            });

            // Display Toastr error messages if any validation errors exist
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif
        });
    </script>


    {{-- Custom Code Start Google Map Client Side  --}}

    {{-- Custom Code Start Google Map Client Side --}}
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places"></script>
    <script>
        $(document).ready(function() {
            $("#pickup_latitudeArea").addClass("d-none");
            $("#pickup_longitudeArea").addClass("d-none");
            $("#dropoff_latitudeArea").addClass("d-none");
            $("#dropoff_longitudeArea").addClass("d-none");
        });
        // ########## Google map code ##############
        google.maps.event.addDomListener(window, 'load', initialize);

        // function initialize() {
        //     var albertaBounds = new google.maps.LatLngBounds(
        //         new google.maps.LatLng(48.999647, -118.088306), // Southwest corner of Alberta
        //         new google.maps.LatLng(60.000848, -110.001746) // Northeast corner of Alberta
        //     );

        //     var pickupInput = document.getElementById('pickup_autocomplete');
        //     var pickupAutocomplete = new google.maps.places.Autocomplete(pickupInput, {
        //         bounds: albertaBounds,
        //         strictBounds: true // This ensures results are within the specified bounds
        //     });

        //     pickupAutocomplete.addListener('place_changed', function() {
        //         var place = pickupAutocomplete.getPlace();
        //         $('.pickup_latitude').val(place.geometry.location.lat());
        //         $('.pickup_longitude').val(place.geometry.location.lng());

        //         $(".pickup_latitudeArea").removeClass("d-none");
        //         $(".pickup_longitudeArea").removeClass("d-none");
        //     });

        //     var dropoffInput = document.getElementById('dropoff_autocomplete');
        //     var dropoffAutocomplete = new google.maps.places.Autocomplete(dropoffInput, {
        //         bounds: albertaBounds,
        //         strictBounds: true // This ensures results are within the specified bounds
        //     });

        //     dropoffAutocomplete.addListener('place_changed', function() {
        //         var place = dropoffAutocomplete.getPlace();
        //         $('#dropoff_latitude').val(place.geometry.location.lat());
        //         $('#dropoff_longitude').val(place.geometry.location.lng());

        //         $("#dropoff_latitudeArea").removeClass("d-none");
        //         $("#dropoff_longitudeArea").removeClass("d-none");
        //     });
        // }
        function initialize() {
            var albertaBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(48.999647, -118.088306), // Southwest corner of Alberta
                new google.maps.LatLng(60.000848, -110.001746) // Northeast corner of Alberta
            );

            // One Way Pickup
            var pickupInput = document.getElementById('pickup_autocomplete');
            var pickupAutocomplete = new google.maps.places.Autocomplete(pickupInput, {
                bounds: albertaBounds,
                strictBounds: true
            });

            pickupAutocomplete.addListener('place_changed', function() {
                var place = pickupAutocomplete.getPlace();
                $('#pickup_latitude').val(place.geometry.location.lat());
                $('#pickup_longitude').val(place.geometry.location.lng());

                $(".pickup_latitudeArea").removeClass("d-none");
                $(".pickup_longitudeArea").removeClass("d-none");
            });

            // One Way Dropoff
            var dropoffInput = document.getElementById('dropoff_autocomplete');
            var dropoffAutocomplete = new google.maps.places.Autocomplete(dropoffInput, {
                bounds: albertaBounds,
                strictBounds: true
            });

            dropoffAutocomplete.addListener('place_changed', function() {
                var place = dropoffAutocomplete.getPlace();
                $('#dropoff_latitude').val(place.geometry.location.lat());
                $('#dropoff_longitude').val(place.geometry.location.lng());

                $("#dropoff_latitudeArea").removeClass("d-none");
                $("#dropoff_longitudeArea").removeClass("d-none");
            });

            // By The Hour Pickup
            var hourPickupInput = document.getElementById('hour_pickup_autocomplete');
            var hourPickupAutocomplete = new google.maps.places.Autocomplete(hourPickupInput, {
                bounds: albertaBounds,
                strictBounds: true
            });

            hourPickupAutocomplete.addListener('place_changed', function() {
                var place = hourPickupAutocomplete.getPlace();
                $('#hour_pickup_latitude').val(place.geometry.location.lat());
                $('#hour_pickup_longitude').val(place.geometry.location.lng());

                $("#pickup_latitudeArea").removeClass("d-none");
                $("#pickup_longitudeArea").removeClass("d-none");
            });
        }
    </script>

@endsection
