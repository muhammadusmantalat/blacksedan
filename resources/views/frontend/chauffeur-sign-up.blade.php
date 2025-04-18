@extends('frontend.layout.app')
@section('title', 'Sign Up')
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
        font-size: 0.9rem;
        margin-top: 0.25rem;
        color: red;
        display: block;
    }

    .password-wrapper {
        position: relative;
        width: 100%;
    }

    .password-wrapper input {
        width: 100%;
        padding-right: 40px; / Taake eye icon ke liye space rahe /
    }

    .password-wrapper .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
    }

    .password-wrapper .toggle-password:hover {
        color: #333;
    }
</style>

<div class="d-flex justify-content-center align-items-center my-5">
    <!-- Initial Sign Up Form -->
    <form id="initialForm" style="background-color: black;" class="text-white p-4 rounded auth-form" method="POST">
        <h4 class="text-white mb-3">Sign Up</h4>
        <div class="form-group">
            <label for="email" class="mb-1">Email address</label>
            <input type="email" class="form-control rounded" id="email" name="email" placeholder="Enter email" value="{{$user->email ? $user->email : ''}}">
            <span id="email-error" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="password" class="mb-1">Password</label>
            <div class="password-wrapper">
                <input type="password" class="form-control rounded" id="password" name="password" placeholder="Password">
                <i class="fa fa-eye toggle-password" id="togglePassword"></i>
            </div>
            <span id="password-error" class="error-message"></span>
        </div>
        
        <button type="button" class="btn btn-primary bg-white mt-3" style="color:black" onclick="showAdditionalForm()">Next</button>
    </form>

    <!-- Additional Information Form -->
    <form id="additionalForm" style="background-color: black; display: none;" class="text-white p-4 rounded auth-form">
        <div class="form-group">
            <label for="full_name" class="mb-1">First Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter first name" value="{{$user->fname ? $user->fname : ''}}">
            <span id="full_name-error" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="last_name" class="mb-1">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" value="{{$user->lname ? $user->lname : ''}}">
            <span id="last_name-error" class="error-message"></span>
        </div>
        @php
        $userPhone = $user->phone ?? ''; // Get user phone number
        $countryCodes = ['+1', '+44', '+91']; // Allowed country codes
        $selectedCode = ''; // Default empty code
        $phoneNumber = $userPhone; // Default to full phone number

        // Extract country code if it matches one of the predefined ones
        foreach ($countryCodes as $code) {
            if (Str::startsWith($userPhone, $code)) { 
                $selectedCode = $code;
                $phoneNumber = substr($userPhone, strlen($code)); // Remove country code from number
                break;
            }
        }
        @endphp
        <div class="form-group">
            <label for="phone_number" class="mb-1">Phone Number</label>
            <div class="d-flex">
                <select class="form-select rounded" id="country_code" name="country_code" style="width: 30%;">
                    <option value="+1" {{ $selectedCode == '+1' ? 'selected' : '' }}>+1</option>
                    <option value="+44" {{ $selectedCode == '+44' ? 'selected' : '' }}>+44</option>
                    <option value="+91" {{ $selectedCode == '+91' ? 'selected' : '' }}>+91</option>
                </select>
                
                <input type="text" class="form-control ml-2" id="phone_number" name="phone_number"
                       placeholder="Enter phone number" value="{{ old('phone_number', $phoneNumber) }}">
            </div>
            <span id="phone_number-error" class="error-message"></span>
        </div>
        <button type="button" class="btn btn-primary bg-white mt-3" style="color:black" onclick="submitForm()">Submit</button>
        <div class="mt-3" id="cardMessages"></div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    let formData = {};
    let isDuplicateEmail = false;

    $(document).ready(function(){
        // Clear error message on focus for each input
        $('.form-control').on('focus', function(){
            $(this).siblings('.error-message').text('');
        });

        // Check email on blur
        $('#email').on('blur', function() {
            let email = $(this).val().trim();
            if(email === "") {
                $('#email-error').text("Please enter email");
                return;
            }

            $.ajax({
                url: "{{ route('checkEmail.chauffer') }}", // Updated route for email check
                method: "POST",
                data: { 
                    email: email,
                    type: 'chauffer'
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#email-error').text('');
                    isDuplicateEmail = false;
                },
                error: function(xhr) {
                    if (xhr.status === 400 && xhr.responseJSON.duplicate) {
                        isDuplicateEmail = true;
                        $('#email-error').text(xhr.responseJSON.message);
                    } else if(xhr.status === 422) {
                        if(xhr.responseJSON.errors && xhr.responseJSON.errors.email){
                            $('#email-error').text(xhr.responseJSON.errors.email[0]);
                        }
                    }
                }
            });
        });
    });

    function showAdditionalForm() {
        // Clear any existing error messages
        $('#email-error').text('');
        $('#password-error').text('');

        let email = $('#email').val().trim();
        let password = $('#password').val().trim();

        let hasError = false;
        if(!email) {
            $('#email-error').text("Please enter email");
            hasError = true;
        }
        if(!password) {
            $('#password-error').text("Please enter password");
            hasError = true;
        }
        if(isDuplicateEmail) {
            $('#email-error').text("This email is already in use. Please use another email.");
            hasError = true;
        }
        if(hasError) return; // Prevent moving forward if errors exist

        formData.email = email;
        formData.password = password;
        // Hide the initial form and show the additional form
        $('#initialForm').hide();
        $('#additionalForm').show();
    }

    function submitForm() {
        // Clear additional form error messages
        $('#full_name-error').text('');
        $('#last_name-error').text('');
        $('#phone_number-error').text('');

        // Collect additional data
        formData.full_name = $('#full_name').val().trim();
        formData.last_name = $('#last_name').val().trim();
        formData.phone = $('#country_code').val() + $('#phone_number').val().trim();
        formData.salutation = $('#salutation').val();

        let hasError = false;
        if(!formData.full_name) {
            $('#full_name-error').text("Please enter full name");
            hasError = true;
        }
        if(!formData.last_name) {
            $('#last_name-error').text("Please enter last name");
            hasError = true;
        }
        if(!$('#phone_number').val().trim()) {
            $('#phone_number-error').text("Please enter phone number");
            hasError = true;
        }
        if(hasError) return; // Stop submission if any error exists

        $.ajax({
            url: "{{ route('Chauffersigup') }}", // Updated route for registration submission
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
                // If the response contains a redirect URL, use it; otherwise fallback to dashboard
                if(response.redirect) {
                    window.location.href = response.redirect;
                } else {
                    window.location.href = '{{asset("/chauffeur-sign-in")}}';
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    for (let field in errors) {
                        $('#' + field + '-error').text(errors[field][0]);
                    }
                } else {
                    alert("Something went wrong. Please try again.");
                }
            }
        });
    }

    $(document).ready(function() {
    // Toggle password visibility
    $("#togglePassword").click(function() {
        let input = $("#password");
        let icon = $(this);
        
        if (input.attr("type") === "password") {
            input.attr("type", "text");
            icon.removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            input.attr("type", "password");
            icon.removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });

    // Remove error on focus
    $("#password").on("focus", function() {
        $("#password-error").text("");  // Jab user dubara click karega, error gayab ho jayega
    });
});


    
</script>

@endsection