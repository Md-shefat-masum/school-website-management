<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include("frontend.layouts.includes.meta")

    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/icon/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/styles/style.css">

    <link id="aos_css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/lightbox2-dev/dist/css/lightbox.min.css" rel="stylesheet" />
</head>

<body id="bottom_to_up">
    <!-- header_area start -->
    @include('frontend.layouts.header')
    <!-- header_area end -->

    <!-- nav area start -->
    @include("frontend.layouts.navbar")
    <!-- nav area end -->
    <main>
        @yield("contents")
    </main>

    <!-- footer_area start -->
    @include("frontend.layouts.footer")
    <!-- footer_area end -->

    <!-- bottom_to_upper_button start -->
    <a href="#bottom_to_up" class="bottom_to_upper_button_area">

        <i class="fa-solid fa-angle-up"></i>

    </a>
    <!-- bottom_to_upper_button end -->

    <!-- javaScript area start -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // if(window.innerWidth > 768){
            //     AOS.init();
            // }else{
            //     aos_css.href="";
            // }
            AOS.init();
    </script>

    <script src="{{ asset('frontend') }}/assets/lightbox2-dev/dist/js/lightbox-plus-jquery.min.js"></script>
    <!-- javaScript area end -->
    @stack('custom-js')
</body>

</html>
