<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Sekolahku adalah aplikasi manajemen sekolah berbasis website yang di bangun dan di kembangkan dengan Framework Laravel">
    <meta name="keywords" content="">
    <meta name="author" content="Andri Desmana">
    <title>Forgot Password Page - SMPN 2 Tegal</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('Assets/Backend/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/pages/page-auth.css')}}">
    <!-- END: Page CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo--><a class="brand-logo" href="/">

                            <h2 class="brand-text text-primary ml-1"> <img
                                    src="{{ asset('Assets/Frontend/img/logo.jpg') }}"
                                    style="width:35px; height:35px; border-radius:50%;">
                                SMPN 2 Tegal</h2>
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-75 d-lg-flex align-items-center justify-content-center px-5"><img
                                    class="img-fluid"
                                    src="{{asset('Assets\Backend\images\pages\forgot-password-v2-dark.svg')}}"
                                    alt="Reset Password V2" /></div>
                        </div>
                        <!-- /Left Text-->

                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                @if($message = Session::get('error'))
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        <strong>{{ $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                    </div>
                                </div>
                                @elseif($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    <div class="alert-body">
                                        <strong>{{ $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                    </div>
                                </div>
                                @endif

                                <h2 class="card-title font-weight-bold mb-1">Reset Password!</h2>
                                <p class="card-text mb-2">Silakan masukkan password baru.</p>


                                <form class="auth-login-form mt-2" action="{{ route('password.update') }}"
                                    method="POST">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ request()->token }}">
                                    <input type="hidden" name="email" value="{{ request()->email }}">

                                    <div class="form-group">
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input
                                                class="form-control form-control-merge @error('password') is-invalid @enderror"
                                                id="login-password" type="password" name="password"
                                                placeholder="Masukkan Password" aria-describedby="login-password"
                                                tabindex="2" />
                                            <div class="input-group-append"><span
                                                    class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span></div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input
                                                class="form-control form-control-merge @error('password_confirmation') is-invalid @enderror"
                                                id="login-password-confirmation" type="password"
                                                name="password_confirmation" placeholder="Masukan Ulang Password
                                                Baru" aria-describedby="login-password-confirmation" tabindex="2" />
                                            <div class="input-group-append"><span
                                                    class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span></div>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">Kirim</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('Assets/Backend/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('Assets/Backend/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('Assets/Backend/js/core/app-menu.js')}}"></script>
    <script src="{{asset('Assets/Backend/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('Assets/Backend/js/scripts/pages/page-auth-login.js')}}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>