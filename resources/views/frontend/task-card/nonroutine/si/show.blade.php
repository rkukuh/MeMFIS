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

                                @include('frontend.common.label.show')

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

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $taskCard->number)
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Title @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $taskCard->title)
                                                @endcomponent
                                            </div>

                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Company Task Number @include('frontend.common.label.optional')
                                                </label>

                                                @if (empty($taskCard->additionals))
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', json_decode($taskCard->additionals)->internal_number))
                                                    @endcomponent
                                                @endif
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    A/C Type @include('frontend.common.label.required')
                                                </label>

                                                <div>
                                                    @if ($taskCard->aircrafts->isEmpty())
                                                        @include('frontend.common.label.data-info-nodata')
                                                    @else
                                                        @foreach ($taskCard->aircrafts  as $aircraft)
                                                            @component('frontend.common.label.badge')
                                                                @slot('text', $aircraft->name )
                                                            @endcomponent
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Work Area @include('frontend.common.label.optional')
                                                </label>

                                                @if (empty($taskCard->work_area))
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $taskCard->workarea->name)
                                                @endcomponent
                                                @endif
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Skill @include('frontend.common.label.required')
                                                </label>

                                                @if (empty($taskCard->skills))
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                    @component('frontend.common.label.data-info')
                                                        @if(sizeof($taskCard->skills) == 3)
                                                            @slot('text', 'ERI')
                                                        @elseif(sizeof($taskCard->skills) == 1)
                                                            @slot('text', $taskCard->skills[0]->name)
                                                        @else
                                                            @include('frontend.common.label.data-info-nodata')
                                                        @endif
                                                    @endcomponent
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label class="form-control-label">
                                                    Manhour Estimation @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $taskCard->estimation_manhour)
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label class="form-control-label">
                                                    Performance Factor @include('frontend.common.label.required')
                                                </label>

                                                @if (empty($taskCard->performance_factor))
                                                        @include('frontend.common.label.data-info-nodata')
                                                    @else
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $taskCard->performance_factor)
                                                    @endcomponent
                                                @endif
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Engineer Quantity @include('frontend.common.label.optional')
                                                    </label>

                                                    @if (empty($taskCard->engineer_quantity))
                                                        @include('frontend.common.label.data-info-nodata')
                                                    @else
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $taskCard->engineer_quantity)
                                                    @endcomponent
                                                    @endif
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Helper Quantity @include('frontend.common.label.optional')
                                                    </label>

                                                    @if (empty($taskCard->helper_quantity))
                                                        @include('frontend.common.label.data-info-nodata')
                                                    @else
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $taskCard->helper_quantity)
                                                    @endcomponent
                                                    @endif
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Thresholds @include('frontend.common.label.optional')
                                                </label>

                                                @if ($taskCard->thresholds->isEmpty())
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                <div style="background-color:beige; padding:15px;" class="">
                                                    @foreach($taskCard->thresholds as $threshold)
                                                        {{ $threshold->amount }} {{ $threshold->type->name }},
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Repeats @include('frontend.common.label.optional')
                                                </label>

                                                @if ($taskCard->repeats->isEmpty())
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                <div style="background-color:beige; padding:15px;" class="">
                                                    @foreach($taskCard->repeats as $repeat)
                                                        {{ $repeat->amount }} {{ $repeat->type->name }},
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Task Card Attachment @include('frontend.common.label.optional')
                                                </label>

                                                 @if (empty($taskcard->description))
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                    @component('frontend.common.buttons.show-file')
                                                        @slot('text', 'show task card')
                                                        @slot('data_target', '#modal_showtaskcard')
                                                    @endcomponent
                                                    @include('frontend.task-card.modal')
                                                 @endif
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                    Instruction @include('frontend.common.label.required')
                                                </label>

                                                @if (empty($taskCard->description))
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $taskCard->description)
                                                @endcomponent
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                                <div class="flex">
                                                    <div class="action-buttons">
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
                                    Tools Requirement
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">

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
                                    Materials Requirement
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">

                            <div class="item_datatable" id="item_datatable"></div>
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

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Threshold
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">

                            <div class="threshold_datatable" id="item_datatable"></div>
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

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Repeat
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">

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
        let taskcard_uuid = '{{$taskCard->uuid}}';
    </script>

    <script src="{{ asset('js/frontend/functions/select2/unit-material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/unit-tool.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-tool.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/work-area.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/tool.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/tool.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/otr-certification.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/taskcard-relationship.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-relationship.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script> --}}

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

    <script src="{{ asset('js/frontend/taskcard/non-routine/si/show.js') }}"></script>

    {{-- <script src="{{ asset('js/frontend/taskcard/form-reset.js') }}"></script> --}}
@endpush
