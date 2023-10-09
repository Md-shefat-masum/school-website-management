@extends('frontend.layouts.website')
@section('contents')

<section class="inner_notice_area aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="notice_area_content">
            <!-- page_title_area start -->
            <div class="page_title_area">
                <h2 class="page_title">
                    নোটিশ
                </h2>
            </div>
            <!-- page_title_area end -->

            <!-- notice_site_bar_area start -->
            <div class="notice_site_bar_area">

                <!-- notice_area start -->
                <div class="notice_area aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

                    <!-- notice_area_content start -->
                    <div class="notice_area_content">
                        <ul>
                            @foreach ($notice as $item)

                            <li>
                                <div class="notice">
                                    <!--notice date_area start -->
                                    <div class="date_area">
                                        <div class="day_and_month_area">
                                            <p class="text_day">{{$item->created_at->format('d')}}</p>
                                            <p class="text_month">{{$item->created_at->format('MM')}}</p>
                                        </div>
                                        <div class="year_area">
                                            <p class="text_year">{{$item->created_at->format('Y')}}</p>
                                        </div>
                                    </div>
                                    <!--notice date_area end-->

                                    <!-- notice_title_and_description_area start -->
                                    <div class="notice_title_and_description_area">
                                        <div class="notice_title">
                                            <a href="{{url('notice-details')}}/{{$item->id}}"
                                                class="title_text">{{$item->title}}</a>
                                        </div>
                                        <div class="notice_description">
                                            <span class="description_text">{{$item->description}} <a href="#"
                                                    class="read_more_area">Read more ...</a> </span>
                                        </div>
                                    </div>
                                    <!-- notice_title_and_description_area end-->
                                </div>
                            </li>
                            @endforeach



                        </ul>
                    </div>
                    <!-- notice_area_content end -->

                </div>
                <!-- notice_area end -->
             
            </div>
            <!-- notice_site_bar_area end-->



        </div>
    </div>
</section>

@endsection
