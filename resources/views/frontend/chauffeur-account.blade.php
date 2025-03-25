@extends('frontend.layout.app')
@section('title', 'Chauffeur Account')
@section('content')

    <style>
        .auth-form {
            width: 50%;
        }

        .tab-button {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .ul-border {
            border-bottom: 2px solid white;
        }

        @media screen and (max-width: 767px) {
            .auth-form {
                width: 90%;
            }
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: gray;
        }

        .toggle-password:hover {
            color: black;
        }
    </style>
    @php
        // Extract user phone data (prefix + number)
        $userPhone = $user->phone ?? '';
        $defaultPrefix = '+1'; // Default country code
        $phoneNumber = '';

        if ($userPhone) {
            // e.g. "+1XXXXXXXXXX"
            preg_match('/(\+\d{1,4})(\d+)/', $userPhone, $matches);
            $defaultPrefix = $matches[1] ?? $defaultPrefix;
            $phoneNumber = $matches[2] ?? '';
        }
        $userId = Auth::guard('chauffeur')->user()->id;
        // dd($userId);
    @endphp
    <div class="d-flex justify-content-center align-items-center my-5">
        <div style="background-color: black;" class="text-white p-4 rounded auth-form">
            <ul class="nav nav-tabs mb-3 ul-border" id="myTab" role="tablist">
                <li class="w-50 nav-item" role="presentation">
                    <button class="w-100 nav-link active tab-button" id="account-info-tab" data-bs-toggle="tab"
                        data-bs-target="#account_info" type="button" role="tab" aria-controls="account_info"
                        aria-selected="true">Account Info</button>
                </li>
                <li class="w-50 nav-item" role="presentation">
                    <button class="w-100 nav-link tab-button" id="vehicle-info-tab" data-bs-toggle="tab"
                        data-bs-target="#vehicle_info" type="button" role="tab" aria-controls="vehicle_info"
                        aria-selected="false">Vehicle Info</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="account_info" role="tabpanel" aria-labelledby="account-info-tab">
                    <form id="initialForm">
                        <h5 class="text-white mb-3">Account Info</h5>
                        <div class="form-group">
                            <label for="email" class="mb-1">Email address</label>
                            <input type="email" class="form-control rounded" id="email" value="{{ $user->email }}"
                                readonly>
                        </div>
                        <div class="form-group password-wrapper">
                            <label for="password" class="mb-1">Password</label>
                            <input type="password" class="form-control rounded" id="password" name="password"
                                placeholder="Password">
                            <i class="fa fa-eye toggle-password" style="margin-top: 3%" onclick="togglePassword()"
                                id="eyeIcon"></i>
                            <span class="error-message" id="passwordError"></span>
                        </div>
                        <div class="form-group">
                            <label for="full_name" class="mb-1">Full Name</label>
                            <input type="text" class="form-control rounded" id="full_name" value="{{ $user->fname }} ">
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="mb-1">Last Name</label>
                            <input type="text" class="form-control rounded" id="last_name" value="{{ $user->lname }}">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="mb-1">Phone Number</label>
                            <div class="d-flex">
                                <select class="form-select rounded" style="width: 30%;" id="phone_prefix">
                                    <option value="+1" {{ $defaultPrefix == '+1' ? 'selected' : '' }}>+1</option>
                                    <option value="+44" {{ $defaultPrefix == '+44' ? 'selected' : '' }}>+44</option>
                                    <option value="+91" {{ $defaultPrefix == '+91' ? 'selected' : '' }}>+91</option>
                                </select>
                                <input type="text" class="form-control rounded ml-2" id="phone"
                                    placeholder="Enter phone number" value="{{ $phoneNumber }}">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-primary bg-white mt-3" id="accountUpdate"
                                style="color:black">Update</button>
                            <button id="deleteChauffeurBtn" type="button"
                                class="btn btn-primary text-white px-1 px-sm-3 bg-danger mt-3">
                                Delete Account
                            </button>
                        </div>

                        <div id="responseMessage"></div>
                    </form>
                </div>
                {{-- // vehicle info --}}
                <div class="tab-pane fade" id="vehicle_info" role="tabpanel" aria-labelledby="vehicle-info-tab">
                    <form id="vehicleForm">
                        @csrf
                        <h5 class="text-white my-3">Vehicle Info</h5>

                        <!-- Validation Errors -->
                        <div id="formErrors" class="alert alert-danger d-none"></div>

                        <div class="form-group">
                            <label for="vehicle_model" class="mb-1">Model</label>
                            <input type="text" class="form-control rounded" id="vehicle_model" name="vehicle_model"
                                required value="{{ $userVehicle->model ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="vehicle_year" class="mb-1">Year</label>
                            <input type="number" class="form-control rounded" id="vehicle_year" name="vehicle_year"
                                min="1900" max="{{ date('Y') + 1 }}" required value="{{ $userVehicle->year ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="vehicle_color" class="mb-1">Color</label>
                            <input type="text" class="form-control rounded" id="vehicle_color" name="vehicle_color"
                                required value="{{ $userVehicle->color ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="service" class="mb-1">Service Class</label>
                            <select class="form-select rounded" id="service" name="vehicle_type" required>
                                <option selected disabled>Select Vehicle Type</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->name }}"
                                        {{ $userVehicle && $vehicle->name == $userVehicle->service ? 'selected' : '' }}>
                                        {{ $vehicle->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="plate" class="mb-1">License Plate</label>
                            <input type="text" class="form-control rounded" id="plate" name="plate"
                                value="{{ $userVehicle->plate ?? '' }}" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary bg-white mt-3" id="submitBtn"
                                style="color:black">
                                Update
                            </button>

                            <button id="deleteChauffeurBtn" type="button"
                                class="btn btn-primary text-white px-1 px-sm-3 bg-danger mt-3">
                                Delete
                            </button>
                        </div>

                        <!-- Success Message (Initially Hidden) -->
                        <div id="successContainer"></div>
                        <div id="vehicleresponseMessage"></div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script>
        function togglePassword() {
            let passwordInput = document.getElementById("password");
            let eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }

        // update account 
        $(document).ready(function() {
            $("#accountUpdate").click(function(e) {
                e.preventDefault();

                let email = $("#email").val();
                let fname = $("#full_name").val().trim();
                let lname = $("#last_name").val().trim();
                let phonePrefix = $("#phone_prefix").val();
                let phone = phonePrefix + $("#phone").val().trim();
                let password = $("#password").val().trim(); // Optional password

                $.ajax({
                    url: "{{ route('chauffeur.update') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        email: email,
                        fname: fname,
                        lname: lname,
                        phone: phone,
                        password: password // Only updates if entered
                    },

                    success: function(response) {
                        // Show success message below the button
                        $("#responseMessage").html(`
    <div style="background-color: green; color: white; padding: 10px; 
                border-radius: 5px; margin-top: 10px; position: relative;">
        Request Sent Successfully to the Admin. We will contact you shortly.
    </div>
`).fadeIn();

                        // Hide message after 5 seconds
                        setTimeout(function() {
                            $("#responseMessage").fadeOut();
                        }, 5000);

                    },
                    error: function(xhr) {
                        let errorMessage = "Error deleting account. Please try again.";
                        if (xhr.status === 400) {
                            errorMessage = "Your request is already in process.";
                        }

                        // Show error message below the button
                        $("#responseMessage").html(`
    <div style="background-color: red; color: white; padding: 10px; 
                border-radius: 5px; margin-top: 10px; position: relative;">
        ${errorMessage}
    </div>
`).fadeIn();

                        // Hide message after 5 seconds
                        setTimeout(function() {
                            $("#responseMessage").fadeOut();
                        }, 5000);

                    }
                });
            });
        });

        // email read only
        $("#email, #full_name, #last_name, #phone, #password").focus(function() {
            $("#email-note").remove();
        });

        // Prevent User from Editing Email Field
        $("#email").attr("readonly", true);

        // Delete Chauffeur Account
        $(document).ready(function() {
            $("#deleteChauffeurBtn").click(function() {
                if (confirm(
                        "Are you sure you want to delete your account? This action cannot be undone.")) {
                    let deleteBtn = $("#deleteChauffeurBtn");
                    deleteBtn.prop("disabled", true).html(
                        '<span class="spinner-border spinner-border-sm"></span> Deleting...');

                    $.ajax({
                        url: "{{ url('/deleting-request') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            deleteBtn.prop("disabled", false).css({
                                "background-color": "green",
                                "color": "white"
                            }).text("Delete Account");

                            // ✅ 
                            // Show success message below the button
                            $("#responseMessage").html(`
    <div style="background-color: green; color: white; padding: 10px; 
                border-radius: 5px; margin-top: 10px; position: relative;">
        Request Sent Successfully to the Admin. We will contact you shortly.
    </div>
`).fadeIn();

                            // Hide message after 5 seconds
                            setTimeout(function() {
                                $("#responseMessage").fadeOut();
                            }, 5000);



                        },

                        error: function(xhr) {
                            deleteBtn.prop("disabled", false).text("Delete Account");

                            let errorMessage = "Error deleting account. Please try again.";
                            if (xhr.status === 400) {
                                errorMessage = "Your request is already in process.";
                            }

                            // Show error message below the button
                            $("#responseMessage").html(`
    <div style="background-color: red; color: white; padding: 10px; 
                border-radius: 5px; margin-top: 10px; position: relative;">
        ${errorMessage}
    </div>
`).fadeIn();

                            // Hide message after 5 seconds
                            setTimeout(function() {
                                $("#responseMessage").fadeOut();
                            }, 5000);


                        }
                    });
                }
            });
        });
        // details of vehicle
        $(document).ready(function() {
    $('#vehicleForm').submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        let submitBtn = $('#submitBtn');
        let responseMessage = $("#vehicleresponseMessage");

        // Ensure responseMessage container exists
        if (responseMessage.length === 0) {
            console.error("Error: #vehicleresponseMessage element is missing in HTML.");
            return;
        }

        // Disable button and show loading spinner
        submitBtn.prop('disabled', true).html(`
            <span class="spinner-border spinner-border-sm"></span> Processing...
        `);

        // Clear previous messages
        responseMessage.html('').hide();

        $.ajax({
            url: "{{ route('vehicles.update') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log("Success response:", response); // Debugging log

                // Reset button
                submitBtn.html('Update').prop('disabled', false);

                
                // Ensure success message appears
                responseMessage.html(`
                    <div style="background-color: green; color: white; padding: 10px; 
                                border-radius: 5px; margin-top: 10px; position: relative;">
                        Data Updated Successfully.
                    </div>
                `).fadeIn();

                // Hide message after 5 seconds
                setTimeout(function() {
                    responseMessage.fadeOut();
                }, 5000);
            },
            error: function(xhr) {
                console.error("AJAX Error:", xhr); // Debugging log

                // Reset button
                submitBtn.html('Update').prop('disabled', false);

                let errorMessage = "Error updating data. Please try again.";
                const alreadyInProcessStatusCodes = [400, 409, 422];

                if (alreadyInProcessStatusCodes.includes(xhr.status)) {
                    errorMessage = "Your request is already in process.";
                }

                // Show error message
                responseMessage.html(`
                    <div style="background-color: red; color: white; padding: 10px; 
                                border-radius: 5px; margin-top: 10px; position: relative;">
                        ${errorMessage}
                    </div>
                `).fadeIn();

                // Hide message after 5 seconds
                setTimeout(function() {
                    responseMessage.fadeOut();
                }, 5000);
            }
        });
    });
});

    </script>

@endsection
