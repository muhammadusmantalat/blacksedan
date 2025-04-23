@extends('frontend.navbarpages.layout.app')
@section('title', 'City Tours in Calgary | Luxury &amp; Customized Rides')
{{-- filepath: c:\xampp\htdocs\blacksedan\resources\views\frontend\navbarpages\airdrie.blade.php --}}
@section('meta')
    <meta name="description"
        content="Discover Calgary with Black Sedans’ luxury city tours. Visit landmarks, explore scenic drives, and enjoy personalized itineraries in premium vehicles." />
    <link rel="canonical" href="https://blacksedans.ca/city-tours-in-calgary/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="City Tours in Calgary | Luxury &amp; Customized Rides" />
    <meta property="og:description"
        content="Discover Calgary with Black Sedans’ luxury city tours. Visit landmarks, explore scenic drives, and enjoy personalized itineraries in premium vehicles." />
    <meta property="og:url" content="https://blacksedans.ca/city-tours-in-calgary/" />
    <meta property="og:site_name" content="Black Sedan Limousine Services" />
    <meta property="article:publisher" content="https://www.facebook.com/profile.php?id=61567240215147" />
    <meta property="article:modified_time" content="2025-01-23T13:53:53+00:00" />
    <meta property="og:image"
        content="https://blacksedans.ca/wp-content/uploads/2025/01/lincoln-aviator-sedan-500x315.webp" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@blacksedaninc" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="3 minutes" />
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
                    City Tours in Calgary
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
                        <h1 class="mb-4 text-black font-600 services-headings">Discover Calgary in Style with Black Sedans’
                            City Tours

                        </h1>
                    </div>
                    <div class="col-12 animate-from-top">
                        <p style="font-size: 1.15rem;" class="mb-3 services-section-para">Explore Calgary like never before
                            with <strong>Black Sedans’ luxury city tours.</strong> From iconic landmarks to hidden gems, our
                            chauffeured city
                            tours provide a seamless blend of comfort, style, and personalized service.

                        </p>
                        <p>Whether you’re a visitor discovering Calgary for the first time or a local rediscovering the
                            city’s charm, our tours ensure a memorable experience.

                        </p>
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Why Choose Black Sedans for Calgary City
                            Tours?

                        </h1>
                    </div>
                    <div style="font-size: 1.15rem;" class="col-12 animate-from-top">
                        <ul>
                            <li><strong>Luxury Fleet</strong></li>
                            <p class="mt-3">Travel in our premium vehicles, equipped with plush interiors and modern
                                amenities.
                            </p>
                            <li><strong>Professional Chauffeurs
                                </strong></li>
                            <p class="mt-3">Knowledgeable, courteous drivers who double as guides, ensuring you don't miss
                                a thing.
                            </p>
                            <li><strong>Tailored Itineraries</strong></li>
                            <p class="mt-3">Customize your tour to include must-see attractions and your personal
                                favorites.
                            </p>
                            <li><strong>Flexible Schedules
                                </strong></li>
                            <p class="mt-3">Enjoy the city at your pace with tours available 24/7.

                            </p>
                            <li><strong>Comfort and Convenience

                                </strong></li>
                            <p class="mt-3">Sit back, relax, and let us handle the traffic while you enjoy Calgary’s
                                beauty.
                            </p>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">What You’ll Experience on Our Calgary City
                            Tours
                        </h1>
                    </div>
                    <div style="font-size: 1.15rem;" class="col-12 animate-from-top">
                        <ul>
                            <li class="mb-2"><strong>Luxury Fleet:</strong> Visit Calgary Tower, the Glenbow Museum, and
                                Heritage Park
                                with ease.
                            </li>
                            <li class="mb-2"><strong>Natural Beauty:</strong> Explore the Bow River pathways, Prince’s
                                Island Park, and
                                Nose Hill Park.

                            </li>
                            <li class="mb-2"><strong>Cultural Hotspots:</strong> Immerse yourself in Calgary’s vibrant
                                arts and culture
                                scene, from the
                                National Music Centre to local galleries.
                            </li>
                            <li class="mb-2"><strong>Scenic Drives:</strong> Enjoy panoramic views of Calgary’s skyline
                                and the nearby
                                Rockies.
                            </li>
                            <li class="mb-2"><strong>Hidden Gems:</strong> Discover unique local spots, trendy
                                neighborhoods, and
                                lesser-known
                                attractions.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Benefits of Booking with Black Sedans

                        </h1>
                    </div>
                    <div style="font-size: 1.15rem;" class="col-12 animate-from-top">
                        <ul>
                            <li class="mb-2"><strong>Personalized Experiences:</strong> Tours tailored to your interests,
                                whether it’s history, nature, or modern attractions.
                            </li>
                            <li class="mb-2"><strong>All-Inclusive Pricing:</strong> Transparent pricing with no hidden
                                fees.

                            </li>
                            <li class="mb-2"><strong>Comfortable Rides:</strong> Spacious, climate-controlled vehicles
                                ensure a relaxing journey.
                            </li>
                            <li class="mb-2"><strong>Group-Friendly:</strong> Perfect for solo travelers, families, or
                                groups of any size.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Enhance Your Calgary Experience
                        </h1>
                    </div>
                    <div class="col-12 animate-from-top">
                        <p style="font-size: 1.15rem;" class="mb-3 services-section-para">Let <strong>Black Sedans</strong>
                            redefine your city tour experience. Our luxury vehicles, expert chauffeurs, and tailored
                            itineraries ensure a tour that’s as unique as you are.

                        </p>
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
