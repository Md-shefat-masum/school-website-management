<footer class="footer_area" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="footer_area_content">
            <div class="row">
                <!-- footer_logo_area start -->
                <div class="col-md-12 col-lg-3">
                    <div class="footer_logo_area">
                        <a href="#">
                            <img src="{{asset('/'). setting(key:'footer_logo')}}" alt="logo">
                            <span class="logo_title">{{setting(key:'institue_name_bangla')}}</span>
                        </a>
                    </div>
                    <!-- footer_social_media_area start -->
                    <div class="footer_social_media_area">
                        <ul>
                            <li>
                                <a href="{{setting(key:'facebook')}}"><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="{{setting(key:'instagram')}}"><i class="fa-brands fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="{{setting(key:'linkedin')}}"><i class="fa-brands fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="{{setting(key:'twitter')}}"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- footer_social_media_area end -->
                </div>
                <!-- footer_logo_area end -->

                <!-- importent_link_area start -->
                <div class="col-md-4 col-lg-3">
                    <div class="area_title">
                        <h2 class="area_title_text">গুরুত্বপূর্ণ লিঙ্কসমূহ</h2>
                    </div>
                    <div class="importent_link_area">
                        <ul>
                            <li>
                                <a href="https://moedu.gov.bd/" target="blank">
                                    শিক্ষা মন্ত্রনালয়
                                </a>
                            </li>
                            <li>
                                <a href="https://www.dhakaeducationboard.gov.bd/" target="blank">মাধ্যমিক ও
                                    উচ্চমাধ্যমিক শিক্ষা বোর্ড,
                                    ঢাকা
                                </a>
                            </li>
                            <li>
                                <a href="https://dshe.gov.bd/" class="link_name" target="blank">মাধ্যমিক ও
                                    উচ্চশিক্ষা অধিদপ্তর
                                </a>
                            </li>
                            <li>
                                <a href="https://www.nu.ac.bd/" class="link_name" target="blank">জাতীয়
                                    বিশ্ববিদ্যালয়
                                </a>
                            </li>
                            <li>
                                <a href="https://www.shed.gov.bd/" class="link_name" target="blank">মাধ্যমিক ও উচ্চ
                                    শিক্ষা বিভাগ
                                </a>
                            </li>
                            <li>
                                <a href="https://bteb.gov.bd/" class="link_name" target="blank">বাংলাদেশ কারিগরি
                                    শিক্ষা বোর্ড
                                </a>
                            </li>
                            <li>
                                <a href="http://www.pmeat.gov.bd/" class="link_name" target="blank">প্রধানমন্ত্রীর
                                    শিক্ষা সহায়তা ট্রাস্ট
                                </a>
                            </li>
                            <li>
                                <a href="#" class="link_name" target="blank">
                                    প্রধানমন্ত্রীর কার্যালয়
                                </a>
                            </li>
                            <li>
                                <a href="https://cabinet.gov.bd/" class="link_name" target="blank">মন্ত্রীপরিষদ
                                    বিভাগ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- importent_link_area end -->

                <!-- contact area start -->
                <div class="col-md-4 col-lg-3">
                    <div class="area_title">
                        <h2 class="area_title_text">যোগাযোগের ঠিকানা</h2>
                    </div>

                    <div class="contact_area">

                        <!-- adddress_area start -->
                        <div class="adddress_area">
                            <p class="adddress_text">
                                {{setting(key:'address_bangla')}}
                            </p>
                        </div>
                        <!-- adddress_area end -->

                        <!-- phone_title_and_number area start -->
                        <div class="phone_title_and_number title_and_content">
                            <div class="phone_title f_title_area">
                                <p class="title_text">অফিস :</p>
                            </div>
                            <div class="phone_number f_content_area">
                                @foreach (setting(key:"phone_numbers",multiple:true) as $item)
                                @if ($item->value)
                                <a href="tel:{{$item->value}}" class="content_area">
                                    <div class="text_area">
                                        <p class="text">{{$item->value}}</p>
                                    </div>
                                </a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- phone_title_and_number area end -->

                        <!-- email_title_and_address start -->
                        <div class="email_title_and_address title_and_content">
                            <div class="email_title f_title_area">
                                <p class="title_text">ই-মেইল :</p>
                            </div>
                            <div class="email_address f_content_area">
                                <a class="content_text email_text" href="mailto:abc@gmail.com">
                                    {{setting(key:"emails",multiple:false)}}
                                </a>
                            </div>
                        </div>
                        <!-- email_title_and_address end -->
                    </div>
                </div>
                <!-- contact area end -->

                <!-- map area start -->
                <div class="col-md-4 col-lg-3">
                    <div class="area_title">
                        <h2 class="area_title_text">ম্যাপ</h2>
                    </div>

                    <div class="contact_area">
                        {!! setting(key:"map_link") !!}
                    </div>
                </div>
                <!-- map area end -->
            </div>
        </div>
    </div>
</footer>

<!-- copyright_area start -->
<footer class="copyright_area">
    <div class="container">
        <div class="copyright_area_content">
            <span class="copyright_text text"> Copy Right ©
                <a class="text" href="#">
                    {{setting(key:"copy_right")}}
                </a>
            </span>
        </div>
    </div>
</footer>
<!-- copyright_area end -->
