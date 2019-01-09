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
                                        Engineering Order Taskcard
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
                                                    EO Number  @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('id', 'number')
                                                    @slot('text', 'Taskcard Number')
                                                    @slot('name', 'number')
                                                    @slot('id_error', 'number')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Type @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('text', 'Taskcard Type')
                                                    @slot('id', 'taskcard_non_routine_type')
                                                    @slot('name', 'taskcard_non_routine_type')
                                                    @slot('id_error', 'taskcard_non_routine_type')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Revision @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('id', 'revision')
                                                    @slot('text', 'Revision')
                                                    @slot('name', 'revision')
                                                    @slot('id_error', 'revision')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Reference @include('frontend.common.label.optional')
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
                                                    Effectivity (A/C Type) @include('frontend.common.label.required')
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
                                                    Category @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('id', 'category')
                                                    @slot('text', 'Category')
                                                    @slot('name', 'category')
                                                    @slot('id_error', 'category')
                                                @endcomponent

                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Task Card Attachment @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.upload')
                                                    @slot('text', 'Taskcard')
                                                    @slot('id', 'taskcard')
                                                    @slot('name', 'taskcard')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Scheduled Priority @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('id', 'scheduled_priority_id')
                                                    @slot('text', 'Scheduled Priority')
                                                    @slot('name', 'scheduled_priority_id')
                                                    @slot('id_error', 'scheduled_priority_id')
                                                @endcomponent

                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="prior_to">
                                                <label class="form-control-label" style="margin-top:13px">
                                                </label>

                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                                        @component('frontend.common.input.radio')
                                                            @slot('id', 'prior_to_date')
                                                            @slot('name', 'prior_to')
                                                            @slot('disabled', 'disabled')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                                        @component('frontend.common.input.datepicker')
                                                            @slot('id', 'date')
                                                            @slot('text', 'date')
                                                            @slot('name', 'date')
                                                            @slot('disabled', 'disabled')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                                        @component('frontend.common.input.radio')
                                                            @slot('id', 'prior_to_hours')
                                                            @slot('name', 'prior_to')
                                                            @slot('disabled', 'disabled')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                                        @component('frontend.common.input.number')
                                                            @slot('id', 'hour')
                                                            @slot('text', 'hour')
                                                            @slot('name', 'hour')
                                                            @slot('disabled', 'disabled')
                                                            @slot('input_append', 'Hours')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                                        @component('frontend.common.input.radio')
                                                            @slot('id', 'prior_to_cycle')
                                                            @slot('name', 'prior_to')
                                                            @slot('disabled', 'disabled')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                                        @component('frontend.common.input.number')
                                                            @slot('id', 'cycle')
                                                            @slot('text', 'cycle')
                                                            @slot('name', 'cycle')
                                                            @slot('disabled', 'disabled')
                                                            @slot('input_append', 'Cycle')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row" >
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Recurrence @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('id', 'recurrence_id')
                                                    @slot('text', 'Recurrence Id')
                                                    @slot('name', 'recurrence_id')
                                                    @slot('id_error', 'recurrence_id')
                                                @endcomponent

                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6  hidden" id="recurrence_div">
                                                <label class="form-control-label" style="margin-top:13px">
                                                </label>

                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        @component('frontend.common.input.number')
                                                            @slot('id', 'recurrence')
                                                            @slot('text', 'Recurrence')
                                                            @slot('name', 'recurrence')
                                                            @slot('disabled', 'disabled')
                                                            @slot('id_error', 'recurrence')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <select id="recurrence-select" name="recurrence-select" id="recurrence-select" class="form-control" disabled>
                                                            <option value="">
                                                                Select a Recurrence
                                                            </option>
                                                            <option value="cyrcle">
                                                                Cycle
                                                            </option>
                                                            <option value="hourly">
                                                                Hourly
                                                            </option>
                                                            <option value="daily">
                                                                Daily
                                                            </option>
                                                            <option value="yearly">
                                                                Yearly
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Manuals Affected @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('id', 'manual_affected_id')
                                                    @slot('text', 'Manual Affected')
                                                    @slot('name', 'manual_affected_id')
                                                    @slot('id_error', 'manual_affected_id')
                                                @endcomponent

                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="note_div">
                                                <label class="form-control-label" style="margin-top:13px">
                                                </label>

                                                @component('frontend.common.input.textarea')
                                                    @slot('rows', '3')
                                                    @slot('id', 'note')
                                                    @slot('name', 'note')
                                                    @slot('text', 'Note')
                                                    @slot('disabled', 'disabled')
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
                                    Instructions
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
                                            @slot('text', 'Instructions')
                                            @slot('id', 'instructions')
                                            @slot('data_target', '#modal_instruction')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            @include('frontend.taskcard.nonroutine.eo.instruction.modal')
                            @include('frontend.taskcard.nonroutine.eo.tool.modal')
                            @include('frontend.taskcard.nonroutine.eo.item.modal')

                            <div class="tool_datatable" id="tool_datatable"></div>
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
        let taskcard_uuid = "$taskcard->uuid";
    </script>

    <script src="{{ asset('js/frontend/functions/select2/work-area.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/work-area.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/taskcard-non-routine-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-non-routine-type.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/otr-certification.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/taskcard-relationship.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-relationship.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/category.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/category-taskcard.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/scheduled-priority.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/scheduled-priority.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/recurrence.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/recurrence.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/manual-affected.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/manual-affected.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/unit-item-uom.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-item-uom.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/item.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/item.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/tool.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/tool.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>

    <script src="{{ asset('js/frontend/taskcard/edit.js') }}"></script>
    <script src="{{ asset('js/frontend/taskcard/form-reset.js') }}"></script>
@endpush
