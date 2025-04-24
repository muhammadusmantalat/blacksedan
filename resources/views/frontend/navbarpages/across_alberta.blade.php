@extends('frontend.navbarpages.layout.app')
@section('title', 'Premium Limo Services Across Alberta | Black Sedan Limousine Services')
{{-- filepath: c:\xampp\htdocs\blacksedan\resources\views\frontend\navbarpages\airdrie.blade.php --}}
@section('meta')
    <meta name="description"
        content="Calgary Limo Rentals Online Booking made easy! Follow our simple Limo Booking Procedure to reserve your luxury ride in minutes. Wondering How to Book a Limousine in Calgary? Just select your trip type, enter pick-up and drop-off details, choose your vehicle, and confirm. Our streamlined Limo Reservation Procedure in Calgary ensures a hassle-free experience, giving you quick access to professional limousine services anytime, anywhere. Book now and enjoy a premium ride!" />
    <link rel="canonical" href="https://blacksedans.ca/premium-limo-services-across-alberta/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Premium Limo Services Across Alberta | Black Sedan Limousine Services" />
    <meta property="og:description"
        content="Calgary Limo Rentals Online Booking made easy! Follow our simple Limo Booking Procedure to reserve your luxury ride in minutes. Wondering How to Book a Limousine in Calgary? Just select your trip type, enter pick-up and drop-off details, choose your vehicle, and confirm. Our streamlined Limo Reservation Procedure in Calgary ensures a hassle-free experience, giving you quick access to professional limousine services anytime, anywhere. Book now and enjoy a premium ride!" />
    <meta property="og:url" content="https://blacksedans.ca/premium-limo-services-across-alberta/" />
    <meta property="og:site_name" content="Black Sedan Limousine Services" />
    <meta property="article:publisher" content="https://www.facebook.com/profile.php?id=61567240215147" />
    <meta property="article:modified_time" content="2025-01-23T13:53:53+00:00" />
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
                    Premium Limo Services Across Alberta
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
                            <h1 class="mb-0 text-black font-600 services-headings">Areas We Serve: Premium Limo Services
                                Across
                                Alberta
                            </h1>
                        </div>
                        <div class="col-md-7 animate-from-right">
                            <p class="mb-0 services-section-para"><strong>Black Sedans</strong> is proud to provide luxury
                                limousine services
                                across Alberta, including in <strong>Calgary, Airdrie, Cochrane, Okotoks, Chestermere,
                                    Strathmore,</strong> and
                                beyond. With a commitment to offering top-tier comfort, punctuality, and professional
                                chauffeur
                                services, Black Sedans serves clients with a reliable and stylish travel experience tailored
                                to
                                every destination.
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
                <div class="row">
                    <div class="col-12 animate-from-left">
                        <div class="mb-3 service-heading-border"></div>

                        <h1 class="mb-4 text-black font-600 services-headings">Areas We Serve: Premium Limo Services Across
                            Alberta

                        </h1>
                    </div>
                    <div class="col-12 animate-from-right">
                        <p class="mb-4 services-section-para"><strong>Black Sedans</strong> is proud to provide luxury
                            limousine services
                            across Alberta, including in <strong>Calgary, Airdrie, Cochrane, Okotoks, Chestermere,
                                Strathmore,</strong> and
                            beyond. With a commitment to offering top-tier comfort, punctuality, and professional
                            chauffeur
                            services, Black Sedans serves clients with a reliable and stylish travel experience tailored
                            to
                            every destination.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 animate-from-left">

                        <h1 class="mb-4 text-black font-600 services-headings">Calgary Limo Services

                        </h1>
                    </div>
                    <div class="col-12 animate-from-right">
                        <p class="mb-4 services-section-para">In <strong>Calgary</strong>, we offer premium <strong>airport
                                limo services, city
                                tours</strong>, and <strong>special event transportation.</strong> Whether you’re heading to
                            <strong>Calgary International Airport</strong>
                            or exploring the vibrant downtown, <strong>Black Sedans</strong> ensures you enjoy a seamless
                            journey with our
                            experienced chauffeurs and modern fleet.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 animate-from-left">

                        <h1 class="mb-4 text-black font-600 services-headings">Limo Service in Airdrie
                        </h1>
                    </div>
                    <div class="col-12 animate-from-right">
                        <p class="mb-4 services-section-para">For residents and visitors in <strong>Airdrie, Black
                                Sedans</strong> offers reliable <strong>private limo service</strong> for everything from
                            <strong>weddings</strong> and
                            <strong>corporate events</strong> to <strong>airport transfers.</strong> Enjoy hassle-free
                            transport with our dedicated team,
                            committed to punctuality and professionalism.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 animate-from-left">

                        <h1 class="mb-4 text-black font-600 services-headings">Okotoks Limousine Service
                        </h1>
                    </div>
                    <div class="col-12 animate-from-right">
                        <p class="mb-4 services-section-para">In <strong>Okotoks</strong>, our <strong>luxury limo
                                services</strong> make it easy to arrive at your destination in style. With personalized
                            service, we cater to <strong>private parties, special events, and airport shuttles,</strong>
                            ensuring your travel is comfortable and reliable.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 animate-from-left">
                        <h1 class="mb-4 text-black font-600 services-headings">Strathmore, Cochrane & Chestermere Limo
                            Services
                        </h1>
                    </div>
                    <div class="col-12 animate-from-right">
                        <p class="mb-4 services-section-para">Travelers in <strong>Strathmore, Cochrane, and
                                Chestermere</strong> can rely on
                            <strong>Black Sedans</strong> for professional, dependable <strong>limo transportation.</strong>
                            Whether you’re
                            attending an
                            important meeting or enjoying a night out, we deliver a superior experience with our clean,
                            modern fleet.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 animate-from-left">
                        <h1 class="mb-4 text-black font-600 services-headings">Edmonton, St. Albert, and Sherwood Park Limo
                            Services

                        </h1>
                    </div>
                    <div class="col-12 animate-from-right">
                        <p class="mb-4 services-section-para">In <strong>Edmonton</strong> and surrounding areas like
                            <strong>St. Albert</strong> and <strong>Sherwood Park, Black Sedans</strong> provides high-end
                            <strong>corporate limo services</strong> and <strong>special event transportation</strong> for
                            residents and visitors. Arrive at your meeting, wedding, or private function in sophistication
                            and style, knowing our chauffeurs prioritize your comfort and safety.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 animate-from-left">
                        <h1 class="mb-4 text-black font-600 services-headings">Banff, Canmore & Lake Louise Limo Services
                        </h1>
                    </div>
                    <div class="col-12 animate-from-right">
                        <p class="mb-4 services-section-para">For those exploring the scenic beauty of <strong>Banff,
                                Canmore, and Lake Louise, our luxury transportation service</strong> enhances every journey.
                            Perfect for <strong>sightseeing tours, weddings, or corporate retreats, Black Sedans</strong>
                            provides an
                            unmatched travel experience to Alberta’s most iconic destinations.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 animate-from-left">
                        <h1 class="mb-4 text-black font-600 services-headings">Red Deer, Lethbridge & Beyond
                        </h1>
                    </div>
                    <div class="col-12 animate-from-right">
                        <p class="mb-4 services-section-para">From <strong>Red Deer</strong> to <strong>Lethbridge,</strong>
                            we offer comprehensive <strong>limo services</strong> across Alberta. Our chauffeurs are here to
                            ensure you reach
                            your destination in style, whether for <strong>airport pick-ups, city tours, or special
                                occasions.</strong> Let
                            us take care of your travel needs with a level of service that stands out.
                        </p>
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Why Choose Black Sedans for Your Limo
                            Service?
                        </h1>
                    </div>
                    <div style="font-size: 1.15rem;" class="col-12 animate-from-top">
                        <ul>
                            <li><strong>Professional Chauffeurs:</strong> Our team of experienced drivers is committed to
                                providing safe, punctual, and courteous service across all areas we serve.</li>
                            <li><strong>Luxury Fleet:</strong> Choose from a range of high-end vehicles tailored to your
                                needs, including executive sedans and stretch limousines.</li>
                            <li><strong>Customized Experiences:</strong> Enjoy personalized travel solutions, whether you
                                need a wedding limo, corporate transportation, or private tours.</li>
                            <li><strong>Competitive Pricing:</strong> We provide premium services at fair prices, making
                                luxury travel accessible throughout Alberta.</li>
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
