@extends('frontend.layouts.website')
@section('contents')

<div class="image_gallery_area inner_image_gallery_area aos-init aos-animate" data-aos="fade-up"
    data-aos-duration="1000">
    <!-- <div class=""> -->
    <!-- <div class="container"> -->
    <div class="image_gallery_area_content">

        <div class="container">
            <!-- area_title start -->
            <div class="page_title_area">
                <h2 class="page_title">ছবি গ্যালারী</h2>
            </div>
            <!-- area_title end -->
        </div>

        <!-- all_image start -->
        <div class="all_image">
            <ul>

                @if ($galleryPhotos)
                @foreach ($galleryPhotos as $item)
                <li>
                    <div class="each_image">
                        <img src="{{asset($item->image)}}" alt="image">
                    </div>
                    <!-- overlay-area start -->
                    <a href="{{asset($item->image)}}" data-lightbox="compulsory" data-title="Office"
                        class="overlay-area">
                        <div class="date_area">
                            <p class="date_text">
                                {{$item->created_at->format('d MM Y')}}
                            </p>
                        </div>

                        <div class="image_title_area">
                            <h2 class="title_text">
                                {{$item->gallery_photo_categories->title}}
                            </h2>
                        </div>

                    </a>
                    <!-- overlay-area end-->
                </li>
                @endforeach

                @endif



            </ul>


        </div>
        <!-- all_image end -->

        <!-- pagination_area start -->
        <div class="d-flex justify-content-center mt-5">
            {!! $galleryPhotos->links() !!}
        </div>
        <!-- pagination_area end -->
    </div>
    <!-- </div> -->
    <!-- </div> -->

</div>
@endsection
