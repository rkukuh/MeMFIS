<title>{{ config('app.name', 'MeMFIS') }}</title>

<meta charset="utf-8">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>

<script>
    WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>

<link rel="stylesheet" type="text/css" href="{{ asset('assets/metronic/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/metronic/vendors/base/vendors.bundle.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/metronic/demo/default/base/style.bundle.css') }}">

<link rel="shortcut icon" href="{{ asset('assets/metronic/demo/default/media/img/logo/favicon.ico') }}">
