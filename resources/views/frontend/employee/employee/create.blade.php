@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Employee
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
                    <a href="{{ route('frontend.customer.index') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Employee
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

                            @include('frontend.common.label.create-new')

                            <h3 class="m-portlet__head-text">
                                Employee
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body p-0" style="position:relative">
                        <div class="m-card-user__pic mx-5">
                            <img src="{{ asset('assets/metronic/app/media/img/users/user5.jpg') }}" class="m--img-rounded m--marginless" alt="" width="14%" style="position:absolute;top:22px;left:12px;border:4px solid white;z-index: 1;">
                        </div>
                        <div class="jumbotron mb-0 pt-4" style="background:#294294;height:170px;">
                        </div>
                        <div style="height:60px;width:100%;background:#e9ecef">
                            <div class="form-group m-form__group row p-3">
                                <div class="col-sm-2 col-md-2 col-lg-2 d-flex justify-content-end">
                                    <a href="" data-target="#modal_photo" data-toggle="modal">
                                        <i class="la la-pencil" style="font-size:32px;"></i>
                                    </a>
                                </div>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <ul class="nav nav-tabs nav-fill" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link  btn btn-primary text-white active" data-toggle="tab" href="#m_tabs_2_1">Basic Information</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-metal text-white" data-toggle="tab" style="pointer-event:none;cursor:default;hover:none;">Education</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-metal text-white" data-toggle="tab" style="pointer-event:none;cursor:default;hover:none;">Workshift</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-metal text-white" data-toggle="tab" style="pointer-event:none;cursor:default;hover:none;">Benefits & Salary</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-metal text-white" data-toggle="tab" style="pointer-event:none;cursor:default;hover:none;">Account</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-metal text-white" data-toggle="tab" style="pointer-event:none;cursor:default;hover:none;">Termination</a>
                                        </li>
                                    </ul>  
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('frontend.employee.employee.modal')
                    <div class="m-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
                                @include('frontend.employee.employee.include.basic.create')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection