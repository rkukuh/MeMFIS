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

                            @include('frontend.common.label.edit')

                            <h3 class="m-portlet__head-text">
                                Employee
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                    <form id="employeeform" name="employeeform">
                                        <div class="m-portlet__body">

                                            @component('frontend.common.input.hidden')
                                                @slot('id', 'employee_uuid')
                                                @slot('name', 'employee_uuid')
                                                @slot('value', $employee->uuid)
                                            @endcomponent

                                            @component('frontend.common.input.hidden')
                                                @slot('id', 'code')
                                                @slot('name', 'code')
                                                @slot('value', $employee->code)
                                            @endcomponent

                                <div class="form-group m-form__group row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label class="form-control-label">
                                            First Name @include('frontend.common.label.required')
                                        </label>
                                        @component('frontend.common.input.text')
                                            @slot('name', 'first_name')
                                            @slot('value', $employee->first_name)
                                        @endcomponent
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label class="form-control-label">
                                            Middle Name @include('frontend.common.label.optional')
                                        </label>
                                        @component('frontend.common.input.text')
                                            @slot('name', 'middle_name')
                                            @slot('value', $employee->middle_name)
                                        @endcomponent
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label class="form-control-label">
                                            Last Name @include('frontend.common.label.optional')
                                        </label>
                                        @component('frontend.common.input.text')
                                            @slot('name', 'last_name')
                                            @slot('value', $employee->last_name)
                                        @endcomponent
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label class="form-control-label">
                                            Day Of Birth @include('frontend.common.label.required')
                                        </label>
                                        @component('frontend.common.input.datepicker')
                                        @slot('id', 'date-dob')
                                        @slot('name', 'dob')
                                        @slot('value', $employee->dob)
                                        @endcomponent
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label class="form-control-label">
                                            Gender @include('frontend.common.label.required')
                                        </label>

                                    <div class="row">

                                    @if(!empty($employee->gender))

                                    @if ($employee->gender == 'm')
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                            @component('frontend.common.input.radio')
                                            @slot('text', 'Male')
                                            @slot('name', 'gender')
                                            @slot('id', 'gender')
                                            @slot('value', 'male')
                                            @slot('checked', 'checked')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            @component('frontend.common.input.radio')
                                            @slot('text', 'Female')
                                            @slot('name', 'gender')
                                            @slot('id', 'gender')
                                            @slot('value', 'female')
                                            @endcomponent
                                        </div>
                                    @elseif ($employee->gender == 'f')
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                            @component('frontend.common.input.radio')
                                            @slot('text', 'Male')
                                            @slot('name', 'gender')
                                            @slot('id', 'gender')
                                            @slot('value', 'male')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            @component('frontend.common.input.radio')
                                            @slot('text', 'Female')
                                            @slot('name', 'gender')
                                            @slot('id', 'gender')
                                            @slot('value', 'female')
                                            @slot('checked', 'checked')
                                            @endcomponent
                                        </div>
                                    @else
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                            @component('frontend.common.input.radio')
                                            @slot('text', 'Male')
                                            @slot('name', 'gender')
                                            @slot('id', 'gender')
                                            @slot('value', 'male')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            @component('frontend.common.input.radio')
                                            @slot('text', 'Female')
                                            @slot('name', 'gender')
                                            @slot('id', 'gender')
                                            @slot('value', 'female')
                                            @endcomponent
                                        </div>
                                    @endif

                                    @else
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                            @component('frontend.common.input.radio')
                                            @slot('text', 'Male')
                                            @slot('name', 'gender')
                                            @slot('id', 'gender')
                                            @slot('value', 'male')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            @component('frontend.common.input.radio')
                                            @slot('text', 'Female')
                                            @slot('name', 'gender')
                                            @slot('id', 'gender')
                                            @slot('value', 'female')
                                            @endcomponent
                                        </div>
                                    @endif

                                    </div>
                                    
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                <label class="form-control-label">
                                                    Hired At @include('frontend.common.label.required')
                                                </label>
                                                @component('frontend.common.input.datepicker')
                                                @slot('id', 'date-hired_at')
                                                @slot('name', 'hired_at')
                                                @slot('value', $employee->hired_at)
                                                @endcomponent
                                        </div>
                                </div>

                                <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.update')
                                                        @slot('type', 'button')
                                                        @slot('id', 'edit-employee')
                                                        @slot('class', 'edit-employee')
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
    </div>
</div>
@endsection

@push('footer-scripts')
<script src="{{ asset('js/frontend/employee/employee/employee-datepicker.js')}}"></script>
<script src="{{ asset('js/frontend/employee/employee/edit.js') }}"></script>
@endpush