<!-- begin index.tpl -->
<!doctype html>
<html lang="ar">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>{{ config('name') }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('css/niceselect.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('css/flex-slider.min.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl-carousel.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    @yield('style')
    <style>
        .header.shop .search-bar form {
            width: auto;
        }

        .animated {
            -webkit-animation-duration: calc(1s * 0.5);
            animation-duration: calc(1s * 0.5);
        }

        .alert.alert-success {
            background-color: #1BC5BD;
            border-color: #1BC5BD;
            color: #ffffff;
        }

        .alert[data-notify] {
            min-width: 300px;
            width: auto;
            border-radius: 0.5rem;
            font-size: 14px
        }

    </style>

</head>

<body class="js">
    @include('front.includes.preloader')
    @include('front.includes.header')
    @yield('content')
    @include('front.includes.footer')


    <!-- Jquery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Color JS -->
    <script src="{{ asset('js/colors.js') }}"></script>
    <!-- Slicknav JS -->
    <script src="{{ asset('js/slicknav.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('js/owl-carousel.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('js/magnific-popup.js') }}"></script>
    <!-- Waypoints JS -->
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <!-- Countdown JS -->
    <script src="{{ asset('js/finalcountdown.min.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('js/nicesellect.js') }}"></script>
    <!-- Flex Slider JS -->
    <script src="{{ asset('js/flex-slider.js') }}"></script>
    <!-- ScrollUp JS -->
    <script src="{{ asset('js/scrollup.js') }}"></script>
    <!-- Onepage Nav JS -->
    <script src="{{ asset('js/onepage-nav.min.js') }}"></script>
    <!-- Easing JS -->
    <script src="{{ asset('js/easing.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ asset('js/active.js') }}"></script>
    <!-- Notification -->
    <script src={{ asset('js/bootstrap-notify.min.js') }}></script>
    @yield('javascript')
</body>

</html>
<!-- end index.tpl -->
