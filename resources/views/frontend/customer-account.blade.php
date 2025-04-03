@extends('frontend.layout.app')
@section('title', 'Customer Account')
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
        $phone = $user->phone; // Example: "+44 1234567890"

        // Define available country codes
        $countryCodes = ['+1', '+44', '+91'];

        $defaultPrefix = '+1'; // Default prefix
        $phoneNumber = ''; // Default phone number without prefix

        foreach ($countryCodes as $code) {
            if (str_starts_with($phone, $code)) {
                $defaultPrefix = $code;
                $phoneNumber = substr($phone, strlen($code)); // Extract number after prefix
                break;
            }
        }
    @endphp


    <div class="d-flex justify-content-center align-items-center my-5">
        <!-- SINGLE FORM FOR ALL TABS -->
        <form id="initialForm" style="background-color: black;" class="text-white p-4 rounded auth-form">
            @csrf

            <!-- Nav Tabs -->
            <ul class="nav nav-tabs mb-3 ul-border" id="myTab" role="tablist">
                <li style="width: 50%;" class="nav-item" role="presentation">
                    <button class="w-100 nav-link active tab-button" id="account-info-tab" data-bs-toggle="tab"
                        data-bs-target="#account_info" type="button" role="tab" aria-controls="account_info"
                        aria-selected="true">
                        Account Info
                    </button>
                </li>
                <li style="width: 50%;" class="nav-item" role="presentation">
                    <button class="w-100 nav-link tab-button" id="credit-card-tab" data-bs-toggle="tab"
                        data-bs-target="#credit_card" type="button" role="tab" aria-controls="credit_card"
                        aria-selected="false">
                        Add Credit Card
                    </button>
                </li>
                {{-- <li style="width: 33.3%;" class="nav-item" role="presentation">
                    <button class="w-100 nav-link tab-button" id="notifications-tab" data-bs-toggle="tab"
                        data-bs-target="#notifications" type="button" role="tab" aria-controls="notifications"
                        aria-selected="false">
                        Notifications
                    </button>
                </li> --}}
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="myTabContent">

                <!-- Account Info Tab -->
                <div class="tab-pane fade show active" id="account_info" role="tabpanel" aria-labelledby="account-info-tab">
                    <h4 class="text-white mb-3">Update Account</h4>

                    <div class="form-group">
                        <label for="email" class="mb-1">Email address</label>
                        <input type="email" class="form-control rounded" id="email" value="{{ $user->email }}">
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
                        <input type="text" class="form-control rounded" id="full_name" value="{{ $user->fname }}">
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="mb-1">Last Name</label>
                        <input type="text" class="form-control rounded" id="last_name" value="{{ $user->lname }}">
                    </div>

                    <div class="form-group">
                        <label for="phone" class="mb-1">Phone Number</label>
                        <div class="d-flex">
                            <select class="form-select rounded" style="width: 30%;" id="phone_prefix" name="phone_prefix">
                                <option value="+1" {{ $defaultPrefix == '+1' ? 'selected' : '' }}>+1</option>
                                <option value="+44" {{ $defaultPrefix == '+44' ? 'selected' : '' }}>+44</option>
                                <option value="+91" {{ $defaultPrefix == '+91' ? 'selected' : '' }}>+91</option>
                            </select>
                            <input type="text" class="form-control rounded ml-2" id="phone" name="phone"
                                placeholder="Enter phone number" value="{{ $phoneNumber }}">
                        </div>
                    </div>


                    <div class="d-flex justify-content-between mt-3">
                        <!-- Delete Button -->

                        <button type="button" class="btn btn-primary text-white px-1 px-sm-3 bg-danger"
                            id="deleteButton" onclick="deleteCustomer()">
                            Delete Account
                        </button>

                        <!-- Update Button -->
                        <button type="button" class="btn btn-primary bg-white" style="color:black"
                            onclick="updateCustomer()">
                            Update
                        </button>
                    </div>

                    <!-- Success Message -->
                    <div id="cardMessages" class="mt-3"></div>

                </div>

                <!-- Add Credit Card Tab -->
                <div class="tab-pane fade" id="credit_card" role="tabpanel" aria-labelledby="credit-card-tab">
                    <h6 class="text-white my-3">Manage Credit Card</h6>
                    <div id="creditCardsContainer">
                        <!-- Existing cards will be shown here -->
                    </div>

                    <!-- Add hidden input for card ID -->
                    <input type="hidden" id="card_id" value="">

                    <div class="form-group">
                        <label for="card_name" class="mb-1">Name</label>
                        <input type="text" class="form-control rounded" id="card_name" name="card_name"
                            placeholder="Name on Card" value="{{ $cards->name ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="card_number" class="mb-1">Card Number</label>
                        <input type="text" class="form-control rounded" id="card_number" name="card_number"
                            placeholder="Enter Card Number" value="{{ $cards->card_number ?? '' }}">
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="cvv" class="mb-1">CVV</label>
                            <input type="text" class="form-control rounded" id="cvv" name="cvv"
                                placeholder="CVV" value="{{ $cards->cvv ?? '' }}">
                        </div>
                        <div class="col-6 form-group">
                            <label for="expiry_date" class="mb-1">Expiry Date</label>
                            <input type="text" class="form-control rounded" id="expiry_date" name="expiry_date"
                                placeholder="MM/YY" value="{{ $cards->expiry_date ?? '' }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 form-group d-flex align-items-center">
                            <input style="margin-left: 0!important;" class="ms-0 me-2 form-check-input" type="checkbox" id="saveForLater" name="save_for_later"
                                value="" {{ ($cards->save_later ?? '') == 'yes' ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold" for="saveForLater">
                                Save for later use
                            </label>
                        </div>
                    </div>

                    @php
                        $hasCreditCard = \App\Models\CreditCard::where('user_id', auth()->id())->exists();
                    @endphp
                    <div id="cardMessages" class="my-3">
                        <!-- Add this message container somewhere in your credit card tab -->
                        <div id="cardMessages"></div>
                        @if (!$hasCreditCard)
                            <!-- Show Add Credit Card button if user has no credit card -->
                            <button type="button" id="addCardBtn"
                                class="btn btn-primary text-white px-1 px-sm-3 py-3 bg-success mt-3"
                                onclick="addCreditCard()">
                                Add Credit Card
                            </button>
                        @else
                            <!-- Show Update button if user has a credit card -->
                            <button type="button" class="btn btn-primary bg-white" id="updateCardBtn"
                                style="color:black" onclick="updateCreditCard()">
                                Update
                            </button>
                        @endif
                    </div>


                </div>

                <!-- Notifications Tab -->
                {{-- <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                    <h6 class="text-white mt-4 mb-3">Notifications</h6>
                    <div class="form-group">
                        <label for="marketing" class="mb-1">Marketing Emails</label>
                        <div class="d-flex">
                            <select class="form-select rounded">
                                <option value="On">On</option>
                                <option value="Off">Off</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="booking_notification" class="mb-1">Booking Notification</label>
                        <div class="d-flex">
                            <select class="form-select rounded">
                                <option value="On">On: Email and SMS</option>
                                <option value="Off">Off</option>
                            </select>
                        </div>
                    </div>
                </div> --}}
            </div>
        </form>
    </div>

    <!-- Include jQuery, Popper, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- Font Awesome (if needed for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        // Tabbing (Optional if data-bs-toggle works automatically, but let's ensure it):
        $(document).ready(function() {
            $('#myTab button').on('click', function(e) {
                e.preventDefault();
                $(this).tab('show');
            });
        });

        let creditCardCount = 0;

        function addCreditCard() {
            creditCardCount++;
            const cardName = document.getElementById('card_name').value;
            const cardNumber = document.getElementById('card_number').value;
            const cvv = document.getElementById('cvv').value;
            const expiryDate = document.getElementById('expiry_date').value;

            if (cardName && cardNumber && cvv && expiryDate) {
                const creditCardHtml = `
                <div class="credit-card mb-3 d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-white">Credit Card ${creditCardCount}</h6>
                        <p>Name: ${cardName}</p>
                        <p class="text-white">Card Number: ${cardNumber}${cvv}${expiryDate}</p>
                        <p class="text-white">CVV: ${cvv}</p>
                        <p class="text-white">Expiry Date: ${expiryDate}</p>
                    </div>
                    <button type="button" class="btn btn-danger" onclick="removeCreditCard(this)">
                        <span class="fa-solid fa-trash text-danger"></span>
                    </button>
                </div>
            `;
                document.getElementById('creditCardsContainer').insertAdjacentHTML('beforeend', creditCardHtml);

                // Clear input fields
                document.getElementById('card_name').value = '';
                document.getElementById('card_number').value = '';
                document.getElementById('cvv').value = '';
                document.getElementById('expiry_date').value = '';
            } else {
                alert('Please fill in all fields');
            }
        }

        function removeCreditCard(button) {
            button.closest('.credit-card').remove();
        }

        // Update Customer (AJAX)
        function updateCustomer() {
            let userId = "{{ auth()->user()->id }}";
            let email = $('#email').val().trim();
            let password = $('#password').val().trim();
            let full_name = $('#full_name').val().trim();
            let last_name = $('#last_name').val().trim();
            let phone_prefix = $('#phone_prefix').val();
            let phone = $('#phone').val().trim();
            let fullPhone = phone_prefix + phone;
            // alert(fullPhone);
            $.ajax({
                url: "{{ url('/customer/account/update') }}/" + userId,
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    email: email,
                    password: password.length > 0 ? password : null,
                    full_name: full_name,
                    last_name: last_name,
                    phone: fullPhone
                },
                success: function(response) {
                    $('#cardMessages').html(`
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
            ${response.message} 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `);

                    // Hide alert after 5 seconds (5000 milliseconds)
                    setTimeout(function() {
                        $("#successAlert").fadeOut("slow");
                    }, 5000);
                },
                error: function(xhr) {
                    let errorContainer = $('#cardMessages'); // Error message container

                    if (xhr.status === 404) {
                        errorContainer.html(`
            <div class="alert alert-danger alert-dismissible fade show" id="errorAlert">
                Error: Route not found. Please check Details.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
                    } else if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage =
                            "<div class='alert alert-danger alert-dismissible fade show' id='errorAlert'>";
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

        // Delete Customer (AJAX)
        function deleteCustomer() {
            if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
                let userId = "{{ auth()->user()->id }}";

                let deleteBtn = $("#deleteButton");
                deleteBtn.prop("disabled", true).html('<span class="spinner-border spinner-border-sm"></span> Deleting...');

                $.ajax({
                    url: "{{ url('/delete-request') }}/" + userId,
                    method: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        deleteBtn.prop("disabled", false).css({
                            "background-color": "green",
                            "color": "white"
                        }).text("Delete Account");

                        $("#responseMessage").html(
                            '<p style="background-color: green; color: white; padding: 10px; border-radius: 5px;">' +
                            response.message + '</p>').show();
                    },
                    error: function(xhr) {
                        deleteBtn.prop("disabled", false).text("Delete Account");

                        let errorMessage = "Error deleting account. Please try again.";
                        if (xhr.status === 400) {
                            errorMessage = "Your Request is already in process.";
                        }

                        $("#responseMessage").html(
                            '<p style="background-color: red; color: white; padding: 10px; border-radius: 5px;">' +
                            errorMessage + '</p>').show();
                    }
                });
            }
        }

        // add crediet detials
        function addCreditCard() {
            // Form values
            let cardName = $('#card_name').val().trim();
            let cardNumber = $('#card_number').val().trim();
            let cvv = $('#cvv').val().trim();
            let expiryDate = $('#expiry_date').val().trim();
            let saveForLater = $('#saveForLater').is(':checked') ? 'yes' : 'no';
            // alert(saveForLater);
            // Button and message elements
            let addButton = $("#addCardBtn");
            let messageContainer = $("#cardMessages");

            // Add loading state
            addButton.prop("disabled", true).html('<span class="spinner-border spinner-border-sm"></span> Adding...');

            // AJAX request
            $.ajax({
                url: "{{ url('/add-credit-card') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: 'application/json',
                processData: false,
                data: JSON.stringify({
                    card_name: cardName,
                    card_number: cardNumber,
                    cvv: cvv,
                    expiry_date: expiryDate,
                    save_later: saveForLater,
                }),
                success: function(response) {
                    addButton.prop("disabled", false).html('Add Credit Card');
                    window.location.reload();
                    // Success message
                    messageContainer.html(`
                        <div class="alert alert-success alert-dismissible fade show">
                            ${response.message} <strong>Refresh your page now.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `);

                    // Clear form fields
                    $('#card_name, #card_number, #cvv, #expiry_date').val('');

                    // Optional: Refresh cards list
                    // loadCreditCards();
                },
                error: function(xhr) {
                    // Reset button
                    addButton.prop("disabled", false).html('Add Credit Card');

                    let errorMessage = '<div class="alert alert-danger">';

                    // Handle validation errors
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        for (const [key, value] of Object.entries(errors)) {
                            errorMessage += `${value[0]}<br>`;
                        }
                    }
                    // Handle other errors
                    else {
                        errorMessage += xhr.responseJSON.message || 'An error occurred. Please try again.';
                    }

                    errorMessage += '</div>';
                    messageContainer.html(errorMessage);
                }
            });
        }





        // Update Credit Card
        function updateCreditCard() {
            const btn = $('#updateCardBtn');
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Updating...');
            let saveForLater = $('#saveForLater').is(':checked') ? 'yes' : 'no';
            $.ajax({
                url: "{{ route('update.credit.card') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    card_name: $('#card_name').val(),
                    card_number: $('#card_number').val().replace(/\s/g, ''), // Remove spaces
                    expiry_date: $('#expiry_date').val(),
                    cvv: $('#cvv').val(),
                    save_later: saveForLater
                },
                success: function(response) {
                    // return;
                    window.location.reload();
                    $('#cardMessages').html(`
                <div class="alert alert-success alert-dismissible fade show">
                    ${response.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `);
                },
                error: function(xhr) {
                    let errorHtml = '<div class="alert alert-danger"><ul>';
                    if (xhr.status === 422) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorHtml += `<li>${value}</li>`;
                        });
                    } else {
                        errorHtml += '<li>Server error! Please try again later.</li>';
                    }
                    errorHtml += '</ul></div>';
                    $('#cardMessages').html(errorHtml);
                },
                complete: function() {
                    btn.prop('disabled', false).html('Update Card');
                }
            });
        }
        // Helper function for messages
        function showMessage(type, message) {
            const alert = `<div class="alert alert-${type} alert-dismissible fade show">
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>`;
            $('#cardMessages').html(alert);
        }

        // Toggle Password Visibility
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
    </script>

@endsection
