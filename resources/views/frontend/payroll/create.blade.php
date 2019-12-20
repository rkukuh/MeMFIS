@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Payroll
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
                    <a href="#" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Payroll
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
                                Payroll
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <form id="JournalForm">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Period @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.datepicker')
                                            @slot('id', 'daterange_payroll')
                                            @slot('name', 'daterange_payroll')
                                            @slot('id_error', 'daterange_payroll')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label font-weight-bold">
                                            Employee to be Processed :
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group m-form__group row ">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                @component('frontend.common.input.radio')
                                                    @slot('id', 'all_employee')
                                                    @slot('name', 'employee')
                                                    @slot('text', 'All Employee')
                                                    @slot('checked','checked')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-1 col-md-1 col-lg-1">

                                                @component('frontend.common.input.radio')
                                                    @slot('id', 'employee_choose')
                                                    @slot('name', 'employee')
                                                @endcomponent
                                                
                                            </div>
                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                @component('frontend.common.input.select2')
                                                    @slot('id', 'employee')
                                                    @slot('text', 'employee')
                                                    @slot('name', 'employee')
                                                    @slot('id_error', 'employee')
                                                    @slot('disabled','disabled')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="action-buttons">
                                                @component('frontend.common.buttons.submit')
                                                    @slot('type', 'button')
                                                    @slot('text','Submit YOURSELF')
                                                    @slot('icon','fa-forward')
                                                    @slot('color','primary')
                                                    @slot('id','payrollgenerate')
                                                @endcomponent 
                                                <a href="{{url('payroll/edit')}}" class="btn m-btn m-btn--custom btn-primary btn-md"><span>
                                                    <i class="fa fa-forward"></i>
                                                    <span>Generated</span>
                                                </span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('footer-scripts')

<script src="{{ asset('js/frontend/payroll/create.js')}}"></script>
<script src="{{ asset('js/frontend/functions/daterange/payroll.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/employee.js')}}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/employee.js')}}"></script>
@endpush
