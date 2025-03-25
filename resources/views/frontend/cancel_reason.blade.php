@extends('frontend.la   yout.app')
@section('title', 'index')
@section('content')

    {{-- <body --}}
    {{-- class="page-template-default page page-id-5439 redux-page  site-h16 body-default-font heading-default-font header-sticky  btn-type-gradient  fixed-footer  mobile-header-light elementor-default elementor-kit-4700 elementor-page elementor-page-5439"> --}}
    <div id="page" class="site">
        <!-- #pagetitle -->
        <div id="pagetitle" class="page-title bg-image">
            <div class="container">
                <div class="page-title-inner">
                    <div class="page-title-holder">
                        <h1 class="page-title">Reservation Form</h1>
                    </div>
                    <ul class="ct-breadcrumb">
                        <li><a class="breadcrumb-entry" href="https://blacksedans.ca/">Black Sedan Limousine
                                Services</a></li>
                        <li><span class="breadcrumb-entry">Reservation Form</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- #content -->
        <div id="content" class="site-content">
            <div class="container">
                <div class="row">
                    <div id="primary" class="col-12">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="col-md-12 reserv-form">
                                    <div class="ct-contact-form-layout1 style7" style="background-color: #000; margin: 50px 0;">
                                        <form action="{{ route('booking.reason', ['id' => $booking->id]) }}" method="post"
                                            id="registrationForm">
                                            @csrf
                                            {{-- Contact Us Details --}}
                                            <div class="getaquoteform">
                                                <hr />
                                                <h4>Reason For Cancellation</h4>
                                                <div class="row">
                                                    <div class="input-filled col-lg-12 col-md-12">
                                                        <label>Enter Reason<span>*</span></label>
                                                        <textarea cols="40" rows="10" class="wpcf7-form-control" placeholder="Reason..." name="reason"></textarea>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-filled col-12">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="input-filled col-12 mb-0">
                                                        <button type="submit" class="sub"><i
                                                                class="fac fac-arrow-right space-right"></i>
                                                            Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #primary -->
                </div>
            </div>
        </div>
    </div>
    {{-- </body> <!-- #page --> --}}
@endsection
<script type='text/javascript' src={{ asset('public/admin/assets./js/elementor-assets-js-frontend.min.js') }}
    id='elementor-frontend-js'></script>

@section('js')
    @if (\Illuminate\Support\Facades\Session::has('message'))
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('message') }}');
        </script>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>


    {{-- Custom Code Start Google Map Client Side  --}}

    {{-- Custom Code Start Google Map Client Side --}}

@endsection
