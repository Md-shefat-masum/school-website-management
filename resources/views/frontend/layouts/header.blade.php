<header class="header_area">
    <!-- header_area_top start -->
    <div class="header_area_top">
        <div class="container">
            <div class="header_area_top_content">
                <div class="row">
                    <!-- email_and_contact_number_area start -->
                    <div class="col-md-6">
                        <div class="email_and_contact_number_area">
                            <!-- email_area start -->
                            <div class="email_area email_contact_area">
                                <a href="mailto:abcdefghi@gmail.com" class="content_area">
                                    <div class="icon">
                                        <i class="fa-regular fa-envelope-open"></i>
                                    </div>
                                    <div class="text_area">
                                        <p class="email_text text">
                                            {{setting(key:"emails",multiple:false)}}
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <!-- email_area end-->
                            <!-- contact_number_area start -->
                            <div class="contact_number_area email_contact_area d-flex gap-1">
                                @foreach (setting(key:"phone_numbers",multiple:true) as $item)
                                @if ($item->value)
                                <a href="tel:{{$item->value}}" class="content_area">
                                    <div class="icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="text_area">
                                        <p class="text">{{$item->value}}</p>
                                    </div>
                                </a>
                                @endif
                                @endforeach
                            </div>
                            <!-- contact_number_area end -->
                        </div>
                    </div>
                    <!-- email_and_contact_number_area end -->

                    <!-- portal_area start -->
                    <div class="col-md-6">
                        <div class="portal_area">
                            <a class="portal_text" href="/login">Portal</a>
                        </div>
                    </div>
                    <!-- portal_area end -->
                </div>
            </div>
        </div>
    </div>
    <!-- header_area_top end -->

    <!-- header_school_name_area start -->
    <div class="header_school_name_area">
        <div class="container">
            <div class="header_area_content">

                <!-- logo_area start -->
                <a href="#" class="logo_area">
                    <img src="{{ asset(setting(key:"header_logo",multiple:false)) }}" alt="logo">
                </a>
                <!-- logo_area end-->

                <!-- school_name_area start -->
                <a href="#" class="school_name_area">
                    <div class="school_name school_name_bangla">
                        <h2 class="school_title">
                            {{setting(key: "institue_name_bangla", multiple: false)}}
                        </h2>
                    </div>
                    <div class="school_name school_name_english">
                        <h2 class="school_title">
                            {{setting(key: "institue_name_arabic", multiple: false)}}
                        </h2>
                    </div>
                </a>
                <!-- school_name_area  end-->

            </div>
        </div>
    </div>
    <!-- header_school_name_area end -->
</header>
