<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Vendor | Register</title>
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
                            <p class="lead">Create an account</p>
                        </div>
                        <div class="body">
                            @include('dashboard.includes.alerts.error')
                            <form id="wizard_with_validation" action="{{ route('vendor.registration') }}"
                                method="POST">
                                @csrf
                                <div class="form-group form-float">
                                    <label class="d-block font-weight-bold" for="name">Store
                                        Name</label>
                                    <input type="text" class="form-control valid" placeholder="Store Name" name="name"
                                        required="" aria-required="true" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group form-float">
                                    <label class="d-block font-weight-bold" for="email">Email</label>
                                    <input type="text" class="form-control valid" placeholder="Email" name="email"
                                        id="email" aria-required="true" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group form-float">
                                    <label class="d-block font-weight-bold" for="address">Address
                                    </label>
                                    <input type="text" class="form-control valid" placeholder="Address" name="address"
                                        id="address" aria-required="true" value="{{ old('address') }}">
                                    @error('address')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group form-float">
                                    <label class="d-block font-weight-bold" for="mobile">Mobile
                                        Number</label>
                                    <input type="tel" class="form-control valid" placeholder="Mobile Number"
                                        name="mobile" id="mobile" required="" aria-required="true"
                                        value="{{ old('mobile') }}">
                                    @error('mobile')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <hr>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>

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
