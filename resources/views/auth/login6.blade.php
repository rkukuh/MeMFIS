<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                    active: function() {
                        sessionStorage.fonts = true;
                    }
                }
            );
        </script>

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/metronic/vendors/base/vendors.bundle.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/metronic/demo/default/base/style.bundle.css') }}">

        <link rel="shortcut icon" href="{{ asset('assets/metronic/demo/default/media/img/logo/favicon.ico') }}">
    </head>
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-grid--hor-tablet-and-mobile m-login m-login--6"
                id="m_login">
                <div class="m-grid__item   m-grid__item--order-tablet-and-mobile-2  m-grid m-grid--hor m-login__aside "
                    style="background-image: url(../../../assets/metronic/app/media/img//bg/bg-4.jpg);">
                    <div class="m-grid__item">
                        <div class="m-login__logo text-center">
                            <a href="#">
                                <img src="img/LogoMemfisSpinner.png" height="100px">
                            </a>
                        </div>
                    </div>

                    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver">
                        <div class="m-grid__item m-grid__item--middle">
                            <span class="m-login__title">MeMFIS v{{ config('memfis.version', 'x.y.z') }}</span>
                            <span class="m-login__title" style="margin-top: -20px;">
                                <small>
                                    Server: {{ strtoupper(env('APP_ENV', 'unknown')) }}
                                </small>
                            </span>
                            <span class="m-login__subtitle">Merpati Maintenance Facility Information System</span>
                        </div>
                    </div>

                    <div class="m-grid__item">
                        <div class="m-login__info">
                            <div class="m-login__section">
                                <a href="#" class="m-link">&copy @php echo \Carbon\Carbon::now()->year @endphp SmartAircraft Aero</a>
                            </div>
                            <div class="m-login__section">
                                <a href="https://web.facebook.com/smartaircraftid/" class="m-link" target="_blank">Facebook</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-grid__item m-grid__item--fluid m-grid__item--order-tablet-and-mobile-1 m-login__wrapper">
                    <div class="m-login__body">

                        <div class="m-login__signin">
                            <div class="m-login__title">
                                <h3>Login X</h3>
                            </div>

                            <form action="{{ route('login') }}" method="post" class="m-login__form m-form">

                                @csrf

                                <div class="form-group m-form__group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <input type="email" id="email" name="email" placeholder="Email" autofocus class="form-control m-input">
                                    <div id="username-error" class="form-control-feedback">{{ $errors->first('email') }}</div>
                                </div>

                                <div class="form-group m-form__group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control m-input">
                                    <div id="username-error" class="form-control-feedback">{{ $errors->first('password') }}</div>
                                </div>

                                <div class="m-login__action">
                                    <a href="javascript:;" id="m_login_forget_password" class="m-link invisible">
                                        <span>Forgot Password ?</span>
                                    </a>
                                    <button type="submit" class="btn btn-primary  m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                                        <i class="la la-lock"></i> {{ __('Login') }}
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{ asset('assets/metronic/vendors/base/vendors.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/metronic/demo/default/base/scripts.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/metronic/snippets/custom/pages/user/login.js') }}"></script>
    </body>
</html>
