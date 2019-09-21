@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                   Additional Task
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
                        <a href="{{ route('frontend.quotation.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Additional Task
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
                                    Additonal Task
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
                                            <fieldset class="border p-2">
                                                <legend class="w-auto">Customer Name (<span>{{ $project->customer->name }}</span>)</legend>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <label class="form-control-label">
                                                                    Work Order Number
                                                                </label>
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('id', 'project_title')
                                                                    @slot('text', $project->no_wo)
                                                                @endcomponent
                                                            </div>
                                                        </div>

                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <label class="form-control-label">
                                                                    Address
                                                                </label>
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('id', 'project_title')
                                                                    @slot('text', '..........')
                                                                @endcomponent
                                                            </div>
                                                        </div>

                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <label class="form-control-label">
                                                                    Phone
                                                                </label>
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('id', 'project_title')
                                                                    @slot('text', $attention->phone)
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <label class="form-control-label">
                                                                    Fax
                                                                </label>
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('id', 'project_number')
                                                                    @if($attention->fax != 'null')
                                                                    @slot('text', $attention->fax)
                                                                    @else
                                                                    @slot('text', '-')
                                                                    @endif
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <label class="form-control-label">
                                                                    Attn
                                                                </label>
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', $attention->name)
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <label class="form-control-label">
                                                                    Email
                                                                </label>
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', $attention->email)
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <table class="table table-striped table-bordered second" width="100%" cellpadding="4">
                                                <tr>
                                                    <td align="center" width="14%"><b>Date</b></td>
                                                    <td align="center" width="16%"><b>Project No.</b></td>
                                                    <td align="center" width="28%"><b>Project Title</b></td>
                                                    <td align="center" width="14%"><b>A/C Type</b></td>
                                                    <td align="center" width="14%"><b>A/C Reg</b></td>
                                                    <td align="center" width="14%"><b>A/C SN</b></td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top">{{$project->created_at}}</td>
                                                    <td align="center" valign="top">{{$project->code}}</td>
                                                    <td align="center" valign="top">{{$project->title}}</td>
                                                    <td align="center" valign="top">{{$project->aircraft->name}}</td>
                                                    <td align="center" valign="top">{{$project->aircraft_register}}</td>
                                                    <td align="center" valign="top">{{$project->aircraft_sn}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Additional Project Title 
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('id', 'additional_project_title')
                                                @slot('name', 'additional_project_title')
                                                @slot('text', 'Additional Project Title ')
                                                @slot('id_error', 'additional_project_title')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    <label class="form-control-label">
                                                        Total Manhour
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'estimation_manhour')
                                                        @slot('name', 'estimation_manhour')
                                                        @slot('text', number_format($project->defectcards()->sum('estimation_manhour',2)) )
                                                        @slot('value', $project->defectcards()->sum('estimation_manhour'))
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    <label class="form-control-label">
                                                        Perfomance Factor
                                                    </label>
                                                    @component('frontend.common.input.number')
                                                        @slot('id', 'performance_factor')
                                                        @slot('name', 'performance_factor')
                                                        @if(empty($project->data_defectcard))
                                                            @slot('value', 1.6)
                                                        @else 
                                                            @slot('value', json_decode($project->data_defectcard)->performance_factor)
                                                        @endif
                                                        @slot('id_error', 'performance_factor')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    <label class="form-control-label">
                                                        Total With Performance Factor
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'total_manhour')
                                                        @slot('name', 'total_manhour')
                                                        @if(empty($project->data_defectcard))
                                                            @slot('text', $project->defectcards()->sum('estimation_manhour') * 1.6)
                                                            @slot('value', $project->defectcards()->sum('estimation_manhour') * 1.6)
                                                        @else 
                                                        @slot('text', $project->defectcards()->sum('estimation_manhour') * json_decode($project->data_defectcard)->performance_factor)
                                                        @slot('value', $project->defectcards()->sum('estimation_manhour') * json_decode($project->data_defectcard)->performance_factor)
                                                        @endif
                                                    @endcomponent
                                                    @component('frontend.common.buttons.create_repeater')
                                                        @slot('id', 'update_manhour')
                                                        @slot('name', 'update_manhour')
                                                        @slot('class', 'update_manhour')
                                                        @slot('style', 'margin-top:32.5px')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show routine" data-toggle="tab" href="#" data-target="#m_tabs_1_1">Defect Card List</a>
                                                </li>
                                                <li class="nav-item mat-tool">
                                                    <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">Material & Tool List</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
                                                    @include('frontend.project.hm-additional.defect-card.index')
                                                </div>
                                                <div class="tab-pane mat-tool-additional" id="m_tabs_1_2" role="tabpanel">
                                                    @include('frontend.project.hm-additional.material-tool.index')
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'add-project-additional')
                                                        @slot('class', 'add-project-additional')
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

@push('header-scripts')
    <style>
        #map { height: 200px; }
    </style>
    <style>
        fieldset {
            margin-bottom: 30px;
        }

        .padding-datatable {
            padding: 0px
        }

        .margin-info {
            margin-left: 5px
        }
    </style>
@endpush

@push('footer-scripts')
    <script>
        let project_uuid = '{{$project->uuid}}'
    </script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/frontend/project/hm-additional/create.js')}}"></script>
    <script src="{{ asset('js/frontend/project/hm-additional/item.js')}}"></script>
@endpush

