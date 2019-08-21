@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Company Structure & Department
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
                        <a href="{{ route('frontend.company.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Company Structure & Department
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

                                @include('frontend.common.label.show')

                                <h3 class="m-portlet__head-text">
                                    Company Structure & Department
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <form id="itemform" name="itemform">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Code 
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $company->code)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Name
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $company->name)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $company->description)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                               Company Type   
                                            </label>

                                            @php
                                                //SET COMPANY TYPE 
                                                $type = null;
                                                if(isset($company->type->name)){
                                                    $type = $company->type->name;
                                                };   

                                                //SET COMPANY PARENT 
                                                $parent = null;
                                                if(isset($company->parent->name)){
                                                    $parent = $company->parent->name;
                                                }; 
                                            @endphp

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $type)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                               Parent Structure
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $parent)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <hr>
                                            <fieldset class="border p-2">
                                                <legend class="w-auto">Overtime Allowance Setting</legend>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Maximum Overtime per Period
                                                        </label>
                                                        
                                                        @component('frontend.common.input.number')
                                                            @slot('text', 'Maximum Overtime per Period')
                                                            @slot('id', 'max_overtime_per_period')
                                                            @slot('name', 'max_overtime_per_period')
                                                            @slot('id_error', 'max_overtime_per_period')
                                                            @slot('value', $company->maximum_period)
                                                            @slot('input_append','Hours')
                                                            @slot('disabled','disabled')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Holiday Overtime Allowance
                                                        </label>

                                                        @component('frontend.common.input.number')
                                                            @slot('text', 'Holiday Overtime Allowance')
                                                            @slot('id', 'holiday_overtime_allowance')
                                                            @slot('name', 'holiday_overtime_allowance')
                                                            @slot('value', $company->maximum_holiday)
                                                            @slot('id_error', 'holiday_overtime_allowance')
                                                            @slot('input_append','IDR per Day')
                                                            @slot('disabled','disabled')
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
    <script src="{{ asset('js/frontend/functions/select2/company.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/parent-structure.js') }}"></script>

    <script src="{{ asset('js/frontend/company/form-reset.js') }}"></script>
@endpush
