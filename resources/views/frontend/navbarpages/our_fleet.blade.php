@extends('frontend.navbarpages.layout.app')
@section('title', 'Our Fleet')
@section('content')
@php
$flage = Auth::guard('chauffeur')->user();
$chaufferCheck = Auth::guard('chauffeur')->check();
$customerCheck = Auth::guard('web')->check();
$signIn = $chaufferCheck || $customerCheck;
// dd($chaufferCheck);
// dd($customerCheck);
@endphp
<div>
    <div class="d-flex justify-content-center align-items-center home-page-hero fleet-page-hero hero-section">
        <div class="py-4 px-2 hero-intro-section fleet-intro-section">
          <h1 class="mx-2 pt-2 intro-content fade-in">
            SOPHISTICATION ON WHEELS, DESIGNED FOR YOU
          </h1>
          <div class="d-flex pb-2 justify-content-center mt-3 fade-in-delayed">
            <a href="{{ $signIn ? 'https://ranglerzbeta.in/bs-reservation/' : '#bookNowModal' }}" 
            data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" 
            class="btn-4 rounded">
            <span class="fw-bold">Book Now</span>
        </a>
          </div>
        </div>
      </div>

      {{-- Fleet Section --}}
    <div class="pb-5 pt-2 container-custom fleet-section">
        <div class="mb-3 mt-5 heading-border"></div>
        <h1 class="mb-0 text-black text-center">Our Fleet</h1>
        <div class="mt-4 pt-3 fleet-cards">
          <div class="fleet-card">
            <div class="p-3 fleet-card-inner">
              <div class="position-relative fleet-card-image">
                <div class="image-shade"></div>
                <img src="{{ asset("public/header/images/car1.webp") }}" alt="Car 1"  />
              </div>
              <div class="p-3">
                <h4>Lincoln Aviator Sedan</h4>
                <ul class="px-3 mb-0">
                  <li>3 pieces of luggage</li>
                  <li>up-to 3 passengers maximum</li>
                </ul>
                <p class="mb-0 fw-bold">...</p>
                <div class="mt-4">
                  <a href="#bookNowModal" data-bs-toggle="modal" class="btn-4 rounded fleet-btn"><span class="fw-bold">Book Now</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="fleet-card-border-bottom"></div>
          </div>
          <div class="fleet-card">
            <div class="p-3 fleet-card-inner">
              <div class="position-relative fleet-card-image">
                <div class="image-shade"></div>
                <img src="{{ asset("public/header/images/car2.webp") }}" alt="Car 1"  />
              </div>
              <div class="p-3">
                <h4>Cadillac Lyriq Sedan</h4>
                <ul class="px-3 mb-0">
                  <li>3 pieces of luggage</li>
                  <li>up-to 3 passengers maximum</li>
                </ul>
                <p class="mb-0 fw-bold">...</p>
                <div class="mt-4">
                  <a href="{{ $signIn ? 'https://ranglerzbeta.in/bs-reservation/' : '#bookNowModal' }}" 
                  data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" 
                  class="btn-4 rounded">
                  <span class="fw-bold">Book Now</span>
              </a>
                </div>
              </div>
            </div>
            <div class="fleet-card-border-bottom"></div>
          </div>
          <div class="fleet-card">
            <div class="p-3 fleet-card-inner">
              <div class="position-relative fleet-card-image">
                <div class="image-shade"></div>
                <img src="{{ asset("public/header/images/car3.webp") }}" alt="Car 1"  />
              </div>
              <div class="p-3">
                <h4>GMC Yukon Denali Xl SUV</h4>
                <ul class="px-3 mb-0">
                  <li>6 pieces of luggage</li>
                  <li>up-to 6 passengers maximum</li>
                </ul>
                <p class="mb-0 fw-bold">...</p>
                <div class="mt-4">
                  <a href="{{ $signIn ? 'https://ranglerzbeta.in/bs-reservation/' : '#bookNowModal' }}" 
                  data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" 
                  class="btn-4 rounded">
                  <span class="fw-bold">Book Now</span>
              </a>
                </div>
              </div>
            </div>
            <div class="fleet-card-border-bottom"></div>
          </div>
          <div class="fleet-card">
            <div class="p-3 fleet-card-inner">
              <div class="position-relative fleet-card-image">
                <div class="image-shade"></div>
                <img src="{{ asset("public/header/images/car4.webp") }}" alt="Car 1"  />
              </div>
              <div class="p-3">
                <h4>Chevrolet Suburban SUV</h4>
                <ul class="px-3 mb-0">
                  <li>6 pieces of luggage</li>
                  <li>up-to 6 passengers maximum</li>
                </ul>
                <p class="mb-0 fw-bold">...</p>
                <div class="mt-4">
                  <a href="{{ $signIn ? 'https://ranglerzbeta.in/bs-reservation/' : '#bookNowModal' }}" 
                  data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" 
                  class="btn-4 rounded">
                  <span class="fw-bold">Book Now</span>
              </a>
                </div>
              </div>
            </div>
            <div class="fleet-card-border-bottom"></div>
          </div>
          <div class="fleet-card">
            <div class="p-3 h-100 fleet-card-inner">
              <div class="position-relative fleet-card-image">
                <div class="image-shade"></div>
                <img src="{{ asset("public/header/images/car5.jpg") }}" alt="Car 1"  />
              </div>
              <div class="p-3">
                <h4>Ford Transit Sprinter</h4>
                <ul class="px-3 mb-0">
                  <li>8 pieces of luggage</li>
                  <li>up-to 10 passengers maximum</li>
                </ul>
                <p class="mb-0 fw-bold">...</p>
                <div class="mt-4">
                  <a href="{{ $signIn ? 'https://ranglerzbeta.in/bs-reservation/' : '#bookNowModal' }}" 
                  data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" 
                  class="btn-4 rounded">
                  <span class="fw-bold">Book Now</span>
              </a>
                </div>
              </div>
            </div>
            <div class="fleet-card-border-bottom"></div>
          </div>
          <div class="fleet-card">
            <div class="p-3 fleet-card-inner">
              <div class="position-relative fleet-card-image">
                <div class="image-shade"></div>
                <img src="{{ asset("public/header/images/car6.webp") }}" alt="Car 1"  />
              </div>
              <div class="p-3">
                <h4>Dodge Ram Stretch Limousine</h4>
                <ul class="px-3 mb-0">
                  <li>half ton of luggage</li>
                  <li>up-to 15 passengers maximum</li>
                </ul>
                <p class="mb-0 fw-bold">...</p>
                <div class="mt-4">
                  <a href="{{ $signIn ? 'https://ranglerzbeta.in/bs-reservation/' : '#bookNowModal' }}" 
            data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" 
            class="btn-4 rounded">
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

{{-- Book Now modal --}}
<div class="modal fade" id="bookNowModal" tabindex="-1" role="dialog" aria-labelledby="bookNowModalLabel1" aria-hidden="true">
  <div class="modal-dialog d-flex align-items-center h-75" role="document">
      <div class="modal-content">
          <div class="modal-header border-0 d-flex justify-content-end">
              <button type="button" data-bs-dismiss="modal" aria-label="Close" class="d-flex justify-content-center bg-black border-0 text-white rounded align-items-center" style="height: 3rem; width: 4rem; position: absolute; top:0.5rem; right:0.5rem;">
                  <span class="fa-solid fa-xmark"></span>
              </button>
          </div>
          <div class="modal-body text-center">
              <h3 class="fw-bold font-lato text-black text-center">Select Booking Type</h3>
              <p style="font-size: 0.8rem" class="mx-3 my-3 text-dark text-center">
                <strong>In Guest Booking</strong> you don't need to create an account. <br> <strong>In Login to Book</strong> You will have history of all your bookings.
              </p>
              <div class="py-2 mb-3 d-flex gap-3 justify-content-center align-items-center flex-wrap">
                <a href="{{url('/')}}" style="width: 10rem;"  class="py-3 btn bg-black text-white">
                      <span style="font-size:3rem" class="fa-solid fa-user"></span>
                      <p style="line-height: normal;" class="m-0 mt-2 p-0">Continue as guest</p>
                </a>
                  <a href="{{route('customer.login')}}" style="width: 10rem;" class="py-3 btn bg-black text-white">
                      <span style="font-size:3rem" class="fa-solid fa-car"></span>
                      <p style="line-height: normal;" class="m-0 mt-2 p-0">Login to Book</p>
                  </a>
              </div>
          </div>
      </div>
  </div>
</div>

<script>
    $(document).ready(function () {
      $('.fleet-cards').slick({
        slidesToShow: 3, // Show 3 cards by default
        slidesToScroll: 1, // Scroll one card at a time
        infinite: false, // Infinite looping
        draggable: true, // Enable dragging
        arrows: true, // Show navigation buttons
        autoplay:true,
        autoplaySpeed: 2000,
        prevArrow: '<button type="button" class="slick-prev"><span class="fa-solid fa-angle-left arrows"></span></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="fa-solid fa-angle-right arrows"></span></button>',
        responsive: [
          {
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