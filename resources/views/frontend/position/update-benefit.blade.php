@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Benefits
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
                        {{-- <a href="{{ route('frontend.hr.position.index') }}" class="m-nav__link"> --}}
                            <span class="m-nav__link-text">
                                Benefits
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

                                @component('frontend.common.label.edit')
                                    @slot('text','Update')
                                @endcomponent

                                <h3 class="m-portlet__head-text">
                                    Benefits
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <form id="itemform" name="itemform">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <table class="table table-bordered second" widtd="100%" cellpadding="4">
                                                <tr style="background:#5372c9;color:white;">
                                                    <td width="5%"></td>
                                                    <td width="45%" align="center"><b>Benefits Name</b></td>
                                                    <td width="25%" align="center"><b>Min</b></td>
                                                    <td width="25%" align="center"><b>Max</b></td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="padding-top:25px;">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', 'check')
                                                            @slot('name', 'check')
                                                        @endcomponent
                                                    </div>
                                                    </td>
                                                    <td style="padding-top:30px;"><b>Position Related</b></td>
                                                    <td>
                                                        @component('frontend.common.input.number')
                                                            @slot('text', 'Min')
                                                            @slot('name', 'position_min')
                                                            @slot('id', 'position_min')
                                                            @slot('id_error', 'position_min')
                                                        @endcomponent
                                                    </td>
                                                    <td>
                                                        @component('frontend.common.input.number')
                                                            @slot('text', 'Max')
                                                            @slot('name', 'position_max')
                                                            @slot('id', 'position_max')
                                                            @slot('id_error', 'position_max')
                                                        @endcomponent
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="padding-top:25px;">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', 'check')
                                                            @slot('name', 'check')
                                                        @endcomponent
                                                    </td>
                                                    <td style="padding-top:30px;"><b>Meal</b></td>
                                                    <td>
                                                        @component('frontend.common.input.number')
                                                            @slot('text', 'Min')
                                                            @slot('name', 'meal_min')
                                                            @slot('id', 'meal_min')
                                                            @slot('id_error', 'meal_min')
                                                        @endcomponent
                                                    </td>
                                                    <td>
                                                        @component('frontend.common.input.number')
                                                            @slot('text', 'Max')
                                                            @slot('name', 'meal_max')
                                                            @slot('id', 'meal_max')
                                                            @slot('id_error', 'meal_max')
                                                        @endcomponent
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="padding-top:25px;">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', 'check')
                                                            @slot('name', 'check')
                                                        @endcomponent
                                                    </td>
                                                    <td style="padding-top:30px;"><b>Overtime</b></td>
                                                    <td>
                                                        @component('frontend.common.input.number')
                                                            @slot('text', 'min')
                                                            @slot('name', 'overtime_min')
                                                            @slot('id', 'overtime_min')
                                                            @slot('id_error', 'overtime_min')
                                                        @endcomponent
                                                    </td>
                                                    <td>
                                                        @component('frontend.common.input.number')
                                                            @slot('text', 'max')
                                                            @slot('name', 'overtime_max')
                                                            @slot('id', 'overtime_max')
                                                            @slot('id_error', 'overtime_max')
                                                        @endcomponent
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'add-benefit')
                                                        @slot('class', 'add-benefit')
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
