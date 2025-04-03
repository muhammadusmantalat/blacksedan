@extends('frontend.navbarpages.layout.app')
@section('title', 'About Us')
@section('content')
@php
  $flage = Auth::guard('chauffeur')->user();
  $chaufferCheck = Auth::guard('chauffeur')->check();
  $customerCheck = Auth::guard('web')->check();
  $signIn = $chaufferCheck || $chaufferCheck;
  @endphp
<div>
  <div class="d-flex justify-content-center align-items-center home-page-hero fleet-page-hero about-hero hero-section">
    <div class="py-4 px-2 hero-intro-section fleet-intro-section">
      <h1 class="mx-2 pt-2 intro-content fade-in">
        WHERE ELEGANCE MEETS AFFORDABILITY
      </h1>
      <div class="d-flex pb-2 justify-content-center mt-3 fade-in-delayed">
        <a href="{{ $customerCheck ? 'https://reservation.blacksedans.ca/' : '#bookNowModal' }}" 
              data-bs-toggle="{{ !$customerCheck ? 'modal' : '' }}" 
              class="btn-4 rounded">
              <span class="fw-bold">Book Now</span>
            </a>
      </div>
    </div>
  </div>

  {{-- Fleet Section --}}
  <div class="pt-2 px-lg-4 container-custom about-section">
      <div class="mb-3 mt-5 heading-border"></div>
      <h1 class="pb-2 text-black font-600">Welcome to Black Sedan</h1>
      <p class="mt-4 about-para animate-on-scroll">When it comes to reserving a limo ride, <strong>BLACK SEDAN LIMO</strong> is the name, which you can <strong>trust</strong>. You are provided with the highest level of <strong>quality service and professionalism</strong> that cannot be found anywhere else. We make sure the services you are looking for are provided <strong>effectively and efficiently</strong> in our luxurious cars. Black Sedan limo service consists of <strong>dedicated customer support</strong> representatives and <strong>highly trained chauffeurs</strong>. All the customers are treated with <strong>respect and care</strong>. So, go ahead and <strong>BOOK NOW!</strong> Ride in luxury, rest in comfort!
      </p>
  </div>

  {{-- Slick Slider --}}
  <div class="px-lg-4 my-5 position-relative container-custom review-container">
    <div class="pt-3 pb-5 px-4 bg-black">
      <div class="mb-3 mt-5 bg-white heading-border"></div>
      <h1 class="pb-2 text-center text-white font-600  animate-from-top">Customer Reviews</h1>
      <div class="mt-5 review-slider">
        <div class="reviews-card-in">
          <div class="d-flex gap-1 justify-content-center align-items-center">
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
          </div>
          <div class="mt-3">
            <p class="mb-0 review-description">This place is amazing! Very efficient, personable service, very clean, very reasonable prices. I highly recommend them.</p>
          </div>
          <h6 class="text-white text-center mt-4">Aliyah Juma</h6>
          <p class="text-center google-review">(Google Review)</p>
        </div>
        <div class="reviews-card-in">
          <div class="d-flex gap-1 justify-content-center align-items-center">
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
          </div>
          <div class="mt-3">
            <p class="mb-0 review-description">Love this family-run fleet of luxury vehicles. Dependable, comfortable and prompt service. When in Calgary, I highly recommend Black Sedan. A+++</p>
          </div>
          <h6 class="text-white text-center mt-4">Dan and Mary Halpern</h6>
          <p class="text-center google-review">(Google Review)</p>
        </div>
        <div class="reviews-card-in">
          <div class="d-flex gap-1 justify-content-center align-items-center">
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
          </div>
          <div class="mt-3">
            <p class="mb-0 review-description">My family and I had a very good experience with this service coming back from a tiring trip back from a vacation.  The car was well kept, clean, and comfortable with lots of space.  Our driver was extremely polite, professional, and kind as he made sure of our comfort, as well as the loading and security of the luggage.  He was also an excellent driver as he suggested the fastest route possible to our destination quickly.  I have used this service many times and I can confirm that the consistency in quality of this service is very high.  I would highly recommend Black Sedan’s services.</p>
          </div>
          <h6 class="text-white text-center mt-4">TDM</h6>
          <p class="text-center google-review">(Google Review)</p>
        </div>
        <div class="reviews-card-in">
          <div class="d-flex gap-1 justify-content-center align-items-center">
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
          </div>
          <div class="mt-3">
            <p class="mb-0 review-description">The company has exceptional drivers that are extremely professional, polite and courteous. I have used their services both personally and professionally and always feel safe when using them. They have a newer fleet of vehicles that are clean and very well maintained.</p>
          </div>
          <h6 class="text-white text-center mt-4">J Wagar</h6>
          <p class="text-center google-review">(Google Review)</p>
        </div>
        <div class="reviews-card-in">
          <div class="d-flex gap-1 justify-content-center align-items-center">
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
            <span class="fa-solid fa-star star"></span>
          </div>
          <div class="mt-3">
            <p class="mb-0 review-description">Their attention to detail and commitment to customer satisfaction are truly commendable. I highly recommend their services for any special occasion or transportation needs!</p>
          </div>
          <h6 class="text-white text-center mt-4">Abdul Rehman</h6>
          <p class="text-center google-review">(Google Review)</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $('.review-slider').slick({
      slidesToShow: 1, // Show 1 review at a time
      slidesToScroll: 1, // Scroll one review at a time
      infinite: true, // Infinite looping
      draggable: true, // Enable dragging
      dots: true,
      arrows: true, // Show navigation buttons
      autoplay: false, // Enable autoplay
      autoplaySpeed: 3000, // Set autoplay speed
      prevArrow: '<button type="button" class="slick-prev-btn"><span class="fa-solid fa-angle-left"></span></button>',
      nextArrow: '<button type="button" class="slick-next-btn"><span class="fa-solid fa-angle-right"></span></button>',
    });
  });

  
</script>

@endsection