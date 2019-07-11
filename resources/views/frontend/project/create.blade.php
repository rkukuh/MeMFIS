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
                    <a href="{{ route('frontend.project.index') }}" class="m-nav__link">
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
        <div class="col-sm-6 col-md-6 col-lg-6 " onclick="location.href='/project-hm/create';">
            <div class="view third-effect ">
                <img class="responsive" src="{{ asset('img/project/hm_icon.png') }}" />
                <h1 class="position bg" style="color:white">New Project</h1>

                <div class="mask hand">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 " onclick="location.href='/project-workshop/create';">
            <div class="view third-effect " style="margin-left:0px">
                <img class="responsive" src="{{ asset('img/project/workshop_icon.png') }}" />
                <h1 class="position bg" style="color:white">Additional Task</h1>
                <div class="mask hand">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 @push('header-scripts')
    <style>
        .hand {
            cursor: pointer;
        }

        .position {
            position: absolute;
            bottom: 8px;
            right: 16px;
        }
        .bg {
            background-color: rgba(192, 192, 192, 0.3);
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css3/style.css')}} " type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css3/thirdeffect.css')}} " type="text/css" media="screen" />
@endpush
@push('footer-scripts')
    <script src="{{ asset('js/frontend/project/index.js')}}"></script>
@endpush
