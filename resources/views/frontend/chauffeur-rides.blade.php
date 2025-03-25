@extends('frontend.layout.app')
@section('title', 'Chauffeur Rides')
@section('content')

<style>
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

    @media screen and (max-width: 576px) {
        .tab-pane .button-text {
            font-size: 0.7rem;
        }
    }
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

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
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Offers</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Upcomings Rides</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                            role="tab" aria-controls="nav-contact" aria-selected="false">Past Rides</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        @if ($offers->isEmpty())
                        <div class="text-center py-4">
                            <h5 class="text-danger">No records found.</h5>
                        </div>
                    @else
                        @foreach ($offers as $data)
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
                                    <h6 class="titles m-0">Special Instructions:</h6>
                                    <p class="m-0 ml-3">{{$data->instruction}}</p>
                                </div>
                                <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                                    <h6 class="titles m-0">Pickup Date:</h6>
                                    <p class="m-0 ml-3">{{$data->pickup_date}}</p>
                                </div>
                                <div class="d-flex align-items-center col-sm-6 mb-3 w-100">
                                    <h6 class="titles m-0">Pickup Time:</h6>
                                    <p class="m-0 ml-3">{{$data->pickup_time}}</p>
                                </div>
                                <div class="mt-3 col-12 d-flex justify-content-end">
                                    <form id="acceptRideForm" action="{{ route('chauffer.rides.accept') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="bookingId" value="{{$data->id}}">
                                        <button type="button" class="rounded py-3" id="acceptRideBtn">Accept Ride</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                                    <h6 class="titles m-0">Special instructions
                                        :</h6>
                                    <p class="m-0 ml-3">{{$data->instruction}}</p>
                                </div>
                                <div class="mt-3 col-12 d-flex justify-content-end">
                                    <select name="vehicle_id" id="vehicle_id" class="form-select h-100 mr-3 w-50">
                                        <option selected disabled>Select Vehicle</option>
                                        @foreach ($vehicles as $vehicle)
                                            <option value="{{ $vehicle->id }}" {{ $vehicle->id == $data->vehicle_id ? 'selected' : '' }}>
                                                {{ $vehicle->name }} ({{ $vehicle->model }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($data->chauffeurs_response == 0)
                                        <form id="onTheWayForm" action="{{ route('chauffer.rides.status') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="btnId" value="{{$data->id}}">
                                            <input type="hidden" name="status" value="1">
                                            <button type="button" class="rounded py-3" id="onTheWayBtn">On The Way</button>
                                        </form>
                                    @elseif ($data->chauffeurs_response == 1)
                                        <form id="completeRideForm" action="{{ route('chauffer.rides.status') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="btnId" value="{{$data->id}}">
                                            <input type="hidden" name="status" value="2">
                                            <button type="button" class="rounded py-3" id="completeRideBtn">COMPLETE RIDE</button>
                                        </form>
                                    @endif
                                   
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
                                        <h6 class="titles m-0">Special instructions:</h6>
                                        <p class="m-0 ml-3">{{$data->instruction}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ./Tabs -->
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $("#acceptRideBtn").click(function (e) {
            // alert('dsds');
            e.preventDefault(); // Prevent default form submission
            
            let form = $("#acceptRideForm");
            let actionUrl = form.attr("action");

            $.ajax({
                url: "{{ route('chauffer.rides.accept') }}",
                type: "POST",
                data: form.serialize(),
                success: function (response) {
                    toastr.success("Ride accepted successfully!"); // Show success message
                    location.reload(); // Refresh the page (optional)
                },
                error: function (xhr, status, error) {
                    alert("Something went wrong. Please try again.");
                    console.error(xhr.responseText);
                }
            });
        });

        $("#onTheWayBtn").click(function (e) {
            // alert('dsds');
            e.preventDefault(); // Prevent default form submission
            
            let form = $("#onTheWayForm");
            let actionUrl = form.attr("action");

            $.ajax({
                url: "{{ route('chauffer.rides.status') }}",
                type: "POST",
                data: form.serialize(),
                success: function (response) {
                    // console.log(response);
                    
                // return;
                    toastr.success("Status Updated Successfully!"); // Show success message
                    location.reload(); // Refresh the page (optional)
                },
                error: function (xhr, status, error) {
                    alert("Something went wrong. Please try again.");
                    console.error(xhr.responseText);
                }
            });
        });


        $("#completeRideBtn").click(function (e) {
            // alert('dsds');
            e.preventDefault(); // Prevent default form submission
            
            let form = $("#completeRideForm");
            let actionUrl = form.attr("action");

            $.ajax({
                url: "{{ route('chauffer.rides.status') }}",
                type: "POST",
                data: form.serialize(),
                success: function (response) {
                    toastr.success("Status Updated Successfully!"); // Show success message
                    location.reload(); // Refresh the page (optional)
                },
                error: function (xhr, status, error) {
                    alert("Something went wrong. Please try again.");
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection