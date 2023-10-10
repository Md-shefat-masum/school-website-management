<header class="header_area">
    <!-- header_area_top start -->
    <div class="header_area_top">
        <div class="container">
            <div class="header_area_top_content">
                <!-- email_and_contact_number_area start -->
                <div class="email_and_contact_number_area">
                    <!-- email_area start -->
                    <div class="d-flex flex-wrap gap-2">
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
                        <div class="email_area email_contact_area">
                            <a href="mailto:abcdefghi@gmail.com" class="content_area">
                                <div class="icon">
                                    <i class="fa-solid fa-school"></i>
                                </div>
                                <div class="text_area">
                                    <p class="email_text text">
                                        Code: {{setting(key:"institute_code",multiple:false)}}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="email_area email_contact_area">
                            <a href="mailto:abcdefghi@gmail.com" class="content_area">
                                <div class="icon">
                                    <i class="fa-solid fa-school-circle-check"></i>
                                </div>
                                <div class="text_area">
                                    <p class="email_text text">
                                        <span class="text-uppercase">EIIN</span>: {{setting(key:"eiin",multiple:false)}}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- email_area end-->
                    <!-- contact_number_area start -->
                    <div class="contact_number_area email_contact_area">
                        <div  class="content_area">
                            <div class="icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="text_area">
                                @foreach (setting(key:"phone_numbers",multiple:true) as $item)
                                    @if ($item->value)
                                        <a href="tel:{{$item->value}}" class="text">{{$item->value}}, </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- contact_number_area end -->
                </div>
                <!-- email_and_contact_number_area end -->

                <!-- portal_area start -->
                <div class="portal_area">
                    <a class="portal_text" href="/login">Portal</a>
                </div>
                <!-- portal_area end -->
            </div>
        </div>
    </div>
    <!-- header_area_top end -->

    <!-- header_school_name_area start -->
    <div class="header_school_name_area">
        <div class="container">
            <div class="header_area_content">

                <!-- logo_area start -->
                <a href="/" class="logo_area">
                    <img src="{{ asset(setting(key:"header_logo",multiple:false)) }}" alt="muradpur-islamia-alim-madrasa" style="object-fit: contain;">
                </a>
                <!-- logo_area end-->

                <!-- school_name_area start -->
                <a href="/" class="school_name_area">
                    <div class="school_name school_name_bangla">
                        <h2 class="school_title">
                            {{setting(key: "institue_name_bangla", multiple: false)}}
                        </h2>
                    </div>
                    <div class="school_name school_name_english">
                        <h2 class="school_title arabic">
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
