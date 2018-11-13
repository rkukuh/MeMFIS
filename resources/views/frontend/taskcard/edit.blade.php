@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Taskcard
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
                        <a href="{{ route('frontend.taskcard.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Material
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-lg-6">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.create-new')

                                <h3 class="m-portlet__head-text">
                                    Taskcard
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
                                                    Title @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('id', 'title')
                                                    @slot('text', 'Title')
                                                    @slot('name', 'title')
                                                    @slot('id_error', 'title')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Taskcard Number @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('id', 'number')
                                                    @slot('text', 'Taskcard Number')
                                                    @slot('name', 'number')
                                                    @slot('id_error', 'number')
                                                @endcomponent
                                            </div>

                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Type @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('text', 'Type')
                                                    @slot('id', 'taskcard')
                                                    @slot('name', 'taskcard')
                                                    @slot('id_error', 'taskcard')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Otr Certification / Skill @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('text', 'Otr Certification')
                                                    @slot('id', 'otr_certification')
                                                    @slot('name', 'otr_certification')
                                                    @slot('id_error', 'otr-certification')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Zone @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('id', 'zone')
                                                    @slot('text', 'Zone')
                                                    @slot('name', 'zone')
                                                    @slot('id_error', 'zone')
                                                @endcomponent
                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Access @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('text', 'Access')
                                                    @slot('id', 'access')
                                                    @slot('name', 'access')
                                                    @slot('id_error', 'access')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Applicability Airplane @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('text', 'Applicability Airplane')
                                                    @slot('id', 'applicability_airplane')
                                                    @slot('name', 'applicability_airplane')
                                                    @slot('id_error', 'applicability-airplane')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Applicability Engine @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('id', 'applicability_engine')
                                                    @slot('text', 'Applicability Engine')
                                                    @slot('name', 'applicability_engine')
                                                    @slot('id_error', 'applicability-engine')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Work Area @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('text', 'Work Area')
                                                    @slot('id', 'work_area')
                                                    @slot('name', 'work_area')
                                                    @slot('id_error', 'work-area')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">

                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'is_applicability_engine_all')
                                                    @slot('name', 'is_applicability_engine_all')
                                                    @slot('text', 'Engine All?')
                                                    @slot('style_div','margin-top:20px')
                                                @endcomponent
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'is_rii')
                                                    @slot('name', 'is_rii')
                                                    @slot('text', 'RII?')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Aircraft @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('text', 'Aircraft Taskcard')
                                                    @slot('id', 'aircraft_taskcard')
                                                    @slot('name', 'aircraft_taskcard')
                                                    @slot('id_error', 'aircraft-taskcard')
                                                    @slot('multiple','multiple')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Old Tasckcard Reference @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('id', 'relationship')
                                                    @slot('text', 'Taskcard Relationship')
                                                    @slot('name', 'relationship')
                                                    @slot('id_error', 'taskcard-relationship')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Source @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('id', 'source')
                                                    @slot('text', 'Source')
                                                    @slot('name', 'source')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Effectifity @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('text', 'Effectifity')
                                                    @slot('id', 'effectifity')
                                                    @slot('name', 'effectifity')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                    Description @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.textarea')
                                                    @slot('rows', '3')
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
                                                        @component('frontend.common.buttons.update')
                                                            @slot('type', 'button')
                                                            @slot('id', 'edit-taskcard')
                                                            @slot('class', 'edit-taskcard')
                                                        @endcomponent
    
                                                        @include('frontend.common.buttons.reset')

                                                        @component('frontend.common.buttons.back')
                                                            @slot('href', route('frontend.taskcard.index'))
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
            <div class="col-lg-6">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Item Taskcard 
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        @component('frontend.common.buttons.create-new')
                                            @slot('text', 'Item Taskcard')
                                            @slot('id', 'item_taskcard')
                                            @slot('data_target', '#modal_item')
                                        @endcomponent
    
                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
    
                            @include('frontend.taskcard.item.modal')
    
                            <div class="item_datatable" id="item_datatable"></div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
    
                                @include('frontend.common.label.datalist')
    
                                <h3 class="m-portlet__head-text">
                                    Threshold Taskcard 
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        @component('frontend.common.buttons.create-new')
                                            @slot('text', 'Threshold Taskcard')
                                            @slot('id', 'threshold_taskcard')
                                            @slot('data_target', '#modal_threshold')
                                        @endcomponent
        
                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
        
                            @include('frontend.taskcard.threshold.modal')
        
                            <div class="threshold_datatable" id="item_datatable"></div>
                        </div>
                    </div>
                </div>
                    <div class="m-portlet">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide">
                                            <i class="la la-gear"></i>
                                        </span>
        
                                        @include('frontend.common.label.datalist')
        
                                        <h3 class="m-portlet__head-text">
                                            Repeat Taskcard 
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet m-portlet--mobile">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                        <div class="row align-items-center">
                                            <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                                @component('frontend.common.buttons.create-new')
                                                    @slot('text', 'Repeat Taskcard')
                                                    @slot('id', 'repeat_taskcard')
                                                    @slot('data_target', '#modal_repeat')
                                                @endcomponent
            
                                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                                            </div>
                                        </div>
                                    </div>
            
                                    @include('frontend.taskcard.repeat.modal')
            
                                    <div class="repeat_datatable" id="item_datatable"></div>
                                </div>
                            </div>
                        </div>
            </div>
            
        </div>
    </div>
@endsection

@push('header-scripts')
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
        let taskcard_uuid = "$taskcard->uuid";
    </script>

    <script src="{{ asset('js/frontend/functions/select2/taskcard.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/work-area.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/threshold-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/repeat-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/applicability-engine.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/aircraft-taskcard.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/taskcard-relationship.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/item.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/item.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/unit-item-uom.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-item-uom.js') }}"></script>

    <script src="{{ asset('js/frontend/taskcard/edit.js') }}"></script>
    <script src="{{ asset('js/frontend/taskcard/form-reset.js') }}"></script>
@endpush
