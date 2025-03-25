@extends('frontend.layout.app')
@section('title', 'Sign Up')
@section('content')
<style>
    .auth-form {
        width: 50%;
    }

    @media screen and (max-width: 767px) {
        .auth-form {
            width: 90%;
        }
    }
</style>

<div class="d-flex justify-content-center align-items-center my-5">
    <form id="initialForm" style="background-color: black;" class="text-white p-4 rounded auth-form">
        <h4 class="text-white mb-3">Sign Up</h4>
        <div class="form-group">
            <label for="email" class="mb-1">Email address</label>
            <input type="email" class="form-control rounded" id="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password" class="mb-1">Password</label>
            <input type="password" class="form-control rounded" id="password" placeholder="Password">
        </div>
        <button type="button" class="btn btn-primary bg-white mt-3" style="color:black" onclick="showAdditionalForm()">Next</button>
    </form>

    <form id="additionalForm" style="background-color: black; display: none;" class="text-white p-4 rounded auth-form">
        <h4 class="text-white mb-3">Additional Information</h4>
        <div class="form-group">
            <label for="full_name" class="mb-1">Full Name</label>
            <input type="text" class="form-control rounded" id="full_name" placeholder="Enter full name">
        </div>
        <div class="form-group">
            <label for="last_name" class="mb-1">Last Name</label>
            <input type="text" class="form-control rounded" id="last_name" placeholder="Enter last name">
        </div>
        <div class="form-group">
            <label for="phone" class="mb-1">Phone Number</label>
            <div class="d-flex">
                <select class="form-select rounded" style="width: 30%;">
                    <option value="+1">+1</option>
                    <option value="+44">+44</option>
                    <option value="+91">+91</option>
                </select>
                <input type="text" class="form-control rounded ml-2" id="phone" placeholder="Enter phone number">
            </div>
        </div>
        <button type="submit" class="btn btn-primary bg-white mt-3" style="color:black">Submit</button>
    </form>
</div>

<script>
    function showAdditionalForm() {
        document.getElementById('initialForm').style.display = 'none';
        document.getElementById('additionalForm').style.display = 'block';
    }
</script>
@endsection