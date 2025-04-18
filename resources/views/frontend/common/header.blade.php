<style>
    .dropdown-btn {
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        cursor: pointer;
        position: relative;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        right: -150%;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown-btn:hover .dropdown-content {
        display: block;
    }

    @media screen and (max-width: 576px) {
        .dropdown-btn {
        width: 2rem;
        height: 2rem;
    }
    }
</style>
@php
$flage = Auth::guard('chauffeur')->user();
$chaufferCheck = Auth::guard('chauffeur')->check();
$customerCheck = Auth::guard('web')->check();
$signIn = $chaufferCheck || $customerCheck;
@endphp
<div id="ct-loadding" class="ct-loader style1">
    <div class="loading-spin">
        <div class="spinner">
            <div class="right-side">
                <div class="bar"></div>
            </div>
            <div class="left-side">
                <div class="bar"></div>
            </div>
        </div>
        <div class="spinner color-2">
            <div class="right-side">
                <div class="bar"></div>
            </div>
            <div class="left-side">
                <div class="bar"></div>
            </div>
        </div>
    </div>
</div>
<header id="ct-masthead">
    <div id="ct-header-wrap" class="ct-header-layout10 fixed-height is-sticky">
        <div id="ct-header" class="ct-header-main">
            <div class="container">
                <div class="row">
                    <div class="ct-header-branding">
                        <div class="ct-header-branding-inner"> <a class="logo-dark" href="https://blacksedans.ca/" 
                                title="Black Sedan Limousine Services" rel="home"><img
                                    src="{{ asset('public/frontend/seedan/images/2020-10-Black_Sedan_logo.png') }}"
                                    alt="Black Sedan Limousine Services" /></a> <a class="logo-light"
                                href="https://blacksedans.ca/" title="Black Sedan Limousine Services" rel="home"><img
                                    src="{{ asset('public/frontend/seedan/images/2020-10-Black_Sedan_logo.png') }}"
                                    alt="Black Sedan Limousine Services" /></a> <a class="logo-mobile"
                                href="https://blacksedans.ca/" title="Black Sedan Limousine Services" rel="home"><img
                                    src="{{ asset('public/frontend/seedan/images/2020-10-Black_Sedan_logo.png') }}"
                                    alt="Black Sedan Limousine Services" /></a> </div>
                        <div class="ct-header-branding-bg"></div>
                    </div>
                    <div class="ct-header-navigation-wrap">
                        <div class="ct-header-holder">
                            <div class="ct-header-info-item ct-header-wellcome"> Black Sedan Limousine Services </div>
                            <div class="ct-header-info-item ct-header-call">
                                <div class="h-item-icon"> <i class="fal fa-phone"></i> </div>
                                <div class="h-item-meta"> <span>Dispatch Line 24/7 +1 825-735-55381</span> </div>
                            </div>
                            <div class="ct-header-info-item ct-header-email">
                                <div class="h-item-icon"> <i class="flaticonv3-envelope"></i> </div>
                                <div class="h-item-meta"> <span>Email us at: info@blacksedans.ca</span> </div> <a
                                    class="h-item-link" href="mailto:info@blacksedans.ca"></a>
                            </div>
                        </div>
                        <div class="justify-content-between ct-header-navigation">
                            <nav class="ct-main-navigation">
                                <div class="ct-main-navigation-inner">
                                    <div class="ct-logo-mobile"> <a href="" title="" rel="home"><img
                                                src="{{ asset('public/header/seedan/images/2020-10-Black_Sedan_logo.png') }}"
                                                alt="" /></a> </div>
                                    <div class="ct-main-navigation-filter">
                                        <ul id="menu-blacksedan-menu"
                                            class="align-items-center ct-main-menu sub-hover children-plus clearfix">
                                            <li id="menu-item-4988"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-4988">
                                                <a href="{{url('/home')}}"><span>Home</span></a>
                                            </li>
                                            <li id="menu-item-4968"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4968">
                                                <a href="{{url('/about-us')}}"><span>About </span></a>
                                            </li>
                                            <li id="menu-item-4967"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4967">
                                                <a href="{{url('/our-services')}}"><span>
                                                        Services</span></a>
                                            </li>
                                            <li id="menu-item-4966"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4966">
                                                <a href="{{ route('fleet')}}"><span> Fleet</span></a>
                                            </li>
                                            <li id="menu-item-7240"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7240">
                                                <a href="{{url('/')}}"><span>Fare
                                                        Estimator</span></a>
                                            </li>
                                            <li id="menu-item-4965"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4965">
                                                <a href="{{url('/contact-us')}}"><span>Contact</span></a>
                                            </li>
                                        </ul>

                                    </div>

                                </div>
                            </nav>
                            @php
                            $flage = Auth::guard('chauffeur')->user();
                            $chaufferCheck = Auth::guard('chauffeur')->check();
                            $customerCheck = Auth::guard('web')->check();
                            $signIn = $chaufferCheck || $customerCheck;
                            // dd($chaufferCheck);
                            // dd($customerCheck);
                            @endphp
                            <!-- Chauffeur Dropdown -->
                            @if ($chaufferCheck)
                                <div class="dropdown">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqafzhnwwYzuOTjTlaYMeQ7hxQLy_Wq8dnQg&s" class="dropdown-btn" onclick="toggleDropdown('chauffeurDropdown')">
                                    <div class="dropdown-content" id="chauffeurDropdown">
                                        <a href="{{route('chauffeur.rides')}}">Rides</a>
                                        <a href="{{route('chauffeur-account')}}">Account</a>
                                        <a href="{{route('chauffeur.logout')}}" id="{{route('customer.logout')}}">Logout</a>
                                    </div>
                                </div>
                            @endif
                            <!-- Customer Dropdown -->
                            @if ($customerCheck)
                                <div class="dropdown">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqafzhnwwYzuOTjTlaYMeQ7hxQLy_Wq8dnQg&s" class="dropdown-btn" onclick="toggleDropdown('customerDropdown')">
                                    <div class="dropdown-content" id="customerDropdown">
                                        <a href="{{route('customer.rides')}}">Rides</a>
                                    <a href="{{route('customer-account')}}">Account</a>
                                    <a href="{{route('customer.logout')}}" id="customerLogout">Logout</a>
                                    </div>
                                </div>
                            @endif

                            <div class="elementor-element elementor-element-58e1b26 elementors-align-center animated-slow elementor-widget elementor-widget-ct_button animated fadeIn"
                                data-id="58e1b26" data-element_type="widget"
                                data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;_animation_delay&quot;:2800}"
                                data-widget_type="ct_button.default">
                                <div class="elementor-widget-container">
                                    <div id="ct_button-58e1b26"
                                        class="ct-button-wrapper ct-button-layout1 icon- btn--inline ">
                                        <a href="{{ $signIn ? 'https://ranglerzbeta.in/bs-reservation/' : '#bookNowModal' }}" 
                                        data-toggle="{{ !$signIn ? 'modal' : '' }}" 
                                    class="btn btn-effect2 icon-active btn-inline-block" 
                                    data-wow-delay="ms">
                                    <span class="ct-button-icon ct-align-icon-">
                                    </span> <span class="ct-button-text">Book Now</span> </a>
                                <span class="ct-icon-active"></span> 
                                        @if(!$customerCheck && !$chaufferCheck)
                                        <span class="ct-icon-active"></span> <a href="#signinModal"
                                            class="btn btn-effect2 icon-active btn-inline-block" data-toggle="modal"
                                            data-wow-delay="ms">
                                            <span class="ct-button-icon ct-align-icon-">
                                            </span> <span class="ct-button-text">Sign In</span> </a>
                                            @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div id="ct-menu-mobile" class="d-flex"> <span class="btn-nav-mobile open-menu mr-3"> <span></span>
                    </span>
                            <!-- Chauffeur Dropdown -->
                            @if ($chaufferCheck)

                            <div class="d-xl-none dropdown">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqafzhnwwYzuOTjTlaYMeQ7hxQLy_Wq8dnQg&s" class="dropdown-btn" onclick="toggleDropdown('mobileChauffeurDropdown')">
                                <div class="dropdown-content" id="mobileChauffeurDropdown">
                                    <a href="{{route('chauffeur.rides')}}">Rides</a>
                                    <a href="{{route('chauffeur-account')}}">Account</a>
                                    <a href="{{route('chauffeur.logout')}}" id="logoutTrigger">Logout</a>
                                </div>
                            </div>
                            @endif

                            @if ($customerCheck)
                            <!-- Customer Dropdown -->
                            <div class="d-xl-none dropdown">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqafzhnwwYzuOTjTlaYMeQ7hxQLy_Wq8dnQg&s" class="dropdown-btn" onclick="toggleDropdown('mobileCustomerDropdown')">
                                <div class="dropdown-content" id="mobileCustomerDropdown">
                                    <a href="{{route('customer.rides')}}">Rides</a>
                                    <a href="{{route('customer-account')}}">Account</a>
                                    <a href="{{route('customer.logout')}}" id="customerLogout">Logout</a>
                                </div>
                            </div>
                            @endif

                    <div class="d-xl-none elementor-element elementor-element-58e1b26 elementors-align-center animated-slow elementor-widget elementor-widget-ct_button animated fadeIn"
                        data-id="58e1b26" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;_animation_delay&quot;:2800}"
                        data-widget_type="ct_button.default">
                        <div class="elementor-widget-container">
                            <div id="ct_button-58e1b26" class="ct-button-wrapper ct-button-layout1 icon- btn--inline ">
 
                                <a href="{{ $signIn ? 'https://ranglerzbeta.in/bs-reservation/' : '#bookNowModal' }}" 
                                data-toggle="{{ !$signIn ? 'modal' : '' }}" 
                                    class="btn btn-effect2 icon-active btn-inline-block"
                                    data-wow-delay="ms">
                                    <span class="ct-button-icon ct-align-icon-">
                                    </span> <span class="ct-button-text">Book Now</span> </a>
                                <span class="ct-icon-active"></span> 
                                @if(!$customerCheck && !$chaufferCheck)
                                <a href="#signinModal"
                                    class="btn btn-effect2 icon-active btn-inline-block" data-toggle="modal"
                                    data-wow-delay="ms">
                                    <span class="ct-button-icon ct-align-icon-">
                                    </span> <span class="ct-button-text">Sign In</span> </a>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<div class="ct-header-offset"></div>

<!-- Sign In Modal -->
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalLabel" aria-hidden="true">
    <div class="modal-dialog d-flex align-items-center h-75" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 d-flex justify-content-end">
                <button type="button"  data-dismiss="modal" aria-label="Close" class="d-flex justify-content-center align-items-center" style="min-height: 3rem;
                width: 1rem; position: absolute; top:0.5rem; right:0.5rem;">
                <span class="fa-solid fa-xmark"></span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h4 class="font-font-weight-bolder text-center">Select Role</h4>
                <p style="font-size: 0.8rem" class="mx-3 mb-5 text-dark text-center"><p style="font-size: 0.8rem" class="mx-3 mb-5 text-dark text-center">
                    Please select your role to continue. If you are a customer looking for a ride, choose "Customer Sign In."  
                    If you are a chauffeur providing services, select "Chauffeur Sign In."
                </p>
                </p>
                <div class="py-2 mb-3">
                <a  style="text-decoration: none; color:#fff" href="{{route('customer.login')}}" type="button" class="py-3 btn btn-primary"><span style="font-size:3rem" class="fa-solid fa-user"></span><p style="line-height: normal;" class="m-0 mt-2 p-0">Customer Sign IN</p></a>
                <a  style="text-decoration: none; color:#fff" href="{{route('chauffeur.login')}}" type="button" class="mt-3 mt-sm-0 ml-sm-3 py-3 btn btn-primary"><span style="font-size:3rem" class="fa-solid fa-car"></span><p style="line-height: normal;" class="m-0 mt-2 p-0">Chauffeur Sign IN</p></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Booking Modal -->
<div class="modal fade" id="bookNowModal" tabindex="-1" role="dialog" aria-labelledby="bookNowModalLabel" aria-hidden="true">
    <div class="modal-dialog d-flex align-items-center h-75" role="document">
        <div class="px-5 modal-content">
            <div class="modal-header border-0 d-flex justify-content-end">
                <button type="button"  data-dismiss="modal" aria-label="Close" class="d-flex justify-content-center align-items-center" style="min-height: 3rem;
                width: 1rem; position: absolute; top:0.5rem; right:0.5rem;">
                <span class="fa-solid fa-xmark"></span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h4 class="font-font-weight-bolder text-center mt-3">Select Booking Type</h4>
                <p style="font-size: 0.8rem" class="mx-3 mb-5 text-dark text-center">
                    <strong>In Guest Booking</strong> you don't need to sign in. 
                    <strong>In Login to Book</strong> you will have history of all your bookings.
                </p>
                <div class="d-flex flex-wrap align-items-center py-2 mb-3">
                <a  style="text-decoration: none; color:#fff" href="{{url('/')}}" type="button" class="py-3 btn btn-primary"><span style="font-size:3rem" class="fa-solid fa-user"></span><p style="line-height: normal;" class="m-0 mt-2 p-0">Continue as guest</p></a>
                <a  style="text-decoration: none; color:#fff" href="{{route('customer.login')}}" type="button" class="mt-3 mt-sm-0 ml-sm-3 py-3 btn btn-primary"><span style="font-size:3rem" class="fa-solid fa-car"></span><p style="line-height: normal;" class="m-0 mt-2 p-0">Login to Book</p></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/f65646d495.js" crossorigin="anonymous"></script>
<script>
    function toggleDropdown(dropdownId) {
        var dropdownContent = document.getElementById(dropdownId);
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

