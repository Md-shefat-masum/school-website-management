@extends('frontend.layouts.website')
@section('contents')

<section class="inner_notice_area aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="notice_area_content">
            <!-- page_title_area start -->
            <div class="page_title_area">
                <h2 class="page_title">
                    নোটিশ বিস্তারিত
                </h2>
            </div>
            <!-- page_title_area end -->

            <!-- notice_site_bar_area start -->
            <div class="notice_site_bar_area">

                <!-- notice_area start -->
                <div class="notice_area aos-init" data-aos="fade-up" data-aos-duration="1000">

                    <div class="notice notice_margin">
                        <!--notice date_area start -->
                        <div class="date_area inner_date_area">
                            <div class="day_and_month_area">
                                <p class="text_day">{{$noticeDetails->created_at->format('d')}}</p>
                                <p class="text_month">{{$noticeDetails->created_at->format('MM')}}</p>
                            </div>
                            <div class="year_area">
                                <p class="text_year">{{$noticeDetails->created_at->format('Y')}}</p>
                            </div>
                        </div>
                        <!--notice date_area end-->

                        <!-- notice_title_and_description_area start -->
                        <div class="notice_title_and_description_area">
                            <div class="notice_title">
                                <div class="title_text">{{$noticeDetails->title}}</div>
                            </div>
                            <div class="notice_description">
                                <p class="description_text inner_description_text">{{$noticeDetails->description}} </p>
                            </div>
                        </div>
                        <!-- notice_title_and_description_area end-->
                    </div>

                </div>
                <!-- notice_area end -->

            </div>
            <!-- notice_site_bar_area end-->



        </div>
    </div>
</section>

@endsection
