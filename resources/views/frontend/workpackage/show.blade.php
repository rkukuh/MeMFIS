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

                                @include('frontend.common.label.show')

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

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $workPackage->title)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                (A/C Type) @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @foreach ($aircrafts as $aircraft)
                                                    @if ($aircraft->id == $workPackage->aircraft_id)  
                                                        @slot('text', $aircraft->name)
                                                    @endif   
                                                @endforeach
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $workPackage->description)
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
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3">General Tool(s) & Material(s)</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
                                                    @include('frontend.workpackage.routine.show')
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <div class="action-buttons m--align-center">
                                                            @component('frontend.common.buttons.summary')
                                                                @slot('text', 'Work Package Summary')
                                                                @slot('href', route('frontend.summary.workpackage-summary') )
                                                            @endcomponent
                                                            @component('frontend.common.buttons.summary')
                                                                @slot('text', 'Routine Summary')
                                                                @slot('href', route('frontend.summary.routine-summary') )
                                                            @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                                                    @include('frontend.workpackage.nonroutine.show')
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <div class="action-buttons m--align-center">
                                                            @component('frontend.common.buttons.summary')
                                                                @slot('text', 'Work Package Summary')
                                                                @slot('href', route('frontend.summary.workpackage-summary') )
                                                            @endcomponent
                                                            @component('frontend.common.buttons.summary')
                                                                @slot('text', 'Non-routine Summary')
                                                                @slot('href', route('frontend.summary.nonroutine-summary') )
                                                            @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                                                    @include('frontend.workpackage.item.show')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                        <div class="flex">
                                            <div class="action-buttons">
                                                @component('frontend.common.buttons.back')
                                                    @slot('href', route('frontend.workpackage.index'))
                                                @endcomponent
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

    <script src="{{ asset('js/frontend/workpackage/show.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/modal/successor.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/modal/predecessor.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/form-reset.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/datatables.js')}}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>

    <script src="{{ asset('js/frontend/workpackage/modal/datatables.js')}}"></script>

@endpush
