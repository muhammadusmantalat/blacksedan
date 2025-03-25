@extends('frontend.layout.app')
@section('title', 'index')
@section('content')

    {{-- <body --}}
    {{-- class="page-template-default page page-id-5439 redux-page  site-h16 body-default-font heading-default-font header-sticky  btn-type-gradient  fixed-footer  mobile-header-light elementor-default elementor-kit-4700 elementor-page elementor-page-5439"> --}}
    @php
        $user = Auth::user();
        // @dd($check);
    @endphp
    <div id="page" class="site">
        <!-- #content -->
        <div id="content" class="site-content">
            <div data-elementor-type="wp-page" data-elementor-id="6653" class="elementor elementor-6653">
                <section class="elementor-section elementor-top-section elementor-element elementor-element-b75cb4e elementor-section-height-min-height elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-items-middle ct-header-fixed-none ct-row-max-none" data-id="b75cb4e" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-35b9442" data-id="35b9442" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-2e483d5 elementor-widget elementor-widget-ct_heading" data-id="2e483d5" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;_animation_delay&quot;:2000}" data-widget_type="ct_heading.default">
                                    <div class="elementor-widget-container">
                                        <div id="ct_heading-2e483d5" class="ct-heading h-align-center sub-style1 ct-heading-left item-st-default">
                                            <div class="ct-item--inner">
                                                <div class="ct-inline-css" data-css=""> </div>
                                                <h3 class="item--title st-default case-animate-time" data-wow-delay="ms"> <span class="sp-main"> Luxury Rides, Budget-Friendly Vibes </span> </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-56c21f9 elementor-widget elementor-widget-text-editor" data-id="56c21f9" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;_animation_delay&quot;:2500}" data-widget_type="text-editor.default">
                                    <div class="elementor-widget-container">
                                        <p><strong>Black Sedan &#8211; Calgary Limo Online Booking</strong> made easy! Follow our simple <a href="https://blacksedans.ca/how-to-make-a-reservation-on-calgary-limo/"><strong>Limo Booking Procedure</strong></a> to reserve your luxury ride in minutes. Wondering <a href="https://blacksedans.ca/how-to-make-a-reservation-on-calgary-limo/"><strong>How to Book a Limousine in Calgary?</strong></a> Just choose your vehicle, select your trip type, enter pick-up and drop-off details, get a quote and confirm. Our streamlined <a href="https://blacksedans.ca/how-to-make-a-reservation-on-calgary-limo/"><strong>Limo Reservation Procedure in Calgary</strong></a> ensures a hassle-free experience, giving you quick access to professional limousine services anytime, anywhere. Book now and enjoy a premium ride </p>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-58e1b26 elementor-align-center animated-slow elementor-widget elementor-widget-ct_button animated fadeIn" data-id="58e1b26" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;_animation_delay&quot;:2800}" data-widget_type="ct_button.default">
                                    <div class="elementor-widget-container">
                                        <div id="ct_button-58e1b26" class="ct-button-wrapper ct-button-layout1 icon- btn--inline "> <span class="ct-icon-active"></span> <a href="#resform" class="btn btn-effect2 icon-active btn-inline-block  " data-wow-delay="ms"> <span class="ct-button-icon ct-align-icon-"> </span> <span class="ct-button-text">Book Now</span> </a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="elementor-section elementor-top-section elementor-element elementor-element-a30a1da elementor-section-boxed elementor-section-height-default elementor-section-height-default ct-header-fixed-none ct-row-max-none" id="resform" data-id="a30a1da" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6627c15" data-id="6627c15" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
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
                                                            <div class="input-filled col-lg-6 col-md-6 mb-0">
                                                                <label>Choose Car*</label>
                                                                <select class="form-control" name="vehicle_id" id="vehicle">
                                                                    <option value="">-- Select Car --</option>
                                                                    @foreach ($vehicles as $vehicle)
                                                                        <option value="{{ $vehicle->id }}" data-name="{{ $vehicle->name }}"
                                                                            {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>
                                                                            {{ $vehicle->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                {{-- @error('vehicle_id') <span class="text-danger">{{ $message }}</span> @enderror --}}
                                                            </div>
                                                            
                                                            <div class=" col-lg-12 col-md-12 d-flex align-items-center">
                                                                {{-- <strong class="text-danger">An additional airport fee of $10 will be
                                                                    applied for Sedans, and $15 for Luxury Full-Size SUVs.</strong> --}}
                                                                    <strong class="text-danger  additionalText d-none">
                                                                        2 days advance booking and advance payment is required.
                                                                    </strong>
                                                            </div>
                                                            <div class=" col-lg-12 col-md-12 d-flex align-items-center">
                                                                {{-- <strong class="text-danger  additionalText d-none">An additional airport fee of $10 will be
                                                                    applied for Sedans, and $15 for Luxury Full-Size SUVs.</strong> --}}
                                                                    <strong class="text-danger  additionalText d-none">
                                                                        2 hours of minimum booking is required.
                                                                    </strong>
                                                            </div>
                                                        </div>
                                                        <!-- Airport Pickup Option -->
                                                        <div class="row" style="margin-top: 16px;">
                                                            <div class="col-lg-6 col-md-6 d-flex align-items-center">
                                                                <label>Is it airport pickup?</label>
                                                                <div class="ml-3">
                                                                    <label class="radio-inline mr-2">
                                                                        <input type="radio" name="airport_pickup" value="yes" 
                                                                               {{ old('airport_pickup') == 'yes' ? 'checked' : '' }}>
                                                                        Yes
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="airport_pickup" value="no" 
                                                                               {{ old('airport_pickup') == 'no' ? 'checked' : '' }}>
                                                                        No
                                                                    </label>
                                                                </div>                                                                
                                                            </div>
                                                            <div class=" col-lg-12 col-md-12 d-flex align-items-center">
                                                                {{-- <strong class="text-danger">An additional airport fee of $10 will be
                                                                    applied for Sedans, and $15 for Luxury Full-Size SUVs.</strong> --}}
                                                                    <strong class="text-danger" id="airportText">
                                                                        There is an additional airport fee applied for airport pickups.
                                                                    </strong>
                                                            </div>
                                                            
                                                        </div>
                                                        <hr>
                                                        <!-- Option Buttons -->
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 oneWayButton">
                                                                <button type="button" id="oneWayButton"
                                                                    class="btn btn-block mb-2">One Way Trip</button>
                                                            </div>
                                                            <div class="col-md-6 col-lg-6 byHourButton">
                                                                <button type="button" id="byHourButton"
                                                                    class="btn btn-block mb-2">By Hour Trip</button>
                                                            </div>
                                                        </div>
                                                        <hr />

                                                        {{-- <!-- Default Fields for One Way -->
                                                        <div id="oneWayFields" class="tripFields">
                                                            <h4 style="color: #fff;">Enter Ride Details</h4>
                                                            <div class="row">
                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Pickup Date<span>*</span></label>
                                                                    <div class="date-field-container" id="date-container">
                                                                        <input size="40" class="wpcf7-form-control" id="appointment-date" type="date" name="pickup_date" min="{{ \Carbon\Carbon::now()->toDateString() }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Pickup Time<span>*</span></label>
                                                                    <div class="time-field-container" id="time-container">
                                                                        <input size="40" class="wpcf7-form-control" type="time" id="pickup-time" name="pickup_time">
                                                                    </div>
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

                                                                  <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Flight Number</label>
                                                                    <input size="40" class="wpcf7-form-control" type="text"
                                                                        name="flight_number" id="flight_number" />
                                                                        <p style="margin-bottom: 0; margin-top: 6px; line-height: 22px;"><strong class="text-danger" id="">
                                                                            IMPORTANT: Flight no will be used to track your flight and adjust the pick-up time accordingly.
                                                                        </strong></p>
                                                                 </div>
                                                                 

                                                            </div>
                                                        </div> --}}

                                                        <!-- Default Fields for One Way -->
                                                        <div id="oneWayFields" class="tripFields">
                                                            <h4 style="color: #fff;">Enter Ride Details</h4>
                                                            <div class="row">
                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Pickup Date<span>*</span></label>
                                                                    <div class="date-field-container" id="date-container">
                                                                        <input size="40" class="wpcf7-form-control" id="appointment-date" type="date" name="pickup_date" 
                                                                            value="{{ old('pickup_date') }}" min="{{ \Carbon\Carbon::now()->toDateString() }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Pickup Time<span>*</span></label>
                                                                    <div class="time-field-container" id="time-container">
                                                                        <input size="40" class="wpcf7-form-control" type="time" id="pickup-time" name="pickup_time" 
                                                                            value="{{ old('pickup_time') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Pickup Location *</label>
                                                                    <input size="40" id="pickup_autocomplete" class="wpcf7-form-control" type="text" name="pickup_location" 
                                                                        value="{{ old('pickup_location') }}" />
                                                                </div>
                                                                <input type="hidden" id="pickup_latitude" name="pickup_latitude" class="form-control" value="{{ old('pickup_latitude') }}">
                                                                <input type="hidden" id="pickup_longitude" name="pickup_longitude" class="form-control" value="{{ old('pickup_longitude') }}">
                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Drop-off Location *</label>
                                                                    <input size="40" class="wpcf7-form-control" type="text" name="dropOff_location" id="dropoff_autocomplete" 
                                                                        value="{{ old('dropOff_location') }}" />
                                                                </div>
                                                                <input type="hidden" id="dropoff_latitude" name="dropoff_latitude" class="form-control" value="{{ old('dropoff_latitude') }}">
                                                                <input type="hidden" id="dropoff_longitude" name="dropoff_longitude" class="form-control" value="{{ old('dropoff_longitude') }}">

                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Flight Number</label>
                                                                    <input size="40" class="wpcf7-form-control" type="text" name="flight_number" id="flight_number" 
                                                                        value="{{ old('flight_number') }}" />
                                                                    <p style="margin-bottom: 0; margin-top: 6px; line-height: 22px;">
                                                                        <strong class="text-danger">
                                                                            IMPORTANT: Flight no will be used to track your flight and adjust the pick-up time accordingly.
                                                                        </strong>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- <!-- Fields for By The Hour (Initially Hidden) -->
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
                                                                    <div class="date-field-container" id="date-container-h">
                                                                        <input size="40" class="wpcf7-form-control hourlyDate" id="appointment-date-h" type="date" name="pickup_date" min="{{ \Carbon\Carbon::now()->toDateString() }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Pickup Time<span>*</span></label>
                                                                    <div class="time-field-container" id="time-container-h">
                                                                        <input size="40" class="wpcf7-form-control" type="time" id="pickup-time-h" name="pickup_time">
                                                                    </div>
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
                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Flight Number</label>
                                                                    <input size="40" class="wpcf7-form-control" type="text"
                                                                        name="flight_number" id="flight_number" />
                                                                        <p style="margin-bottom: 0; margin-top: 6px; line-height: 22px;"><strong class="text-danger" id="">
                                                                            IMPORTANT: Flight no will be used to track your flight and adjust the pick-up time accordingly.
                                                                        </strong></p>
                                                                 </div>
                                                                 
                                    
                                                            </div>
                                                        </div> --}}
                                                        <!-- Fields for By The Hour (Initially Hidden) -->
                                                        <div id="byHourFields" class="tripFields" style="display: none;">
                                                            <h4 style="color: #fff;">Enter Ride Duration Details</h4>
                                                            <div class="row">
                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Duration (Hours)<span>*</span></label>
                                                                    <select class="wpcf7-form-control" name="duration_hours">
                                                                        <option value="" disabled selected>Select Duration</option>
                                                                        <!-- Generate options dynamically for hours using a Blade loop -->
                                                                        @for ($i = 2; $i <= 12; $i++)
                                                                            <option value="{{ $i }}" {{ old('duration_hours') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>

                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Pickup Date<span>*</span></label>
                                                                    <div class="date-field-container" id="date-container-h">
                                                                        <input size="40" class="wpcf7-form-control hourlyDate" id="appointment-date-h" type="date" name="pickup_date" 
                                                                            value="{{ old('pickup_date') }}" min="{{ \Carbon\Carbon::now()->toDateString() }}" />
                                                                    </div>
                                                                </div>

                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Pickup Time<span>*</span></label>
                                                                    <div class="time-field-container" id="time-container-h">
                                                                        <input size="40" class="wpcf7-form-control" type="time" id="pickup-time-h" name="pickup_time" 
                                                                            value="{{ old('pickup_time') }}">
                                                                    </div>
                                                                </div>

                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Pickup Location *</label>
                                                                    <input size="40" id="hour_pickup_autocomplete" class="wpcf7-form-control" type="text" name="pickup_location" 
                                                                        value="{{ old('pickup_location') }}" />
                                                                </div>
                                                                <div class="form-group d-none pickup_latitudeArea">
                                                                    <input type="text" id="hour_pickup_latitude" name="pickup_latitude" class="form-control" value="{{ old('pickup_latitude') }}">
                                                                </div>
                                                                <div class="form-group d-none pickup_longitudeArea">
                                                                    <input type="text" id="hour_pickup_longitude" name="pickup_longitude" class="form-control" value="{{ old('pickup_longitude') }}">
                                                                </div>

                                                                <div class="input-filled col-lg-12 col-md-12">
                                                                    <label>More Details About Destinations<span>*</span></label>
                                                                    <textarea size="40" class="wpcf7-form-control" name="destination">{{ old('destination') }}</textarea>
                                                                </div>

                                                                <div class="input-filled col-lg-6 col-md-6">
                                                                    <label>Flight Number</label>
                                                                    <input size="40" class="wpcf7-form-control" type="text" name="flight_number" id="flight_number" 
                                                                        value="{{ old('flight_number') }}" />
                                                                    <p style="margin-bottom: 0; margin-top: 6px; line-height: 22px;">
                                                                        <strong class="text-danger">
                                                                            IMPORTANT: Flight no will be used to track your flight and adjust the pick-up time accordingly.
                                                                        </strong>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr />
                                                        <div class="row">
                                                            <div class="input-filled col-12">
                                                                <button type="submit" class="btn btn-danger sub"> Get a
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
                        </div>
                    </div>
                </section>
                <!-- <section class="elementor-section elementor-top-section elementor-element elementor-element-b75cb4e elementor-section-height-min-height elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-items-middle ct-header-fixed-none ct-row-max-none" data-id="b75cb4e" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-35b9442" data-id="35b9442" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-2e483d5 elementor-widget elementor-widget-ct_heading" data-id="2e483d5" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;_animation_delay&quot;:2000}" data-widget_type="ct_heading.default">
                                    <div class="elementor-widget-container">
                                        <div id="ct_heading-2e483d5" class="ct-heading h-align-center sub-style1 ct-heading-left item-st-default">
                                            <div class="ct-item--inner">
                                                <div class="ct-inline-css" data-css="              "> </div>
                                                <h3 class="item--title st-default case-animate-time" data-wow-delay="ms"> <span class="sp-main"> Reservation Form </span> </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-56c21f9 elementor-widget elementor-widget-text-editor" data-id="56c21f9" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;_animation_delay&quot;:2500}" data-widget_type="text-editor.default">
                                    <div class="elementor-widget-container">
                                        <p><strong>Black Sedan &#8211; Calgary Limo Online Booking</strong> made easy! Follow our simple <a href="https://blacksedans.ca/how-to-make-a-reservation-on-calgary-limo/"><strong>Limo Booking Procedure</strong></a> to reserve your luxury ride in minutes. Wondering <a href="https://blacksedans.ca/how-to-make-a-reservation-on-calgary-limo/"><strong>How to Book a Limousine in Calgary?</strong></a> Just choose your vehicle, select your trip type, enter pick-up and drop-off details, get a quote and confirm. Our streamlined <a href="https://blacksedans.ca/how-to-make-a-reservation-on-calgary-limo/"><strong>Limo Reservation Procedure in Calgary</strong></a> ensures a hassle-free experience, giving you quick access to professional limousine services anytime, anywhere. Book now and enjoy a premium ride </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->
            </div>
        </div>
    </div>
    {{-- </body> <!-- #page --> --}}
@endsection
<script type='text/javascript' src={{ asset('public/frontend/assets/js/elementor-assets-js-frontend.min.js') }}
    id='elementor-frontend-js'></script>

@section('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {

        // Check if a previously selected vehicle is "Sprinter" or "Stretch" using old()
        var selectedVehicleOld = "{{ old('vehicle_id') ? $vehicles->where('id', old('vehicle_id'))->first()->name : '' }}";

        // Apply logic based on the previously selected vehicle
        if (selectedVehicleOld === "Sprinter" || selectedVehicleOld === "Stretch") {
            $("#byHourButton").trigger("click"); // Auto-click "By Hour Trip"
            $("#oneWayButton").prop("disabled", true); // Disable "One Way Trip"
            $(".additionalText").removeClass("d-none"); // Show additional text
        } else {
            $("#oneWayButton").prop("disabled", false); // Enable "One Way Trip"
            $(".additionalText").addClass("d-none"); // Hide additional text
        }

        $('#vehicle').change(function () {
            var selectedVehicle = $("#vehicle option:selected").data('name'); 
            // alert(selectedVehicle);
            if (selectedVehicle === "Sprinter" || selectedVehicle === "Stretch") {
                $("#byHourButton").trigger("click"); // "By Hour Trip" button auto-click
                $("#oneWayButton").prop("disabled", true); // Disable "One Way Trip"
                $(".additionalText").removeClass("d-none");
            } else {
                $("#oneWayButton").prop("disabled", false); // Enable "One Way Trip"
                $(".additionalText").addClass("d-none");

            }
        });

        // $('.hourlyDate').change(function () {
        //     var selectedVehicle = $("#vehicle option:selected").attr('data-name');
        //     var hourlyDateValue = $('.hourlyDate').val();
        //     if (selectedVehicle === "Sprinter" || selectedVehicle === "Stretch") {
        //         if (hourlyDateValue) {
        //             var hourlyDate = new Date(hourlyDateValue);
        //             var currentDate = new Date();
        //             var diffInHours = (hourlyDate - currentDate) / (1000 * 60 * 60); // Convert ms to hours
        //             if (diffInHours < 48) {
        //                 toastr.error("The hourly date must be at least 48 hours from now.");
        //             }
        //         }
        //     }
        // });


        $('.hourlyDate').change(function () {
        var selectedVehicle = $("#vehicle option:selected").attr('data-name');
        var hourlyDateValue = $('.hourlyDate').val();

            if (selectedVehicle === "Sprinter" || selectedVehicle === "Stretch") {
                if (hourlyDateValue) {
                    var hourlyDate = new Date(hourlyDateValue);
                    var currentDate = new Date();
                    currentDate.setHours(0, 0, 0, 0); // Reset time to midnight

                    // Minimum valid date (2 days from now)
                    var minValidDate = new Date();
                    minValidDate.setDate(currentDate.getDate() + 1);

                    if (hourlyDate < minValidDate) {
                        toastr.error("Please Select your booking date at least 2 days in advance");
                        $('.hourlyDate').val(''); // Clear the invalid date
                    }
                }
            }
        });

   

    });
</script>
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
        document.addEventListener('DOMContentLoaded', () => {
        const dateContainer = document.getElementById('date-container');
        const dateInput = document.getElementById('appointment-date');

        // Ensure the date picker opens on any click
        dateContainer.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent unexpected behaviors
            dateInput.showPicker?.(); // Use `showPicker()` if available
            dateInput.focus(); // Fallback for browsers that don't support `showPicker`
            });
        });
        document.addEventListener('DOMContentLoaded', () => {
            const timeContainer = document.getElementById('time-container');
            const timeInput = document.getElementById('pickup-time');

            // Open time picker when clicking anywhere in the container
            timeContainer.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent unexpected behaviors
                timeInput.showPicker?.(); // Use `showPicker()` if available
                timeInput.focus(); // Fallback for browsers that don't support `showPicker`
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
        const dateContainer = document.getElementById('date-container-h');
        const dateInput = document.getElementById('appointment-date-h');
 
        // Ensure the date picker opens on any click
        dateContainer.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent unexpected behaviors
            dateInput.showPicker?.(); // Use `showPicker()` if available
            dateInput.focus(); // Fallback for browsers that don't support `showPicker`
            });
        });
        document.addEventListener('DOMContentLoaded', () => {
            const timeContainer = document.getElementById('time-container-h');
            const timeInput = document.getElementById('pickup-time-h');

            // Open time picker when clicking anywhere in the container
            timeContainer.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent unexpected behaviors
                timeInput.showPicker?.(); // Use `showPicker()` if available
                timeInput.focus(); // Fallback for browsers that don't support `showPicker`
            });
        });
    </script>

@endsection
