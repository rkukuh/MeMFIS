@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Attendance Correction
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
                        <a href="{{ route('frontend.attendance-correction.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Attendance Correction
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
                                    Attendance Correction
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <form id="attendanceCorrectionForm" name="attendanceCorrectionForm" method="POST" action="{{ route('frontend.attendance-correction.store') }}">
                                <div class="m-portlet__body">
                                    @csrf
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Employee Name @include('frontend.common.label.required')
                                            </label>
                                            @component('frontend.common.input.hidden')
                                                @slot('id', 'uuid_employee')
                                                @slot('name', 'uuid_employee')
                                            @endcomponent
                                            @include('frontend.common.employee.index')
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Correction Date @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.datepicker')
                                                @slot('id', 'date')
                                                @slot('text', 'Date')
                                                @slot('name', 'date')
                                                @slot('id_error','date')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Correction Time @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('text', 'Correction Time')
                                                @slot('id', 'attendance_correction_time_type')
                                                @slot('name', 'attendance_correction_time_type')
                                                @slot('id_error', 'attendance_correction_time_type')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Time 
                                            </label>

                                            @component('frontend.common.input.timepicker')
                                                @slot('id', 'time_correction')
                                                @slot('name', 'time_correction')
                                                @slot('class','text-center')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('id', 'description')
                                                @slot('name', 'description')
                                                @slot('text', 'Description')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('id', 'add-attendance')
                                                        @slot('class', 'add-attendance')
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
    <script src="{{ asset('js/frontend/attendance-correction/create.js')}}"></script>
    
    <script src="{{ asset('js/frontend/functions/fill-combobox/correction-time.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/correction-time.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/timepicker.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
@endpush
