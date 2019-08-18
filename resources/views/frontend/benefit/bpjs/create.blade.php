@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    BPJS
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
                        <a href="{{ route('frontend.benefit.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                BPJS
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
                                    BPJS
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <form id="itemform" name="itemform">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row ">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                BPJS Code @include('frontend.common.label.required')
                                            </label>
            
                                            @component('frontend.common.input.input')
                                                @slot('id', 'bpjs_code')
                                                @slot('name', 'bpjs_code')
                                                @slot('id_error', 'bpjs_code')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                BPJS Name @include('frontend.common.label.required')
                                            </label>
            
                                            @component('frontend.common.input.input')
                                                @slot('id', 'bpjs_name')
                                                @slot('name', 'bpjs_name')
                                                @slot('id_error', 'bpjs_name')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <fieldset class="border p-2">
                                                <legend class="w-auto">Paid by Employees</legend>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Percentage of Basic Salary
                                                        </label>
                        
                                                        @component('frontend.common.input.number')
                                                            @slot('id', 'basic_salary_employee')
                                                            @slot('name', 'basic_salary_employee')
                                                            @slot('id_error', 'basic_salary_employee')
                                                            @slot('input_append','%')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Minimum Value 
                                                        </label>
                        
                                                        @component('frontend.common.input.number')
                                                            @slot('id', 'min_employee')
                                                            @slot('name', 'min_employee')
                                                            @slot('id_error', 'min_employee')
                                                            @slot('input_prepend','Rp')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Maximum Value
                                                        </label>
                        
                                                        @component('frontend.common.input.number')
                                                            @slot('id', 'max_employee')
                                                            @slot('name', 'max_employee')
                                                            @slot('id_error', 'max_employee')
                                                            @slot('input_prepend','Rp')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <fieldset class="border p-2">
                                                <legend class="w-auto">Paid by Company</legend>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Percentage of Basic Salary
                                                        </label>
                        
                                                        @component('frontend.common.input.number')
                                                            @slot('id', 'basic_salary_company')
                                                            @slot('name', 'basic_salary_company')
                                                            @slot('id_error', 'basic_salary_company')
                                                            @slot('input_append','%')
                                                        @endcomponent
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Minimum Value 
                                                        </label>
                        
                                                        @component('frontend.common.input.number')
                                                            @slot('id', 'min_company')
                                                            @slot('name', 'min_company')
                                                            @slot('id_error', 'min_company')
                                                            @slot('input_prepend','Rp')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Maximum Value
                                                        </label>
                        
                                                        @component('frontend.common.input.number')
                                                            @slot('id', 'max_company')
                                                            @slot('name', 'max_company')
                                                            @slot('id_error', 'max_company')
                                                            @slot('input_prepend','Rp')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('class', 'add-bpjs')
                                                    @endcomponent

                                                    @include('frontend.common.buttons.reset')

                                                    @include('frontend.common.buttons.back')
                                                </div>
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
    <script src="{{ asset('js/frontend/benefit/bpjs/create.js')}}"></script>
@endpush