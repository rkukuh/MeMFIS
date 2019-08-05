@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Leave Period
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
                        <a href="{{ route('frontend.hr.leave-period.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Leave Period
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
                                    Leave Period
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
                                                Leave Types Code @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('text', 'Leave Types Code')
                                                @slot('id', 'leave_types_code')
                                                @slot('name', 'leave_types_code')
                                                @slot('id_error', 'leave_types_code')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Leave Types Name @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('text', 'Leave Types Name')
                                                @slot('id', 'leave_types_name')
                                                @slot('name', 'leave_types_name')
                                                @slot('id_error', 'leave_types_name')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Leave per Leave Period @include('frontend.common.label.required')
                                            </label>
        
                                            @component('frontend.common.input.number')
                                                @slot('id', 'leave_per_leave period')
                                                @slot('text', 'Leave per Leave Period')
                                                @slot('name', 'leave_per_leave period')
                                                @slot('id_error','leave_per_leave period')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            @component('frontend.common.input.checkbox')
                                                @slot('id', 'pro_rate_leave')
                                                @slot('name', 'pro_rate_leave')
                                                @slot('text', 'Pro Rate Leaves')
                                                @slot('style_div','margin-top:30px')
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
                                                @slot('text', 'Description')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'add-leave-types')
                                                        @slot('class', 'add-leave-types')
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

