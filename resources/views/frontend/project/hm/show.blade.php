@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Project
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
                                Project
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

                                @include('frontend.common.label.create-new')

                                <h3 class="m-portlet__head-text">
                                    Heavy Maintenance Project
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
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Customer @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'customer')
                                                        @slot('name', 'customer')
                                                        @slot('text', $project->customer->name)
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Work Order Number @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'work-order')
                                                        @slot('name', 'work-order')
                                                        @slot('text', $project->no_wo)
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Project Title @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('rows', '8')
                                                        @slot('id', 'project_title')
                                                        @slot('name', 'project_title')
                                                        @slot('text', $project->title)
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">

                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Work Order Attachment @include('frontend.common.label.optional')
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', 'Work Order')
                                                        @slot('id', 'work-order-attachment')
                                                        @slot('name', 'work-order-attachment')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        A/C Type @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'aircraft')
                                                        @slot('name', 'aircraft')
                                                        @slot('text', $project->aircraft->name)
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        A/C Reg @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'reg')
                                                        @slot('name', 'reg')
                                                        @slot('text', $project->aircraft_register)
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        A/C Serial Number @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'serial-number')
                                                        @slot('name', 'serial-number')
                                                        @slot('text', $project->aircraft_sn)
                                                    @endcomponent

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    @include('frontend.project.hm.modal.modal')

                                    {{-- datatables --}}
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="m-portlet m-portlet--mobile">
                                                <div class="m-portlet__body">
                                                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                                        <div class="row align-items-center">
                                                            <div class="col-xl-6 order-2 order-xl-1">
                                                                <div class="form-group m-form__group row align-items-center">
                                                                    <div class="col-md-6">
                                                                        <div class="m-input-icon m-input-icon--left">
                                                                            <input type="text" class="form-control m-input" placeholder="Search..."
                                                                                id="generalSearch">
                                                                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                                <span><i class="la la-search"></i></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 order-1 order-xl-2 m--align-right">
                                                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="workpackage_datatable" id="scrolling_both"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 ">
                                            <div class="flex">
                                                <div class="action-buttons">
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
        </div>
    </div>
@endsection

@push('header-scripts')
    <style>
        #map { height: 200px; }
    </style>

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
    let project_uuid = '{{ $project->uuid }}';
    </script>


    <script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/frontend/functions/select2/work-order.js') }}"></script> --}}
    <script src="{{ asset('js/frontend/functions/select2/template.js') }}"></script>


    <script src="{{ asset('js/frontend/functions/select2/series.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/phone.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/email.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/fax.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/address.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/attn.js') }}"></script>

    {{-- <script src="{{ asset('js/frontend/project/create.js') }}"></script> --}}
    <script src="{{ asset('js/frontend/project/form-reset.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/project/hm/datatables.js')}}"></script> --}}
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script> --}}
    <script src="{{ asset('js/frontend/project/hm/show.js') }}"></script>

@endpush
