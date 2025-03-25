@extends('frontend.layout.app')
@section('title', 'index')
@section('content')
<style>

.form_content_page .input_style {
  width: 100%;
  box-sizing: border-box;
  margin-bottom: 5px;
  border: none;
  background: none;
  border-bottom: 2px solid white;
}
.form_content_page thead td{
    font-weight: 700;
}
</style>
<div id="content" class="site-content form_content_page" style="margin: 200px 0;">
    <div class="col-sm-11 px-sm-0 px-3 mx-auto">
        <div class="row">
            <div class="container">

                <div class="row hide-content">
                    <div class="col-sm-10 offset-sm-1 text-center">

                        <h2 class="mb-0">Thank you for booking!</h2>
                        <h4 class="mb-4">One of our Support Person will Contact you.</h4>
                        <p class="mb-4">If you need a booking within 24 hours. Please call us directly at: <a href="tel:+18257355538">+1 825-735-5538</p>
                        <div class="ct-button-wrapper ct-button-layout1">
                            <span class="ct-icon-active"></span>
                            <a href="https://reservation.blacksedans.ca/" class="btn btn-primary btn-inline-block ">                                
                                <span class="ct-button-text">Back To Home</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection


