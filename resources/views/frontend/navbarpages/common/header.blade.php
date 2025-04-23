@php
    $flage = Auth::guard('chauffeur')->user();
    $chaufferCheck = Auth::guard('chauffeur')->check();
    $customerCheck = Auth::guard('web')->check();
    $signIn = $chaufferCheck || $customerCheck;
@endphp

<style>

</style>

<header id="mainHeader" class="scroll-header bg-white">
    <nav class="navbar navbar-expand-xl navbar-light p-0 m-0">
        <div class="d-flex justify-content-between justify-content-xl-start pe-2 p-xl-0 navbar-width">
            <div class="d-flex align-items-center navbar-logo-section">
                <img src="{{ asset('public/header/images/Black_Sedan_logo.png') }}" alt=""
                    class="ms-2 ms-lg-5 navbar-logo" />
            </div>
            <div class="d-xl-none d-flex align-items-center gap-2">
                <button class="shadow-none border-0 navbar-toggler" type="button" aria-label="Toggle navigation">
                    <input type="checkbox" id="menu_checkbox" />
                    <label for="menu_checkbox">
                        <div></div>
                        <div></div>
                        <div></div>
                    </label>
                </button>
                <div class="d-flex align-items-center gap-1">
                    <!-- Chauffeur Dropdown -->
                    @if ($chaufferCheck)
                        <div class="dropdown">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqafzhnwwYzuOTjTlaYMeQ7hxQLy_Wq8dnQg&s"
                                class="dropdown-btn" onclick="toggleDropdown(this)">
                            <div class="dropdown-content" id="dropdownContent">
                                <a href="{{ route('chauffeur.rides') }}">Rides</a>
                                <a href="{{ route('chauffeur-account') }}">Account</a>
                                <a href="{{ route('chauffeur.logout') }}" id="{{ route('customer.logout') }}">Logout</a>
                            </div>
                        </div>
                    @endif

                    <!-- Customer Dropdown -->
                    @if ($customerCheck)
                        <div class="dropdown">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqafzhnwwYzuOTjTlaYMeQ7hxQLy_Wq8dnQg&s"
                                class="dropdown-btn" onclick="toggleDropdown(this)">
                            <div class="dropdown-content" id="dropdownContent">
                                <a href="{{ route('customer.rides') }}">Rides</a>
                                <a href="{{ route('customer-account') }}">Account</a>
                                <a href="{{ route('customer.logout') }}" id="customerLogout">Logout</a>
                            </div>
                        </div>
                    @endif

                    <a href="{{ $signIn ? 'https://ranglerzbeta.in/bs-reservation/booknow' : '#bookNowModal1' }}"
                        data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" class="btn-4 rounded">
                        <span class="fw-bold">Book Now</span>
                    </a>

                    @if (!$signIn)
                        <a href="#signinModal" data-bs-toggle="modal" class="btn-4 rounded">
                            <span class="fw-bold">Sign In</span>
                        </a>
                    @endif

                </div>
            </div>
        </div>
        <div class="shadow bg-white h-screen collapse navbar-collapse" id="navbarNav">
            <div class="d-flex justify-content-center align-items-center navbar-logo-section pt-4 ms-3">
                <img src="{{ asset('public/header/images/Black_Sedan_logo.png') }}" alt=""
                    class="ms-5 navbar-logo" />
            </div>
            <ul class="navbar-nav mt-4 px-3">
                <li class="nav-item border-bottom py-3">
                    <a class="p-0 nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item border-bottom py-3">
                    <a class="p-0 nav-link" aria-current="page" href="{{ url('/about-us') }}">About Us</a>
                </li>
                <li class="nav-item border-bottom py-3">
                    <a class="p-0 nav-link" aria-current="page" href="{{ url('/our-services') }}">Our Services</a>
                </li>
                <li class="nav-item border-bottom py-3">
                    <a class="p-0 nav-link" aria-current="page" href="{{ url('/fleet') }}">Our Fleet</a>
                </li>
                <li class="nav-item border-bottom py-3">
                    <a class="p-0 nav-link" aria-current="page" href="{{ route('getBlackSeedan') }}">Far Estimator</a>
                </li>
                <li class="nav-item border-bottom py-3">
                    <a class="p-0 nav-link" aria-current="page" href="{{ route('contact-us') }}">Contact Us</a>
                </li>
            </ul>
        </div>
        <div class="d-none d-xl-flex flex-column align-items-start ms-5 w-100">
            <div class="py-3 align-items-center gap-5 navbar-top-section">
                <div>
                    <p class="mb-0">Black Sedan Limousine Services</p>
                </div>
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-1 ms-5">
                        <span class="fa fa-phone phone-icon icon" aria-hidden="true">
                        </span>
                        <p class="mb-0">Dispatch Line 24/7 +1 825-735-55381</p>
                    </div>
                    <div class="d-flex align-items-center gap-1 ms-2">
                        <span class="fa fa-envelope icon" aria-hidden="true"> </span>
                        <a href="mailto:info@blacksedans.ca"></a>
                        <p class="mb-0">Email us at: info@blacksedans.ca</p>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between navbar-bottom-section">
                <ul class="gap-4 py-4 navbar-nav">
                    <li class="position-relative nav-item">
                        <a class="p-0 nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                        <span class="link-bg"></span>
                    </li>
                    <li class="position-relative nav-item">
                        <a class="p-0 nav-link" href="{{ url('/about-us') }}">About</a>
                        <span class="link-bg"></span>
                    </li>
                    <li class="position-relative nav-item">
                        <a class="p-0 nav-link" href="{{ url('/our-services') }}">Services</a>
                        <span class="link-bg"></span>
                    </li>
                    <li class="position-relative nav-item">
                        <a class="p-0 nav-link" href="{{ url('/fleet') }}">Fleet</a>
                        <span class="link-bg"></span>
                    </li>
                    <li class="position-relative nav-item">
                        <a class="p-0 nav-link" href="{{ url('/') }}">Fare Estimator</a>
                        <span class="link-bg"></span>
                    </li>
                    <li class="position-relative nav-item">
                        <a class="p-0 nav-link" href="{{ url('/contact-us') }}">Contact</a>
                        <span class="link-bg"></span>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <!-- Chauffeur Dropdown -->
                    @if ($chaufferCheck)
                        <div class="dropdown">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqafzhnwwYzuOTjTlaYMeQ7hxQLy_Wq8dnQg&s"
                                class="dropdown-btn" onclick="toggleDropdown(this)">
                            <div class="dropdown-content" id="dropdownContent">
                                <a href="{{ route('chauffeur.rides') }}">Rides</a>
                                <a href="{{ route('chauffeur-account') }}">Account</a>
                                <a href="{{ route('chauffeur.logout') }}"
                                    id="{{ route('customer.logout') }}">Logout</a>
                            </div>
                        </div>
                    @endif

                    <!-- Customer Dropdown -->
                    @if ($customerCheck)
                        <div class="dropdown">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqafzhnwwYzuOTjTlaYMeQ7hxQLy_Wq8dnQg&s"
                                class="dropdown-btn" onclick="toggleDropdown(this)">
                            <div class="dropdown-content" id="dropdownContent">
                                <a href="{{ route('customer.rides') }}">Rides</a>
                                <a href="{{ route('customer-account') }}">Account</a>
                                <a href="{{ route('customer.logout') }}" id="customerLogout">Logout</a>
                            </div>
                        </div>
                    @endif

                    <a href="{{ $signIn ? 'https://ranglerzbeta.in/bs-reservation/booknow' : '#bookNowModal1' }}"
                        data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" class="btn-4 rounded">
                        <span class="fw-bold">Book Now</span>
                    </a>
                    @if (!$signIn)
                        <a href="#signinModal" data-bs-toggle="modal" class="btn-4 rounded">
                            <span class="fw-bold">Sign In</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        </div>

        </div>
    </nav>
</header>

{{-- Sign in modal --}}
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalLabel"
    aria-hidden="true">
    <div class="modal-dialog d-flex align-items-center h-75" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 d-flex justify-content-end">
                <button type="button" data-bs-dismiss="modal" aria-label="Close"
                    class="d-flex justify-content-center bg-black border-0 text-white rounded align-items-center"
                    style="height: 3rem; width: 4rem; position: absolute; top:0.5rem; right:0.5rem;">
                    <span class="fa-solid fa-xmark"></span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h3 class="fw-bold font-lato text-black text-center">Select Role</h3>
                <p style="font-size: 0.8rem" class="mx-3 mb-5 text-dark text-center">
                    Please select your role to continue. If you are a customer looking for a ride, choose "Customer Sign
                    In."
                    If you are a chauffeur providing services, select "Chauffeur Sign In."
                </p>
                <div class="py-2 mb-3">
                    <a href="{{ route('customer.login') }}" class="py-3 px-4 btn bg-black text-white">
                        <span style="font-size:3rem" class="fa-solid fa-user"></span>
                        <p style="line-height: normal;" class="m-0 mt-2 p-0">Customer Sign In</p>
                    </a>
                    <a href="{{ route('chauffeur.login') }}"
                        class="mt-3 mt-sm-0 ms-sm-3 px-4 py-3 btn bg-black text-white">
                        <span style="font-size:3rem" class="fa-solid fa-car"></span>
                        <p style="line-height: normal;" class="m-0 mt-2 p-0">Chauffeur Sign In</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Book Now modal --}}
<div class="modal fade" id="bookNowModal1" tabindex="-1" role="dialog" aria-labelledby="bookNowModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog d-flex align-items-center h-75" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 d-flex justify-content-end">
                <button type="button" data-bs-dismiss="modal" aria-label="Close"
                    class="d-flex justify-content-center bg-black border-0 text-white rounded align-items-center"
                    style="height: 3rem; width: 4rem; position: absolute; top:0.5rem; right:0.5rem;">
                    <span class="fa-solid fa-xmark"></span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h3 class="fw-bold font-lato text-black text-center">Select Booking Type</h3>
                <p style="font-size: 0.8rem" class="mx-3 my-3 text-dark text-center">
                    <strong>In Guest Booking</strong> you don't need to create an account. <br> <strong>In Login to
                        Book</strong> You will have history of all your bookings.
                </p>
                <div class="py-2 mb-3 d-flex gap-3 justify-content-center align-items-center flex-wrap">
                    <a href="{{ url('/booknow') }}" style="width: 10rem;" class="py-3 btn bg-black text-white">
                        <span style="font-size:3rem" class="fa-solid fa-user"></span>
                        <p style="line-height: normal;" class="m-0 mt-2 p-0">Continue as guest</p>
                    </a>
                    <a href="{{ route('customer.login') }}" style="width: 10rem;"
                        class="py-3 btn bg-black text-white">
                        <span style="font-size:3rem" class="fa-solid fa-car"></span>
                        <p style="line-height: normal;" class="m-0 mt-2 p-0">Login to Book</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let lastScrollY = 0;

    window.addEventListener('scroll', function() {
        const header = document.getElementById('mainHeader');
        const navbarTopSection = document.querySelector('.navbar-top-section');
        const currentScrollY = window.scrollY;
        const logo = document.querySelector('.navbar .navbar-logo-section');

        if (currentScrollY === 0) {
            // When at the top of the page, keep the navbar visible and show the top section
            header.style.transform = 'translateY(0)';
            header.style.position = 'relative';
            navbarTopSection.style.display = 'flex';
            logo.style.height = '8rem';
        } else if (currentScrollY > 50 && currentScrollY < 600) {
            // When scrolling down and past 50px, hide the navbar and the top section
            header.style.transform = 'translateY(-100%)'; // Move the navbar out of view
            header.style.position = 'relative';
            logo.style.height = '8rem';
            navbarTopSection.style.display = 'none'; // Hide the top section
        } else if (currentScrollY > 600) {
            // When scrolling up and not at the top, show the navbar but hide the top section
            header.style.transform = 'translateY(0)'; // Bring the navbar back into view
            header.style.position = 'sticky';
            navbarTopSection.style.display = 'none'; // Keep the top section hidden
            logo.style.height = '5rem';
        }

        lastScrollY = currentScrollY;
    });

    function toggleDropdown(element) {
        var dropdownContent = element.nextElementSibling; // Get the sibling dropdown content
        if (dropdownContent.style.display === 'block') {
            dropdownContent.style.display = 'none';
        } else {
            dropdownContent.style.display = 'block';
        }
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-btn')) {
            var dropdowns = document.getElementsByClassName('dropdown-content');
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === 'block') {
                    openDropdown.style.display = 'none';
                }
            }
        }
    }
</script>

<style>
    #mainHeader {
        position: relative;
        top: 0;
        /* Initially visible */
        width: 100%;
        transform: translateY(0);
        /* Default position */
        transition: transform 0.5s ease-in-out;
        /* Smooth transition effect */
        z-index: 100000;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
    }

    .link-bg {
        display: none;
        /* Initially hidden */
    }

    .modal-backdrop {
        z-index: 1000000;
    }

    .modal {
        z-index: 1000001;
    }
</style>
