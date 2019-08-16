<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!-- begin::Head -->
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Roboto:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!--end::Web font -->

        <!--begin::Base Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/metronic/vendors/base/vendors.bundle.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/metronic/demo/default/base/style.bundle.css')}}">
        <!--end::Base Styles -->

        <link rel="shortcut icon" href="{{ asset('assets/metronic/demo/default/media/img/logo/favicon.ico')}}">
    </head>
    <!-- end::Head -->
    <!-- begin::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark
                 m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div id="m_login"
                 style="background-image: url(../../../assets/metronic/app/media/img//bg/bg-1.jpg);"
                 class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1">
                 <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
                    <div class="m-login__container">
                        <div class="m-login__logo">
                            <a href="#">
                                <img src="img/LogoMemfisSpinner.png" alt="logo" height="100px">
                            </a>
                        </div>
                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h3 class="m-login__title">Welcome to MeMFIS</h3>
                            </div>

                            <form action="{{ route('login') }}" method="POST" class="m-login__form m-form">

                                @csrf

                                <div class="form-group m-form__group">
                                    <strong>{{ $errors->first('email') }}</strong>

                                    <input type="email" id="email" name="email" placeholder="Email" autofocus
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                                </div>
                                <div class="form-group m-form__group">
                                    <strong>{{ $errors->first('password') }}</strong>

                                    <input type="password" id="password" name="password" placeholder="Password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                </div>
                                <div class="row m-login__form-sub">
                                    <div class="col m--align-left m-login__form-left">
                                        <label class="m-checkbox  m-checkbox--light">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            {{ __('Remember Me') }}

                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col m--align-right m-login__form-right">
                                        <a href="javascript:;" class="m-link">
                                            Forget Password ?
                                        </a>
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    <button type="submit"
                                            class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air
                                                   m-login__btn m-login__btn--primary">
                                            {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="m-login__forget-password">
                            <div class="m-login__head">
                                <h3 class="m-login__title">Forgotten Password ?</h3>
                                <div class="m-login__desc">Enter your email to reset your password:</div>
                            </div>
                            <form action="" method="POST" class="m-login__form m-form">

                                @csrf

                                <div class="form-group m-form__group">
                                    <input type="text" id="m_email" name="email" placeholder="Email" autocomplete="off"
                                           class="form-control m-input">
                                </div>
                                <div class="m-login__form-action">
                                    <button id="m_login_forget_password_submit"
                                            class="btn m-btn m-btn--pill m-btn--custom m-btn--air
                                                   m-login__btn m-login__btn--primary">
                                        Request
                                    </button>
                                    <button id="m_login_forget_password_cancel"
                                            class="btn m-btn m-btn--pill m-btn--custom m-btn--air
                                                   m-login__btn">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Page -->

        <!--begin::Base Scripts -->
        <script type="text/javascript" src="{{ asset('assets/metronic/vendors/base/vendors.bundle.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/metronic/demo/default/base/scripts.bundle.js')}}"></script>
        <!--end::Base Scripts -->

        <!--begin::Page Snippets -->
        <script type="text/javascript" src="{{ asset('assets/metronic/snippets/custom/pages/user/login.js')}}"></script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
