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
                        <li><a class="breadcrumb-entry" href="https://blacksedans.ca/">Black Sedan Limousine
                                Services</a></li>
                        <li><span class="breadcrumb-entry">Reservation Form</span></li>
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
                                    <div class="ct-contact-form-layout1 style7" style="background-color: #000; margin: 50px 0;">
                                        @if (session('status'))
                                            @if (session('status') === true)
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session('message') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @else
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    {{ session('error') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif
                                        @endif

                                        @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                @foreach ($errors->all() as $error)
                                                    <p>{{ $error }}</p>
                                                @endforeach
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                        <form action="{{ route('contactUs') }}" method="POST" id="registrationForm">
                                            @csrf
                                            @if ($paymentOption == 'with_card')
                                                <div class="text-center">
                                                    <h4 class="">Credit Card Authorization Form</h4>
                                                    <p>
                                                        <span class="text-danger">INPORTANT:</span>
                                                        credit card details are OPTIONAL. If 
                                                        you choose NOT to provide credit card details, you are required to pay upfront at the 
                                                        pickup location.
                                                    </p>
                                                    <p class="">Please complete all fields. You may cancel this
                                                        authorization
                                                        at any time by contacting us. This authorization will remain in
                                                        effect
                                                        until
                                                        cancelled.</p>
                                                </div>
                                                <div id="creditCardFields">
                                                    <table class="table table-border">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-lg-2">
                                                                            <p class="text-white">Card Type:</p>
                                                                        </div>
                                                                        <div class="col-lg-10">
                                                                            <div
                                                                                class="d-md-flex align-items-center justify-content-between">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input
                                                                                        class="form-check-input checkoption"
                                                                                        type="checkbox" name="card_type"
                                                                                        id="mastercard" value="MasterCard">
                                                                                    <label class="form-check-label"
                                                                                        for="mastercard">MasterCard</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input
                                                                                        class="form-check-input checkoption"
                                                                                        type="checkbox" name="card_type"
                                                                                        id="visa" value="VISA">
                                                                                    <label class="form-check-label"
                                                                                        for="visa">VISA</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input
                                                                                        class="form-check-input checkoption"
                                                                                        type="checkbox" name="card_type"
                                                                                        id="discover" value="Discover">
                                                                                    <label class="form-check-label"
                                                                                        for="discover">Discover</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input
                                                                                        class="form-check-input checkoption"
                                                                                        type="checkbox" name="card_type"
                                                                                        id="amex" value="AMEX">
                                                                                    <label class="form-check-label"
                                                                                        for="amex">AMEX</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="d-flex">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input
                                                                                        class="form-check-input checkoption"
                                                                                        type="checkbox" id="others"
                                                                                        value="">
                                                                                    <label class="form-check-label"
                                                                                        for="others">other</label>
                                                                                </div>
                                                                                <div class="">
                                                                                    <input type="text"
                                                                                        class="input_style" id="fname"
                                                                                        name="fname">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="">
                                                        <div class="creditcardoption">
                                                            <div class="row">
                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Cardholder Name </label>
                                                                    <input class="wpcf7-form-control" placeholder=""
                                                                        value="" type="text"
                                                                        name="card_holder_number" />
                                                                </div>
                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Credit Card Number </label>
                                                                    <input class="wpcf7-form-control"
                                                                        placeholder="1234123412341234" type="number"
                                                                        id="creditCard" name="card_number" maxlength="16"
                                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                                </div>
                                                                <div class="input-filled col-lg-4 col-md-4">
                                                                    <label>Expiration Month </label>
                                                                    <select class="wpcf7-form-control" name="exp_month">
                                                                        <option value="-- Month --" selected disabled>--
                                                                            Month
                                                                            --</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                    </select>
                                                                </div>
                                                                <div class="input-filled col-lg-4 col-md-4">
                                                                    <label>Expiration Year </label>
                                                                    <select class="wpcf7-form-control" name="exp_year">
                                                                        <option value="-- Year --" selected disabled>--
                                                                            Year --
                                                                        </option>
                                                                        <option value="20">20</option>
                                                                        <option value="21">21</option>
                                                                        <option value="22">22</option>
                                                                        <option value="23">23</option>
                                                                        <option value="24">24</option>
                                                                        <option value="25">25</option>
                                                                        <option value="26">26</option>
                                                                        <option value="27">27</option>
                                                                        <option value="28">28</option>
                                                                        <option value="29">29</option>
                                                                        <option value="30">30</option>
                                                                    </select>
                                                                </div>
                                                                <div class="input-filled col-lg-4 col-md-4">
                                                                    <label>CVV<span></span></label>
                                                                    <input class="wpcf7-form-control" placeholder="---"
                                                                        value="" name="cvv"
                                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                        type="number" maxlength="3" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                                @php
                                                    $check = Auth::check();
                                                    if($check){
                                                        $card = App\Models\
                                                    }
                                                    // @dd($check);
                                                @endphp
                                            {{-- Contact Us Details --}}
                                            <div class="getaquoteform">
                                                <hr />
                                                <h4>Enter Contact Details </h4>
                                                <div class="row">
                                                    <div class="input-filled col-lg-6 col-md-6">
                                                        <label>First Name<span>*</span></label>
                                                        <input size="40" class="wpcf7-form-control"
                                                            placeholder="Type Full Name" value="{{$check ? Auth::user()->fname : ''}}" type="text"
                                                            name="first_name" required 
                                                            {{$check ? 'readonly' : '' }}
                                                            />
                                                    </div>
                                                    <div class="input-filled col-lg-6 col-md-6">
                                                        <label>Last Name<span>*</span></label>
                                                        <input size="40" class="wpcf7-form-control"
                                                            placeholder="Type Last Name" value="{{$check ? Auth::user()->lname : ''}}" type="text"
                                                            name="last_name" required 
                                                            {{$check ? 'readonly' : '' }}
                                                            />
                                                    </div>
                                                    <div class="input-filled col-lg-6 col-md-6">
                                                        <label>Email Address<span>*</span></label>
                                                        <input size="40" class="wpcf7-form-control"
                                                            placeholder="Type Email Address" value="{{$check ? Auth::user()->email : ''}}"
                                                            type="email" name="email" required
                                                            {{$check ? 'readonly' : '' }}
                                                             />
                                                    </div>
                                                    <div class="input-filled col-lg-6 col-md-6">
                                                        <label>Phone<span>*</span></label>
                                                        <input size="40" class="wpcf7-form-control"
                                                            placeholder="Contact Number" value="{{$check ? Auth::user()->phone : ''}}" type="text"
                                                            name="phone_number" required 
                                                            {{$check ? 'readonly' : '' }}
                                                            />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-filled col-lg-12 col-md-12">
                                                        <label>Special Instructions<span>*</span></label>
                                                        <textarea cols="40" rows="10" class="wpcf7-form-control" placeholder="Special Instructions..."
                                                            name="instruction"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-filled col-12 mb-0 text-center">
                                                        <button type="submit" class="sub" id="submitBtn"><i
                                                                class="fac fac-arrow-right space-right"></i>Submit</button>
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
<script type='text/javascript' src={{ asset('public/admin/assets./js/elementor-assets-js-frontend.min.js') }}
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
        $(document).ready(function() {
            $('#registrationForm').on('submit', function(e) {
                e.preventDefault();
                const submitBtn = document.getElementById('submitBtn');
                
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="spinner-border spinner-border-sm "></i> Processing...';
                
                $.ajax({
                    url: "{{ route('contactUs') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = '<i class="fac fac-arrow-right space-right"></i>Submit';
                        if (response.status === true) {

                            window.location.href = "{{ route('bookingComplete') }}";
                        } else {
                            toastr.error(response.error);
                        }
                    },
                    error: function(xhr) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = '<i class="fac fac-arrow-right space-right"></i>Submit';
                        // Handle validation errors
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorMessage = '';
                            $.each(errors, function(key, value) {
                                errorMessage += value + '\n';
                            });
                            alert(errorMessage);
                        } else {
                            alert('An error occurred. Please try again.');
                        }
                    }
                });
            });
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
    </script>
    <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var albertaBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(48.999647, -118.088306), // Southwest corner of Alberta
                new google.maps.LatLng(60.000848, -110.001746) // Northeast corner of Alberta
            );

            var pickupInput = document.getElementById('pickup_autocomplete');
            var pickupAutocomplete = new google.maps.places.Autocomplete(pickupInput, {
                bounds: albertaBounds,
                strictBounds: true // This ensures results are within the specified bounds
            });

            pickupAutocomplete.addListener('place_changed', function() {
                var place = pickupAutocomplete.getPlace();
                $('#pickup_latitude').val(place.geometry.location.lat());
                $('#pickup_longitude').val(place.geometry.location.lng());

                $("#pickup_latitudeArea").removeClass("d-none");
                $("#pickup_longitudeArea").removeClass("d-none");
            });

            var dropoffInput = document.getElementById('dropoff_autocomplete');
            var dropoffAutocomplete = new google.maps.places.Autocomplete(dropoffInput, {
                bounds: albertaBounds,
                strictBounds: true // This ensures results are within the specified bounds
            });

            dropoffAutocomplete.addListener('place_changed', function() {
                var place = dropoffAutocomplete.getPlace();
                $('#dropoff_latitude').val(place.geometry.location.lat());
                $('#dropoff_longitude').val(place.geometry.location.lng());

                $("#dropoff_latitudeArea").removeClass("d-none");
                $("#dropoff_longitudeArea").removeClass("d-none");
            });
        }
    </script>

    <!-- <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places"></script>
                                                                                        <script>
                                                                                            $(document).ready(function() {
                                                                                                $("#pickup_latitudeArea").addClass("d-none");
                                                                                                $("#pickup_longitudeArea").addClass("d-none");
                                                                                                $("#dropoff_latitudeArea").addClass("d-none");
                                                                                                $("#dropoff_longitudeArea").addClass("d-none");
                                                                                            });
                                                                                        </script>
                                                                                        <script>
                                                                                            google.maps.event.addDomListener(window, 'load', initialize);

                                                                                            function initialize() {
                                                                                                var pickupInput = document.getElementById('pickup_autocomplete');
                                                                                                var pickupAutocomplete = new google.maps.places.Autocomplete(pickupInput);

                                                                                                pickupAutocomplete.addListener('place_changed', function() {
                                                                                                    var place = pickupAutocomplete.getPlace();
                                                                                                    $('#pickup_latitude').val(place.geometry['location'].lat());
                                                                                                    $('#pickup_longitude').val(place.geometry['location'].lng());

                                                                                                    $("#pickup_latitudeArea").removeClass("d-none");
                                                                                                    $("#pickup_longitudeArea").removeClass("d-none");
                                                                                                });

                                                                                                var dropoffInput = document.getElementById('dropoff_autocomplete');
                                                                                                var dropoffAutocomplete = new google.maps.places.Autocomplete(dropoffInput);

                                                                                                dropoffAutocomplete.addListener('place_changed', function() {
                                                                                                    var place = dropoffAutocomplete.getPlace();
                                                                                                    $('#dropoff_latitude').val(place.geometry['location'].lat());
                                                                                                    $('#dropoff_longitude').val(place.geometry['location'].lng());

                                                                                                    $("#dropoff_latitudeArea").removeClass("d-none");
                                                                                                    $("#dropoff_longitudeArea").removeClass("d-none");
                                                                                                });
                                                                                            }
                                                                                        </script> -->
    {{-- Custom Code Start Google Map Client Side  --}}
    <!-- Page cached by LiteSpeed Cache 5.6 on 2023-08-31 03:40:01 -->
@endsection
