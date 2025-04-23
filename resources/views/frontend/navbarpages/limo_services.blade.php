@extends('frontend.navbarpages.layout.app')
@section('title', 'Corporate Limo Service in Calgary | Black Sedan Limousine Services')
{{-- filepath: c:\xampp\htdocs\blacksedan\resources\views\frontend\navbarpages\airdrie.blade.php --}}
@section('meta')
    <meta name="description"
        content="Experience premium limo service in Fort Saskatchewan with easy online limo reservation options. Whether you need luxurious transportation from Fort Saskatchewan or nearby destinations, our limousine services offer comfort and reliability. Skip the hassle of public transport and enjoy a smooth ride within Fort Saskatchewan, from the airport to your destination or around the city. With limo booking made simple, access top-tier, convenient travel for any occasion, anytime. Book now and elevate your journey." />
    <link rel="canonical" href="https://blacksedans.ca/corporate-limo-service-in-calgary/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Corporate Limo Service in Calgary | Black Sedan Limousine Services" />
    <meta property="og:description"
        content="Experience premium limo service in Fort Saskatchewan with easy online limo reservation options. Whether you need luxurious transportation from Fort Saskatchewan or nearby destinations, our limousine services offer comfort and reliability. Skip the hassle of public transport and enjoy a smooth ride within Fort Saskatchewan, from the airport to your destination or around the city. With limo booking made simple, access top-tier, convenient travel for any occasion, anytime. Book now and elevate your journey." />
    <meta property="og:url" content="https://blacksedans.ca/corporate-limo-service-in-calgary/" />
    <meta property="og:site_name" content="Black Sedan Limousine Services" />
    <meta property="article:publisher" content="https://www.facebook.com/profile.php?id=61567240215147" />
    <meta property="article:modified_time" content="2025-01-23T13:53:53+00:00" />
    <meta property="og:image"
        content="https://blacksedans.ca/wp-content/uploads/2025/01/lincoln-aviator-sedan-500x315.webp" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@blacksedaninc" />
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

    <style>
        .bg-gray {
            background-color: #f5f3f3;
        }

        .banner-teller {
            width: 530px;
        }
    </style>

    <div>
        <div class="d-flex justify-content-center align-items-center bg-black hero-section">
            <div class="py-4 px-2 bg-white hero-intro-section banner-teller">
                <h1 class="mx-2 pt-2 intro-content fade-in">
                    Corporate Limo Service

                </h1>
                <div class="d-flex pb-2 justify-content-center mt-3 fade-in-delayed">
                    <a href="{{ $signIn ? $booknow : '#bookNowModal' }}" data-bs-toggle="{{ !$signIn ? 'modal' : '' }}"
                        class="btn-4 rounded">
                        <span class="fw-bold">Book Now</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-5 services-container">
            <div class="bg-white py-5">
                <div class="row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Corporate Limo Service – Luxury and
                            Professionalism for Your Business Needs</h1>
                    </div>
                    <div class="col-12 animate-from-top">
                        <p style="font-size: 1.15rem;" class="mb-3 services-section-para">When it comes to corporate travel,
                            efficiency, reliability, and a polished image are essential. Our Corporate Limo Service offers
                            precisely that, delivering premium transportation solutions for executives, business partners,
                            and VIP clients. With a fleet of top-of-the-line limousines and professional chauffeurs, we
                            ensure a seamless travel experience that reflects the prestige of your business.
                        </p>
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Why Choose Our Corporate Limousine Service?
                        </h1>
                    </div>
                    <div style="font-size: 1.15rem;" class="col-12 animate-from-top">
                        <ul>
                            <li><strong>Punctuality and Reliability</strong></li>
                            <p>We understand that timing is crucial when it comes to airport transfers. Our chauffeurs
                                arrive early for pick-ups and keep a close eye on traffic patterns, ensuring you reach your
                                destination on time. For arrivals, we track flight schedules so we can adjust for any
                                delays, providing you with a seamless airport experience.</p>
                            <li class="mt-2"><strong>Professional Chauffeurs
                                </strong></li>
                            <p>Our chauffeurs are trained to provide courteous, professional service from the moment you’re
                                greeted to the moment you arrive. With extensive knowledge of the area and a commitment to
                                excellent service, they ensure you have a smooth, worry-free ride.</p>
                            <li class="mt-2"><strong>Comfort and Luxury for Every Ride</strong></li>
                            <p>Our airport transfer fleet includes luxury sedans, SUVs, and spacious vehicles designed to
                                make travel enjoyable and comfortable. Whether you’re traveling alone or with a group, our
                                vehicles are equipped to handle your luggage and provide a relaxed space for the journey.
                            </p>
                            <li class="mt-2"><strong>Seamless Pickup and Drop-off Experience
                                </strong></li>
                            <p>Avoid the hassle of finding parking, managing bags, or waiting for a cab. With our airport
                                transfer service, your chauffeur will handle all these details, allowing you to focus on
                                your travel plans. Whether it’s curbside pickup or a personal meet-and-greet service, we
                                make airport transfers easy.
                            </p>
                            <li class="mt-2"><strong>Affordable and Transparent Pricing
                                </strong></li>
                            <p>Enjoy premium service without the premium price tag. We offer competitive rates for airport
                                transfers, with transparent pricing and no hidden fees. Rest assured, you’re getting the
                                best value in luxury transportation for every trip.
                            </p>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        {{-- Fleet Section --}}
        <div class="bg-gray">
            <div class="pb-5 pt-2 container-custom fleet-section">
                <div class="mb-3 mt-5 heading-border"></div>
                <h1 class="mb-0 text-black text-center">Our Fleet</h1>
                <div class="mt-4 pt-3 fleet-cards">
                    <div class="fleet-card">
                        <div class="bg-white p-3 fleet-card-inner">
                            <div class="position-relative fleet-card-image">
                                <div class="image-shade"></div>
                                <img src="{{ asset('public/header/images/car1.webp') }}" alt="Car 1" />
                            </div>
                            <div class="p-3">
                                <h4>Lincoln Aviator Sedan</h4>
                                <ul class="px-3 mb-0">
                                    <li>3 pieces of luggage</li>
                                    <li>up-to 3 passengers maximum</li>
                                    <li>black exterior</li>
                                    <li>black leather interior</li>
                                    <li>charging port available</li>
                                </ul>
                                {{-- <p class="mb-0 fw-bold">...</p> --}}
                                <br>
                                <br>
                                <br>
                                <div class="mt-4">
                                    <a href="#bookNowModal" data-bs-toggle="modal" class="btn-4 rounded fleet-btn"><span
                                            class="fw-bold">Book Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="fleet-card-border-bottom"></div>
                    </div>
                    <div class="fleet-card">
                        <div class="bg-white p-3 fleet-card-inner">
                            <div class="position-relative fleet-card-image">
                                <div class="image-shade"></div>
                                <img src="{{ asset('public/header/images/car2.webp') }}" alt="Car 1" />
                            </div>
                            <div class="p-3">
                                <h4>Cadillac Lyriq Sedan</h4>
                                <ul class="px-3 mb-0">
                                    <li>3 pieces of luggage</li>
                                    <li>up-to 3 passengers maximum</li>
                                    <li>black exterior</li>
                                    <li>black leather interior</li>
                                    <li>electric</li>
                                    <li>charging port available</li>
                                </ul>
                                {{-- <p class="mb-0 fw-bold">...</p> --}}
                                <br>
                                <br>
                                <div class="mt-4">
                                    <a href="{{ $signIn ? $booknow : '#bookNowModal' }}"
                                        data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" class="btn-4 rounded">
                                        <span class="fw-bold">Book Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="fleet-card-border-bottom"></div>
                    </div>
                    <div class="fleet-card">
                        <div class="bg-white p-3 fleet-card-inner">
                            <div class="position-relative fleet-card-image">
                                <div class="image-shade"></div>
                                <img src="{{ asset('public/header/images/car3.webp') }}" alt="Car 1" />
                            </div>
                            <div class="p-3">
                                <h4>GMC Yukon Denali Xl SUV</h4>
                                <ul class="px-3 mb-0">
                                    <li>6 pieces of luggage</li>
                                    <li>up-to 6 passengers maximum</li>
                                    <li>black exterior</li>
                                    <li>black leather interior</li>
                                    <li>free wifi</li>
                                    <li>charging port available</li>
                                </ul>
                                {{-- <p class="mb-0 fw-bold">...</p> --}}
                                <br>
                                <br>
                                <div class="mt-4">
                                    <a href="{{ $signIn ? $booknow : '#bookNowModal' }}"
                                        data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" class="btn-4 rounded">
                                        <span class="fw-bold">Book Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="fleet-card-border-bottom"></div>
                    </div>
                    <div class="fleet-card">
                        <div class="bg-white p-3 fleet-card-inner">
                            <div class="position-relative fleet-card-image">
                                <div class="image-shade"></div>
                                <img src="{{ asset('public/header/images/car4.webp') }}" alt="Car 1" />
                            </div>
                            <div class="p-3">
                                <h4>Chevrolet Suburban SUV</h4>
                                <ul class="px-3 mb-0">
                                    <li>6 pieces of luggage</li>
                                    <li>up-to 6 passengers maximum</li>
                                    <li>black exterior</li>
                                    <li>black leather interior</li>
                                    <li>charging port available</li>
                                </ul>
                                {{-- <p class="mb-0 fw-bold">...</p> --}}
                                <br>
                                <br>
                                <br>
                                <div class="mt-4">
                                    <a href="{{ $signIn ? $booknow : '#bookNowModal' }}"
                                        data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" class="btn-4 rounded">
                                        <span class="fw-bold">Book Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="fleet-card-border-bottom"></div>
                    </div>
                    <div class="fleet-card">
                        <div class="bg-white p-3 h-100 fleet-card-inner">
                            <div class="position-relative fleet-card-image">
                                <div class="image-shade"></div>
                                <img src="{{ asset('public/header/images/car5.jpg') }}" alt="Car 1" />
                            </div>
                            <div class="p-3">
                                <h4>Ford Transit Sprinter</h4>
                                <ul class="px-3 mb-0">
                                    <li>8 pieces of luggage</li>
                                    <li>up-to 10 passengers maximum</li>
                                    <li>black exterior</li>
                                    <li>grey interior</li>
                                </ul>
                                <br>
                                <br>
                                <p class="mb-0 fw-bold">Please note: 2 days in advance booking and advance payment
                                    required!
                                </p>
                                <div class="mt-4">
                                    <a href="{{ $signIn ? $booknow : '#bookNowModal' }}"
                                        data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" class="btn-4 rounded">
                                        <span class="fw-bold">Book Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="fleet-card-border-bottom"></div>
                    </div>
                    <div class="fleet-card">
                        <div class="bg-white p-3 fleet-card-inner">
                            <div class="position-relative fleet-card-image">
                                <div class="image-shade"></div>
                                <img src="{{ asset('public/header/images/car6.webp') }}" alt="Car 1" />
                            </div>
                            <div class="p-3">
                                <h4>Dodge Ram Stretch Limousine</h4>
                                <ul class="px-3 mb-0">
                                    <li>half ton of luggage</li>
                                    <li>up-to 15 passengers maximum</li>
                                    <li>black exterior</li>
                                    <li>black leather interior</li>
                                    <li>black interior</li>
                                </ul>
                                <br />
                                <p class="mb-0 fw-bold">Please note: 2 days in advance booking and advance payment
                                    required!
                                </p>
                                <div class="mt-4">
                                    <a href="{{ $signIn ? $booknow : '#bookNowModal' }}"
                                        data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" class="btn-4 rounded">
                                        <span class="fw-bold">Book Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="fleet-card-border-bottom"></div>
                    </div>
                </div>
                <div class="py-5 mb-4"></div>
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
                        <a href="{{ url('/booknow') }}" style="width: 10rem;" class="py-3 btn bg-black text-white">
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

    <script>
        $(document).ready(function() {
            $('.fleet-cards').slick({
                slidesToShow: 3, // Show 3 cards by default
                slidesToScroll: 1, // Scroll one card at a time
                infinite: false, // Infinite looping
                draggable: true, // Enable dragging
                arrows: true, // Show navigation buttons
                autoplay: true,
                autoplaySpeed: 2000,
                prevArrow: '<button type="button" class="slick-prev"><span class="fa-solid fa-angle-left arrows"></span></button>',
                nextArrow: '<button type="button" class="slick-next"><span class="fa-solid fa-angle-right arrows"></span></button>',
                responsive: [{
                        breakpoint: 991, // On screens smaller than 767px
                        settings: {
                            slidesToShow: 2, // Show 2 cards
                        },
                    },
                    {
                        breakpoint: 575, // On screens smaller than 575px
                        settings: {
                            slidesToShow: 1, // Show 1 card
                        },
                    },
                ],
            });
        });
    </script>

@endsection
