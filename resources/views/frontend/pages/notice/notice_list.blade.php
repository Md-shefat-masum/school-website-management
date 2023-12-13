@foreach ($notice as $item)
<div>
    <ul>
        <li>
            <div class="notice">
                <!--notice date_area start -->
                <div class="date_area">
                    <div class="day_and_month_area">
                        <p class="text_day">{{$item->created_at->format('d')}}</p>
                        <p class="text_month">{{$item->created_at->format('M')}}</p>
                    </div>
                    <div class="year_area">
                        <p class="text_year">{{$item->created_at->format('Y')}}</p>
                    </div>
                </div>
                <!--notice date_area end-->

                <!-- notice_title_and_description_area start -->
                <div class="notice_title_and_description_area">
                    <div class="notice_title">
                        <a href="{{route('menu_details',[$item->slug,$item->id])}}"
                            class="title_text">
                            {{$item->title}}
                        </a>
                    </div>
                    <div class="notice_description">
                        <span class="description_text">
                            {{-- {!!$item->description!!} --}}
                            <a href="#" class="read_more_area">
                                Read more ...
                            </a>
                        </span>
                    </div>
                </div>
                <!-- notice_title_and_description_area end-->
            </div>
        </li>
    </ul>
</div>
@endforeach
<div>
    <style>
        .inner_notice_area .notice_area_content .notice_site_bar_area .notice_area .notice_area_content ul.pagination{
            display: flex;
        }
    </style>
    <ul class="pagination mt-3 mb-5">
        @foreach ($notice->toArray()["links"] as $item)
        <li class="page-item {{ $item["active"] ? 'active' : ''}}">
            <a class="page-link" onclick="get_notices(`{{ $item["url"] }}`)" href="{{ $item["url"] }}">
                {!! $item["label"] !!}
            </a>
        </li>
        @endforeach
    </ul>
</div>
