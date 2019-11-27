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

                                @include('frontend.common.label.edit')

                                <h3 class="m-portlet__head-text">
                                    Attendance Correction
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                        <form id="attendanceCorrectionEdotForm" name="attendanceCorrectionEdotForm" >
                                    @csrf
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Employee Name @include('frontend.common.label.required')
                                            </label>
                                         
                                            @component('frontend.common.label.data-info')
                                                @slot('text', $employee->code.' - '.$employee->full_name)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Correction Date @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $attcor->correction_date)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Correction Time @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $attcor->type->name)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Time 
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $attcor->correction_time)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description 
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('rows', '5')
                                                @slot('text', $attcor->description)
                                            @endcomponent
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
<script>
    let url = '{{route('frontend.attendance-correction.update',['attcor' => $attcor->uuid])}}';
    console.log( $('select[name="attendance_correction_time_type"]').val());

</script>
    <script src="{{ asset('js/frontend/attendance-correction/edit.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/edit-select2.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/timepicker.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
@endpush
