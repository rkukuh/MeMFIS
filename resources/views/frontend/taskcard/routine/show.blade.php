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
                                                Task Card Number @include('frontend.common.label.required')
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
                                                @slot('text',$taskcard->type->name)
                                            @endcomponent
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
                                                Aircraft Applicability @include('frontend.common.label.required')
                                            </label>

                                            <div style="background-color:beige; padding:15px;" class="">
                                                @foreach($taskcard->aircrafts  as $aircraft)
                                                    {{ $aircraft->name }},
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Task @include('frontend.common.label.required')
                                            </label>

                                            <div style="background-color:beige; padding:15px;" class="">
                                                {{ $taskcard->task->name }},
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Skill @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $taskcard->title)
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

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $taskcard->estimation_manhour)
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Performance Factor @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $taskcard->performance_factor)
                                                    @endcomponent
                                                </div>
                                            </div>
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
                                    <hr>
                                    <div class="form-group m-form__group row">
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
                                    </div>
                                    <div class="form-group m-form__group row">

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Access @include('frontend.common.label.optional')
                                            </label>

                                            @if (empty($taskcard->accesses))
                                                @include('frontend.common.label.data-info-nodata')
                                            @else
                                            <div style="background-color:beige; padding:15px;" class="">
                                                @foreach($taskcard->accesses  as $access)
                                                    {{ $access->name }},
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Zone @include('frontend.common.label.optional')
                                            </label>

                                            @if (empty($taskcard->zones))
                                                @include('frontend.common.label.data-info-nodata')
                                            @else
                                            <div style="background-color:beige; padding:15px;" class="">
                                                @foreach($taskcard->zones  as $zone)
                                                    {{ $zone->name }},
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
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
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Related Card @include('frontend.common.label.optional')
                                            </label>

                                            @if (empty($taskcard->related_to))
                                                @include('frontend.common.label.data-info-nodata')
                                            @else
                                            <div style="background-color:beige; padding:15px;" class="">
                                                @foreach($taskcard->related_to  as $related)
                                                    {{ $related->number }},
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Version @include('frontend.common.label.optional')
                                            </label>
                                            @php
                                                $versions = json_decode($taskcard->version, TRUE);
                                            @endphp

                                            @if (empty($taskcard->version))
                                                @include('frontend.common.label.data-info-nodata')
                                            @else
                                            <div style="background-color:beige; padding:15px;" class="">
                                                @php
                                                    $versions = json_decode($taskcard->version, TRUE);
                                                @endphp

                                                @foreach($versions  as $version)
                                                    {{ $version }},
                                                @endforeach
                                            </div>
                                            @endif
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
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Task Card Attachment @include('frontend.common.label.optional')
                                            </label>

                                            <!-- @if (empty($taskcard->description))
                                                @include('frontend.common.label.data-info-nodata')
                                            @else -->
                                            @component('frontend.common.label.data-info')
                                                @slot('text', "file modal?")
                                            @endcomponent
                                            <!-- @endif -->
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description @include('frontend.common.label.optional')
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
                <div class="m-portlet">
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
                    <div class="m-portlet">
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
    </script>

    <script src="{{ asset('js/frontend/taskcard/routine/show.js') }}"></script>
@endpush

