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
        <h4 class="text-white mb-3">Forget Password Email</h4>
        
        <div class="form-group">
            <label for="email" class="mb-1">Email address</label>
            <input type="email" class="form-control rounded" id="email" name="email" placeholder="Enter email">
            <span class="error-message" id="emailError"></span>
        </div>
         
        <button type="button" class="btn btn-primary bg-white mt-3" style="color:black"               onclick="forgetEmailCustomer()">Submit</button>
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

    function forgetEmailCustomer() {
    let email = $('#email').val().trim();
    $('#cardMessages').html(''); // Clear previous messages

    if (email === "") {
        $('#cardMessages').html(`
            <div class="alert alert-danger">Email is required.</div>
        `);
        return;
    }

    $.ajax({
        url: "{{ route('chauffeur-forget-email') }}",
        method: "POST",
        data: { email },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(response) {
            $('#cardMessages').html(`
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="errorAlert">
                    ${response.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `);
            // Optional: auto-hide the error alert after a few seconds
            setTimeout(() => {
                $('#errorAlert').fadeOut('slow');
            }, 5000);
        },
        error: function(xhr) {
            let message = "Something went wrong.";

            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                message = Object.values(errors).map(e => `- ${e[0]}`).join('<br>');
            } else if (xhr.responseJSON?.message) {
                message = xhr.responseJSON.message;
            }

            $('#cardMessages').html(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `);

            // Optional: auto-hide the error alert after a few seconds
            setTimeout(() => {
                $('#errorAlert').fadeOut('slow');
            }, 5000);
        }

    });
}


</script>

<!-- FontAwesome for eye icon -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

@endsection
