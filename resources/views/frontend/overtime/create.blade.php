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
                            <form id="itemform" name="itemform" method="POST" action="{{ route('frontend.overtime.store') }}">
                                @csrf
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            @hasanyrole('hrd|admin')
                                                <label class="form-control-label">
                                                    Propose Leave To @include('frontend.common.label.optional')
                                                </label>
                                            
                                                @include('frontend.common.employee.index')
                                            @endrole
                                            @hasanyrole('employee')
                                                <label class="form-control-label">
                                                    Employee Name 
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('id', 'employee')
                                                    @slot('text', 'generate from user login')
                                                @endcomponent
                                            @endrole
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-6 form-group{{$errors->has("date") ? " has-error" : ""}}">
                                            <label class="form-control-label">
                                                Date @include('frontend.common.label.optional') 
                                            </label>

                                            @component('frontend.common.input.datepicker')
                                                @slot('id', 'date')
                                                @slot('name', 'date')
                                                @slot('id_error', 'date')
                                            @endcomponent
                                            <small class="text-danger">{{ $errors->first('date') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6 form-group{{$errors->has("start_time") ? " has-error" : ""}}">
                                                    <label class="form-control-label">
                                                        Start Time  @include('frontend.common.label.optional')
                                                    </label>

                                                    @component('frontend.common.input.timepicker')
                                                        @slot('id', 'start_time')
                                                        @slot('name', 'start_time')
                                                        @slot('class','m_timepicker_1 text-center')
                                                    @endcomponent
                                                    <small class="text-danger">{{ $errors->first('start_time') }}</small>
                                                  
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 form-group{{$errors->has("end_time") ? " has-error" : ""}}">
                                                    <label class="form-control-label">
                                                        End Time @include('frontend.common.label.optional')
                                                    </label>
        
                                                    @component('frontend.common.input.timepicker')
                                                        @slot('id', 'end_time')
                                                        @slot('name', 'end_time')
                                                        @slot('class','m_timepicker_1 text-center')
                                                    @endcomponent
                                                    <small class="text-danger">{{ $errors->first('end_time') }}</small>
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
                                        <div class="col-sm-12 col-md-12 col-lg-12 form-group{{$errors->has("description") ? " has-error" : ""}}">
                                            <label class="form-control-label">
                                                Description 
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('id', 'description')
                                                @slot('name', 'description')
                                                @slot('text', 'Description')
                                            @endcomponent
                                            <small class="text-danger">{{ $errors->first('description') }}</small>
                                            {{-- @if ($errors->get("description") != null)
                                                <span><p style="color: red;">{{$errors->get("description")[0]}}</p></span>
                                            @endif --}}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        {{-- @slot('type','submit') --}}
                                                        @slot('id', 'add-overtime')
                                                        @slot('class', 'add-overtime')
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
    <script src="{{ asset('js/frontend/functions/timepicker.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
@endpush
