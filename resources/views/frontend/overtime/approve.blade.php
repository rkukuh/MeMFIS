@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Propose Overtime
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
                        <a href="{{ route('frontend.attendance.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Propose Overtime
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
                                    Propose Overtime
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
                                                Employee Name
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('id', 'employee')
                                                @slot('text', 'Generate dari user yang mengajukan')
                                            @endcomponent
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Date 
                                            </label>

                                            @component('frontend.common.input.datepicker')
                                                @slot('id', 'date')
                                                @slot('name', 'date')
                                                @slot('id_error', 'date')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Start Time 
                                                    </label>

                                                    @component('frontend.common.input.timepicker')
                                                        @slot('id', 'start_time')
                                                        @slot('class','m_timepicker_1 text-center')
                                                    @endcomponent
                                                  
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        End Time 
                                                    </label>
        
                                                    @component('frontend.common.input.timepicker')
                                                        @slot('id', 'end_time')
                                                        @slot('class','m_timepicker_1 text-center')
                                                    @endcomponent
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Total Time
                                            </label>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    @component('frontend.common.input.number')
                                                        @slot('name','hours')
                                                        @slot('input_append','Hours')
                                                        @slot('disabled','disabled')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    @component('frontend.common.input.number')
                                                        @slot('name','minutes')
                                                        @slot('input_append','Minutes')
                                                        @slot('disabled','disabled')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    @component('frontend.common.input.number')
                                                        @slot('name','second')
                                                        @slot('input_append','Seconds')
                                                        @slot('disabled','disabled')
                                                    @endcomponent
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description @include('frontend.common.label.optional')
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
                                                    
                                                    @component('frontend.common.buttons.approve')
                                                        @slot('data_target', '#modal_approve')
                                                        @slot('class', 'ml-2')
                                                    @endcomponent

                                                    @component('frontend.common.buttons.close')
                                                        @slot('data_target', '#modal_reject')
                                                        @slot('text','Reject')
                                                        @slot('class', 'ml-2')
                                                        @slot('icon','fa fa-times-circle')
                                                        @slot('class', 'bg-warning text-dark')
                                                    @endcomponent


                                                    @include('frontend.common.buttons.back')

                                                    @include('frontend.overtime.modal-approve')
                                                    @include('frontend.overtime.modal-reject')

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
    <script src="{{ asset('js/frontend/functions/timepicker.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
@endpush
