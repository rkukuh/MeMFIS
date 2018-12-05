@extends('frontend.master') 
@section('content')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Project
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{ route('frontend.quotation.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Project
                            </span>
                        </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="m-content">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6" id="fadein">
            <div class="m-portlet m--bg-accent m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
                <div class="m-portlet__body">

                    <div class="m-widget7 m-widget7--skin-dark">

                        <div class="m-widget7__desc">
                                <h1>Heavy Maintenance</h1>

                        </div>
                        {{-- <div class="m-widget7__user"> --}}
                            {{-- <div class="m-widget7__user-img">
                                <img src="{{asset('assets/metronic/app/media/img/users/user4.jpg')}}"
                                class="m--img-rounded m--marginless" alt="" />

                            </div> --}}
                            {{-- <div class="m-widget7__info">
                                <span class="m-widget7__username">
                                        Dan Bold   
                                        </span><br>
                                <span class="m-widget7__time">
                                        3 days ago
                                        </span>
                            </div> --}}
                        {{-- </div> --}}
                        {{-- <div class="m-widget7__button">
                            <a class="m-btn m-btn--pill btn btn-danger" href="#" role="button">All Feeds</a>
                        </div> --}}
                    </div>
                    {{-- <img src="{{asset('assets/metronic/app/media/img/users/user4.jpg')}}"
                    class="m--img-rounded m--marginless" alt="" /> --}}

                    <div align="center">
                            <img src="{{asset('img/project/hm_1.jpg')}}"
                            class="m--img-rounded m--marginless" alt="" />
                            <img src="{{asset('img/project/hm_2.jpg')}}"
                            class="m--img-rounded m--marginless" alt="" />
                            <img src="{{asset('img/project/hm_3.jpg')}}"
                            class="m--img-rounded m--marginless" alt="" />
        
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6" id="fadein" onclick="location.href='/tes';">
            <div class="m-portlet m--bg-danger m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
                <div class="m-portlet__body">
                    <div class="m-widget7 m-widget7--skin-dark">
                        <div class="m-widget7__desc">
                            <h1>Workshop</h1>
                        </div>
                        <div class="m-widget7__user">
                            {{-- <div class="m-widget7__user-img shrink">
                                <img src="{{asset('assets/metronic/app/media/img/users/user4.jpg')}}"
                                class="m--img-rounded m--marginless" alt="" />

                            </div> --}}
                            {{-- <div class="m-widget7__info">
                                <span class="m-widget7__username">
                                            Nick Mana   
                                            </span><br>
                                <span class="m-widget7__time">
                                            6 hours ago
                                            </span>
                            </div> --}}
                        </div>
                        {{-- <div class="m-widget7__button">
                            <a class="m-btn m-btn--pill btn btn-accent" href="#" role="button">All Feeds</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 @push('footer-scripts')
<script src="{{ asset('js/frontend/project/index.js')}}"></script>
<script>
//     jQuery(document).ready(function () {
//         $('.shrink').on('click', function () {
//                 alert('tes');
// });

//     });
// $div
// .on('mouseenter', function(){
//     $(this).animate({ margin: -10, width: "+=20", height: "+=20" });
// })
// .on('mouseleave', function(){
//     $(this).animate({ margin: 0, width: "-=20", height: "-=20" });
// })​
</script>

@endpush