@extends('frontend.navbarpages.layout.app')
@section('title', 'Our Services')
@section('content')
@php
$flage = Auth::guard('chauffeur')->user();
$chaufferCheck = Auth::guard('chauffeur')->check();
$customerCheck = Auth::guard('web')->check();
$signIn = $chaufferCheck || $chaufferCheck;
@endphp
<div>
  <div class="d-flex justify-content-center align-items-center home-page-hero hero-section services-hero">
    <div class="py-4 px-2 hero-intro-section services-intro-section">
      <h1 class="mx-2 pt-2 intro-content fade-in">
        TOP-TIER LIMO SERVICE, TAILORED TO YOUR BUDGET
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
  <div class="mt-5 services-container">
    <div class="bg-white py-5">
      <div class="row">
        <div class="col-md-6 animate-from-left">
          <div class="mb-3 service-heading-border"></div>
          <h1 class="mb-0 text-black font-600 services-headings">Services in Calgary and Surrounding Areas</h1>
        </div>
        <div class="col-md-6 animate-from-right">
          <p class="mb-0 services-section-para">Black Sedan offers transportation services in Calgary and surrounding areas. Our services include airport transfers, corporate events, special occasions, Canmore/Banff/Lake Louise, and more! We make sure that customers are offered affordable luxury with exceptional service.</p>
        </div>
      </div>
      <div class="row pt-3 my-5">
        <div class="col-md-6 animate-from-left">
          <div class="mb-3 service-heading-border"></div>
          <h1 class="mb-0 text-black font-600 services-headings">24//7 Limousine Service</h1>
        </div>
        <div class="col-md-6 animate-from-right">
          <p class="mb-0 services-section-para">Black Sedan offers limo services around the clock. We make sure you get to your destination on time, anytime.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-black service-section">
    <div class="row mx-0">
      <div class="col-md-6 pt-5 pb-4 pb-md-5 service-content">
        <h3 class="text-white font-600 font-lato mb-4 animate-from-bottom">Airport Limo Service</h3>
        <p class="text-white fw-medium font-lato service-para animate-from-bottom">Travel to and from Calgary International Airport (YYC) in luxury and comfort with our <strong>professional and proficient</strong> chauffeurs. Our dedicated staff constantly <strong>monitors your flight status</strong> in order to make sure that you are provided with the <strong>utmost level of service and quality.</strong> We offer <strong>complimentary airport meet and greet service.</strong> A chauffeur bearing a printed meet and greet sign will meet in one of two places, depending on the flight. <strong>For domestic flights,</strong> the chauffeur will meet the customers just prior to baggage claim. <strong>For international flights,</strong> the chauffeurs will meet the customers after customs and baggage claim.</p>
        <p class="text-white fw-medium font-lato mt-3 service-para animate-from-bottom"><strong>PLEASE NOTE:</strong> airport pickups include additional charges.</p>
        
        <a href="{{ $customerCheck ? 'https://reservation.blacksedans.ca/' : '#bookNowModal' }}" 
              data-bs-toggle="{{ !$customerCheck ? 'modal' : '' }}" 
              class="btn-4-white rounded pointer animate-from-bottom">
              <span class="fw-bold">Book Now</span>
            </a>
      </div>
      <div class="col-md-6 p-0 service-image service-image-one"></div>
    </div>
  </div>
  <div class="service-section">
    <div class="row mx-0">
      <div class="col-md-6 pt-5 pb-4 pb-md-5 service-content">
        <h3 class="font-600 mb-4 font-lato text-black animate-from-bottom">Corporate Car Service</h3>
        <p class="fw-medium font-lato service-para animate-from-bottom">Over the years, Black Sedan has <strong>built strong professional relationships</strong> with existing corporate partners. Black Sedan offers drive as directed car service, <strong>provides special rates</strong> to corporate partners, and caters towards the needs of corporate events whether inside the city or outside.</p>
        <a href="{{ $customerCheck ? 'https://reservation.blacksedans.ca/' : '#bookNowModal' }}" 
        data-bs-toggle="{{ !$customerCheck ? 'modal' : '' }}" 
        class="btn-4 rounded pointer animate-from-bottom">
        <span class="fw-bold">Book Now</span>
      </a>
      </div>
      <div class="col-md-6 p-0 service-image service-image-two"></div>
    </div>
  </div>
  <div class="bg-black service-section">
    <div class="row mx-0">
      <div class="col-md-6 pt-5 pb-4 pb-md-5 service-content">
        <h3 class="text-white font-600 font-lato mb-4 animate-from-bottom">City Trip</h3>
        <p class="text-white fw-medium font-lato service-para animate-from-bottom">There is a lot to see and do in the city of Calgary and we can make it possible. Hotel reservation? Need to go to your residence? Calgary Tower? Restaurant Booking? Just name it! Black Sedan will be there!</p>
         <a href="{{ $customerCheck ? 'https://reservation.blacksedans.ca/' : '#bookNowModal' }}" 
              data-bs-toggle="{{ !$customerCheck ? 'modal' : '' }}" 
              class="btn-4-white rounded pointer animate-from-bottom">
              <span class="fw-bold">Book Now</span>
            </a>
      </div>
      <div class="col-md-6 p-0 service-image service-image-three"></div>
    </div>
  </div>
  <div class="service-section">
    <div class="row mx-0">
      <div class="col-md-6 pt-5 pb-4 pb-md-5 service-content">
        <h3 class="font-600 mb-4 font-lato text-black animate-from-bottom">Special Events</h3>
        <p class="fw-medium font-lato service-para animate-from-bottom">Black Sedan helps <strong>create unforgettable moments,</strong> without the price tag at your special events, whether it’s a <strong>wedding, graduation, anniversary or more!</strong></p>
        <a href="{{ $customerCheck ? 'https://reservation.blacksedans.ca/' : '#bookNowModal' }}" 
        data-bs-toggle="{{ !$customerCheck ? 'modal' : '' }}" 
        class="btn-4 rounded pointer animate-from-bottom">
        <span class="fw-bold">Book Now</span>
      </a>
      </div>
      <div class="col-md-6 p-0 service-image service-image-four"></div>
    </div>
  </div>
  <div class="bg-black service-section">
    <div class="row mx-0">
      <div class="col-md-6 pt-5 pb-4 pb-md-5 service-content">
        <h3 class="text-white font-600 font-lato mb-4 animate-from-bottom">Canmore/Banff/Lake Louise</h3>
        <p class="text-white fw-medium font-lato service-para animate-from-bottom">Black Sedan has <strong>experienced chauffeurs</strong> that can guide you through the <strong>scenic Rocky Mountains</strong> in your cozy and comfortable limo on your way to one of the <strong>world’s most popular vacation destinations.</strong></p>
        <a href="{{ $customerCheck ? 'https://reservation.blacksedans.ca/' : '#bookNowModal' }}" 
        data-bs-toggle="{{ !$customerCheck ? 'modal' : '' }}" 
        class="btn-4-white rounded pointer animate-from-bottom">
        <span class="fw-bold">Book Now</span>
      </a>
      </div>
      <div class="col-md-6 p-0 service-image service-image-five"></div>
    </div>
  </div>
  <div class="service-section">
    <div class="row mx-0">
      <div class="col-md-6 pt-5 pb-4 pb-md-5 service-content">
        <h3 class="font-600 mb-4 font-lato text-black animate-from-bottom">Surrounding Areas</h3>
        <p class="fw-medium font-lato service-para animate-from-bottom">We <strong>cater to all your needs.</strong> Travel to and from Calgary to other locations such as <strong>Lethbridge, Edmonton, Red Deer, Medicine Hat, and more!</strong></p>
        <a href="{{ $customerCheck ? 'https://reservation.blacksedans.ca/' : '#bookNowModal' }}" 
        data-bs-toggle="{{ !$customerCheck ? 'modal' : '' }}" 
        class="btn-4 rounded pointer animate-from-bottom">
        <span class="fw-bold">Book Now</span>
      </a>
      </div>
      <div class="col-md-6 p-0 service-image service-image-six"></div>
    </div>
  </div>
</div>

@endsection