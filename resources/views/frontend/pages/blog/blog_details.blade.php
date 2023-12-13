@extends('frontend.layouts.website')
@section('contents')
@if (session()->has('message'))
<div class="alert alert-success  alert-dismissible fade show w-50 m-auto mt-5" role="alert">
    <strong>Success!</strong>
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<section class="news_area inner_news_and_blog_details_page aos-init aos-animate" data-aos="fade-up"
    data-aos-duration="1000">
    <div class="container">
        <div class="news_content news_and_blog_content">
            <!-- page_title_area start -->
            <div class="page_title_area">
                <h2 class="page_title">
                    ব্লগ বিস্তারিত
                </h2>
            </div>
            <!-- page_title_area end -->

            <div class="news_and_blog_details_and_site_bar_area">

                <div class="left_area">
                    <!-- blog_item start -->
                    <div class="news_item news_and_blog_item">
                        <!-- blog_image start -->
                        <div class="news_image">
                            <img src="{{asset('/')}}{{$blogDetails->image}}" alt="news">
                        </div>
                        <!-- blog_image end -->

                        <!-- date_and_comment_area start -->
                        <div class="date_and_comment_area">
                            <!-- date_area start -->
                            <div class="date_area d_c_area">
                                <p class="date_text d_c_text">
                                    {{$blogDetails->created_at->format('d M')}} <span
                                        class="year_text text">{{$blogDetails->created_at->format('Y')}}</span>
                                </p>
                            </div>
                            <!-- date_area end -->

                            <!-- comment_area start -->
                            <div class="comment_area d_c_area">
                                <a href="#" class="comment_text d_c_text">
                                    {{ $commnets && count($commnets) ?count($commnets) : 0 }} <span
                                        class="comment_title text">Comment</span>
                                </a>
                            </div>
                            <!-- comment_area end -->
                        </div>
                        <!-- date_and_comment_area end -->

                        <!-- blog_title_area start -->
                        <div class="news_title_area">
                            <div class="news_title_text">{{$blogDetails->title}}
                            </div>
                        </div>

                        <div class="news_details_text_area">
                            <p class="details_text">
                                {!!$blogDetails->description!!}
                            </p>

                        </div>
                        <!-- blog_title_area end -->
                    </div>
                    <!-- blog_item end -->

                    <!-- comment_all_area start -->
                    <div class="comment_all_area " style="border-top:none">
                        <!-- comment_area start -->
                        <div class="comment_area">
                            <div class="user_img_and_comment_text">
                                <div class="user_img">
                                    <img src="{{asset('frontend/assets/images/avatar.png')}}" alt="img">
                                </div>
                                <div class="comment_text">
                                    <form action="{{route('submit-blog-comment')}}">
                                        <input type="hidden" name="id" value="{{request()->route('id')}}">
                                        <input type="text" name="comment" id="comment" placeholder="Add Comment . . .">
                                        <div class="cancel_and_submit_button_area">
                                            <button class="button_area">Cancle</button>
                                            <button class="button_area" type="submit">Comment</button>
                                        </div>
                                    </form>
                                    @if ($errors->has('comment'))
                                    <div class="alert alert-danger mt-2">
                                        {{ $errors->first('comment') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- comment_area end -->
                        <!-- replay_area start -->
                        <hr>
                        @if ($commnets)

                        @foreach ($commnets as $comment )
                        <div class="replay_area">
                            <div class="user_img_and_user_name_and_comment_text">
                                <div class="user_img">
                                    <img src="{{asset('frontend/assets/images/avatar.png')}}" alt="img">
                                </div>
                                <div class="user_name_and_comment_text">
                                    <div class="user_name">
                                        <p class="user_name_text">User</p>
                                    </div>
                                    <div class="comment_text_area">
                                        <p class="comment_text">{{$comment->comment}} </p>
                                    </div>
                                    <div class="replay_button_area">
                                        <label for="comment" class="replay_button">Replay</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @endif

                        <!-- replay_area end -->

                    </div>
                    <!-- comment_all_area end -->
                </div>

                <!-- site_bar_area_start -->
                <div class="site_bar_area">
                    <!-- search_area start -->
                    <div class="search_area">
                        <div class="search_area_content">
                            <form action="{{route('blogs.search')}}" method="get">
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
                                @if ($blogCategory)
                                @foreach ($blogCategory as $item )
                                <li>
                                    <a href="{{url('blog-by-category')}}/{{$item->slug}}"
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
                            @if ($blogs)

                            @foreach ($blogs as $item)
                            <li>
                                <a href="{{url('blog-details')}}/{{$item->id}}" class="latest_post_item">
                                    <div class="post_image">
                                        <img src="{{asset('/').$item->image}}" alt="image">
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


        </div>
    </div>
</section>
@endsection
