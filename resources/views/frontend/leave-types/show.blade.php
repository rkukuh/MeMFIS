@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Leave Types
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
                        <a href="{{ route('frontend.leave-type.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Leave Types
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
                                    Leave Types
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
                                                Leave Types Code   
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $leaveType->code)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Leave Types Name   
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text',  $leaveType->name)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Leave per Leave Period   
                                            </label>
        
                                            @component('frontend.common.label.data-info')
                                                @slot('text',  $leaveType->leave_period)
                                            @endcomponent
                                        </div>
                                        @php
                                        $checked_leave = null;

                                            if($leaveType->prorate_leave == 1){
                                                $checked_leave = 'checked';
                                            }
                                        @endphp
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            @component('frontend.common.input.checkbox')
                                                @slot('text','Enable Pro-Rate Leaves')
                                                @slot('id', 'pro_rate_leave')
                                                @slot('name', 'pro_rate_leave')
                                                @slot('checked', $checked_leave)
                                                @slot('disabled', 'disabled')
                                                @slot('style_div','margin-top:30px')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Gender Specification
                                            </label>

                                            @php
                                                if($leaveType->gender == 'm'){
                                                $gender = 'Male';
                                                }else if($leaveType->gender == 'f'){
                                                $gender = 'Female';
                                                }else{
                                                $gender = 'All';
                                                }
                                            @endphp

                                            @component('frontend.common.label.data-info')
                                            @slot('text',  $gender)
                                            @endcomponent
                                        </div>

                                        @php
                                        $checked_distribute = null;

                                            if($leaveType->distribute_evently == 1){
                                                $checked_distribute = 'checked';
                                            }

                                        $checked_back = null;

                                            if($leaveType->back_date == 1){
                                                $checked_back = 'checked';
                                            }
                                        @endphp
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    @component('frontend.common.input.checkbox')
                                                        @slot('text','Enable Distribute Evently Per Month')
                                                        @slot('id', 'distribute_evently_per_month')
                                                        @slot('name', 'distribute_evently_per_month')
                                                        @slot('size','12')
                                                        @slot('checked', $checked_distribute)
                                                        @slot('style_div','margin-top:30px')
                                                        @slot('disabled','disabled')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    @component('frontend.common.input.checkbox')
                                                        @slot('text','Enable Back Date')
                                                        @slot('id', 'back_date')
                                                        @slot('name', 'back_date')
                                                        @slot('size','12')
                                                        @slot('checked', $checked_back)
                                                        @slot('style_div','margin-top:30px')
                                                        @slot('disabled','disabled')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $checked_daily = null;

                                            if($leaveType->based == 'daily'){
                                                $checked_daily = 'checked';
                                            }

                                        $checked_multi = null;

                                            if($leaveType->based == 'multi'){
                                                $checked_multi = 'checked';
                                            }
                                    @endphp

                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    @component('frontend.common.input.radio')
                                                        @slot('text', 'Daily Based')
                                                        @slot('name', 'day')
                                                        @slot('id', 'daily_based')
                                                        @slot('value', 'daily')
                                                        @slot('checked', $checked_daily)
                                                        @slot('disabled','disabled')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    @component('frontend.common.input.radio')
                                                        @slot('text', 'Multi-Day Based')
                                                        @slot('name', 'day')
                                                        @slot('id', 'multi_day_based')
                                                        @slot('checked', $checked_multi)
                                                        @slot('value', 'multi')
                                                        @slot('disabled','disabled')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $leaveType->description)
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

