@extends('frontend.layouts.website')
@section('contents')

<section class="inner_notice_area aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="notice_area_content">
            <!-- page_title_area start -->
            <div class="page_title_area">
                <h2 class="page_title">
                    {{$navbar_menu_item->title ?? ""}}
                    {{$navbar_menu->title ?? ""}}
                </h2>
            </div>
            <!-- page_title_area end -->

            @isset($sub_menus)
            <div style="position: sticky; top: 60px; left: 0;z-index: 99;">
                <ul class="d-flex gap-2 flex-wrap mb-3" style="background-color: #144f61;">
                    @foreach ($sub_menus as $item)
                        <li><a class="py-2 px-3 text-light" onclick="get_notices(`{{route('menu_item_list',$item->slug)}}`)" href="#">{{ $item->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endisset

            <!-- notice_site_bar_area start -->
            <div class="notice_site_bar_area">

                <!-- notice_area start -->
                <div class="notice_area aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

                    <!-- notice_area_content start -->
                    <script>
                        function get_notices(url){
                            event?.preventDefault();
                            if(!url) return;
                            fetch(url,{
                                    headers: {
                                        "Content-Type": "application/json"
                                    }
                                })
                                .then(res=>res.text())
                                .then(res=>{
                                    notice_area_content.innerHTML = res;
                                })
                        }
                        @isset($navbar_menu_item)
                            get_notices(`/{{$navbar_menu_item->slug}}/all`);
                        @endisset
                        @isset($sub_menus)
                            get_notices(`{{route('menu_item_list',$sub_menus[0]->slug)}}`)
                        @endisset
                    </script>
                    <div class="notice_area_content" id="notice_area_content">

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
