<nav class="nav_area">
    <div class="container">
        <div class="nav_area_content">

            <!-- responsive_menu_area start -->
            <div class="responsive_menu_area">
                <button class="searchh_area icon" onclick="search_area_show.classList.toggle('active_search')"
                    class="search_area">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <a href="login_page.html" class="Portal_area_responsive">
                    <p class="Portal_text">Portal</p>
                </a>
                <button onclick="add_menu_area.classList.toggle('active_class')" class="menu_area icon">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <!-- responsive_menu_area end -->

            <!-- all_nave area start -->
            <div id="add_menu_area" class="all_nave">
                <ul>

                    <li>
                        <a href="/" class="main_manu">হোম</a>
                    </li>
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

                    @endphp
                    @foreach ($menus as $key=>$menu)
                    @if ($key <= 8) <li>
                        <a href="{{$menu->external_link ? $menu->external_link :" #"}}" class="main_manu">
                            {{ $menu->title }}
                            @if ($menu->sub_menus->count())
                            <span class="arra_icon">
                                <i class="fa-solid fa-angle-down"></i>
                            </span>
                            @endif
                        </a>
                        @if ($menu->sub_menus->count())
                        <ul>
                            @foreach ($menu->sub_menus as $sub_menu)
                            <li>
                                <a href="{{$sub_menu->external_link ? $sub_menu->external_link : url($sub_menu->slug)}}">
                                    {{$sub_menu->title}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        </li>
                        @endif
                        @endforeach
                        <li>
                            <a href="#" class="main_manu">
                                আরো দেখুন
                                <span class="arraw_icon">
                                    <i class="fa-solid fa-angle-down"></i>
                                </span>
                            </a>

                            <ul>
                                @foreach ($menus as $key=>$menu)
                                @if ($key > 8)
                                <li>
                                    <a href="{{$menu->external_link ? $menu->external_link :" #"}}" class="main_manu">
                                        {{ $menu->title }}

                                        @if ($menu->sub_menus->count())
                                        <span class="arra_icon">
                                            <i class="fa-solid fa-angle-down"></i>
                                        </span>
                                        @endif
                                    </a>

                                    @if ($menu->sub_menus->count())
                                    <ul>
                                        @foreach ($menu->sub_menus as $sub_menu)
                                        <li>
                                            <a
                                                href="{{$sub_menu->external_link ? $sub_menu->external_link : url($sub_menu->slug)}}">
                                                {{$sub_menu->title}}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </li>

                </ul>
                <div class="extra_area" onclick="add_menu_area.classList.toggle('active_class')">

                </div>
            </div>
            <!-- all_nave area end -->

            <!-- search area start -->
            <button onclick="search_area_show.classList.toggle('active_search')" class="search_area">
                <i class="fa-solid fa-magnifying-glass"></i>
                <div class="close_icon">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </button>

            <div id="search_area_show" class="search_item">
                <input type="text" placeholder="খুঁজুন...">
                <button class="search_icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            <!-- search area end -->


        </div>
    </div>
</nav>
