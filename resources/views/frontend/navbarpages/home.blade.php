@extends('frontend.navbarpages.layout.app')
@section('title', 'ChauffAccount ')                                                                                                                                                                  
@section('content')

    <div
      class="d-flex justify-content-center align-items-center home-page-hero hero-section"
    >
      <div class="p-4 hero-intro-section">
        <h1 class="mx-4 pt-2 intro-content fade-in">
          PRIVATE CHAUFFEUR SERVICE IN CALGARY
        </h1>
        <div class="d-flex pb-2 justify-content-center mt-3 fade-in-delayed">
          <a href="#" class="btn-4 rounded"
            ><span class="fw-bold">Book Now</span></a
          >
        </div>
      </div>
    </div>

    <!-- Services Section -->
    <div class="py-5 services-section">
      <div class="container-custom py-3 py-md-5">
        <div class="row">
          <div class="col-md-4 px-0">
            <div class="mb-3 service-heading-border"></div>
            <h1 class="mb-0 text-black">Our Services</h1>
          </div>
          <div class="col-md-8 px-0">
            <p class="mb-0 services-section-para slide-top">
              Black Sedan is a private limo company based in Calgary. We provide
              luxury transportation services for any occasion, offering a fleet
              of elegant, well-maintained vehicles to ensure comfort and style.
              We provide various services, such as the following:
            </p>
          </div>
        </div>
      </div>
    </div>
@endsection
