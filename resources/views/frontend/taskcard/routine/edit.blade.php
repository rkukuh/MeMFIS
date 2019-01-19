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

                                @include('frontend.common.label.edit')

                                <h3 class="m-portlet__head-text">
                                    Routine Task Card
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
                                                Task Card Number @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'number')
                                                @slot('text', 'Taskcard Number')
                                                @slot('name', 'number')
                                                @slot('value', $taskcard->number)
                                                @slot('id_error', 'number')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Type @include('frontend.common.label.required')
                                            </label>

                                            <select id="taskcard_routine_type" name="taskcard_routine_type" class="form-control m-select2">
                                                <option value="">
                                                    &mdash; Select a Taskcard Routine Type &mdash;
                                                </option>

                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}"
                                                        @if ($type->id == $taskcard->type_id) selected @endif>
                                                        {{ $type->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Title @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'title')
                                                @slot('text', 'Title')
                                                @slot('name', 'title')
                                                @slot('value', $taskcard->title)
                                                @slot('id_error', 'title')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Aircraft Applicability @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('text', 'Applicability Airplane')
                                                @slot('id', 'applicability_airplane')
                                                @slot('name', 'applicability_airplane')
                                                @slot('multiple','multiple')
                                                @slot('id_error', 'applicability-airplane')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Task @include('frontend.common.label.required')
                                            </label>

                                            <select id="task_type_id" name="task_type_id" class="form-control m-select2">
                                                <option value="">
                                                    &mdash; Select a Taskcard &mdash;
                                                </option>

                                                @foreach ($tasks as $task)
                                                    <option value="{{ $task->id }}"
                                                        @if ($task->id == $taskcard->task_type_id) selected @endif>
                                                        {{ $task->name }}
                                                    </option>
                                                @endforeach
                                            </select>

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
                                                        Manhour @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.decimal')
                                                        @slot('id', 'manhour')
                                                        @slot('text', 'Manhour')
                                                        @slot('name', 'manhour')
                                                        @slot('value', $taskcard->manhour)
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Performa Factor @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.decimal')
                                                        @slot('id', 'performa')
                                                        @slot('text', 'Performa')
                                                        @slot('name', 'performa')
                                                        @slot('value', '1')
                                                        @slot('value', $taskcard->performance_factor)
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            @component('frontend.common.input.checkbox')
                                                @slot('id', 'is_rii')
                                                @slot('name', 'is_rii')
                                                @slot('text', 'RII?')
                                                @if ($taskcard->is_rii == 1)
                                                    @slot('checked', 'checked')
                                                @endif
                                                @slot('style_div','margin-top:30px')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Helper Quantity @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.number')
                                                @slot('id', 'helper_quantity')
                                                @slot('text', 'Helper Quantity')
                                                @slot('name', 'helper_quantity')
                                                @slot('value', $taskcard->helper_quantity)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Work Area @include('frontend.common.label.optional')
                                            </label>

                                            <select id="work_area" name="work_area" class="form-control m-select2">
                                                <option value="">
                                                    &mdash; Select a Work Area &mdash;
                                                </option>

                                                @foreach ($work_areas as $work_area)
                                                    <option value="{{ $work_area->id }}"
                                                        @if ($work_area->id == $taskcard->work_area) selected @endif>
                                                        {{ $work_area->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Access @include('frontend.common.label.optional-multiple')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('text', 'Access')
                                                @slot('id', 'access')
                                                @slot('name', 'access')
                                                @slot('id_error', 'access')
                                                @slot('multiple','multiple')
                                            @endcomponent

                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Zone @include('frontend.common.label.optional-multiple')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'zone')
                                                @slot('text', 'Zone')
                                                @slot('name', 'zone')
                                                @slot('id_error', 'zone')
                                                @slot('multiple','multiple')
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
                                                @slot('value', $taskcard->source)
                                            @endcomponent

                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Related Card @include('frontend.common.label.optional-multiple')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'relationship')
                                                @slot('text', 'Taskcard Relationship')
                                                @slot('name', 'relationship')
                                                @slot('multiple','multiple')
                                                @slot('id_error', 'taskcard-relationship')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Version @include('frontend.common.label.optional-multiple')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'version')
                                                @slot('text', 'Version')
                                                @slot('name', 'version')
                                                @slot('multiple','multiple')
                                                @slot('id_error', 'version')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Effectivity @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('text', 'Effectifity')
                                                @slot('id', 'effectifity')
                                                @slot('name', 'effectifity')
                                                @slot('value', $taskcard->effectivity)
                                            @endcomponent
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
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '20')
                                                @slot('id', 'description')
                                                @slot('name', 'description')
                                                @slot('text', 'Description')
                                                @slot('value', $taskcard->description)
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
            <div class="col-lg-5">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Tool Requireds
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-tools-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        @component('frontend.common.buttons.create-new')
                                            @slot('text', 'Tool Taskcard')
                                            @slot('id', 'tool_taskcard')
                                            @slot('data_target', '#modal_tool')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            @include('frontend.taskcard.routine.tool.modal')

                            <div class="tool_datatable" id="tool_datatable"></div>
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
                                    Material Requireds
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

                            @include('frontend.taskcard.routine.item.modal')

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
                                    Threshold Taskcards
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

                            @include('frontend.taskcard.routine.threshold.modal')

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
                                            Repeat Taskcards
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

                                    @include('frontend.taskcard.routine.repeat.modal')

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
        textarea {
            min-height: 5em;
            width: 100%;
        }

    </style>
@endpush

@push('footer-scripts')
    <script>
        var autoExpand = function (field) {

        // Reset field height
        field.style.height = 'inherit';

        // Get the computed styles for the element
        var computed = window.getComputedStyle(field);

        // Calculate the height
        var height = parseInt(computed.getPropertyValue('border-top-width'), 10)
                    + parseInt(computed.getPropertyValue('padding-top'), 10)
                    + field.scrollHeight
                    + parseInt(computed.getPropertyValue('padding-bottom'), 10)
                    + parseInt(computed.getPropertyValue('border-bottom-width'), 10);

        field.style.height = height + 'px';

        };

        document.addEventListener('input', function (event) {
        if (event.target.tagName.toLowerCase() !== 'textarea') return;
        autoExpand(event.target);
        }, false);
    </script>
    <script>
        let taskcard_uuid = '{{$taskcard->uuid}}';
    </script>

    <script src="{{ asset('js/frontend/functions/select2/ac-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/zone.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/zone.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/access.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/access.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/taskcard-routine-type.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-routine-type.js') }}"></script> --}}

    <script src="{{ asset('js/frontend/functions/select2/task-type.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/functions/fill-combobox/task-type.js') }}"></script> --}}

    <script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/otr-certification.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/work-area.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/functions/fill-combobox/work-area.js') }}"></script> --}}

    <script src="{{ asset('js/frontend/functions/select2/threshold-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/threshold-type.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/repeat-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/repeat-type.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/applicability-engine.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/applicability-engine.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/aircraft-taskcard.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/aircraft-taskcard.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/taskcard-relationship.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-relationship.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/version.js') }}"></script>

    <script src="{{ asset('js/frontend/taskcard/routine/edit.js') }}"></script>

    <script src="{{ asset('js/frontend/taskcard/form-reset.js') }}"></script>
@endpush
