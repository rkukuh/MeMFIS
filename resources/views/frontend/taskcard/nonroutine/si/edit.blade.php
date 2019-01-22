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
                                    Special Instruction Task Card
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
                                                    Special Instruction Number @include('frontend.common.label.required')
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

                                        </div>
                                        <div class="form-group m-form__group row">
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
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    A/C Type @include('frontend.common.label.required')
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
                                        </div>
                                        <div class="form-group m-form__group row">
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
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                    Instruction @include('frontend.common.label.required')
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

                            @include('frontend.taskcard.nonroutine.si.tool.modal')

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

                            @include('frontend.taskcard.nonroutine.si.item.modal')

                            <div class="item_datatable" id="item_datatable"></div>
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

    <script src="{{ asset('js/frontend/functions/select2/unit-material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/unit-tool.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-tool.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/work-area.js') }}"></script>

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

    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/version.js') }}"></script>

    <script src="{{ asset('js/frontend/taskcard/non-routine/si/edit.js') }}"></script>

    {{-- <script src="{{ asset('js/frontend/taskcard/form-reset.js') }}"></script> --}}
@endpush
