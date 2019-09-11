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
                                                Title @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $taskcard->title)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Task Card Number @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $taskcard->number)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Company Task Number @include('frontend.common.label.optional')
                                            </label>
                                            @if (empty($taskcard->additionals))
                                                @include('frontend.common.label.data-info-nodata')
                                            @else
                                                @component('frontend.common.label.data-info')
                                                @if(isset($additionals))
                                                    @slot('text', $additionals->internal_number)
                                                @else
                                                    @slot('text', '-')
                                                @endif
                                                @endcomponent
                                            @endif
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Type @include('frontend.common.label.required')
                                            </label>
                                            @if (empty($taskcard->type->name))
                                                @include('frontend.common.label.data-info-nodata')
                                            @else
                                                <div style="background-color:beige; padding:15px;" class="">
                                                    {{ $taskcard->type->name }},
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Aircraft Applicability @include('frontend.common.label.required')
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
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        ATA @include('frontend.common.label.optional')
                                                    </label>

                                                    @if (empty($taskcard->ata))
                                                        @include('frontend.common.label.data-info-nodata')
                                                    @else
                                                        <div style="background-color:beige; padding:15px;" class="">
                                                            {{ $taskcard->ata }},
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        RII @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @if($taskcard->is_rii == true)
                                                            @slot('text','RII Needed')
                                                        @else
                                                            @slot('text', 'RII Uneeded')
                                                        @endif
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
                                            @if (isset($taskcard->task->name))
                                                <div style="background-color:beige; padding:15px;" class="">
                                                    {{ $taskcard->task->name }},
                                                </div>
                                            @else
                                                @include('frontend.common.label.data-info')
                                            @endif
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Skill @include('frontend.common.label.required')
                                            </label>
                                            @if (empty($taskcard->skills))
                                                @include('frontend.common.label.data-info-nodata')
                                            @else
                                                @component('frontend.common.label.data-info')
                                                    @if(sizeof($taskcard->skills) == 3)
                                                        @slot('text', 'ERI')
                                                    @elseif(sizeof($taskcard->skills) == 1)
                                                        @slot('text', $taskcard->skills[0]->name)
                                                    @else
                                                        @include('frontend.common.label.data-info-nodata')
                                                    @endif
                                                @endcomponent
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Manhour Estimation @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $taskcard->estimation_manhour)
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Performance Factor
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $taskcard->performance_factor)
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

                                                    @if (empty($taskcard->engineer_quantity))
                                                        @include('frontend.common.label.data-info-nodata')
                                                    @else
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $taskcard->engineer_quantity)
                                                    @endcomponent
                                                    @endif
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Helper Quantity @include('frontend.common.label.optional')
                                                    </label>

                                                    @if (empty($taskcard->helper_quantity))
                                                        @include('frontend.common.label.data-info-nodata')
                                                    @else
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $taskcard->helper_quantity)
                                                    @endcomponent
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Work Area @include('frontend.common.label.optional')
                                            </label>

                                            @if (empty($taskcard->work_area))
                                                @include('frontend.common.label.data-info-nodata')
                                            @else
                                            @component('frontend.common.label.data-info')
                                                @slot('text', $taskcard->work_area)
                                            @endcomponent
                                            @endif
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Access @include('frontend.common.label.optional')
                                            </label>

                                            <div>
                                                @if ($taskcard->accesses->isEmpty())
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                    @foreach ($taskcard->accesses  as $access)
                                                        @component('frontend.common.label.badge')
                                                            @slot('text', $access->name )
                                                        @endcomponent
                                                    @endforeach
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Zone @include('frontend.common.label.optional')
                                            </label>

                                            <div>
                                                @if ($taskcard->zones->isEmpty())
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                    @foreach ($taskcard->zones  as $zone)
                                                        @component('frontend.common.label.badge')
                                                            @slot('text', $zone->name )
                                                        @endcomponent
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Source @include('frontend.common.label.optional')
                                            </label>

                                            @if (empty($taskcard->source))
                                                @include('frontend.common.label.data-info-nodata')
                                            @else
                                            @component('frontend.common.label.data-info')
                                                @slot('text', $taskcard->source)
                                            @endcomponent
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Related Card @include('frontend.common.label.optional')
                                            </label>

                                            <div>
                                                @if ($taskcard->related_to->isEmpty())
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                    @foreach ($taskcard->related_to  as $related)
                                                        @component('frontend.common.label.badge')
                                                            @slot('text', $related->number )
                                                        @endcomponent
                                                    @endforeach
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Version @include('frontend.common.label.optional')
                                                    </label>

                                                    <div>
                                                        @if (sizeof(json_decode($taskcard->version)) == 0)
                                                            @include('frontend.common.label.data-info-nodata')
                                                        @else
                                                            @php
                                                                $versions = json_decode($taskcard->version, TRUE);
                                                            @endphp

                                                            @foreach ($versions  as $version)
                                                                @component('frontend.common.label.badge')
                                                                    @slot('text', $version )
                                                                @endcomponent
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Effectivity @include('frontend.common.label.optional')
                                                    </label>

                                                    @if (empty($taskcard->effectivity))
                                                        @include('frontend.common.label.data-info-nodata')
                                                    @else
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $taskcard->effectivity)
                                                    @endcomponent
                                                    @endif
                                                </div>
                                            </div>
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
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Documents library @include('frontend.common.label.optional')
                                            </label><br>

                                            @if (sizeof($additionals->document_library) == 0)
                                                @include('frontend.common.label.data-info-nodata')
                                            @else
                                                @if(isset($additionals))
                                                    @foreach ($additionals->document_library  as $document)
                                                        @component('frontend.common.label.badge')
                                                            @slot('text', $document )
                                                        @endcomponent
                                                    @endforeach
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="stringer_div">
                                            <label class="form-control-label">
                                                Stringer @include('frontend.common.label.optional')
                                            </label>

                                            @if(isset($taskcard->stringer))
                                                @component('frontend.common.label.data-info')
                                                    @slot('text', json_decode($taskcard->stringer))
                                                @endcomponent
                                            @else
                                                @include('frontend.common.label.data-info-nodata')
                                            @endif
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="station_div">
                                            <label class="form-control-label">
                                                Station @include('frontend.common.label.optional')
                                            </label>

                                            <div>
                                                @if (!isset($taskcard->stations))
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                    @foreach ($taskcard->stations as $station)
                                                        @component('frontend.common.label.badge')
                                                            @slot('text', $station->name )
                                                        @endcomponent
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="service_bulletin_div">
                                            <label class="form-control-label">
                                                Ref. Service Bulletins @include('frontend.common.label.optional')
                                            </label>

                                            @if(isset($taskcard->reference))
                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $taskcard->reference)
                                                @endcomponent
                                            @else
                                                @include('frontend.common.label.data-info-nodata')
                                            @endif
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 hidden" id="section_div">
                                            <label class="form-control-label">
                                                Section(s) @include('frontend.common.label.optional')
                                            </label>

                                            <div>
                                                @if (sizeof(json_decode($taskcard->section)) == 0)
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                    @php
                                                        $sections = json_decode($taskcard->section, TRUE);
                                                    @endphp

                                                    @foreach ($sections as $section)
                                                        @component('frontend.common.label.badge')
                                                            @slot('text', $section )
                                                        @endcomponent
                                                    @endforeach
                                                @endif
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
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Instruction @include('frontend.common.label.optional')
                                            </label>

                                            @if (empty($taskcard->description))
                                                @include('frontend.common.label.data-info-nodata')
                                            @else
                                            @component('frontend.common.label.data-info')
                                                @slot('text', $taskcard->description)
                                            @endcomponent
                                            @endif
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

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Tools Requirement
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-tools-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">


                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>


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
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>


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
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">


                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>


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
                                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                        <div class="row align-items-center">
                                            <div class="col-xl-12 order-12 order-xl-12 m--align-right">


                                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                                            </div>
                                        </div>
                                    </div>


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
        let taskcard_uuid = '{{ $taskcard->uuid }}';
        let taskcard_routine_type = "{{ $taskcard->type->name }}"; 
        if (taskcard_routine_type.trim() == "CPCP") {
        $("#station_div").removeClass("hidden");
        $("#stringer_div").removeClass("hidden");
        $("#service_bulletin_div").removeClass("hidden");
        $("#section_div").removeClass("hidden");
    }
    </script>

    <script src="{{ asset('js/frontend/taskcard/routine/show.js') }}"></script>
@endpush

