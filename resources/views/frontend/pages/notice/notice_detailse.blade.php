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
                                <p class="text_day">20</p>
                                <p class="text_month">January</p>
                            </div>
                            <div class="year_area">
                                <p class="text_year">2023</p>
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
                <!-- site_bar_area_start -->
                <div class="site_bar_area">
                    <!-- search_area start -->
                    <div class="search_area">
                        <div class="search_area_content">
                            <input type="seaech" placeholder="Search hear . . .">
                            <button class="seaech_icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>

                    <!-- search_area end -->

                    <!-- categories_area start -->
                    <div class="categories_area item_area">
                        <div class="item_title">
                            <h3 class="title_text">
                                ক্যাটাগরি
                            </h3>
                        </div>
                        <div class="categories_items">
                            <ul>
                                <li>
                                    <a href="#" class="items_text">ক্যাটাগরি1</a>
                                </li>
                                <li>
                                    <a href="#" class="items_text">ক্যাটাগরি2</a>
                                </li>
                                <li>
                                    <a href="#" class="items_text">ক্যাটাগরি3</a>
                                </li>
                                <li>
                                    <a href="#" class="items_text">ক্যাটাগরি4</a>
                                </li>
                                <li>
                                    <a href="#" class="items_text">ক্যাটাগরি5</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- categories_area end-->

                    <!-- latest_posts_area start -->
                    <div class="latest_posts_area item_area">
                        <div class="item_title">
                            <h3 class="title_text">
                                সর্বশেষ পোস্ট
                            </h3>
                        </div>

                        <ul>
                            <li>
                                <a href="#" class="latest_post_item">
                                    <div class="post_image">
                                        <img src="./assets/images/blog_img/img2.jpg" alt="image">
                                    </div>
                                    <div class="post_date_and_title">
                                        <div class="date_area">
                                            <p class="date_text">
                                                09.May.2023
                                            </p>
                                        </div>
                                        <div class="post_title_area">
                                            <p class="post_text">
                                                বৃত্তি নিয়ে বিদেশে উচ্চশিক্ষার
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="latest_post_item">
                                    <div class="post_image">
                                        <img src="./assets/images/blog_img/img2.jpg" alt="image">
                                    </div>
                                    <div class="post_date_and_title">
                                        <div class="date_area">
                                            <p class="date_text">
                                                09.May.2023
                                            </p>
                                        </div>
                                        <div class="post_title_area">
                                            <p class="post_text">
                                                বৃত্তি নিয়ে বিদেশে উচ্চশিক্ষার
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="latest_post_item">
                                    <div class="post_image">
                                        <img src="./assets/images/blog_img/img2.jpg" alt="image">
                                    </div>
                                    <div class="post_date_and_title">
                                        <div class="date_area">
                                            <p class="date_text">
                                                09.May.2023
                                            </p>
                                        </div>
                                        <div class="post_title_area">
                                            <p class="post_text">
                                                বৃত্তি নিয়ে বিদেশে উচ্চশিক্ষার
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <!-- latest_posts_area end -->

                    <!-- popular_tags_area start -->
                    <div class="popular_tags_area item_area">
                        <div class="item_title">
                            <h3 class="title_text">
                                জনপ্রিয় ট্যাগ
                            </h3>
                        </div>

                        <ul class="tag_item">
                            <li>
                                <a href="#" class="tag_text">ট্যাগ1</a>
                            </li>
                            <li>
                                <a href="#" class="tag_text">ট্যাগ2</a>
                            </li>
                            <li>
                                <a href="#" class="tag_text">ট্যাগ3</a>
                            </li>
                            <li>
                                <a href="#" class="tag_text">ট্যাগ4</a>
                            </li>
                            <li>
                                <a href="#" class="tag_text">ট্যাগ4</a>
                            </li>
                            <li>
                                <a href="#" class="tag_text">ট্যাগ4</a>
                            </li>
                            <li>
                                <a href="#" class="tag_text">ট্যাগ4</a>
                            </li>
                            <li>
                                <a href="#" class="tag_text">ট্যাগ4</a>
                            </li>

                        </ul>
                    </div>
                    <!-- popular_tags_area end -->
                </div>
                <!-- site_bar_area_end -->
            </div>
            <!-- notice_site_bar_area end-->



        </div>
    </div>
</section>

@endsection
