@extends('frontend.layout.app')
@section('title', 'Sign Up')
@section('content');
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
        font-size: 0.9rem;
        margin-top: 0.25rem;
        display: block;
    }


    .password-wrapper {
        position: relative;
    }

    .password-wrapper input {
        padding-right: 40px; /* Prevent text from going under the icon */
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #aaa;
    }
</style>

<div class="d-flex justify-content-center align-items-center my-5">
    <!-- Initial Sign Up Form -->
    <form id="initialForm" style="background-color: black;" class="text-white p-4 rounded auth-form" method="POST">
        <h4 class="text-white mb-3">Sign Up</h4>
        <div class="form-group">
            <label for="email" class="mb-1">Email address</label>
            <input type="email" class="form-control rounded" id="email" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password" class="mb-1">Password</label>
            <div class="password-wrapper">
                <input type="password" class="form-control rounded" id="password" name="password" placeholder="Password">
                <i class="fa fa-eye toggle-password" onclick="togglePassword()"></i>
            </div>
            <span class="error-message" id="passwordError"></span>
        </div>
        <button type="button" class="btn btn-primary bg-white mt-3" style="color:black" onclick="showAdditionalForm()">Next</button>
    </form>

  

<!-- Additional Information Form -->
<!-- Additional Information Form -->
<form id="additionalForm" style="background-color: black; display: none;" class="text-white p-4 rounded auth-form">
    <!-- Add proper name attributes and fix field structure -->
    <div class="form-group">
        <label for="full_name" class="mb-1">First Name</label>
        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter first name">
    </div>
    <div class="form-group">
        <label for="last_name" class="mb-1">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name">
    </div>
    <div class="form-group">
        <label for="phone" class="mb-1">Phone Number</label>
        <div class="d-flex">
            <select class="form-select rounded" id="country_code" style="width: 30%;">
                <option value="+1">+1</option>
                <option value="+44">+44</option>
                <option value="+91">+91</option>
            </select>
            <input type="text" class="form-control ml-2" id="phone_number" name="phone_number" placeholder="Enter phone number">
        </div>
    </div>
    <!-- Change button to trigger AJAX submission -->
    <button type="button" class="btn btn-primary bg-white mt-3" style="color:black" onclick="submitForm()">Submit</button>
    <div id="cardMessages" class="mt-3"></div>
</form>


</div>

<script>
    let formData = {};
    let isDuplicateEmail = false;

    $(document).ready(function(){
        $('.form-control').on('focus', function(){
            $(this).next('.error-message').remove();
        });

        $('#email').on('blur', function() {
            let email = $(this).val().trim();
            if(email === "") return;

            $.ajax({
                url: "{{ route('checkEmail') }}",
                method: "POST",
                data: { email: email },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#email').next('.error-message').remove();
                    isDuplicateEmail = false;
                },
                error: function(xhr) {
                    $('#email').next('.error-message').remove();

                    if (xhr.status === 400 && xhr.responseJSON.duplicate) {
                        isDuplicateEmail = true;
                        $('#email').after('<span class="error-message text-danger small">' + xhr.responseJSON.message + '</span>');
                    } else {
                        console.error(xhr);
                    }
                }
            });
        });
    });

    function showAdditionalForm() {
    $('#initialForm .error-message').remove();

    let email = $('#email').val().trim();
    let password = $('#password').val().trim();

    if(!email || !password) {
        alert("Please fill all required fields");
        return;
    }

    if(isDuplicateEmail) {
        alert("Please fix email errors before proceeding");
        return;
    }

    formData.email = email;
    formData.password = password;
    $('#initialForm').hide();
    $('#additionalForm').show();
}

    function submitForm() {
    // Collect all data including country code
    formData = {
        ...formData,
        full_name: $('#full_name').val().trim(),
        last_name: $('#last_name').val().trim(),
        phone: $('#country_code').val() + $('#phone_number').val().trim(),
        salutation: $('#salutation').val()
    };

    // Remove null/empty values
    formData = Object.fromEntries(Object.entries(formData).filter(([_, v]) => v !== ''));

    $.ajax({
        url: "{{ route('registerCustomer') }}",
        method: "POST",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // alert(response.message);
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
            // Optional: Redirect after success
            window.location.href = '{{asset("/customer-sign-in")}}';
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                // Handle validation errors
                const errors = xhr.responseJSON.errors;
                Object.keys(errors).forEach(field => {
                    $(`#${field}`).after(`<span class="error-message text-danger small">${errors[field][0]}</span>`);
                });
            } else {
                alert("Something went wrong. Please try again.");
            }
        }
    });
}

//password toggle 

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
</script>

@endsection