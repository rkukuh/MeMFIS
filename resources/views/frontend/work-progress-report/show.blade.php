@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Work Progress Report
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
                                Work Progress Report
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
                                    Work Progress Report
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
                                                                    @slot('text', $attention->address)
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
                                                                    @slot('text', $attention->fax)
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <label class="form-control-label">
                                                                    Attention
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
                                                    <td align="center" width="12%"><b>Project No.</b></td>
                                                    <td align="center" width="14%"><b>Date</b></td>
                                                    <td align="center" width="14%"><b>TAT Target</b></td>
                                                    <td align="center" width="18%"><b>Project Title</b></td>
                                                    <td align="center" width="14%"><b>A/C Type</b></td>
                                                    <td align="center" width="14%"><b>A/C Reg</b></td>
                                                    <td align="center" width="14%"><b>A/C SN</b></td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top">{{ $project->code }}</td>
                                                    <td align="center" valign="top">{{ date("D, d-m-Y", strtotime($project->created_at)) }}</td>
                                                    <td align="center" valign="top">{{ $tat }} day(s)</td>
                                                    <td align="center" valign="top">{{ $project->title }}</td>
                                                    <td align="center" valign="top">{{ $project->aircraft->name }}</td>
                                                    <td align="center" valign="top">{{ $project->aircraft_register }}</td>
                                                    <td align="center" valign="top">{{ $project->aircraft_sn }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="m-portlet  m-portlet--full-height ">
                                                <div class="m-portlet__head" style="background:#f79383;">
                                                    <div class="m-portlet__head-caption">
                                                        <div class="m-portlet__head-title">
                                                            <h2 class="m-portlet__head-text" style="color:white;">
                                                                Overall Progress
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-portlet__body">
                                                    <div class="m-widget16">
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="m-widget16__stats">
                                                                    <div class="m-widget16__visual">
                                                                        <div id="m_chart_overall_progress" style="height: 350px">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6 align-self-center">
                                                                <div class="form-group m-form__group row">
                                                                    <div class="col-md-8">
                                                                        <h1 style="font-size: 4rem;text-align:right;">{{ number_format($jobcards["overall_done"]) }} <span style="font-size: 2rem;">of</span>  {{ number_format($jobcards["overall"]) }} <br> <span style="font-size: 2rem;">Task Finished</span></h1>
                                                                    </div>
                                                                </div>
                                                            </div>					 
                                                        </div>	
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <h3 align="right">*Exclude Additional Task</h3>
                                                            </div>
                                                        </div>				 
                                                    </div>			 			 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="m-portlet  m-portlet--full-height ">
                                                <div class="m-portlet__head" style="background:#f79383;">
                                                    <div class="m-portlet__head-caption">
                                                        <div class="m-portlet__head-title">
                                                            <h2 class="m-portlet__head-text" style="color:white;">
                                                                Routine
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-portlet__body">
                                                    <div class="m-widget16">
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="m-widget16__stats">
                                                                    <div class="m-widget16__visual">
                                                                        <div id="m_chart_routine" style="height: 150px">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6 align-self-center">
                                                                <div class="form-group m-form__group row">
                                                                    <div class="col-md-8">
                                                                        <h1 style="font-size: 2rem;text-align:right;">{{ number_format($jobcards["routine_done"]) }} <span style="font-size: 1rem;">of</span>  {{ number_format($jobcards["routine"]) }} <br> <span style="font-size: 1rem;">Task Finished</span></h1>
                                                                    </div>
                                                                </div>
                                                            </div>					 
                                                        </div>	
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <h6 align="right">*Exclude Additional Task</h6>
                                                            </div>
                                                        </div>				 
                                                    </div>			 			 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="m-portlet  m-portlet--full-height ">
                                                <div class="m-portlet__head" style="background:#f79383;">
                                                    <div class="m-portlet__head-caption">
                                                        <div class="m-portlet__head-title">
                                                            <h2 class="m-portlet__head-text" style="color:white;">
                                                                Non Routine
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-portlet__body">
                                                    <div class="m-widget16">
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="m-widget16__stats">
                                                                    <div class="m-widget16__visual">
                                                                        <div id="m_chart_non_routine" style="height: 150px">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6 align-self-center">
                                                                <div class="form-group m-form__group row">
                                                                    <div class="col-md-8">
                                                                        <h1 style="font-size: 2rem;text-align:right;">{{ number_format($jobcards["non_routine_done"]) }} <span style="font-size: 1rem;">of</span>  {{ number_format($jobcards["non_routine"]) }} <br> <span style="font-size: 1rem;">Task Finished</span></h1>
                                                                    </div>
                                                                </div>
                                                            </div>					 
                                                        </div>	
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <h6 align="right">*Exclude Additional Task</h6>
                                                            </div>
                                                        </div>				 
                                                    </div>			 			 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show routine" data-toggle="tab" href="#" data-target="#m_tabs_1_1">Routine Taskcard</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link non-routine" data-toggle="tab" href="#m_tabs_1_2">Non Routine Taskcard</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3">Additonal Taskcard</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
                                                    @include('frontend.work-progress-report.routine.index')
                                                </div>
                                                <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                                                    @include('frontend.work-progress-report.nonroutine.index')
                                                </div>
                                                <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                                                    @include('frontend.work-progress-report.additional.index')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="m-portlet m-portlet--mobile">
                                                    <div class="m-portlet__body">
                                                        <div class="row align-items-center">
                                
                                                            <div class="col-xl-8 order-2 order-xl-1">
                                                                <div class="form-group m-form__group row align-items-center">
                                                                    <div class="col-md-2">
                                                                        @include('frontend.common.buttons.filter')
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="m-input-icon m-input-icon--left">
                                                                            <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                                                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                                <span><i class="la la-search"></i></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                
                                                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                            </div>
                                
                                                        </div>
                                                        <div class="col-lg-12">
                                                            @include('frontend.work-progress-report.filter')
                                                        </div>
                                                        <div class="work_progress_report_datatable" id="scrolling_both"></div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.back')
                                                        @slot('href', route('frontend.workpackage.index'))
                                                    @endcomponent
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
        let project_uuid = '{{ $project->uuid }}';
    </script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/frontend/work-progress-report/show.js') }}"></script>
@endpush

