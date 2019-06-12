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
            </div>ewe
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
                                        Engineering Order Task Card
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

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $taskcard->number)
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Type @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $taskcard->type->name)
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Company Task Number   @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', '$taskcard->number')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Revision @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $taskcard->revision)
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Reference @include('frontend.common.label.optional')
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $taskcard->reference)
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Title @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $taskcard->title)
                                                @endcomponent

                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Effectivity (A/C Type) @include('frontend.common.label.required')
                                                </label>


                                                <div>
                                                    @if ($taskcard->aircrafts->isEmpty())
                                                        @include('frontend.common.label.data-info-nodata')
                                                    @else
                                                        @foreach ($taskcard->aircrafts  as $aircraft)
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
                                                    Category @include('frontend.common.label.required')
                                                </label>

                                                @if (empty($taskcard->category_id))
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                    <div style="background-color:beige; padding:15px;" class="">
                                                        @foreach($taskcard->related_to  as $related)
                                                            {{ $related->number }},
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Task Card Attachment @include('frontend.common.label.required')
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
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Documents library @include('frontend.common.label.optional')
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Thresholds @include('frontend.common.label.optional')
                                                </label>

                                                @if ($taskcard->thresholds->isEmpty())
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                <div style="background-color:beige; padding:15px;" class="">
                                                    @foreach($taskcard->thresholds as $threshold)
                                                        {{ $threshold->amount }} {{ $threshold->type->name }},
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Repeats @include('frontend.common.label.optional')
                                                </label>

                                                @if ($taskcard->repeats->isEmpty())
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                <div style="background-color:beige; padding:15px;" class="">
                                                    @foreach($taskcard->repeats as $repeat)
                                                        {{ $repeat->amount }} {{ $repeat->type->name }},
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Scheduled Priority @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @if( $taskcard->scheduled_priority_id == 77)
                                                        @slot('text', 'Next check / shop visit')
                                                    @elseif( $taskcard->scheduled_priority_id == 78)
                                                        @slot('text', 'Next heavy maintenance visit')
                                                    @elseif( $taskcard->scheduled_priority_id == 78)
                                                        @slot('text', 'As scheduled by PPC')
                                                    @else
                                                        @slot('text', 'Next heavy maintenance visit')
                                                    @endif
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6" id="prior_to">
                                                <label class="form-control-label" style="margin-top:13px">
                                                </label>
                                                @if($taskcard->scheduled_priority_amount)
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $taskcard->scheduled_priority_amount)
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $taskcard->scheduled_priority_type)
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row" >
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Recurrence @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @if( $taskcard->recurrence_id == 74)
                                                        @slot('text', 'One-Time')
                                                    @elseif( $taskcard->recurrence_id == 75)
                                                        @slot('text', 'As Required')
                                                    @else
                                                        @slot('text', 'Repetitive')
                                                    @endif
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6" id="recurrence_div">
                                                <label class="form-control-label" style="margin-top:13px">
                                                </label>

                                                @if($taskcard->recurrence_type)
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $taskcard->recurrence_amount)
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $taskcard->recurrence_type)
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Manuals Affected @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @if( $taskcard->manual_affected_id == 69)
                                                        @slot('text', 'MM')
                                                    @elseif( $taskcard->manual_affected_id == 70)
                                                        @slot('text', 'IPC')
                                                    @elseif( $taskcard->manual_affected_id == 71)
                                                        @slot('text', 'WDM')
                                                    @elseif( $taskcard->manual_affected_id == 72)
                                                        @slot('text', 'OHM')
                                                    @else
                                                        @slot('text', 'Other')
                                                    @endif
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="note_div">
                                                <label class="form-control-label" style="margin-top:13px">
                                                </label>

                                                @if($taskcard->manual_affected)
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $taskcard->manual_affected)
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                    Description @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $taskcard->description)
                                                @endcomponent
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
        <div class="row">
            <div class="col-lg-12">
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
                            @include('frontend.task-card.nonroutine.eo.instruction.modal')
                            @include('frontend.task-card.nonroutine.eo.tool.modal')
                            @include('frontend.task-card.nonroutine.eo.item.modal')

                            <div class="instruction_datatable" id="instruction_datatable"></div>
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
    <script src="{{ asset('js/frontend/quotation/address') }}"></script>

    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/taskcard/non-routine/eo/show.js') }}"></script>
@endpush
