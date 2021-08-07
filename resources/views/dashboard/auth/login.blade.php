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
    <title>Dashboard | Login</title>
    <link rel="apple-touch-icon" href={{ asset("../../dashboard/images/ico/apple-icon-120.png") }}>
    <link rel="shortcut icon" type="image/x-icon" href={{ asset("../../dashboard/images/ico/favicon.ico") }}>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href={{ asset("../../dashboard/css/vendors.css") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("../../dashboard/vendors/css/forms/icheck/icheck.css") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("../../dashboard/vendors/css/forms/icheck/custom.css") }}>
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href={{ asset("../../dashboard/css/app.css") }}>
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href={{ asset("../../dashboard/css/core/menu/menu-types/vertical-menu.css") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("../../dashboard/css/core/colors/palette-gradient.css") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("../../dashboard/css/pages/login-register.css") }}>
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href={{ asset("../../dashboard/css/style.css" ) }}>
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page" data-open="click"
    data-menu="vertical-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <div class="p-1">
                                            <img src={{ asset("../../dashboard/images/logo/logo-dark.png") }}
                                                alt="branding logo">
                                        </div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>Login with Modern</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal form-simple" action="{{route('admin.login')}}"
                                            method="POST" novalidate>
                                            @csrf
                                            @if (isset($errors))
                                            <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                                                {{$errors}}
                                            </div>
                                            @endif
                                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                                <input type="text" class="form-control form-control-lg input-lg"
                                                    id="user-name" placeholder="Your Email" value="{{old('email')}}"
                                                    name="email" required>
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control form-control-lg input-lg"
                                                    id="user-password" placeholder="Enter Password" name="password"
                                                    required>
                                                <div class="form-control-position">
                                                    <i class="la la-password"></i>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12 text-center text-md-left">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                                        <label for="remember-me"> Remember Me</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12 text-center text-md-right"><a
                                                        href="recover-password.html" class="card-link">Forgot
                                                        Password?</a></div>
                                            </div>
                                            <button type="submit" class="btn btn-info btn-lg btn-block"><i
                                                    class="ft-unlock"></i> Login</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <!-- BEGIN VENDOR JS-->
    <script src={{ asset("../../dashboard/vendors/js/vendors.min.js") }} type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src={{ asset("../../dashboard/vendors/js/forms/icheck/icheck.min.js") }} type="text/javascript"></script>
    <script src={{ asset("../../dashboard/vendors/js/forms/validation/jqBootstrapValidation.js") }}
        type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src={{ asset("../../dashboard/js/core/app-menu.js") }} type="text/javascript"></script>
    <script src={{ asset("../../dashboard/js/core/app.js") }} type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src={{ asset("../../dashboard/js/scripts/forms/form-login-register.js") }} type="text/javascript"></script>
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
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Dashboard | Login</title>
    <link rel="icon" href="{{ asset('dashboard/assets/images/brand/logo-33-2-browser-50x50.png') }}"
        type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/themify-icons/themify-icons.css') }}">
    <link rel=" stylesheet" href="{{ asset('dashboard/assets/vendor/fontawesome/css/font-awesome.min.css') }}">

    <link rel=" stylesheet" href="{{ asset('dashboard/assets/css/main.css') }}" type="text/css">
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{ asset('dashboard/assets/images/brand/logo-33-BLACK-PNG-800800.png') }}"
                    width="48" height="48" alt="ArrOw">
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top">
                        <img src="{{ asset('dashboard/assets/images/brand/logo-33-BLACK-PNG-800800.png') }}"
                            alt="Logo">
                        <strong>ThirtyThree</strong> <span>House</span>
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Login to your account</p>
                        </div>
                        <div class="body">
                            <form class="form-horizontal form-simple" action="{{ route('admin.login') }}"
                                method="POST" novalidate>
                                @csrf
                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.success')
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control" id="signin-email"
                                        value="{{ old('email') }}" name="email" required placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" id="signin-password"
                                        placeholder="Enter Password" name="password" required>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox" name="remember-me">
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->

    <!-- Core -->
    <script src="{{ asset('dashboard/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/bundles/vendorscripts.bundle.js') }}"></script>

    <script src="{{ asset('dashboard/assets/js/theme.js') }}"></script>
</body>

</html>
