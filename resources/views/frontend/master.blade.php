<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('frontend.include._header')
    </head>
    <Body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile
                    m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas
                    m-footer--push m-aside--offcanvas-default">
        <div class="m-grid m-grid--hor m-grid--root m-page">

            @include('frontend.include._navbar')

            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

                @include('frontend.include._sidebar')

                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    @if (session('pesan_sukses'))
                        <div class="alert alert-success">
                            {{ session('pesan_sukses') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>

            @include('frontend.include._footer')
        </div>

        <div id="m_scroll_top" class="m-scroll-top">
            <i class="la la-arrow-up"></i>
        </div>
        <script>
            function goBack() {
              window.history.back();
            }
        </script>
        <script src="{{ asset('assets/metronic/vendors/base/vendors.bundle.js') }}"></script>
        <script src="{{ asset('assets/metronic/demo/default/base/scripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/metronic/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
        <script src="{{ asset('assets/metronic/app/js/dashboard.js') }}"></script>
        <script src="{{ asset('assets/metronic/demo/default/custom/components/base/blockui.js') }}"></script>
        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                    case 'success':
                        toastr.success('{{ Session::get('message') }}', '{{ Session::get('title') }}', {
                            timeOut: 5000
                        });
                    break;
                    case 'error':
                        toastr.error('{{ Session::get('message') }}', '{{ Session::get('title') }}', {
                            timeOut: 5000
                        });
                    break;
                }
            @endif
        </script>
        @stack('footer-scripts')
    </Body>
</html>
