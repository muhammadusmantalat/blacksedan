@extends('frontend.navbarpages.layout.app')
@section('title', 'Contact Us | Calgary Airport Limousine | Toronto Airport Limo')
@section('meta')
    <meta name="description"
        content="When it comes to reserving a limo ride, Black Sedan is the name which you can trust. Weprovided with the highest level of quality service" />
    <link rel="canonical" href="https://ranglerzbeta.in/blacksedans/contact-us/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Contact Us | Calgary Airport Limousine | Toronto Airport Limo" />
    <meta property="og:description"
        content="When it comes to reserving a limo ride, Black Sedan is the name which you can trust. Weprovided with the highest level of quality service" />
    <meta property="og:url" content="https://ranglerzbeta.in/blacksedans/contact-us/" />
    <meta property="og:site_name" content="Black Sedan Limousine Services" />
    <meta property="article:publisher" content="https://www.facebook.com/profile.php?id=61567240215147" />
    <meta property="article:modified_time" content="2025-01-27T11:46:24+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@blacksedaninc" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="1 minute" />
@endsection
@section('content')
    @php
        $flage = Auth::guard('chauffeur')->user();
        $chaufferCheck = Auth::guard('chauffeur')->check();
        $customerCheck = Auth::guard('web')->check();
        $signIn = $chaufferCheck || $customerCheck;
        // dd($chaufferCheck);
        // dd($customerCheck);
        $booknow = route('getBlackSeedan');
    @endphp
    <div>
        <div class="d-flex justify-content-center align-items-center home-page-hero hero-section contact-hero">
            <div class="py-4 px-2 hero-intro-section services-intro-section">
                <h1 class="mx-2 pt-2 intro-content fade-in">
                    YOUR SATISFACTION, OUR PRIORITY
                </h1>
                <div class="d-flex pb-2 justify-content-center mt-3 fade-in-delayed">
                    <a href="{{ $signIn ? $booknow : '#bookNowModal' }}" data-bs-toggle="{{ !$signIn ? 'modal' : '' }}"
                        class="btn-4 rounded">
                        <span class="fw-bold">Book Now</span>
                    </a>
                    </a>
                </div>
            </div>
        </div>

        <div class="px-lg-4 px-xl-5 mx-xl-4">
            <div class="row mx-0">
                <div class="col-md-5 d-flex align-items-center py-5 py-md-0 contact-left">
                    <div>
                        <div>
                            <div class="bg-white left-heading-border"></div>
                            <h1 class="text-white mt-3 font-600 font-lato">Contact us</h1>
                            <div class="mt-4">
                                <div class="d-flex align-items-center gap-2 contact-info">
                                    <div class="bg-white rounded contact-icon">
                                        <span class="fa-solid fa-phone text-black"></span>
                                    </div>
                                    <div>
                                        <p class="m-0 contact-line">Disptach Line for 24/7</p>
                                        <a href="tel:+18257355538" class="contact-way">+1 825-735-5538</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 mt-3 contact-info">
                                    <div class="bg-white rounded contact-icon">
                                        <span class="fa-solid fa-envelope text-black"></span>
                                    </div>
                                    <div>
                                        <p class="m-0 contact-line">Send Your Queries At:</p>
                                        <a href="https://blacksedans.ca/contact-us/info@blacksedan.com"
                                            class="contact-way">info@blacksedans.ca</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 pt-4">
                            <div class="bg-white left-heading-border"></div>
                            <h1 class="text-white mt-3 font-600 font-lato">Why Chose Us?</h1>
                            <div class="mt-5 font-lato">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="fa-solid fa-arrow-right text-white"></span>
                                    <p class="mb-0 text-white list-line">24/7 availability</p>
                                </div>
                                <div class="d-flex align-items-center mt-2 gap-2">
                                    <span class="fa-solid fa-arrow-right text-white"></span>
                                    <p class="mb-0 text-white list-line">Experienced and licensed chauffeurs</p>
                                </div>
                                <div class="d-flex align-items-center mt-2 gap-2">
                                    <span class="fa-solid fa-arrow-right text-white"></span>
                                    <p class="mb-0 text-white list-line">Luxurious and clean cars</p>
                                </div>
                                <div class="d-flex align-items-center mt-2 gap-2">
                                    <span class="fa-solid fa-arrow-right text-white"></span>
                                    <p class="mb-0 text-white list-line">Professional and on-time</p>
                                </div>
                                <div class="d-flex align-items-center mt-2 gap-2">
                                    <span class="fa-solid fa-arrow-right text-white"></span>
                                    <p class="mb-0 text-white list-line">High client satisfaction</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 py-5 px-5 contact-right">
                    <div class="left-heading-border"></div>
                    <h1 class="text-black mt-3 font-600 font-lato contact-heading">Contact Us for More Information!</h1>
                    <div class="mt-5 row gy-4">
                        <div class="col-md-6">
                            <label for="name" class="text-black">Your Name*</label>
                            <input type="text" id="name" class="input-field" placeholder="Type Full Name">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="text-black">Email Address*</label>
                            <input type="text" id="email" class="input-field" placeholder="Type Email Address">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="text-black">Phone*</label>
                            <input type="text" id="phone" class="input-field" placeholder="Contact Number">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="text-black">No. of Passengers*</label>
                            <input type="text" id="phone" class="input-field" placeholder="No. of Passengers">
                        </div>
                        <div class="col-md-6">
                            <label for="type" class="text-black">Select Limo Type*</label>
                            <select name="" id="type" class="input-field">
                                <option selected disabled>-- Select Limo--</option>
                                <option value="">Sedan</option>
                                <option value="">Luxury Full Size SUV</option>
                                <option value="">Stretch</option>
                                <option value="">Sprinter</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="date" class="text-black">Pickup Date and Time*</label>
                            <input type="datetime-local" id="date" class="input-field">
                        </div>
                        <div class="col-md-6">
                            <label for="pickup" class="text-black">Pickup Details*</label>
                            <textarea name="" id="pickup" cols="20" rows="4" class="input-field"
                                placeholder="Pickup Details..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="drop" class="text-black">Drop Off Details*</label>
                            <textarea name="" id="drop" cols="20" rows="4" class="input-field"
                                placeholder="Drop Off Details..."></textarea>
                        </div>
                        <div class="col-12">
                            <label for="instruction" class="text-black">Special Instructions</label>
                            <textarea name="" id="instruction" cols="20" rows="4" class="input-field"
                                placeholder="Special Instructions..."></textarea>
                        </div>
                        <div>
                            <button class="bg-black border-0 d-flex align-items-center gap-2 font-lato submit-button">
                                <span class="fa-solid fa-arrow-right text-white"></span>
                                <p class="mb-0 font-600 text-white">Submit Now</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Book Now modal --}}
    <div class="modal fade" id="bookNowModal" tabindex="-1" role="dialog" aria-labelledby="bookNowModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog d-flex align-items-center h-75" role="document">
            <div class="modal-content">
                <div class="modal-header border-0 d-flex justify-content-end">
                    <button type="button" data-bs-dismiss="modal" aria-label="Close"
                        class="d-flex justify-content-center bg-black border-0 text-white rounded align-items-center"
                        style="height: 3rem; width: 4rem; position: absolute; top:0.5rem; right:0.5rem;">
                        <span class="fa-solid fa-xmark"></span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h3 class="fw-bold font-lato text-black text-center">Select Booking Type</h3>
                    <p style="font-size: 0.8rem" class="mx-3 my-3 text-dark text-center">
                        <strong>In Guest Booking</strong> you don't need to create an account. <br> <strong>In Login to
                            Book</strong> You will have history of all your bookings.
                    </p>
                    <div class="py-2 mb-3 d-flex gap-3 justify-content-center align-items-center flex-wrap">
                        <a href="{{ url('/') }}" style="width: 10rem;" class="py-3 btn bg-black text-white">
                            <span style="font-size:3rem" class="fa-solid fa-user"></span>
                            <p style="line-height: normal;" class="m-0 mt-2 p-0">Continue as guest</p>
                        </a>
                        <a href="{{ route('customer.login') }}" style="width: 10rem;"
                            class="py-3 btn bg-black text-white">
                            <span style="font-size:3rem" class="fa-solid fa-car"></span>
                            <p style="line-height: normal;" class="m-0 mt-2 p-0">Login to Book</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
