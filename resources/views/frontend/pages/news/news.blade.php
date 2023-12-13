@extends('frontend.layouts.website')
@section('contents')

<section class="blog_area inner_blog_area aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="blog_area_content">
            <!-- page_title_area start -->
            <div class="page_title_area">
                <h2 class="page_title">
                    সংবাদ
                </h2>
            </div>
            <!-- page_title_area end -->

            <!-- blog_and_sitebar_area start -->
            <div class="blog_and_sitebar_area">
                <!-- blog_item_area start -->
                <div class="blog_item_area">
                    @if ($news)

                    @foreach ($news as $item)
                    <!-- blog_item start -->
                    <div class="blog_item">
                        <!-- blog_image_and_details_button_area start -->
                        <div class="blog_image_and_details_button_area">
                            <!-- blog_image start -->
                            <div class="blog_image">
                                <img src="{{asset($item->image)}}" alt="img">
                            </div>
                            <!-- blog_image end -->
                            <!-- details_button start -->
                            <div class="details_button">
                                <a href="{{url('news-details')}}/{{$item->id}}" class="details_button_text">বিস্তারিত
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
                                        {{$item->created_at->format('d M')}} <span
                                            class="text">{{$item->created_at->format('Y')}}</span>
                                    </p>
                                </div>
                                <a href="#" class="comment_area d_c_area">
                                    {{-- <p class="date_text d_c_text">
                                        9 <span class="text">Comment</span>
                                    </p> --}}
                                </a>
                            </div>
                        </div>
                        <!-- blog_title_and_date_comment_area end -->
                    </div>
                    <!-- blog_item end -->
                    @endforeach
                    @endif
                </div>
                <!-- blog_item_area end -->

                <!-- site_bar_area_start -->
                <div class="site_bar_area">
                    <!-- search_area start -->
                    <div class="search_area">
                        <div class="search_area_content">
                            <form action="{{route('news.search')}}" method="get">
                                @csrf
                                <input name="search" type="seaech" placeholder="Search hear . . .">
                                <button class="seaech_icon" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
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
                                @if ($newsCategory)
                                @foreach ($newsCategory as $item )
                                <li>
                                    <a href="{{url('news-by-category')}}/{{$item->slug}}"
                                        class="items_text">{{$item->title}}</a>
                                </li>
                                @endforeach
                                @endif
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
                            @if ($news)

                            @foreach ($news as $item)
                            <li>
                                <a href="{{url('news-details')}}/{{$item->id}}" class="latest_post_item">
                                    <div class="post_image">
                                        <img src="{{asset($item->image)}}" alt="image">
                                    </div>
                                    <div class="post_date_and_title">
                                        <div class="date_area">
                                            <p class="date_text">
                                                {{$item->created_at->format('d M Y')}}
                                            </p>
                                        </div>
                                        <div class="post_title_area">
                                            <p class="post_text">
                                                {{$item->title}}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                            @endif

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
                            @if ($tags)
                            @foreach ($tags as $item )
                            <li>
                                <a href="#" class="tag_text">{{$item->title}}</a>
                            </li>
                            @endforeach

                            @endif

                        </ul>
                    </div>
                    <!-- popular_tags_area end -->
                </div>
                <!-- site_bar_area_end -->
            </div>
            <!-- blog_and_sitebar_area end-->

            <!-- pagination_area start -->
            <div class="d-flex">
                {!! $news->links() !!}
            </div>
            <!-- pagination_area end -->

        </div>
    </div>
</section>
@endsection
