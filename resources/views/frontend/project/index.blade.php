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
        <div class="col-sm-6 col-md-6 col-lg-6" id="shrink" onclick="location.href='/project/hm';">
            <div class="m-portlet m--bg-accent m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
                <div class="m-portlet__body">

                    <div class="m-widget7 m-widget7--skin-dark">
                        <div class="m-widget7__desc"></div>
                    </div>

                    <div align="center">
                        <img src="{{asset('img/project/hm_1.jpg')}}" class=" m--marginless" alt="" />
                        <img src="{{asset('img/project/hm_2.jpg')}}" class=" m--marginless" alt="" />
                        <img src="{{asset('img/project/hm_3.jpg')}}" class=" m--marginless" alt="" />
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6" id="shrink" onclick="location.href='/project/workshop';">
            <div class="m-portlet m--bg-danger m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
                <div class="m-portlet__body">
                    <div class="m-widget7 m-widget7--skin-dark">
                        <div class="m-widget7__desc"></div>
                    </div>
                    <div align="center">
                        <img src="{{asset('img/project/workshop_1.jpg')}}" class=" m--marginless" alt="" />
                        <img src="{{asset('img/project/workshop_2.jpg')}}" class=" m--marginless" alt="" />
                        <img src="{{asset('img/project/workshop_3.jpg')}}" class=" m--marginless" alt="" />
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h1 align="center" style="margin-top:-260px;color:white" onclick="location.href='/project/hm';">Heavy Maintenance</h1>

        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h1 align="center" style="margin-top:-260px;color:white" onclick="location.href='/project/workshop';">Workshop</h1>

        </div>
    </div>

</div>
@endsection
 @push('footer-scripts')
<script src="{{ asset('js/frontend/project/index.js')}}"></script>


@endpush