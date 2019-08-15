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
        <div class="col-lg-7">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            @include('frontend.common.label.create-new')

                            <h3 class="m-portlet__head-text">
                                Routine Task Card
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <form id="taskcardform" name="taskcardform">
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
                                            Task Card Number @include('frontend.common.label.required')
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
                                            Company Task Number @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.text')
                                            @slot('id', 'company_number')
                                            @slot('text', 'Company Task Number')
                                            @slot('name', 'company_number')
                                            @slot('id_error', 'company_number')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Type @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.select2')
                                            @slot('text', 'Taskcard Type')
                                            @slot('id', 'taskcard_routine_type')
                                            @slot('name', 'taskcard_routine_type')
                                            @slot('id_error', 'taskcard_routine_type')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Aircraft Applicability @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.select2')
                                            @slot('text', 'Applicability Airplane')
                                            @slot('id', 'applicability_airplane')
                                            @slot('name', 'applicability_airplane')
                                            @slot('multiple','multiple')
                                            @slot('help_text','You can chose multiple value')
                                            @slot('id_error', 'applicability-airplane')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    ATA @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('id', 'ata')
                                                    @slot('text', 'ATA')
                                                    @slot('name', 'ata')
                                                    @slot('id_error', 'ata')
                                                @endcomponent
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Task @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.select2')
                                            @slot('text', 'Task')
                                            @slot('id', 'task_type_id')
                                            @slot('name', 'task_type_id')
                                            @slot('id_error', 'task_type_id')
                                        @endcomponent

                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Skill @include('frontend.common.label.required')
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
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Manhour Estimation @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.decimal')
                                                    @slot('id', 'manhour')
                                                    @slot('text', 'Manhour')
                                                    @slot('name', 'manhour')
                                                    @slot('id_error', 'manhour')
                                                    @slot('min', '0')
                                                    @slot('value', '1')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Performance Factor
                                                </label>

                                                @component('frontend.common.input.decimal')
                                                    @slot('id', 'performa')
                                                    @slot('text', 'Performa')
                                                    @slot('name', 'performa')
                                                    @slot('value', '1')
                                                    @slot('id_error', 'performa')
                                                    @slot('min', '0')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Engineer Quantity @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.number')
                                                    @slot('id', 'engineer_quantity')
                                                    @slot('text', 'Engineer Quantity')
                                                    @slot('name', 'engineer_quantity')
                                                    @slot('value', '1')
                                                    @slot('min', '1')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Helper Quantity @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.number')
                                                    @slot('id', 'helper_quantity')
                                                    @slot('text', 'Helper Quantity')
                                                    @slot('name', 'helper_quantity')
                                                    @slot('value', '0')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Work Area @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.select2')
                                            @slot('text', 'Work Area')
                                            @slot('id', 'work_area')
                                            @slot('name', 'work_area')
                                            @slot('id_error', 'work-area')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Access @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.select2')
                                            @slot('text', 'Access')
                                            @slot('id', 'access')
                                            @slot('name', 'access')
                                            @slot('id_error', 'access')
                                            @slot('multiple','multiple')
                                            @slot('help_text','You can chose multiple value')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Zone @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.select2')
                                            @slot('id', 'zone')
                                            @slot('text', 'Zone')
                                            @slot('name', 'zone')
                                            @slot('id_error', 'zone')
                                            @slot('multiple','multiple')
                                            @slot('help_text','You can chose multiple value')
                                        @endcomponent
                                    </div>
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
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Related Card @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.select2')
                                            @slot('id', 'relationship')
                                            @slot('text', 'Taskcard Relationship')
                                            @slot('name', 'relationship')
                                            @slot('multiple','multiple')
                                            @slot('id_error', 'taskcard-relationship')
                                            @slot('help_text','You can chose multiple value')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Version @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('id', 'version')
                                                    @slot('text', 'Version')
                                                    @slot('name', 'version')
                                                    @slot('multiple','multiple')
                                                    @slot('id_error', 'version')
                                                    @slot('help_text','You can chose multiple value')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Effectivity @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('text', 'Effectivity')
                                                    @slot('id', 'effectivity')
                                                    @slot('name', 'effectivity')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Task Card Attachment @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.upload')
                                            @slot('text', 'Taskcard')
                                            @slot('id', 'taskcard')
                                            @slot('name', 'taskcard')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Documents library @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.text')
                                            @slot('text', 'Document')
                                            @slot('id', 'document')
                                            @slot('name', 'document')
                                            @slot('id_error', 'document')
                                        @endcomponent

                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="stringer_div">
                                        <label class="form-control-label">
                                            Stringer @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.text')
                                            @slot('id', 'stringer')
                                            @slot('text', 'Stringer')
                                            @slot('name', 'stringer')
                                            @slot('id_error', 'stringer')
                                        @endcomponent
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="station_div">
                                        <label class="form-control-label">
                                            Station @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.text')
                                            @slot('id', 'station')
                                            @slot('text', 'Station')
                                            @slot('name', 'station')
                                            @slot('id_error', 'station')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="service_bulletin_div">
                                        <label class="form-control-label">
                                            Ref. Service Bulletins @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.text')
                                            @slot('id', 'service_bulletin')
                                            @slot('text', 'Service Bulletins')
                                            @slot('name', 'service_bulletin')
                                        @endcomponent

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="section_div">
                                        <label class="form-control-label">
                                            Section(s) @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.select2')
                                            @slot('id', 'section')
                                            @slot('text', 'Section')
                                            @slot('name', 'section')
                                            @slot('id_error', 'section')
                                            @slot('multiple','multiple')
                                            @slot('help_text','You can chose multiple value')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label" id="threshold">
                                            Threshold @include('frontend.common.label.optional')
                                        </label>
                                        <table class="threshold">
                                            <tr>
                                                <td width="45%"><input type="number" required="required" class="form-control" name="threshold_amount[]" /></td>
                                                <td width="50%"><select name="threshold_type[]" class="select form-control js-example-tags">
                                                        <option value="Select Threshold">Select</option>
                                                        @foreach ($MaintenanceCycles as $maintenanceCycle)
                                                        <option value="{{$maintenanceCycle->uuid}}">{{$maintenanceCycle->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="form-control-feedback text-danger"></div>
                                                </td>
                                                <td width="5%">
                                                    @component('frontend.common.buttons.create_repeater')
                                                        @slot('id', 'addrow')
                                                    @endcomponent
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Repeat @include('frontend.common.label.optional')
                                        </label>
                                        <table class="repeat">
                                            <tr>
                                                <td width="45%"><input type="number" required="required" class="form-control" name="repeat_amount[]" /></td>
                                                <td width="50%"><select name="repeat_type[]" class="select form-control js-example-tags">
                                                        <option value="Select Repeat">Select</option>
                                                        @foreach ($MaintenanceCycles as $maintenanceCycle)
                                                        <option value="{{$maintenanceCycle->uuid}}">{{$maintenanceCycle->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="form-control-feedback text-danger"></div>

                                                </td>
                                                <td width="5%">
                                                    @component('frontend.common.buttons.create_repeater')
                                                        @slot('id', 'addrow2')
                                                    @endcomponent
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Instruction @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.textarea')
                                            @slot('rows', '20')
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
                                                    @slot('id', 'add-taskcard')
                                                    @slot('class', 'add-taskcard')
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
        <div class="col-lg-5">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            <h3 class="m-portlet__head-text">
                                Tools Requirement
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
                                        @slot('attribute', 'disabled')
                                    @endcomponent

                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>
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

                            <h3 class="m-portlet__head-text">
                                Materials Requirement
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
                                        @slot('attribute', 'disabled')
                                    @endcomponent

                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet hidden">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            <h3 class="m-portlet__head-text">
                                Threshold
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
                                        @slot('attribute', 'disabled')
                                    @endcomponent

                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet hidden">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            <h3 class="m-portlet__head-text">
                                Repeat
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
                                        @slot('attribute', 'disabled')
                                    @endcomponent

                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>
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

    textarea {
        min-height: 5em;
        width: 100%;
    }
</style>
@endpush

@push('footer-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('js/frontend/functions/select2/ac-type.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/zone.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/zone.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/access.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/access.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/taskcard-routine-type.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-routine-type.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/task-type.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/task-type.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/aircraft-taskcard.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/aircraft-taskcard.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/otr-certification.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/work-area.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/work-area.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/threshold-type.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/threshold-type.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/repeat-type.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/repeat-type.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/applicability-engine.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/applicability-engine.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/taskcard-relationship.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-relationship.js') }}"></script>

<!-- <script src="{{ asset('js/frontend/functions/select2/documents-library.js') }}"></script> -->

<script src="{{ asset('js/frontend/functions/select2/section.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/section.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/version.js') }}"></script>

<script src="{{ asset('js/frontend/taskcard/routine/create.js') }}"></script>

<script src="{{ asset('js/frontend/taskcard/routine/form-reset.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".js-example-tags").select2();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var counter = 0;
        var maintenanceCycles = {!!json_encode($MaintenanceCycles->toArray())!!}
        $("#addrow").on("click", function() {
            var x = 1;
            var newRow = $("<tr>");
            var cols = "";
            x = x + 1;
            cols += '<td width="45%"><input type="text" required="required" class="form-control" name="threshold_amount[]"/></td>';
            cols += '<td width="50%"><select name="threshold_type[]" class="select form-control ">';
            cols += '<option value="Select Threshold">Select </option>';
            for (var i = 0; i < (maintenanceCycles.length - 1); i++) {
                if (maintenanceCycles[i].id == 1) {} else {
                    cols += '<option value="' + maintenanceCycles[i].uuid + '" >' + maintenanceCycles[i].name + ' </option>';
                }
            };
            cols += '</select><div class="form-control-feedback text-danger"></div></td>';
            cols += '<td width="5%"><div data-repeater-delete="" class="btn btn-danger btn-sm ibtnDel" value="Delete"><span><i class="la la-trash-o"></i></span></div></td>';
            newRow.append(cols);
            $("table.threshold").append(newRow);
            $('.select').select2();
            counter++;
        });
        $("table.threshold").on("click", ".ibtnDel", function(event) {
            if (counter >= 1) {
                $(this).closest("tr").remove();
                counter -= 1
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var counter = 0;
        var maintenanceCycles = {!!json_encode($MaintenanceCycles->toArray())!!}
        $("#addrow2").on("click", function() {
            var x = 1;
            var newRow = $("<tr>");
            var cols = "";
            x = x + 1;
            cols += '<td width="45%"><input type="text" required="required" class="form-control"  name="repeat_amount[]"/></td>';
            cols += '<td width="50%"><select name="repeat_type[]" class="select form-control ">';
            cols += '<option value="Select Repeat">Select</option>';
            for (var i = 0; i < (maintenanceCycles.length - 1); i++) {
                if (maintenanceCycles[i].id == 1) {} else {
                    cols += '<option value="' + maintenanceCycles[i].uuid + '" >' + maintenanceCycles[i].name + ' </option>';
                }
            };
            cols += '</select><div class="form-control-feedback text-danger"></div></td>';
            cols += '<td width="5%"><div data-repeater-delete="" class="btn btn-danger btn-sm ibtnDel" value="Delete"><span><i class="la la-trash-o"></i></span></div></td>';
            newRow.append(cols);
            $("table.repeat").append(newRow);
            $('.select').select2();
            counter++;
        });
        $("table.repeat").on("click", ".ibtnDel", function(event) {
            if (counter >= 1) {
                $(this).closest("tr").remove();
                counter -= 1
            }
        });
    });
</script>
<script type="text/javascript">
    let simpan = $('.save').on('click', function() {

        var usertype = [];
        $("select[name=maintenanceCycle]").each(function() {
            usertype.push($(this).val());
        });


        var ajaxdata = {
            "UserType": usertype
        };

        // console.log(JSON.stringify(ajaxdata));
    });
</script>
@endpush
