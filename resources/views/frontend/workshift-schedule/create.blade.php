@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Workshift Schedule
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
                        <a href="{{ route('frontend.hr.workshift-schedule.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Workshift Schedule
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
                                    Workshift Schedule
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
                                                Workshift Schedule Code @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('text', 'Workshift Schedule Code')
                                                @slot('id', 'workshift_schedule_code')
                                                @slot('name', 'workshift_schedule_code')
                                                @slot('id_error', 'workshift_schedule_code')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Workshift Schedule Name @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('text', 'Workshift Schedule Name')
                                                @slot('id', 'workshift_schedule_name')
                                                @slot('name', 'workshift_schedule_name')
                                                @slot('id_error', 'workshift_schedule_name')
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
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <table widt="100%" class="table table-striped table-bordered second">
                                                <tr >
                                                    <td align="center" width="20%"><b>Day</b></td>
                                                    <td align="center" width="18%"><b>In</b></td>
                                                    <td align="center" width="18%"><b>Break In</b></td>
                                                    <td align="center" width="18%"><b>Break Out</b></td>
                                                    <td align="center" width="18%"><b>Out</b></td>
                                                    <td align="center" width="8%"></td>
                                                </tr>
                                                <tr>
                                                    <td align="center" width="20%" style="backgroud:#e3e3e3;" class="pt-4">
                                                        <span style="font-weight: bold;color:#6d85c2" valign="middle">Sunday</span>
                                                    </td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="8%">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', '')
                                                            @slot('name', '')
                                                            @slot('size', '12')
                                                            @slot('class','ml-4')
                                                            @slot('disabled','disabled')
                                                        @endcomponent
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" width="20%" style="backgroud:#e3e3e3;" class="pt-4">
                                                        <span style="font-weight: bold;color:#6d85c2">Monday </span>
                                                    </td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="8%">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', '')
                                                            @slot('name', '')
                                                            @slot('size', '12')
                                                            @slot('class','ml-4')
                                                        @endcomponent
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" width="20%" style="backgroud:#e3e3e3;" class="pt-4">
                                                        <span style="font-weight: bold;color:#6d85c2">Thuesday</span>
                                                    </td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="8%">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', '')
                                                            @slot('name', '')
                                                            @slot('size', '12')
                                                            @slot('class','ml-4')
                                                        @endcomponent
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" width="20%" style="backgroud:#e3e3e3;" class="pt-4">
                                                        <span style="font-weight: bold;color:#6d85c2">Wednesday</span>
                                                    </td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="8%">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', '')
                                                            @slot('name', '')
                                                            @slot('size', '12')
                                                            @slot('class','ml-4')
                                                        @endcomponent
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" width="20%" style="backgroud:#e3e3e3;" class="pt-4">
                                                        <span style="font-weight: bold;color:#6d85c2">Thursday</span>
                                                    </td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="8%">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', '')
                                                            @slot('name', '')
                                                            @slot('size', '12')
                                                            @slot('class','ml-4')
                                                        @endcomponent
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" width="20%" style="backgroud:#e3e3e3;" class="pt-4">
                                                        <span style="font-weight: bold;color:#6d85c2">Friday</span>
                                                    </td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="8%">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', '')
                                                            @slot('name', '')
                                                            @slot('size', '12')
                                                            @slot('class','ml-4')
                                                        @endcomponent
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" width="20%" style="backgroud:#e3e3e3;" class="pt-4">
                                                        <span style="font-weight: bold;color:#6d85c2">Saturday</span>
                                                    </td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="18%"></td>
                                                    <td align="center" width="8%">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', '')
                                                            @slot('name', '')
                                                            @slot('size', '12')
                                                            @slot('class','ml-4')
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
                                                        @slot('id', 'add-workshift-schedule')
                                                        @slot('class', 'add-workshift-schedule')
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