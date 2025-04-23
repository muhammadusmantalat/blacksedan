@php
$flage = Auth::guard('chauffeur')->user();
$chaufferCheck = Auth::guard('chauffeur')->check();
$customerCheck = Auth::guard('web')->check();
$signIn = $chaufferCheck || $customerCheck;
$booknow = route('getBlackSeedan');
@endphp
<footer id="colophon" class="site-footer-custom">
            <div class="footer-custom-inner">
                <div class="">
                    <div class="row">
                        <div class="col-12">
                            <div data-elementor-type="wp-post" data-elementor-id="4845" class="elementor elementor-4845">
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-311c214 elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default ct-header-fixed-none ct-row-max-none" data-id="311c214" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-background-overlay"></div>
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6af808e" data-id="6af808e" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-4963ee2 line-sub-preset2 elementor-widget elementor-widget-ct_heading" data-id="4963ee2" data-element_type="widget" data-widget_type="ct_heading.default">
                                                    <div class="elementor-widget-container">
                                                        <div id="ct_heading-4963ee2" class="ct-heading h-align- sub- ct-heading-left item-st-line-top1">
                                                            <div class="ct-item--inner">
                                                                <div class="ct-inline-css" data-css="              "> </div>
                                                                <h3 class="item--title st-line-top1 wow wow fadeIn" data-wow-delay="ms">
                                                                    <div class="ct-heading-divider"><span></span></div> <span class="sp-main"> Why Chose Us? </span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-aba4691 elementor-widget elementor-widget-ct_list" data-id="aba4691" data-element_type="widget" data-widget_type="ct_list.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="ct-list style6">
                                                            <div class="ct-list-item" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> 24/7 availability </div>
                                                                </div>
                                                            </div>
                                                            <div class="ct-list-item" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> Experienced and licensed chauffeurs </div>
                                                                </div>
                                                            </div>
                                                            <div class="ct-list-item" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> Luxurious and clean cars </div>
                                                                </div>
                                                            </div>
                                                            <div class="ct-list-item" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> Professional and on-time </div>
                                                                </div>
                                                            </div>
                                                            <div class="ct-list-item" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> High client satisfaction </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-f3fd502 elementor-widget elementor-widget-spacer" data-id="f3fd502" data-element_type="widget" data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-ade08fe elementor-hidden-desktop elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-ct_button" data-id="ade08fe" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:400}" data-widget_type="ct_button.default">
                                                    <div class="elementor-widget-container">
                                                        <div id="ct_button-ade08fe" class="ct-button-wrapper ct-button-layout1 icon- btn--inline">
                                                            <div class="ct-inline-css" data-css=""> </div> <span class="ct-icon-active"></span> 
                                                            <a href="#bookNowModal" data-toggle="modal" data-wow-target="#bookNowModal" class="btn btn-primary">Book Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-0da1e6a" data-id="0da1e6a" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-c34ad2c elementor-hidden-desktop elementor-hidden-tablet elementor-hidden-mobile elementor-widget elementor-widget-ct_list" data-id="c34ad2c" data-element_type="widget" data-widget_type="ct_list.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="ct-list style2 tow-column">
                                                            <div class="ct-list-item wow fadeInUp" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> Business Meetings </div>
                                                                </div>
                                                            </div>
                                                            <div class="ct-list-item wow fadeInUp" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> Social Events </div>
                                                                </div>
                                                            </div>
                                                            <div class="ct-list-item wow fadeInUp" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> Luxurious Limousines </div>
                                                                </div>
                                                            </div>
                                                            <div class="ct-list-item wow fadeInUp" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> 24 Hour Airport Service </div>
                                                                </div>
                                                            </div>
                                                            <div class="ct-list-item wow fadeInUp" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> Safe Journey With Family </div>
                                                                </div>
                                                            </div>
                                                            <div class="ct-list-item wow fadeInUp" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> Well Manners Chauffeurs </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-0310fd9 elementor-widget elementor-widget-ct_contact_info" data-id="0310fd9" data-element_type="widget" data-widget_type="ct_contact_info.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="ct-contact-info ct-contact-info3">
                                                            <div class="ct-contact-inner bg-image">
                                                                <h4 class="wg-title"><span>Contact Information</span> </h4>
                                                                <div class="item--info">
                                                                    <div class="ct-contact-icon"> <i aria-hidden="true" class="fas fa-phone"></i> </div>
                                                                    <div class="ct-contact-meta">
                                                                        <h4 class="item--title"></h4>
                                                                        <div class="item--content"> <a href="tel:+18257355538">+1 825-735-5538</a> </div>
                                                                    </div> <a class="ct-contact-link"></a>
                                                                </div>
                                                                <div class="item--info">
                                                                    <div class="ct-contact-icon"> <i aria-hidden="true" class="fas fa-envelope"></i> </div>
                                                                    <div class="ct-contact-meta">
                                                                        <h4 class="item--title"></h4>
                                                                        <div class="item--content"> <a href="mailto:info@blacksedans.ca">info@blacksedans.ca</a> </div>
                                                                    </div> <a class="ct-contact-link" href="info@blacksedan.com"></a>
                                                                </div> <br> <a href="{{ $signIn ? $booknow : '#bookNowModal' }}" 
                                                                        data-toggle="{{ !$signIn ? 'modal' : '' }}"
                                                                data-wow-delay="ms" class="btn btn-effect2 icon-active btn-inline-block"> <span>Book Now</span> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-6e8fc7d elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default ct-header-fixed-none ct-row-max-none" data-id="6e8fc7d" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-background-overlay"></div>
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-b5c9012" data-id="b5c9012" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-b58ffee elementor-widget elementor-widget-ct_title" data-id="b58ffee" data-element_type="widget" data-widget_type="ct_title.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="ct-title1 style1">
                                                            <h3> <span>Limo Service in Calgary </span> <i></i> </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-6e6de52 logo-footer elementor-widget elementor-widget-image" data-id="6e6de52" data-element_type="widget" data-widget_type="image.default">
                                                    <div class="elementor-widget-container"> <img width="377" height="106" src="{{ asset('public/frontend/seedan/images/2025-01-Black_Sedan_logo_footer.png') }}" class="attachment-full size-full wp-image-6254" alt="" /> </div>
                                                </div>
                                                <div class="elementor-element elementor-element-061c9d2 elementor-hidden-desktop elementor-hidden-tablet elementor-hidden-mobile elementor-widget elementor-widget-ct_list" data-id="061c9d2" data-element_type="widget" data-widget_type="ct_list.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="ct-list style6">
                                                            <div class="ct-list-item" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> 24/7 availability </div>
                                                                </div>
                                                            </div>
                                                            <div class="ct-list-item" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> Experienced and licensed chauffeurs </div>
                                                                </div>
                                                            </div>
                                                            <div class="ct-list-item" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> Luxurious and clean cars </div>
                                                                </div>
                                                            </div>
                                                            <div class="ct-list-item" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> Professional and on-time </div>
                                                                </div>
                                                            </div>
                                                            <div class="ct-list-item" data-wow-delay="ms">
                                                                <div class="ct-list-icon"><i class="fac fac-check-circle"></i></div>
                                                                <div class="ct-list-meta">
                                                                    <div class="ct-list-desc"> High client satisfaction </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-e15e108" data-id="e15e108" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-3fa8954 elementor-widget elementor-widget-ct_icon" data-id="3fa8954" data-element_type="widget" data-widget_type="ct_icon.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="ct-icon1 style1" data-wow-delay="ms"> <a href="https://www.facebook.com/profile.php?id=61567240215147" target="_blank"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </a> <a href="https://twitter.com/blacksedaninc/" target="_blank"> <i aria-hidden="true" class="fab fa-twitter"></i> </a> <a href="https://www.instagram.com/blacksedaninc/" target="_blank"> <i aria-hidden="true" class="fab fa-instagram"></i> </a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-8e70ce0" data-id="8e70ce0" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-fdb760d elementor-widget elementor-widget-ct_title" data-id="fdb760d" data-element_type="widget" data-widget_type="ct_title.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="ct-title1 style1">
                                                            <h3> <span>Areas Served</span> <i></i> </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-30cb1de elementor-widget elementor-widget-text-editor" data-id="30cb1de" data-element_type="widget" data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <p><strong>To and from Calgary and surrounding areas</strong></p>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-11a00cc elementor-icon-list--layout-inline elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="11a00cc" data-element_type="widget" data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                    <ul class="elementor-icon-list-items elementor-inline-items">
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Calgary</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Airdrie</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Cochrane</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Okotoks</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">High River</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Priddis</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Chestermere</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Strathmore</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Banff</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Canmore</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Lake Lousie</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Lethbridge</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Medicine Hat</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Edmonton</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Golden. Fernie</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Emerald Lake</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Jasper</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Red Deer</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Lacombe</span> </li>
                                                        <li class="elementor-icon-list-item elementor-inline-item"> <span class="elementor-icon-list-icon"> <i aria-hidden="true" class="flaticonv2 flaticonv2-right-arrow"></i> </span> <span class="elementor-icon-list-text">Drumheller</span> </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-a0e42c5 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default ct-header-fixed-none ct-row-max-none" data-id="a0e42c5" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-363ded0" data-id="363ded0" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-f8849b1 ct-copyright elementor-widget elementor-widget-text-editor" data-id="f8849b1" data-element_type="widget" data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <p>© 2025 BlackSedan. All rights reserved. | Powered By: <span style="color: #ffffff;"><a style="color: #ffffff;" href="https://www.ranglerz.com/" target="_blank" rel="nofollow noopener noreferrer">Ranglerz</a></span> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 




        </footer> <a href="#" class="scroll-top"><i class="zmdi zmdi-long-arrow-up"></i></a>
        <!-- <a href="https://api.whatsapp.com/send?phone=+18257355538&text=Hi. How can we help you?" class="whatsapp-button" target="_blank" style="position: fixed;  left: 20px; bottom: 20px; z-index: 999999;">
        <img src="https://i.ibb.co/VgSspjY/whatsapp-button.png" alt="botão whatsapp"> -->
        <div class="ht-ctc ht-ctc-chat ctc-analytics ctc_wp_desktop style-7_1" id="ht-ctc-chat" style="display: none;  position: fixed; bottom: 15px; left: 15px;">
        <div class="ht_ctc_style ht_ctc_chat_style">
            <style id="ht-ctc-s7_1">
                .ht-ctc .ctc_s_7_1:hover .ctc_s_7_icon_padding,
                .ht-ctc .ctc_s_7_1:hover {
                	background-color: #00d34d !important;
                	border-radius: 25px;
                }
                
                .ht-ctc .ctc_s_7_1:hover .ctc_s_7_1_cta {
                	color: #f4f4f4 !important;
                }
                
                .ht-ctc .ctc_s_7_1:hover svg g path {
                	fill: #f4f4f4 !important;
                }
            </style>
            <div class="ctc_s_7_1 ctc-analytics ctc_nb" style="display:flex;justify-content:center;align-items:center; background-color: #25D366; border-radius:25px;" data-nb_top="-7.8px" data-nb_right="-7.8px">
                <p class="ctc_s_7_1_cta ctc-analytics ctc_cta ht-ctc-cta  ht-ctc-cta-hover ctc_cta_stick" style=" display: none; order: 1; color: #ffffff; padding: 0px 21px 0px 0px;  margin:0 10px; border-radius: 25px; "> WhatsApp us</p>
                <div class="ctc_s_7_icon_padding ctc-analytics" style="padding: 14px;background-color: #25D366;border-radius: 25px; "> <svg style="pointer-events:none; display:block; height:32px; width:32px;" height="32px" version="1.1" viewbox="0 0 509 512" width="32px">
                        <g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1">
                            <path style="fill: #ffffff;" d="M259.253137,0.00180389396 C121.502859,0.00180389396 9.83730687,111.662896 9.83730687,249.413175 C9.83730687,296.530232 22.9142299,340.597122 45.6254897,378.191325 L0.613226597,512.001804 L138.700183,467.787757 C174.430395,487.549184 215.522926,498.811168 259.253137,498.811168 C396.994498,498.811168 508.660049,387.154535 508.660049,249.415405 C508.662279,111.662896 396.996727,0.00180389396 259.253137,0.00180389396 L259.253137,0.00180389396 Z M259.253137,459.089875 C216.65782,459.089875 176.998957,446.313956 143.886359,424.41206 L63.3044195,450.21808 L89.4939401,372.345171 C64.3924908,337.776609 49.5608297,295.299463 49.5608297,249.406486 C49.5608297,133.783298 143.627719,39.7186378 259.253137,39.7186378 C374.871867,39.7186378 468.940986,133.783298 468.940986,249.406486 C468.940986,365.025215 374.874096,459.089875 259.253137,459.089875 Z M200.755924,146.247066 C196.715791,136.510165 193.62103,136.180176 187.380228,135.883632 C185.239759,135.781068 182.918689,135.682963 180.379113,135.682963 C172.338979,135.682963 164.002301,138.050856 158.97889,143.19021 C152.865178,149.44439 137.578667,164.09322 137.578667,194.171258 C137.578667,224.253755 159.487251,253.321759 162.539648,257.402027 C165.600963,261.477835 205.268745,324.111057 266.985579,349.682963 C315.157262,369.636141 329.460495,367.859106 340.450462,365.455539 C356.441543,361.9639 376.521811,350.186865 381.616571,335.917077 C386.711331,321.63837 386.711331,309.399797 385.184018,306.857991 C383.654475,304.305037 379.578667,302.782183 373.464955,299.716408 C367.351242,296.659552 337.288812,281.870254 331.68569,279.83458 C326.080339,277.796676 320.898622,278.418749 316.5887,284.378615 C310.639982,292.612729 304.918689,301.074268 300.180674,306.09099 C296.46161,310.02856 290.477218,310.577055 285.331175,308.389764 C278.564174,305.506821 259.516237,298.869139 236.160607,278.048627 C217.988923,261.847958 205.716906,241.83458 202.149458,235.711949 C198.582011,229.598236 201.835077,225.948292 204.584241,222.621648 C207.719135,218.824546 210.610997,216.097679 213.667853,212.532462 C216.724709,208.960555 218.432625,207.05866 220.470529,202.973933 C222.508433,198.898125 221.137195,194.690767 219.607652,191.629452 C218.07588,188.568136 205.835077,158.494558 200.755924,146.247066 Z" fill="#ffffff" id="htwaicon-chat" />
                        </g>
                    </svg> </div>
            </div>
        </div>
    </div> <span class="ht_ctc_chat_data" data-no_number="" data-settings="{&quot;number&quot;:&quot;18257355538&quot;,&quot;pre_filled&quot;:&quot;&quot;,&quot;dis_m&quot;:&quot;show&quot;,&quot;dis_d&quot;:&quot;show&quot;,&quot;css&quot;:&quot;display: none; cursor: pointer; z-index: 99999999;&quot;,&quot;pos_d&quot;:&quot;position: fixed; bottom: 15px; left: 15px;&quot;,&quot;pos_m&quot;:&quot;position: fixed; bottom: 15px; left: 15px;&quot;,&quot;schedule&quot;:&quot;no&quot;,&quot;se&quot;:150,&quot;ani&quot;:&quot;no-animations&quot;,&quot;url_target_d&quot;:&quot;popup&quot;,&quot;ga&quot;:&quot;yes&quot;,&quot;fb&quot;:&quot;yes&quot;,&quot;g_init&quot;:&quot;default&quot;,&quot;g_an_event_name&quot;:&quot;chat: {number}&quot;,&quot;pixel_event_name&quot;:&quot;Click to Chat by HoliThemes&quot;}"></span>
</a>