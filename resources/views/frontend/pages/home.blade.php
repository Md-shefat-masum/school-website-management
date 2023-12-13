@extends('frontend.layouts.website')
@section('contents')


<!-- banner_area start -->
@php
$banner = \App\Models\WebsiteSection\Banner::first();
// dd($banner);
@endphp
<section class="banner_area banner_edit">
    <div class="banner_area_2" style="background-image: url({{$banner->background}})">

        <div class="banner_blur_area">
            <div class="container">
                <div class="banner_area_content">
                    <div class="row">
                        <!-- prime_minister_img_area start -->
                        <div class="col-xs-12 col-md-6">
                            <!-- banner_title_area start -->

                            <div class="banner_title_area">
                                <div class="banner_title_area_content">
                                    <div class="banner_title" data-aos="fade-right" data-aos-delay="300"
                                        data-aos-duration="1000">
                                        <h2 class="title_text">{{$banner->title}}
                                        </h2>
                                    </div>
                                    <div class="view_all_button_area" data-aos="fade-right" data-aos-delay="600"
                                        data-aos-duration="1000">
                                        <a href="#" class="view_all_button">{{$banner->button_text}}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- banner_title_area end -->

                        </div>
                        <!-- prime_minister_img_area end -->

                        <!-- importent_link_area start -->
                        <div class="col-xs-12 col-md-6">
                            @php
                            $notice = \App\Models\Navbar\NavbarMenu::where("title","নোটিশ")->first();

                            @endphp
                            @if ($notice)
                            <div class="importent_link_area" data-aos="fade-left" data-aos-duration="1000">
                                <!-- area_title start -->
                                <div class="area_title">
                                    <h2 class="area_title_text">
                                        নোটিশ
                                    </h2>
                                </div>
                                <!-- area_title end -->

                                <!-- all_link_item start -->
                                <div class="all_link_item">


                                    <!-- link_item start -->
                                    <ul>

                                        @php
                                        $subMenus = \App\Models\Navbar\NavbarMenuItem::where('is_visible',1)
                                        ->where('navbar_menus_id',$notice->id )->limit(5)
                                        ->orderBy('serial', 'ASC')
                                        ->get();

                                        // dd($subMenus);
                                        @endphp

                                        @foreach ($subMenus as $item)
                                        <!-- link_item start  -->
                                        <li class="link_item">
                                            <div class="icon">
                                                <i class="fa-solid fa-angles-right"></i>
                                            </div>
                                            <a href="{{route('menu_item_list',[$item->slug])}}"
                                                class="link_name">{{$item->title}}</a>
                                        </li>
                                        <!-- link_item end  -->
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- all_link_item end -->
                            </div>
                            @endif
                        </div>
                        <!-- importent_link_area end -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- banner_area end-->
<!-- result_statistics area start -->
<section class="result_statistics">
    <div class="container">

        <!-- news-head-line_area start -->
        <div class="news-head-line_area">
            <marquee behavior="" direction="left">
                <ul>
                    <li>
                        {{$banner->breaking_news}}
                    </li>
                </ul>
            </marquee>
        </div>
        <!-- news-head-line_area end -->

        <div class="result_statistics_content" data-aos="fade-up" data-aos-duration="1000">
            @php
            $resultStatistics = \App\Models\WebsiteSection\AtAGlance::get();
            // dd($resultStatistics);
            @endphp
            <!-- result_statistics_area start -->
            @foreach ($resultStatistics as $item)
            <div class="result_statistics_area">
                <div class="icon_area">
                    {!! $item->icon !!}
                </div>
                <div class="result_statistics_text_area">
                    <div class="title">
                        <p class="title_text">{{$item->title}}</p>
                    </div>
                    <div class="content">
                        <p class="content_text">{{$item->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
<!-- result_statistics area end -->

<!-- introduction_and_notice_area start -->
<section class="introduction_and_notice">
    <div class="container">
        <div class="introduction_and_notice_content"
            style="background-image: url({{ asset('frontend/assets/images/introduction_and_notice_area_image/img1.jpg') }});">
            <div class="content_bg_color">
                <!-- introduction_area start -->
                <div class="introduction_area" data-aos="fade-right" data-aos-duration="1000">
                    <div class="introduction_area_content">
                        <div class="area_title">
                            <h2 class="area_title_text">সংক্ষিপ্ত পরিচিতি</h2>
                        </div>
                        <p class="description_text">
                            {{-- {{setting(key:"emails",multiple:false)}} --}}
                            {!! setting(key:"institute_short_intro",multiple:false) !!}
                        </p>
                    </div>

                    <!-- view_all_button_area start -->
                    <div class="view_all_button_area">
                        <a href="#" class="view_all_button">আরো পড়ুন</a>
                    </div>
                    <!-- view_all_button_area end -->

                </div>
                <!-- introduction_area end -->
                @php
                $notice = \App\Models\Navbar\NavbarMenu::where("title","নোটিশ")->first();
                @endphp
                @if ($notice)
                <!-- notice_area start -->
                <div class="notice_area" data-aos="fade-left" data-aos-duration="1000">

                    <!-- area_title start -->
                    <div class="area_title">
                        <h2 class="area_title_text">নোটিশ</h2>
                    </div>
                    <!-- area_title end -->

                    <!-- notice_area_content start -->
                    <div class="notice_area_content">


                        @php
                        $notice = \App\Models\Navbar\NavbarMenu::where("title","নোটিশ")->first();

                        $subMenuDetails = \App\Models\Navbar\NavbarMenuDetail::query()
                            ->where('navbar_menu_id',$notice->id)->orderBy('id','DESC')
                            ->limit(3)
                            ->get();

                        // dd($subMenuDetails);
                        @endphp

                        <ul>

                            @foreach ($subMenuDetails as $item)
                            @php
                            $date = $item->created_at->format('d');
                            $month = $item->created_at->format('F');
                            $year = $item->created_at->format('Y');

                            @endphp

                            <!-- link_item start  -->
                            <li>
                                <div class="notice">
                                    <!--notice date_area start -->
                                    <div class="date_area">
                                        <div class="day_and_month_area">
                                            <p class="text_day">{{ $date}}</p>
                                            <p class="text_month">{{$month}}</p>
                                        </div>
                                        <div class="year_area">
                                            <p class="text_year">{{$year}}</p>
                                        </div>
                                    </div>
                                    <!--notice date_area end-->

                                    <!-- notice_title_and_description_area start -->
                                    <div class="notice_title_and_description_area">
                                        <div class="notice_title">
                                            <a href="{{route('menu_details',[$item->slug,$item->id])}}"
                                                class="title_text">{{$item->title}}</a>
                                        </div>
                                        <div class="notice_description">
                                            <span class="description_text">
                                                {{substr(strip_tags($item->description),0,100)}}
                                                <a
                                                    href="{{route('menu_details',[$item->slug,$item->id])}}"
                                                    class="read_more_area">
                                                    Read more ...
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- notice_title_and_description_area end-->
                                </div>
                            </li>
                            <!-- link_item end  -->
                            @endforeach
                        </ul>

                    </div>
                    <!-- notice_area_content end -->

                    <!-- view_all_button_area start -->
                    @if ($subMenuDetails && count($subMenuDetails) )
                    <div class="view_all_button_area">
                        <a href="{{route('all_notice')}}" class="view_all_button">আরো দেখুন</a>
                    </div>
                    @endif

                    <!-- view_all_button_area end -->
                </div>
                @endif
                <!-- notice_area end -->
            </div>

        </div>
    </div>
</section>
<!-- introduction_and_notice_area end -->

<!-- countdown_area start -->
<section class="countdown_area d-none"
    style="background-image: url({{ asset('frontend/assets/images/countdoun_image/bg.jpg') }});" data-aos="fade-up"
    data-aos-duration="1000">
    <div class="countdown_area_bg_color">
        <div class="container">
            <div class="countdown_area_content">

                <!-- countdown_content start -->
                <div class="countdown_content">
                    <div class="countdown_number">
                        <h2 class="number_text">{{setting('total_teachers')}}</h2>
                    </div>
                    <div class="countdown_name">
                        <h2 class="name_text">মোট শিক্ষক</h2>
                    </div>
                </div>
                <!-- countdown_content end -->

                <!-- countdown_content start -->
                <div class="countdown_content">
                    <div class="countdown_number">
                        <h2 class="number_text">{{setting('total_students')}}</h2>
                    </div>
                    <div class="countdown_name">
                        <h2 class="name_text">মোট ছাত্র</h2>
                    </div>
                </div>
                <!-- countdown_content end -->

                <!-- countdown_content start -->
                <div class="countdown_content">
                    <div class="countdown_number">
                        <h2 class="number_text">{{setting('exam_passing_rate')}}%</h2>
                    </div>
                    <div class="countdown_name">
                        <h2 class="name_text">পাশের হার</h2>
                    </div>
                </div>
                <!-- countdown_content end -->

            </div>
        </div>
    </div>
</section>
<!-- countdown_area end -->

<!-- countdown_area start -->
<section class="countdown_area"
    style="background-image: url({{ asset('frontend/assets/images/countdoun_image/bg.jpg') }});" data-aos="fade-up"
    data-aos-duration="1000">
    <div class="countdown_area_bg_color">
        <div class="container text-light ">
            <div class="row">
                <div class="col-lg-6">

                    @php
                        $list = [
                            "নূরানী পদ্ধতিতে কুরআন শিক্ষা",
                            "সহীহ শুদ্ধরুপ কুরআন হাদীস শিক্ষা ও তদানুযায়ী জীবন গঠন",
                            "উত্তম চরিত্র সম্পন্ন জাতি গঠন",
                            "সর্বোপরি শিরক মুক্ত আল্লাহ নির্দেশিত ও রাসুল (স) প্রদর্শিত জীবন ব্যাবস্থার আলোকে যুগপোযোগী করে গড়ে তোলা",
                            "মনোরম পরিবেশে খেলাধুলার মাধ্যমে শিক্ষাদানের ব্যবস্থা।",
                            "আধুনিক কম্পিউটার ল্যাব",
                            "ইসলাম ও আধুনিক শিক্ষার সমন্বয়",
                            "সুসজ্জিত কক্ষ",
                            "কম খরচে ভর্তি ও বেতন সুবিধা",
                        ];
                        $list2 = [
                            "যুগোপযোগী শিক্ষা ব্যবস্থার মডেল অনুযাযী পরিচালিত",
                            "ক্লাস টেষ্ট, মাসিক টেষ্ট, ও সেমিষ্টার পরিক্ষা",
                            "অভিভাবকের চাহিদা অনুযায়ী অতিরিক্ত ক্লাস নেয়া",
                            "অভিজ্ঞ ও মেধাবী শিক্ষক/শিক্ষিকা দ্বারা পরিচালিত",
                            "দক্ষ ও অভিজ্ঞ গভর্নিং বডি দ্বারা পরিচালিত",
                            "দুর্বল শিক্ষার্থীদের extra care নেয়া হয়",
                            "সার্বক্ষনিক নিরাপত্তা ও কঠোর নিয়মানুবর্তিতা",
                            "সুনিপুণ পাঠ পরিকল্পনা (সিডিউল)",
                        ];
                    @endphp
                    <h2>প্রাথমিক শাখার জন্য বিশেষ আকর্ষন</h2>
                    <ul class="d-grid gap-2 mt-3">
                        @foreach ($list as $item)
                            <li class="d-flex align-items-center">
                                <i class="fa me-2 fa-angle-right"></i>
                                <span>
                                    {{$item}}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6">
                    <h2>বিশেষ দিক সমূহ</h2>
                    <ul class="d-grid gap-2 mt-3">
                        @foreach ($list2 as $item)
                            <li class="d-flex align-items-center">
                                <i class="fa me-2 fa-angle-right"></i>
                                <div>
                                    {{$item}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- countdown_area end -->

<!-- principal_image_and_message_area start -->
<section class="principal_image_and_message_area">
    <div class="container">
        <div class=" principal_image_and_message_area_content">
            <!-- principal_image_area start -->
            <div class="principal_image_area" data-aos="fade-right" data-aos-duration="1000">
                <div class="principal_image">
                    <img src="{{ asset(setting(key:"principal_image",multiple:false)) }}" alt="img">
                </div>
            </div>
            <!-- principal_image_area end -->

            <!-- principal_message_area start-->
            <div class="principal_message_area" style="background-image: url({{ asset(setting('principal_image')) }});"
                data-aos="fade-left" data-aos-duration="1000">
                <div class="principal_message_area_bg_color">
                    <div class="message_content">
                        <div class="area_title">
                            <h2 class="area_title_text">অধ্যক্ষের বাণী</h2>
                        </div>
                        <div class="message_text_area">
                            <p class="message_text text">
                                {!!setting('principal_message')!!}
                            </p>
                        </div>
                        <div class="principal_name_and_school_name_area">
                            <p class="name_text text">
                                {{setting('principal_name')}}
                            </p>
                            <p class="school_name_text text">
                                অধ্যক্ষ ({{setting('principal_type')}}), {{setting('institue_name_bangla')}}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- principal_message_area end-->
        </div>
    </div>
</section>
<!-- principal_message_area end -->


<!-- all_index_area start -->
@php
$menus = \App\Models\Navbar\NavbarMenu::where('is_visible',1)
    ->with([
        "sub_menus" => function ($q) {
            $q->where('is_visible',1)
            ->orderBy('serial', 'ASC');
        }
    ])
    ->orderBy('serial', 'ASC')
    ->get();
// dd($menus);
@endphp
<section class="all_index_area">
    <div class="container">
        <div class="all_index_area_content">
            <ul>
                @foreach ($menus as $key => $item )
                <!-- item_area start -->
                <li class="bg_img"
                    style="background-image: url({{ asset('frontend/assets/images/all_index-area_image/bg_img.jpg') }});"
                    data-aos="fade-up" data-aos-duration="300">
                    <div class="item_area">
                        <!-- item_logo_and_title start -->
                        <div class="item_logo_and_title">
                            <div class="item_logo">
                                <img src="{{$item->icon_image}}" alt=" image">
                            </div>
                            <div class="item_title">
                                <h2 class="title_text">{{$item->title}}</h2>
                            </div>
                        </div>
                        <!-- item_logo_and_title end -->

                        <!-- item_link_area start -->
                        <div class="item_link_area">
                            @if ($item->sub_menus ?? count($item->sub_menus))
                            @foreach ($item->sub_menus as $subItem )
                            <!-- item_link start -->
                            <div class="item_link">
                                <div class="icon"><i class="fa-solid fa-caret-right"></i></div>
                                <a href="{{ url($subItem->slug)}}" class="link_text">{{$subItem->title}}</a>
                            </div>
                            <!-- item_link end -->
                            @endforeach
                            @endif
                        </div>
                        <!-- item_link end -->
                    </div>
                </li>
                <!-- item_area end -->
                @endforeach
            </ul>
        </div>
    </div>
</section>
<!-- all_index_area end -->
@php
$news = \App\Models\News\News::with('news_category')
    ->where('status','active')
    ->orderBy('id','DESC')
    ->limit(5)
    ->get();
// dd($news);
@endphp
<!-- news_area start -->
<section class="news_area" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="news_content">
            <!-- area_title start -->
            <div class="area_title">
                <h2 class="area_title_text">
                    সংবাদ
                </h2>
            </div>
            <!-- area_title end -->

            <div class="row">
                <!-- left_area start -->
                <div class="col-md-6">
                    <div class="left_area">
                        @if ($news && count($news))
                        <div class="news_item">
                            <!-- news_image start -->
                            <div class="news_image">
                                <img src="{{$news[0]->image}}" alt="news">
                            </div>
                            <!-- news_image end -->

                            <!-- date_and_comment_area start -->
                            <div class="date_and_comment_area">
                                <!-- date_area start -->
                                <div class="date_area d_c_area">
                                    <p class="date_text d_c_text">
                                        {{$news[0]->created_at->format('d M')}} <span class="year_text text">
                                            {{$news[0]->created_at->format('Y')}}</span>
                                    </p>
                                </div>
                                <!-- date_area end -->

                                <!-- comment_area start -->
                                <div class="comment_area d_c_area">
                                    <a href="#" class="comment_text d_c_text">
                                        {{-- 12 <span class="comment_title text">Comment</span> --}}
                                    </a>
                                </div>
                                <!-- comment_area end -->
                            </div>
                            <!-- date_and_comment_area end -->

                            <!-- news_title_area start -->
                            <div class="news_title_area">
                                <a href="{{url('news-details')}}/{{$news[0]->id}}"
                                    class="news_title_text">{{$news[0]->short_description}}
                                </a>
                            </div>
                            <!-- news_title_area end -->
                        </div>
                        @endif
                        <!-- news_item end -->
                    </div>
                </div>
                <!-- left_area end -->

                <!-- right_area start -->
                <div class="col-md-6">
                    <div class="right_area">
                        <!-- news_item_area start -->
                        <div class="news_item_area">
                            @php
                                $news->shift(1);
                            @endphp
                            @foreach ($news->all() as $item )
                            <!-- news_item start -->
                            <div class="news_item">
                                <!-- news_image start -->
                                <div class="news_image">
                                    <img src="{{$item->image}}" alt="news">
                                </div>
                                <!-- news_image end -->

                                <!-- news_title_and_date_comment_area start -->
                                <div class="news_title_and_date_comment_area">
                                    <!-- news_title_area start -->
                                    <div class="news_title_area">
                                        <a href="{{url('news-details')}}/{{$item->id}}"
                                            class="news_title_text">{{$item->title}}
                                        </a>
                                    </div>
                                    <!-- news_title_area end -->

                                    <!-- date_and_comment_area start -->
                                    <div class="date_and_comment_area">
                                        <!-- date_area start -->
                                        <div class="date_area d_c_area">
                                            <p class="date_text d_c_text">
                                                {{$item->created_at->format('d M')}} <span class="year_text text">
                                                    {{$item->created_at->format('Y')}}</span>
                                            </p>
                                        </div>
                                        <!-- date_area end -->

                                        <!-- comment_area start -->
                                        <div class="comment_area d_c_area">
                                            <a href="#" class="comment_text d_c_text">
                                                {{-- 12 <span class="comment_title text">Comment</span> --}}
                                            </a>
                                        </div>
                                        <!-- comment_area end -->
                                    </div>
                                    <!-- date_and_comment_area end -->
                                </div>
                                <!-- news_title_and_date_comment_area end -->
                            </div>
                            <!-- news_item end -->
                            @endforeach

                        </div>
                        <!-- news_item_area end -->

                        <!-- button_area start -->
                        <div class="view_all_button_area">
                            <a href="{{url('news')}}" class="view_all_button">আরো দেখুন</a>
                        </div>
                        <!-- button_area end -->

                    </div>
                </div>
                <!-- right_area end -->
            </div>


        </div>
    </div>
</section>
<!-- news_area end -->
@php
$blog = \App\Models\Blog\Blog::with('blog_categories')->withCount('blog_comments')->where('status','active')->get();
// dd($blog);
@endphp
<!-- blog_area start -->
<section class="blog_area" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="blog_area_content">
            <!-- area_title start -->
            <div class="area_title">
                <h2 class="area_title_text">
                    ব্লগ
                </h2>
            </div>
            <!-- area_title end -->

            <!-- blog_item_area start -->
            <div class="blog_item_area">
                @foreach ($blog as $item)
                <!-- blog_item start -->
                <div class="blog_item">
                    <!-- blog_image_and_details_button_area start -->
                    <div class="blog_image_and_details_button_area">
                        <!-- blog_image start -->
                        <div class="blog_image">
                            <img src="{{$item->image}}" alt="img">
                        </div>
                        <!-- blog_image end -->
                        <!-- details_button start -->
                        <div class="details_button">
                            <a href="{{url('blog-details')}}/{{$item->id}}" class="details_button_text">বিস্তারিত
                                পড়ুন</a>
                        </div>
                    </div>
                    <!-- blog_image_and_details_button_area end -->

                    <!-- details_button end -->
                    <!-- blog_title_and_date_comment_area start -->
                    <div class="blog_title_and_date_comment_area">

                        <div class="blog_title">
                            <h3 class="title_text">
                                {{$item->title}}
                            </h3>
                        </div>

                        <div class="date_and_comment_area">
                            <div class="date_area d_c_area">
                                <p class="date_text d_c_text">
                                    29 Septembar <span class="text">2023</span>
                                </p>
                            </div>
                            <a href="#" class="comment_area d_c_area">
                                <p class="date_text d_c_text">
                                    {{$item->blog_comments_count}} <span class="text">Comment</span>
                                </p>
                            </a>
                        </div>
                    </div>
                    <!-- blog_title_and_date_comment_area end -->
                </div>
                <!-- blog_item end -->
                @endforeach
            </div>
            <!-- blog_item_area end -->

            <!-- view_all_button_area start -->
            <div class="view_all_button_area">
                <a href="{{url('blog')}}" class="view_all_button">
                    আরো দেখুন
                </a>
            </div>
            <!-- view_all_button_area end -->
        </div>
    </div>
</section>
<!-- blog_area end -->

<!-- youtube_video_area start -->
<section class="youtube_video_area" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="youtube_video_content text-center">
            {!! setting(key:'intro_video') !!}
        </div>
    </div>
</section>
<!-- youtube_video_area end-->
@php
    $videoGallery = \App\Models\Gallery\GalleryVideo::with('gallery_video_categories')
        ->where('status','active')
        ->orderBy('id','DESC')
        ->limit(9)
        ->get();
    // dd($videoGallery);
@endphp
<!-- video_gallery_area start -->
<div class="video_gallery_area" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="video_gallery_area_content">
            <!-- area_title start -->
            <div class="area_title">
                <h2 class="area_title_text">ভিডিও গ্যালারি</h2>
            </div>
            <!-- area_title end -->

            <!-- all_video start -->
            <div class="all_video">
                <ul>
                    @foreach ($videoGallery as $item)
                    <li>
                        <a href="#" class="each_video">
                            {!! $item->link !!}
                        </a>
                        <!-- video_overlay_area start -->
                        <div class="video_overlay_area h-100">
                            <div class="date_area">
                                <p class="date_text">
                                    {{$item->created_at->format('d MM Y')}}
                                </p>
                            </div>

                            <div class="video_title_text_and_button_area">
                                <div class="text_area">
                                    <h2 class="title_text">
                                        {{$item->gallery_video_categories->title}}
                                    </h2>
                                    <p class="decription_text">
                                        {{$item->title}}
                                    </p>
                                </div>
                                <div class="button_area">
                                    <button class="play_button"
                                        onclick="playVideo('{{$item->gallery_video_categories->title}}','{{$item->link}}')"><i
                                            class="fa-solid fa-play"></i></button>
                                </div>

                            </div>

                        </div>
                        <!-- video_overlay_area end-->
                    </li>

                    @endforeach
                </ul>


            </div>
            <!-- all_video end -->

            <!-- view_all_button_area start -->
            <div class="view_all_button_area">
                <a href="{{url('gallery/video')}}" class="view_all_button">আরো দেখুন</a>
            </div>
            <!-- view_all_button_area end-->
        </div>
    </div>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade d-none  d-block" id="showVideoWrapper">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoTitle"></h5>
                    <button type="button" onclick="closeModal()" class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div id="showVideoContent" class="d-flex justify-content-center" style="height: 400px;">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- video_gallery_area end -->
@php
$photoGallery = \App\Models\Gallery\GalleryPhoto::with('gallery_photo_categories')
    ->where('status','active')
    ->orderBy('id','DESC')
    ->limit(9)
    ->get();
// dd($photoGallery);
@endphp
<!-- image_gallery_area start -->
<div class="image_gallery_area" data-aos="fade-up" data-aos-duration="1000">
    <!-- <div class="container"> -->
    <div class="image_gallery_area_content">
        <!-- area_title start -->
        <div class="area_title">
            <h2 class="area_title_text">ছবি গ্যালারী</h2>
        </div>
        <!-- area_title end -->

        <!-- all_image start -->
        <div class="all_image">
            <ul>
                @foreach ( $photoGallery as $item )
                <li>
                    <div class="each_image">
                        <img src="{{$item->image}}" alt="image">
                    </div>
                    <!-- overlay-area start -->
                    <a href="{{$item->image}}" data-lightbox="compulsory" data-title="{{$item->title}}" class="overlay-area">
                        <div class="date_area">
                            <p class="date_text">
                                {{$item->created_at->format('d MM Y')}}
                            </p>
                        </div>

                        <div class="image_title_area">
                            <h2 class="title_text">
                                {{$item->title}}
                            </h2>
                        </div>

                    </a>
                    <!-- overlay-area end-->
                </li>
                @endforeach
            </ul>


        </div>
        <!-- all_image end -->

        <!-- view_all_button_area start -->
        <div class="view_all_button_area">
            <a href="{{url('gallery/photo')}}" class="view_all_button">আরো দেখুন</a>
        </div>
        <!-- view_all_button_area end-->
    </div>
    <!-- </div> -->
</div>
<!--image_gallery_area end -->



@endsection

@push('custom-js')

<script>
    function playVideo(title,link){
    var wrapper = document.getElementById('showVideoWrapper')
    wrapper.classList.add('show')
    wrapper.classList.remove('d-none')
    var videoTitle = document.getElementById('videoTitle')
    videoTitle.textContent  = title
    var content = document.getElementById('showVideoContent');
     content.innerHTML = link;
    }

    function closeModal(){

        var wrapper = document.getElementById('showVideoWrapper')
    wrapper.classList.remove('show')
    wrapper.classList.add('d-none')
    }
</script>

@endpush
