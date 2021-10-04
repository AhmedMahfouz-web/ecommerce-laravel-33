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
