@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
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
                    <a href="{{ route('frontend.aircraft.index') }}" class="m-nav__link">
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
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            @include('frontend.common.label.datalist')

                            <h3 class="m-portlet__head-text">
                                Project
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                            <div class="row align-items-center">
                                <div class="col-xl-8 order-2 order-xl-1">
                                    <div class="form-group m-form__group row align-items-center">
                                        <div class="col-md-2">
                                            @include('frontend.common.buttons.filter')
                                        </div>
                                        <div class="col-md-4">
                                            <div class="m-input-icon m-input-icon--left">
                                                <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                    <span><i class="la la-search"></i></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                    <div class="m-btn-group m-btn-group--pill btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <a href="{{route('frontend.project-hm.create')}}" class="m-btn btn btn-primary">
                                            <span>
                                                <i class="la la-plus-circle"></i>
                                                <span>New Project</span>
                                            </span>
                                        </a>
                                        <button type="button" class="btn btn-primary m-btn m-btn--pill-last" data-target="#modal_addtional_task" data-toggle="modal">
                                            <span>
                                                <i class="la la-plus-circle"></i>
                                                <span>Additional Task</span>
                                            </span>
                                        </button>
                                        @include('frontend.project.hm-additional.modal')
                                    </div>

                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>
                        @include('frontend.aircraft.modal')
                        <div class="row">
                            <div class="col-lg-12">
                                @include('frontend.project.filter')
                            </div>
                        </div>
                        <div class="project_datatable" id="project_datatable"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer-scripts')
<script src="{{ asset('js/frontend/functions/action-botton/aircraft.js')}}"></script>
<script src="{{ asset('js/frontend/project/index.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/project-additional.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/project-additional.js') }}"></script>

@endpush