@extends('frontend.layouts.website')
@section('contents')

<div class="video_gallery_area inner_video_gallery_area aos-init aos-animate" data-aos="fade-up"
    data-aos-duration="1000">
    <div class="container">
        <div class="video_gallery_area_content">
            <!-- area_title start -->
            <div class="page_title_area">
                <h2 class="page_title">ভিডিও গ্যালারি</h2>
            </div>
            <!-- area_title end -->

            <!-- all_video start -->
            <div class="all_video">
                <ul>
                    @if ($galleryVideos)
                    @foreach ($galleryVideos as $item)
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
                                    <button class="play_button"><i class="fa-solid fa-play"></i></button>
                                </div>

                            </div>

                        </div>
                        <!-- video_overlay_area end-->
                    </li>
                    @endforeach

                    @endif
                </ul>


            </div>
            <!-- all_image end -->

            <!-- view_all_button_area start -->
            <!-- <div class="view_all_button_area">
                <a href="#" class="view_all_button">আরো দেখুন</a>
            </div> -->
            <!-- view_all_button_area end-->
        </div>
        <!-- pagination_area start -->
        <div class="flex justify-content-center align-items-center">
            <div class="d-flex">
                {!! $galleryVideos->links() !!}
            </div>
        </div>

        <!-- pagination_area end -->
    </div>
</div>
@endsection
