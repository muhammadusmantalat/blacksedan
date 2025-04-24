@extends('frontend.navbarpages.layout.app')
@section('title', 'Why Choose Black Sedan Limousine Services | Calgary Limo Rentals ONLINE Booking')
{{-- filepath: c:\xampp\htdocs\blacksedan\resources\views\frontend\navbarpages\airdrie.blade.php --}}
@section('meta')
    <meta name="description"
        content="Calgary Limo Rentals Online Booking made easy! Follow our simple Limo Booking Procedure to reserve your luxury ride in minutes. Wondering How to Book a Limousine in Calgary? Just select your trip type, enter pick-up and drop-off details, choose your vehicle, and confirm. Our streamlined Limo Reservation Procedure in Calgary ensures a hassle-free experience, giving you quick access to professional limousine services anytime, anywhere. Book now and enjoy a premium ride!" />
    <link rel="canonical" href="https://blacksedans.ca/why-choose-black-sedan-limousine-services/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Why Choose Black Sedan Limousine Services | Calgary Limo Rentals ONLINE Booking" />
    <meta property="og:description"
        content="Calgary Limo Rentals Online Booking made easy! Follow our simple Limo Booking Procedure to reserve your luxury ride in minutes. Wondering How to Book a Limousine in Calgary? Just select your trip type, enter pick-up and drop-off details, choose your vehicle, and confirm. Our streamlined Limo Reservation Procedure in Calgary ensures a hassle-free experience, giving you quick access to professional limousine services anytime, anywhere. Book now and enjoy a premium ride!" />
    <meta property="og:url" content="https://blacksedans.ca/why-choose-black-sedan-limousine-services/" />
    <meta property="og:site_name" content="Black Sedan Limousine Services" />
    <meta property="article:publisher" content="https://www.facebook.com/profile.php?id=61567240215147" />
    <meta property="article:modified_time" content="2025-01-23T13:53:54+00:00" />
    <meta property="og:image"
        content="https://blacksedans.ca/wp-content/uploads/2025/01/lincoln-aviator-sedan-500x315.webp" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@blacksedaninc" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="5 minutes" />
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
                    Why Choose Black Sedan Limousine Services?
                </h1>
                <div class="d-flex pb-2 justify-content-center mt-3 fade-in-delayed">
                    <a href="{{ $signIn ? $booknow : '#bookNowModal' }}" data-bs-toggle="{{ !$signIn ? 'modal' : '' }}"
                        class="btn-4 rounded">
                        <span class="fw-bold">Book Now</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="pt-4 bg-gray">
            <div class="services-container">
                <div class="py-5">
                    <div class="row">
                        <div class="col-md-5 animate-from-left">
                            <div class="d-flex align-items-center mb-3">

                                <div class="service-heading-border"></div>
                                <p class="mb-0 mt-0 ms-4 services-section-para">Areas We Cover
                                </p>
                            </div>
                            <h1 class="mb-0 text-black font-600 services-headings">Black Sedans – Your Premier Luxury
                                Chauffeur Service in Canada
                            </h1>
                        </div>
                        <div class="col-md-7 animate-from-right">
                            <p class="mb-0 services-section-para">Welcome to <strong>Black Sedans</strong>—the ultimate
                                destination for
                                high-end chauffeur services across Canada. Whether you’re looking for an elegant ride for
                                business meetings, a luxurious Calgary airport limo for seamless airport transfers, or a
                                special vehicle for weddings and events, <strong>Black Sedans</strong> has you covered with
                                our top-tier
                                fleet and professional chauffeurs.
                            </p>
                            <div class="mt-3">
                                <a href="{{ $signIn ? $booknow : '#bookNowModal' }}"
                                    data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" class="btn-4 rounded">
                                    <span class="fw-bold">Book Now</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-4 services-container">
            <div class="py-5">
                <div class="mt-5 row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Why Choose Black Sedan Limousine Services?
                        </h1>
                    </div>
                    <div style="font-size: 1.15rem;" class="col-12 animate-from-top">
                        <p>Experience unparalleled luxury with <strong>Black Sedans.</strong> Our fleet of premium black
                            sedans, SUVs, and
                            executive vehicles is tailored for those who value style, comfort, and reliability. With our
                            service, you get:</p>
                        <ul>
                            <li><strong>Professional Chauffeurs:</strong> Experienced, courteous drivers dedicated to your
                                safety and comfort.</li>
                            <li><strong>Luxury Vehicle:</strong> A fleet of meticulously maintained vehicles to suit any
                                occasion.</li>
                            <li><strong>Timely and Reliable Service:</strong> We prioritize punctuality to ensure a
                                stress-free journey.</li>
                            <li><strong>Flexible Options:</strong> Hourly rentals, round-trip services, and city tours
                                available.</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Our Services
                        </h1>
                    </div>
                    <div style="font-size: 1.15rem;" class="col-12 animate-from-top">
                        <ul>
                            <li><strong>Calgary Airport Limo Service
                                </strong>
                                <p class="mt-2">Arrive at or depart from Calgary Airport in style with our premier airport
                                    limo service.
                                    Enjoy stress-free transportation with luxury amenities, whether for business travel or
                                    leisure.</p>
                            </li>
                            <li><strong>Corporate and Executive Travel</strong>
                                <p class="mt-2">Impress clients and arrive at meetings in style. Our corporate
                                    transportation services ensure a smooth, professional experience for business travelers
                                    in Calgary, Vancouver, and other major Canadian cities.
                                </p>
                            </li>
                            <li><strong>Special Events & Wedding Chauffeur Service</strong>
                                <p class="mt-2">Make your special day memorable with our luxury wedding car service. Black
                                    Sedans provides elegant rides for weddings, proms, and other significant events across
                                    Canada.
                                </p>
                            </li>
                            <li><strong>Hourly and City Tours</strong>
                                <p class="mt-2">Discover Calgary, Toronto, Vancouver, and more with our customizable
                                    hourly car rental and city tour services. Whether exploring the city or attending
                                    meetings at multiple locations, our chauffeurs will ensure a smooth ride.

                                </p>
                            </li>
                            <li><strong>VIP Transportation</strong>
                                <p class="mt-2">Our VIP chauffeur service is designed to cater to celebrities, business
                                    executives, and anyone who values privacy and luxury. Available for all major Canadian
                                    cities, including Calgary, Edmonton, and Montreal.

                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Why Our Clients Trust Us
                        </h1>

                    </div>
                    <div style="font-size: 1.15rem;" class="col-12 animate-from-top">
                        <p>At <strong>Black Sedans,</strong> we pride ourselves on delivering an exceptional travel
                            experience. Our customers choose us for:

                        </p>
                        <ul>
                            <li><strong>Luxury and Comfort:</strong> From plush seating to premium amenities, every detail
                                in our fleet is designed for your comfort.</li>
                            <li><strong>Commitment to Excellence:</strong> Our team goes above and beyond to ensure your
                                journey is nothing short of perfect.</li>
                            <li><strong>Simple Online Booking:</strong> Book your chauffeur service easily on our website
                                for any Canadian city.</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Areas We Serve
                        </h1>

                    </div>
                    <div style="font-size: 1.15rem;" class="col-12 animate-from-top">
                        <p>Black Sedans is proud to offer premium limo services throughout Alberta, including Calgary,
                            Airdrie, Cochrane, Okotoks, High River, Priddis, Chestermere, and Strathmore. Our reliable,
                            luxury transportation also covers Fort Saskatchewan, Sherwood Park, St. Albert, Stony Plain, and
                            Spruce Grove, extending to the beautiful destinations of Banff, Canmore, and Lake Louise.
                        </p>
                        <p>We bring our exceptional service to Lethbridge, Red Deer, Sylvan Lake, and Edmonton as well.
                            Whether you’re looking for <strong>limo services in Calgary</strong> for airport transfers,
                            <strong>private tours
                                in
                                Banff, or chauffeur-driven transport in Edmonton, Black Sedans</strong> ensures a top-notch
                            experience.
                            Travel comfortably and in style with professional chauffeurs and a high-end fleet at your
                            service across Alberta.
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
