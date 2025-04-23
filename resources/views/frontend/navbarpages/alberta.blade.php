@extends('frontend.navbarpages.layout.app')
@section('title', 'Premium Limo Services Across Alberta | Black Sedans Luxury Rides')
{{-- filepath: c:\xampp\htdocs\blacksedan\resources\views\frontend\navbarpages\airdrie.blade.php --}}
@section('meta')
    <meta name="description"
        content="Travel in luxury with Black Sedans’ premium limo services across Alberta. Available for weddings, corporate events, airport transfers, and more. Book your ride today!" />
    <link rel="canonical" href="https://blacksedans.ca/online-limo-services-alberta/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Premium Limo Services Across Alberta | Black Sedans Luxury Rides" />
    <meta property="og:description"
        content="Travel in luxury with Black Sedans’ premium limo services across Alberta. Available for weddings, corporate events, airport transfers, and more. Book your ride today!" />
    <meta property="og:url" content="https://blacksedans.ca/online-limo-services-alberta/" />
    <meta property="og:site_name" content="Black Sedan Limousine Services" />
    <meta property="article:publisher" content="https://www.facebook.com/profile.php?id=61567240215147" />
    <meta property="article:modified_time" content="2025-01-23T13:53:53+00:00" />
    <meta property="og:image"
        content="https://blacksedans.ca/wp-content/uploads/2025/01/lincoln-aviator-sedan-500x315.webp" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@blacksedaninc" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="4 minutes" />
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

        <div class="mt-5 services-container">
            <div class="bg-white py-5">
                <div class="row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Experience Luxury with Black Sedans’ Premium
                            Limo Services Across Alberta

                        </h1>
                    </div>
                    <div class="col-12 animate-from-top">
                        <p style="font-size: 1.15rem;" class="mb-3 services-section-para">Explore Calgary like never before
                            Travel in style with <strong>Black Sedans’ premium limo services</strong>, offering luxury,
                            comfort, and impeccable service across Alberta. Whether you’re heading to a special event,
                            airport, or looking to enjoy a city tour, our premium limos ensure you travel in elegance.</p>
                        <p>Our fleet of sophisticated vehicles and professional chauffeurs are dedicated to providing you
                            with an unforgettable transportation experience.
                        </p>
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Why Choose Black Sedans for Premium Limo
                            Services in Alberta?
                        </h1>
                    </div>
                    <div style="font-size: 1.15rem;" class="col-12 animate-from-top">
                        <ul>
                            <li><strong>Top-of-the-Line Fleet</strong></li>
                            <p class="mt-3">Our limos are equipped with the finest amenities, ensuring your ride is as
                                luxurious as it is comfortable.
                            </p>
                            <li><strong>Professional Chauffeurs
                                </strong></li>
                            <p class="mt-3">Our well-trained chauffeurs offer the highest level of service, ensuring you
                                have a seamless and pleasant journey.

                            </p>
                            <li><strong>Customized Services
                                </strong></li>
                            <p class="mt-3">Tailor your limo service to suit your needs, whether it’s a special occasion,
                                corporate event, or a relaxing night out.

                            </p>
                            <li><strong>On-Time, Every Time

                                </strong></li>
                            <p class="mt-3">We pride ourselves on punctuality, ensuring you arrive at your destination on
                                time and in style.
                            </p>
                            <li><strong>24/7 Availability
                                </strong></li>
                            <p class="mt-3">Whether it’s early morning or late night, we are available to cater to your
                                transportation needs at any time.

                            </p>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Our Premium Limo Services Include

                        </h1>
                    </div>
                    <div style="font-size: 1.15rem;" class="col-12 animate-from-top">
                        <ul>
                            <li class="mb-2"><strong>Airport Transfers:</strong> Travel to and from Alberta’s airports in
                                style with our reliable airport limo services. Enjoy comfort and luxury as you begin or end
                                your trip.
                            </li>
                            <li class="mb-2"><strong>Weddings & Special Events:</strong> Make your big day even more
                                special with our limo services. Arrive in elegance and make a statement at weddings, proms,
                                parties, and more.
                            </li>
                            <li class="mb-2"><strong>Corporate Travel:</strong> Impress your clients or colleagues with
                                our executive limo services. Perfect for meetings, conferences, and corporate events.
                            </li>
                            <li class="mb-2"><strong>Sightseeing & Tours:</strong> Experience Alberta’s stunning scenery
                                in comfort. Our luxurious limos are perfect for city tours or trips to local attractions.
                            </li>
                            <li class="mb-2"><strong>Hidden Gems:</strong> Celebrate your special occasion in style with a
                                limo service that ensures comfort and elegance for your entire group.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="col-12 animate-from-top">
                        <div class="mb-3 service-heading-border"></div>
                        <h1 class="mb-4 text-black font-600 services-headings">Benefits of Booking Premium Limo Services
                            with Black Sedans
                        </h1>
                    </div>
                    <div style="font-size: 1.15rem;" class="col-12 animate-from-top">
                        <ul>
                            <li class="mb-2"><strong>Luxurious Comfort:</strong> Ride in comfort with plush interiors,
                                climate control, and premium entertainment options.
                            </li>
                            <li class="mb-2"><strong>Experienced Chauffeurs:</strong> Our professional drivers ensure
                                safety, punctuality, and superior customer service.
                            </li>
                            <li class="mb-2"><strong>Flexible and Customized:</strong> We tailor our services to meet your
                                needs and preferences, ensuring a personalized experience.
                            </li>
                            <li class="mb-2"><strong>Competitive Pricing:</strong> Luxury doesn’t have to come with a
                                hefty price tag. We offer competitive rates for high-quality service.
                            </li>
                            <li class="mb-2"><strong>Group-Friendly:</strong> Our fleet accommodates groups of any size,
                                from small parties to large gatherings.
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
