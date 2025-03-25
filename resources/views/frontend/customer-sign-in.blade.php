@extends('frontend.layout.app')
@section('title', 'Customer Sign In')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .auth-form {
        width: 50%;
    }

    @media screen and (max-width: 767px) {
        .auth-form {
            width: 90%;
        }
    }

    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }

    .password-wrapper {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 10px;
        top: 70%;
        transform: translateY(-50%);
        cursor: pointer;
        color: gray;
    }
</style>

<div class="d-flex justify-content-center align-items-center my-5">
    <form id="loginForm" style="background-color: black;" class="text-white p-4 rounded auth-form">
        <h4 class="text-white mb-3">Customer Sign In</h4>
        
        <div class="form-group">
            <label for="email" class="mb-1">Email address</label>
            <input type="email" class="form-control rounded" id="email" name="email" placeholder="Enter email">
            <span class="error-message" id="emailError"></span>
        </div>
        
        <div class="form-group password-wrapper">
            <label for="password" class="mb-1">Password</label>
            <input type="password" class="form-control rounded" id="password" name="password" placeholder="Password">
            <i class="fa fa-eye toggle-password" onclick="togglePassword()"></i>
            <span class="error-message" id="passwordError"></span>
        </div>
        
        <button type="button" class="btn btn-primary bg-white mt-3" style="color:black" onclick="loginCustomer()">Submit</button>
        <p class="mt-3 text-center">Don't have an account? 
            <a href="{{ route('customer.register') }}" style="text-decoration: none; color:white;" class="text-primary">Sign up</a>
        </p>

        {{-- success msg --}}
        <div id="cardMessages" class="mt-3"></div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function togglePassword() {
        let passwordField = document.getElementById("password");
        let icon = document.querySelector(".toggle-password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

    function loginCustomer() {
        let email = $('#email').val().trim();
        let password = $('#password').val().trim();
        let emailError = $('#emailError');
        let passwordError = $('#passwordError');

        // Clear previous errors
        emailError.text('');
        passwordError.text('');

        if (email === "") {
            emailError.text("Email is required.");
            return;
        }
        if (password === "") {
            passwordError.text("Password is required.");
            return;
        }

        $.ajax({
            url: "{{ route('login') }}",
            method: "POST",
            data: {
                email: email,
                password: password
            },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                $('#cardMessages').html(`
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
            ${response.message} <strong>Success!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `);

    // Hide alert after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        $("#successAlert").fadeOut("slow");
    }, 2000);
                window.location.href = response.redirect; // Redirecting to customer-rides
            },
            error: function(xhr) {
    let errorContainer = $('#cardMessages'); // Error message container

    if (xhr.status === 404) {
        errorContainer.html(`
            <div class="alert alert-danger alert-dismissible fade show" id="errorAlert">
                Error: Route not found. Please check your backend.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
    } else if (xhr.status === 422) {
        let errors = xhr.responseJSON.errors;
        let errorMessage = "<div class='alert alert-danger alert-dismissible fade show' id='errorAlert'>";
        errorMessage += "<strong>Validation Errors:</strong><br>";
        $.each(errors, function(key, value) {
            errorMessage += "- " + value[0] + "<br>";
        });
        errorMessage += `
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;
        
        errorContainer.html(errorMessage);
    } else {
        errorContainer.html(`
            <div class="alert alert-danger alert-dismissible fade show" id="errorAlert">
                ${xhr.responseJSON.error || "Update failed. Please try again."}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
    }

    // Hide error message after 5 seconds
    setTimeout(function() {
        $("#errorAlert").fadeOut("slow");
    }, 5000);
}
        });
    }
</script>

<!-- FontAwesome for eye icon -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

@endsection
