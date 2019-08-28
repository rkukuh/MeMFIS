@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Work Package
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
                        <a href="{{ route('frontend.workpackage.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Work Package
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

                                @include('frontend.common.label.edit')

                                <h3 class="m-portlet__head-text">
                                    Work Package
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
                                                @slot('text', 'title')
                                                @slot('id', 'title')
                                                @slot('name', 'title')
                                                @slot('value', $workPackage->title)
                                                @slot('id_error', 'title')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                (A/C Type) @include('frontend.common.label.required')
                                            </label>

                                            <select id="applicability_airplane" name="applicability_airplane" class="form-control m-select2">
                                                <option value="">
                                                    &mdash; Select a Aircraft Applicability &mdash;
                                                </option>

                                                @foreach ($aircrafts as $aircraft)
                                                    <option value="{{ $aircraft->id }}"
                                                        @if ($aircraft->id == $workPackage->aircraft_id) selected @endif>
                                                        {{ $aircraft->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('id', 'description')
                                                @slot('name', 'description')
                                                @slot('text', 'Description')
                                                @slot('value', $workPackage->description)
                                            @endcomponent
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        {{-- <div class="taskcard_datatable" id="second"></div> --}}
                                        <div class="m-portlet__body">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show routine" data-toggle="tab" href="#" data-target="#m_tabs_1_1">Routine</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link non-routine" data-toggle="tab" href="#m_tabs_1_2">Non Routine</a>
                                                </li>
                                                <!-- <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3">Material(s) & Tool(s)</a>
                                                </li> -->
                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
                                                    @include('frontend.workpackage.routine.index')
                                                    @include('frontend.workpackage.routine.basic.modal')
                                                    @include('frontend.workpackage.routine.sip.modal')
                                                    @include('frontend.workpackage.routine.cpcp.modal')
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <div class="action-buttons m--align-center">
                                                            @component('frontend.common.buttons.summary')
                                                                @slot('text', 'Work Package Summary')
                                                                @slot('href', route('frontend.workPackage.summary.workpackage',$workPackage->uuid) )
                                                            @endcomponent
                                                            @component('frontend.common.buttons.summary')
                                                                @slot('text', 'Routine Summary')
                                                                @slot('href', route('frontend.workPackage.summary.routine',$workPackage->uuid) )
                                                            @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                                                    @include('frontend.workpackage.nonroutine.index')
                                                    @include('frontend.workpackage.nonroutine.adsb.modal')
                                                    @include('frontend.workpackage.nonroutine.cmrawl.modal')
                                                    @include('frontend.workpackage.nonroutine.si.modal')
                                                    @include('frontend.workpackage.nonroutine.ea.modal')
                                                    @include('frontend.workpackage.nonroutine.eo.modal')
                                                    @include('frontend.workpackage.nonroutine.modal')
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <div class="action-buttons m--align-center">
                                                            @component('frontend.common.buttons.summary')
                                                                @slot('text', 'Work Package Summary')
                                                                @slot('href', route('frontend.workPackage.summary.workpackage',$workPackage->uuid) )
                                                            @endcomponent
                                                            @component('frontend.common.buttons.summary')
                                                                @slot('text', 'Non-routine Summary')
                                                                @slot('href', route('frontend.workPackage.summary.nonroutine',$workPackage->uuid) )
                                                            @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                                                    @include('frontend.workpackage.item.index')
                                                </div> -->
                                            </div>

                                            @include('frontend.workpackage.modal.material.taskcard')
                                            @include('frontend.workpackage.modal.tool.taskcard')
                                            @include('frontend.workpackage.modal.sequence')
                                            @include('frontend.workpackage.modal.sequence-instruction')
                                            @include('frontend.workpackage.modal.predecessor')
                                            @include('frontend.workpackage.modal.successor')
                                            @include('frontend.workpackage.modal.predecessor-instruction')
                                            @include('frontend.workpackage.modal.successor-instruction')
                                            @include('frontend.workpackage.modal.create-predecessor')
                                            @include('frontend.workpackage.modal.create-successor')

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                        <div class="flex">
                                            <div class="action-buttons">
                                                @component('frontend.common.buttons.update')
                                                    @slot('type','button')
                                                    @slot('id', 'add-workpackage')
                                                    @slot('class', 'add-workpackage')
                                                @endcomponent

                                                @include('frontend.common.buttons.reset')

                                                @include('frontend.common.buttons.back')

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
        let workPackage_uuid = '{{ $workPackage->uuid }}';
    </script>

    <script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script> --}}

    <script src="{{ asset('js/frontend/functions/select2/quotation.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/quotation.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/customer.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/aircraft.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/series.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/taskcard-predecessor.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/taskcard-successor.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/instruction-predecessor.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/instruction-successor.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/taskcard.js') }}"></script>

    <script src="{{ asset('js/frontend/workpackage/edit.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/modal/successor.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/modal/predecessor.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/form-reset.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/datatables.js')}}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>

    <script src="{{ asset('js/frontend/workpackage/modal/datatables.js')}}"></script>
@endpush
