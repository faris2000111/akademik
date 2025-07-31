<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard V.1 | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset ('backend/img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/owl.transitions.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/normalize.css') }}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/meanmenu.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/educate-custon-icon.css') }}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/calendar/fullcalendar.print.min.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
    <!-- dashboard custom CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/dashboard-custom.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('backend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

    @include('admin.layouts.sidebar')
    
    <div class="all-content-wrapper">

    @include('admin.layouts.header')

    @include('admin.layouts.mobile')

    @include('admin.layouts.breadcrumb')

    @yield('content')

    @include('admin.layouts.footer')
        
    </div>

    <!-- jquery
		============================================ -->
    <script src="{{ asset('backend/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('backend/js/wow.min.js') }}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('backend/js/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('backend/js/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('backend/js/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{ asset('backend/js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('backend/js/jquery.scrollUp.min.js') }}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{ asset('backend/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('backend/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('backend/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('backend/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{ asset('backend/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{ asset('backend/js/morrisjs/raphael-min.js') }}"></script>
    <script src="{{ asset('backend/js/morrisjs/morris.js') }}"></script>
    <script src="{{ asset('backend/js/morrisjs/morris-active.js') }}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{ asset('backend/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('backend/js/sparkline/jquery.charts-sparkline.js') }}"></script>
    <script src="{{ asset('backend/js/sparkline/sparkline-active.js') }}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{ asset('backend/js/calendar/moment.min.js') }}"></script>
    <script src="{{ asset('backend/js/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('backend/js/calendar/fullcalendar-active.js') }}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('backend/js/plugins.js') }}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <!-- dashboard custom JS
		============================================ -->
    <script src="{{ asset('backend/js/dashboard-custom.js') }}"></script>
    <!-- dashboard real-time JS
		============================================ -->
    <script src="{{ asset('backend/js/dashboard-realtime.js') }}"></script>
    <!-- dashboard export JS
		============================================ -->
    <script src="{{ asset('backend/js/dashboard-export.js') }}"></script>
    <!-- tawk chat JS
		============================================ -->
    <!-- <script src="{{ asset('backend/js/tawk-chat.js') }}"></script> -->
</body>

</html>