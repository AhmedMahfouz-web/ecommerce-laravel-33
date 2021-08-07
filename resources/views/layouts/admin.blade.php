{{-- <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href={{ asset("/../../dashboard/images/ico/apple-icon-120.png") }}>
<link rel="shortcut icon" type="image/x-icon"
    href={{ asset("/../../dashboard/images/logo/logo-33-2-browser-50x50.png") }}>
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
    rel="stylesheet">
<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href={{ asset("/../../dashboard/css/vendors.css") }}>
<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href={{ asset("/../../dashboard/css/app.css") }}>
<!-- END MODERN CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href={{ asset("/../../dashboard/css/core/menu/menu-types/vertical-menu.css") }}>
<link rel="stylesheet" type="text/css" href={{ asset("/../../dashboard/css/core/colors/palette-gradient.css") }}>
<link rel="stylesheet" type="text/css" href={{ asset("/../../dashboard/vendors/css/cryptocoins/cryptocoins.css") }}>
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href={{ asset("/../../dashboard/css/style.css") }}>
<!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-col="2-columns">
    <!-- fixed-top-->
    @include('dashboard.includes.header')
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('dashboard.includes.sidebar')

    @yield('content')

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('dashboard.includes.footer')
    <!-- BEGIN VENDOR JS-->
    <script src={{ asset("/../../dashboard/vendors/js/vendors.min.js") }} type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src={{ asset("/../../dashboard/vendors/js/charts/chart.min.js") }} type="text/javascript"></script>
    <script src={{ asset("/../../dashboard/vendors/js/charts/echarts/echarts.js") }} type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src={{ asset("/../../dashboard/js/core/app-menu.js") }} type="text/javascript"></script>
    <script src={{ asset("/../../dashboard/js/core/app.js") }} type="text/javascript"></script>
    <script src={{ asset("/../../dashboard/js/scripts/customizer.js") }} type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src={{ asset("/../../dashboard/js/scripts/pages/dashboard-crypto.js") }} type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
</body>

</html> --}}

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <link rel="icon" href="{{ asset('dashboard/assets/images/brand/logo-33-2-browser-50x50.png') }}"
        type="image/x-icon">
    <title>Admin | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/fontawesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/main.css') }}" type="text/css"">
    <link rel=" stylesheet" href="{{ asset('dashboard/assets/scss/_custom.scss') }}" type="text/css"">
</head>

<body class=" theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{ asset('dashboard/assets/images/brand/logo-33-BLACK-PNG-800800.png') }}"
                    width="48" height="48" alt="ArrOw">
            </div>
            <p>Please wait...</p>
        </div>
    </div>

    @include('dashboard.includes.header')

    <div class="main_content" id="main-content">

        @include('dashboard.includes.sidebar')

        <div class="page">
            @yield('content')
        </div>
    </div>

    <!-- Javascript -->
    <script src="{{ asset('dashboard/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/bundles/vendorscripts.bundle.js') }}"></script>

    <script src="{{ asset('dashboard/assets/js/theme.js') }}"></script>
    </body>

</html>
