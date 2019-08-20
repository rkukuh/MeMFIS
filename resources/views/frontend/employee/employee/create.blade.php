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
                            <div class="row">
                                <div class="col-sm-2 col-md-2 col-lg-2"></div>
                                <div class="col-sm-10 col-md-10 col-lg-10 text-white">
                                    <h1 class="display-5">Yemima Krisdian Tifani, <span>25</span></h1>
                                    <div class="row">
                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                            <h6>Job Title</h6>
                                        </div>
                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                            <h6>| Department</h6>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-lg-7">
                                            <span>
                                                <h6><i class="la la-envelope-o"></i>&nbsp;&nbsp; yemimatifani@gmail.com</h6>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <h6>Employee Since <span>Aug</span> 1, 2019</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="height:60px;width:100%;background:#e9ecef">
                            <div class="form-group m-form__group row p-3">
                                <div class="col-sm-2 col-md-2 col-lg-2 d-flex justify-content-end">
                                    <a href="" data-target="#modal_additional_quotation" data-toggle="modal">
                                        <i class="la la-pencil" style="font-size:32px;"></i>
                                    </a>
                                </div>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <ul class="nav nav-tabs nav-fill" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link  btn btn-primary text-white active" data-toggle="tab" href="#m_tabs_2_1">Basic Information</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-primary text-white" data-toggle="tab" href="#m_tabs_2_2">Education</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-primary text-white" data-toggle="tab" href="#m_tabs_2_3">Workshift</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-primary text-white" data-toggle="tab" href="#m_tabs_2_4">Benefits & PPH</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-primary text-white" data-toggle="tab" href="#m_tabs_2_5">Account</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-primary text-white" data-toggle="tab" href="#m_tabs_2_6">Termination</a>
                                        </li>
                                    </ul>  
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('frontend.quotation.additional.modal-project')
                    <div class="m-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
                                @include('frontend.employee.employee.include.basic.create')
                            </div>
                            <div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
                                @include('frontend.employee.employee.include.education.create') 
                            </div>
                            <div class="tab-pane" id="m_tabs_2_3" role="tabpanel">
                                @include('frontend.employee.employee.include.workshift.create')
                            </div>
                            <div class="tab-pane" id="m_tabs_2_4" role="tabpanel">
                                @include('frontend.employee.employee.include.benefit.create') 
                            </div>
                            <div class="tab-pane" id="m_tabs_2_5" role="tabpanel">
                                @include('frontend.employee.employee.include.account.create')
                            </div>
                            <div class="tab-pane" id="m_tabs_2_6" role="tabpanel">
                                @include('frontend.employee.employee.include.termination.create') 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer-scripts')
<script src="{{ asset('js/frontend/employee/employee/employee-datepicker.js')}}"></script>
<script src="{{ asset('js/frontend/employee/employee/create.js') }}"></script>
@endpush