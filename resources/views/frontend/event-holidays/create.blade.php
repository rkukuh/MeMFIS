@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Event/Holidays
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
                        <a href="{{ route('frontend.holiday.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Event/Holidays
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
                                    Event/Holidays
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
                                                        Holidays Code @include('frontend.common.label.required')
                                                    </label>
        
                                                    @component('frontend.common.input.text')
                                                        @slot('id', 'code')
                                                        @slot('name', 'code')
                                                        @slot('id_error', 'code')
                                                    @endcomponent
        
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Holidays Name @include('frontend.common.label.required')
                                                    </label>
        
                                                    @component('frontend.common.input.text')
                                                        @slot('id', 'name')
                                                        @slot('name', 'name')
                                                        @slot('id_error', 'name')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Date Start @include('frontend.common.label.required')
                                                    </label>
                
                                                    @component('frontend.common.input.datepicker')
                                                        @slot('id', 'period_start_date')
                                                        @slot('name', 'period_start_date')
                                                        @slot('id_error','period_start_date')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Date End @include('frontend.common.label.required')
                                                    </label>
                
                                                    @component('frontend.common.input.datepicker')
                                                        @slot('id', 'period_end_date')
                                                        @slot('name', 'period_end_date')
                                                        @slot('id_error','period_end_date')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Description
                                                    </label>
        
                                                    @component('frontend.common.input.textarea')
                                                        @slot('rows', '5')
                                                        @slot('id', 'description')
                                                        @slot('name', 'description')
                                                    @endcomponent
                                                </div>
                                            </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'add-holidays-period')
                                                        @slot('class', 'add-holidays-period')
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
    <script src="{{ asset('js/frontend/functions/datepicker/period-start.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/period-end.js')}}"></script>
    <script src="{{ asset('js/frontend/event-holidays/create.js')}}"></script>
@endpush
