@extends('frontend.layout.app')
@section('title', 'Chauffeur Sign In')
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
            color: rgb(136, 23, 23);
            display: block;
        }

        .input-error {
            border-color: rgb(145, 9, 9);
        }

        .eye-icon {
            position: absolute;
            bottom: 1rem;
            right: 0.8rem;
            color: black;
        }
    </style>

    <!-- Chauffeur Sign In Form -->
    <div class="d-flex justify-content-center align-items-center my-5">
        <form id="initialForm" style="background-color: black;" class="text-white p-4 rounded auth-form">
            <h4 class="text-white mb-3">Chauffeur Sign In</h4>
            <div class="form-group">
                <label for="login-email" class="mb-1">Email address</label>
                <input type="email" class="form-control rounded" id="login-email" placeholder="Enter email">
                <span id="login-email-error" class="error-message"></span>
            </div>
            <div class="form-group position-relative">
                <label for="login-password" class="mb-1">Password</label>
                <input type="password" class="form-control rounded" id="login-password" placeholder="Password">
                <span toggle="#login-password" class="fa fa-fw fa-eye field-icon toggle-password eye-icon"></span>
                <span id="login-password-error" class="error-message"></span>
            </div>
            <button type="submit" class="btn btn-primary bg-white mt-3" style="color:black">Submit</button>
            <div id="cardMessages" class="mt-3"></div>
        </form>
    </div>

    <!-- Chauffeur Registration Form -->
    <div class="d-flex justify-content-center align-items-center my-3">
        <form action="{{ route('chauffeur.data') }}" method="POST" id="chauffeurForm" style="background-color: black;"
            class="text-white p-4 rounded auth-form">
            @csrf
            <h4 class="text-white mb-3">Important</h4>
            <p>If you would like to be part of Black Sedan team as a chauffeur, please fill out the following form. One of
                the Black Sedan team members will be in touch with you soon.</p>
            <div class="form-group">
                <label for="firstName" class="mb-1">First Name</label>
                <input type="text" class="form-control rounded input-field" id="firstName" name="fname"
                    placeholder="Enter first name">
                <span id="firstName-error" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="lastName" class="mb-1">Last Name</label>
                <input type="text" class="form-control rounded input-field" id="lastName" name="lname"
                    placeholder="Enter last name">
                <span id="lastName-error" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="email2" class="mb-1">Email</label>
                <input type="text" class="form-control rounded input-field" id="email2" name="email"
                    placeholder="Enter email">
                <span id="email2-error" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="phoneNumber" class="mb-1">Phone Number</label>
                <input type="text" class="form-control rounded input-field" id="phoneNumber" name="phone"
                    placeholder="Enter phone number">
                <span id="phoneNumber-error" class="error-message"></span>
            </div>
            <button type="submit" class="btn btn-primary bg-white mt-3" style="color:black">Submit</button>
            <div id="loader1" style="display:none;">
                <div class="spinner"></div>
            </div>
            <div id="cardMessages1" class="mt-3"></div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script>
        $(document).ready(function() {
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                let input = $($(this).attr("toggle"));
                input.attr("type", input.attr("type") === "password" ? "text" : "password");
            });

            $('.form-control').on('focus', function() {
                $(this).removeClass('input-error');
                $(this).siblings('.error-message').text('');
            });

            $('#initialForm').on('submit', function(e) {
                e.preventDefault();
                let email = $('#login-email').val().trim();
                let password = $('#login-password').val().trim();
                let hasError = false;

                if (!email) {
                    $('#login-email-error').text('Please enter email');
                    $('#login-email').addClass('input-error');
                    hasError = true;
                }
                // } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                //     $('#login-email-error').text('Please enter a valid email');
                //     $('#login-email').addClass('input-error');
                //     hasError = true;
                // }

                if (!password) {
                    $('#login-password-error').text('Please enter password');
                    $('#login-password').addClass('input-error');
                    hasError = true;
                }

                if (hasError) return;

                $.ajax({
                    url: "{{ route('chauffeur.sign-in') }}",
                    method: "POST",
                    data: {
                        email: email,
                        password: password
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        // Show success message below the button
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

                        // return;
                        window.location.href = "{{ route('chauffeur.rides') }}";
                    },
                    error: function(xhr) {
                        $('#loginMsg').html(
                            `<div class="alert alert-danger">Invalid credentials. Please try again.</div>`
                        );
                    }
                });
            });

            $('#chauffeurForm').on('submit', function(e) {
                e.preventDefault();
                let form = $(this);
                let hasErrors = false;

                form.find('.error-message').text('');
                form.find('.input-field').removeClass('input-error');

                form.find('input').each(function() {
                    let input = $(this);
                    let value = input.val().trim();
                    if (!value) {
                        showError(input, 'Please fill this field');
                        hasErrors = true;
                    }
                    if (input.attr('name') === 'email' && value) {
                        if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) {
                            showError(input, 'Please enter a valid email');
                            hasErrors = true;
                        }
                    }
                });

                if (hasErrors) return;
                
                $('#loader1').removeClass('d-none');

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        // alert('ew');
                        // return;
                        $('#cardMessages1').html(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                                    ${response.message} <strong>Success!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `);
                        // Hide alert after 5 seconds (5000 milliseconds)
                        setTimeout(function() {
                            $("#successAlert").fadeOut("slow");
                        }, 2000);
                        setTimeout(() => {
                            $('#loader1').addClass('d-none');
                            showMessage('Request submitted successfully!', 'success',
                                '#successMsg');
                            form[0].reset();
                        }, 1000);
                    },
                    error: function(xhr) {
                        $('#loader1').addClass('d-none');
                        showMessage('An error occurred. Please try again.', 'danger',
                            '#successMsg');
                    }
                });
            });

            function showError(input, message) {
                input.addClass('input-error');
                input.siblings('.error-message').text(message);
            }

        });
    </script>

@endsection
