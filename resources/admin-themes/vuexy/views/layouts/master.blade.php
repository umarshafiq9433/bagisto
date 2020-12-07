<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>@yield('page_title')</title>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" sizes="16x16" href="{{ asset('vendor/webkul/ui/assets/images/favicon.ico') }}" />

        <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/css/ui.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/webkul/admin/assets/css/admin.css') }}">
        <link rel="apple-touch-icon" href="{{ asset('admin-themes/vuexy/assets/images/ico/apple-icon-120.png')}}">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/vendors/css/vendors.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/vendors/css/charts/apexcharts.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/vendors/css/extensions/tether-theme-arrows.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/vendors/css/extensions/tether.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/vendors/css/extensions/shepherd-theme-default.css')}}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/css/bootstrap-extended.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/css/colors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/css/components.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/css/themes/dark-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/css/themes/semi-dark-layout.css')}}">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/css/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/css/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/css/pages/dashboard-analytics.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/css/pages/card-analytics.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/css/plugins/tour/tour.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin-themes/vuexy/assets/css/style.css')}}">
        <!-- END: Custom CSS-->

        @yield('head')

        @yield('css')

        {!! view_render_event('bagisto.admin.layout.head') !!}


    </head>
    <body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="scroll-behavior: smooth;">
    {!! view_render_event('bagisto.admin.layout.body.before') !!}

    {{--        <div id="app">--}}

    {{--            <flash-wrapper ref='flashes'></flash-wrapper>--}}

    {!! view_render_event('bagisto.admin.layout.nav-top.before') !!}

    @include ('admin::layouts.nav-top')

    {!! view_render_event('bagisto.admin.layout.nav-top.after') !!}

    {!! view_render_event('bagisto.admin.layout.nav-left.before') !!}

    @include ('admin::layouts.nav-left')

    {!! view_render_event('bagisto.admin.layout.nav-left.after') !!}

{{--    <div class="app-content content">--}}

        {!! view_render_event('bagisto.admin.layout.content.before') !!}

        @yield('content-wrapper')

        {!! view_render_event('bagisto.admin.layout.content.after') !!}

{{--    </div>--}}

    {{--        </div>--}}

    <script type="text/javascript">
        window.flashMessages = [];

        @foreach (['success', 'warning', 'error', 'info'] as $key)
        @if ($value = session($key))
        window.flashMessages.push({'type': 'alert-{{ $key }}', 'message': "{{ $value }}" });
        @endif
            @endforeach

            window.serverErrors = [];
        @if (isset($errors))
            @if (count($errors))
            window.serverErrors = @json($errors->getMessages());
        @endif
        @endif
    </script>

{{--    <script type="text/javascript" src="{{ asset('vendor/webkul/admin/assets/js/admin.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>--}}
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', function() {
            moveDown = 60;
            moveUp =  -60;
            count = 0;
            countKeyUp = 0;
            pageDown = 60;
            pageUp = -60;
            scroll = 0;

            listLastElement = $('.menubar li:last-child').offset();

            if (listLastElement) {
                lastElementOfNavBar = listLastElement.top;
            }

            navbarTop = $('.navbar-left').css("top");
            menuTopValue = $('.navbar-left').css('top');
            menubarTopValue = menuTopValue;

            documentHeight = $(document).height();
            menubarHeight = $('ul.menubar').height();
            navbarHeight = $('.navbar-left').height();
            windowHeight = $(window).height();
            contentHeight = $('.content').height();
            innerSectionHeight = $('.inner-section').height();
            gridHeight = $('.grid-container').height();
            pageContentHeight = $('.page-content').height();

            if (menubarHeight <= windowHeight) {
                differenceInHeight = windowHeight - menubarHeight;
            } else {
                differenceInHeight = menubarHeight - windowHeight;
            }

            if (menubarHeight > windowHeight) {
                document.addEventListener("keydown", function(event) {
                    if ((event.keyCode == 38) && count <= 0) {
                        count = count + moveDown;

                        $('.navbar-left').css("top", count + "px");
                    } else if ((event.keyCode == 40) && count >= -differenceInHeight) {
                        count = count + moveUp;

                        $('.navbar-left').css("top", count + "px");
                    } else if ((event.keyCode == 33) && countKeyUp <= 0) {
                        countKeyUp = countKeyUp + pageDown;

                        $('.navbar-left').css("top", countKeyUp + "px");
                    } else if ((event.keyCode == 34) && countKeyUp >= -differenceInHeight) {
                        countKeyUp = countKeyUp + pageUp;

                        $('.navbar-left').css("top", countKeyUp + "px");
                    } else {
                        $('.navbar-left').css("position", "fixed");
                    }
                });

                $("body").css({minHeight: $(".menubar").outerHeight() + 100 + "px"});

                window.addEventListener('scroll', function() {
                    documentScrollWhenScrolled = $(document).scrollTop();

                    if (documentScrollWhenScrolled <= differenceInHeight + 200) {
                        $('.navbar-left').css('top', -documentScrollWhenScrolled + 60 + 'px');
                        scrollTopValueWhenNavBarFixed = $(document).scrollTop();
                    }
                });
            }
        });
    </script>
{{--    @stack('scripts')--}}

    {!! view_render_event('bagisto.admin.layout.body.after') !!}

    <div class="modal-overlay"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin-themes/vuexy/assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('admin-themes/vuexy/assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('admin-themes/vuexy/assets/vendors/js/extensions/tether.min.js')}}"></script>
    <script src="{{ asset('admin-themes/vuexy/assets/vendors/js/extensions/shepherd.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin-themes/vuexy/assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('admin-themes/vuexy/assets/js/core/app.js')}}"></script>
    <script src="{{ asset('admin-themes/vuexy/assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin-themes/vuexy/assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <!-- END: Page JS-->
    </body>

</html>