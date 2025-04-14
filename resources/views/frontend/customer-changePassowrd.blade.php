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
        <h4 class="text-white mb-3">Change Password</h4>
        <input value="{{$user->email}}" type="hidden" name="email" id="email" >
        <div class="form-group password-wrapper">
            <label for="password" class="mb-1">Password</label>
            <input type="password" class="form-control rounded" id="password" name="password" placeholder="Password">
            <i class="fa fa-eye toggle-password" id="togglePasswordIcon" onclick="togglePassword('password', 'togglePasswordIcon')"></i>
            <span class="error-message" id="passwordError"></span>
        </div>
        
        <div class="form-group password-wrapper">
            <label for="confirm-password" class="mb-1">Confirm Password</label>
            <input type="password" class="form-control rounded" id="confirm-password" name="confirm_password" placeholder="Confirm Password">
            <i class="fa fa-eye toggle-password" id="toggleConfirmPasswordIcon" onclick="togglePassword('confirm-password', 'toggleConfirmPasswordIcon')"></i>
            <span class="error-message" id="confirmPasswordError"></span>
        </div>
        


        <button type="button" class="btn btn-primary bg-white mt-3" style="color:black"       onclick="changePassword()">Submit</button>
        </p>

        {{-- success msg --}}
        <div id="cardMessages" class="mt-3"></div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function togglePassword(inputId, iconId) {
    let passwordField = document.getElementById(inputId);
    let icon = document.getElementById(iconId);

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

    function changePassword() {
        let email = $('#email').val().trim();
        let password = $('#password').val().trim();
        let confirmed = $('#confirm-password').val().trim();
        $('#cardMessages').html('');

        if (!email || !password || !confirmed) {
            $('#cardMessages').html(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    All fields are required.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `);
            return;
        }

        $.ajax({
            url: "{{ route('customer_change_password') }}",
            method: "POST",
            data: {
                email: email,
                password: password,
                confirmed: confirmed
            },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                $('#cardMessages').html(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                        ${response.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `);
                setTimeout(() => {
                    $('#successAlert').fadeOut('slow');
                }, 1000);
                setTimeout(() => {
                    window.location.href = '{{asset("/customer-sign-in")}}';
                }, 2000);
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
