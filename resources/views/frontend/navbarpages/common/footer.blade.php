@php
$flage = Auth::guard('chauffeur')->user();
$chaufferCheck = Auth::guard('chauffeur')->check();
$customerCheck = Auth::guard('web')->check();
$signIn = $chaufferCheck || $customerCheck;
$booknow = route('getBlackSeedan');
@endphp
<footer class="footer">
    <div class="footer-upper-portion">
        <div class="footer-upper-portion-inner">
            <div class="overflow-hidden contact-portion">
                <div class="row gy-5">
                    <div class="col-md-6">
                        <div class="bg-white left-heading-border"></div>
                        <h1 class="text-white mt-3 font-600 font-lato">Why Chose Us?</h1>
                        <div class="mt-5 py-3 position-relative">
                            <div class="line-side"></div>
                            <ul class="text-white list font-poppins">
                                <li class="position-relative list-item">24/7 availability</li>
                                <li class="position-relative mt-2 list-item">Experienced and licensed chauffeurs</li>
                                <li class="position-relative mt-2 list-item">Luxurious and clean cars</li>
                                <li class="position-relative mt-2 list-item">Professional and on-time</li>
                                <li class="position-relative mt-2 list-item">High client satisfaction</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center justify-content-sm-end">
                        <div class="contact-form">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="text-black mb-0 font-600 font-lato">Contact Information</h2>
                                <div class="left-heading-border"></div>
                            </div>
                            <div class="mt-5">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="fa-solid fa-phone text-black contact-form-icon"></span>
                                    <div>
                                        <a href="tel:+18257355538" class="contact-way-link">+1 825-735-5538</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3 mt-4">
                                    <span class="fa-solid fa-envelope text-black contact-form-icon"></span>
                                    <div>
                                        <a href="https://blacksedans.ca/contact-us/info@blacksedan.com" class="contact-way-link">info@blacksedans.ca</a>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <a href="{{ $signIn ? $booknow : '#bookNowModal' }}" 
                                    data-bs-toggle="{{ !$signIn ? 'modal' : '' }}" 
                                    class="btn-4 rounded">
                                    <span class="fw-bold">Book Now</span>
                                  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-black pt-3 footer-lower-section">
            <div class="pt-5 pb-5 contact-portion">
                <div class="d-flex align-items-center flex-wrap gap-5 gap-md-0">
                    <div class="logo-section">
                        <div class="d-flex align-items-center gap-2">
                            <h3 class="text-white font-600 font-lato">Limo Service in Calgary
                            </h3>
                            <span class="right-line"></span>
                        </div>
                        <div>
                            <img src="{{asset("frontend/images/sedan-white.png")}}" alt="" class="mt-3 footer-logo">
                        </div>
                    </div>
                    <div class="social-section">
                        <div class="d-flex flex-md-column align-items-center gap-3">
                            <div class="social-media-icon">
                                <span class="fa-brands fa-facebook-f facebook"></span>
                            </div>
                            <div class="social-media-icon">
                                <span class="fa-brands fa-twitter twitter"></span>
                            </div>
                            <div class="social-media-icon">
                                <span class="fa-brands fa-instagram"></span>
                            </div>
                        </div>
                    </div>
                    <div class="info-section">
                        <div class="d-flex align-items-center gap-2">
                            <h3 class="text-white font-600 font-lato">Areas Served
                            </h3>
                            <span class="right-line"></span>
                        </div>
                        <p class="text-white mt-4 fw-bold font-poppins text-small">To and from Calgary and surrounding areas
                        </p>
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Calgary</p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Airdrie</p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Cochrane</p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Okotoks</p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">High River
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Priddis
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Chestermere
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Strathmore
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Banff
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Canmore
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Lake Lousie
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Lethbridge
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Medicine Hat
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Edmonton
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Golden. Fernie
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Emerald Lake
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Jasper
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Red Deer
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Lacombe
                                </p>
                            </div>
                            <div class="d-flex gap-2 align-items-center fw-light text-white font-lato">
                                <span class="fas fa-arrow-right arrow-right-icon"></span>                                
                                <p class="mb-0">Drumheller
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4 text-white text-center copyright-line">
                <p class="mb-0">© 2025 BlackSedan. All rights reserved. | Powered By: Ranglerz
                </p>
            </div>
        </div>
    </div>
</footer>