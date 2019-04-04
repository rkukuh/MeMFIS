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
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Customer @include('frontend.common.label.required')
                                                    </label>

                                                    <select id="customer" name="customer" class="form-control m-select2">
                                                        <option value="">
                                                            &mdash; Select a Customer &mdash;
                                                        </option>

                                                        @foreach ($customers as $customer)
                                                            <option value="{{ $customer->id }}"
                                                                @if ($customer->id == $project->aircraft_id) selected @endif>
                                                                {{ $customer->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <fieldset class="border p-2">
                                                        <legend class="w-auto">Identifier Customer</legend>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="m-portlet__head">
                                                                <div class="m-portlet__head-tools">
                                                                    <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary m-tabs-line--2x" role="tablist">
                                                                        <li class="nav-item m-tabs__item">
                                                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1" role="tab">
                                                                                                <i class="la la-bell-o"></i> General
                                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item m-tabs__item">
                                                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab">
                                                                                                <i class="la la-bell-o"></i> Contact
                                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item m-tabs__item">
                                                                            <a class="nav-link m-tabs__link " data-toggle="tab" href="#m_tabs_6_3" role="tab">
                                                                                                <i class="la la-cog"></i> Address
                                                                                            </a>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="m_tabs_6_1" role="tabpanel">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="form-group m-form__group row">
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <label class="form-control-label">
                                                                                    Name
                                                                                </label>

                                                                                @component('frontend.common.label.data-info')
                                                                                    @slot('text', 'XXX')
                                                                                    @slot('id', 'name')
                                                                                @endcomponent
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <label class="form-control-label">
                                                                                    Attention
                                                                                </label>

                                                                                @component('frontend.common.input.select2')
                                                                                    @slot('text', 'Bp. Romdani')
                                                                                    @slot('id', 'attention')
                                                                                    @slot('name', 'attention')
                                                                                @endcomponent
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="form-group m-form__group row">
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <label class="form-control-label">
                                                                                    Phone
                                                                                </label>

                                                                                @component('frontend.common.input.select2')
                                                                                    @slot('text', '+62xxxxxxx / 07777777')
                                                                                    @slot('id', 'phone')
                                                                                @endcomponent

                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                    <label class="form-control-label">
                                                                                        Fax
                                                                                    </label>

                                                                                    @component('frontend.common.input.select2')
                                                                                        @slot('text', '+62xxxxxxx / 07777777')
                                                                                        @slot('id', 'fax')
                                                                                    @endcomponent
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group m-form__group row">
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <label class="form-control-label">
                                                                                    Email
                                                                                </label>

                                                                                @component('frontend.common.input.select2')
                                                                                    @slot('text', '+62xxxxxxx / 07777777')
                                                                                    @slot('id', 'email')
                                                                                @endcomponent

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="m_tabs_6_3" role="tabpanel">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="form-group m-form__group row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <label class="form-control-label">
                                                                                    Address
                                                                                </label>

                                                                                @component('frontend.common.input.select2')
                                                                                    @slot('text', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, nulla odio consequuntur obcaecati eos error recusandae minima eveniet dolor sed tempora! Ut quidem illum accusantium expedita nulla eos reprehenderit officiis?')
                                                                                    @slot('id', 'address')
                                                                                @endcomponent
                                                                            </div>
                                                                        </div>
                                                                        <div id="map"></div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Work Order Number @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('text', 'Work Order')
                                                        @slot('id', 'work-order')
                                                        @slot('name', 'work-order')
                                                        @slot('value', $project->no_wo)
                                                        @slot('id_error', 'work-order')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        A/C Type @include('frontend.common.label.required')
                                                    </label>

                                                    <select id="applicability_airplane" name="applicability_airplane" class="form-control m-select2">
                                                        <option value="">
                                                            &mdash; Select a Aircraft Applicability &mdash;
                                                        </option>

                                                        @foreach ($aircrafts as $aircraft)
                                                            <option value="{{ $aircraft->id }}"
                                                                @if ($aircraft->id == $project->aircraft_id) selected @endif>
                                                                {{ $aircraft->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        A/C Reg @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('text', 'Red')
                                                        @slot('id', 'reg')
                                                        @slot('name', 'reg')
                                                        @slot('value', $project->aircraft_register)
                                                        @slot('id_error', 'reg')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        A/C Serial Number @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('text', 'Serial Number')
                                                        @slot('id', 'serial-number')
                                                        @slot('name', 'serial-number')
                                                        @slot('value', $project->aircraft_sn)
                                                        @slot('id_error', 'serial-number')
                                                    @endcomponent

                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Project Title @include('frontend.common.label.optional')
                                                    </label>

                                                    @component('frontend.common.input.textarea')
                                                        @slot('rows', '8')
                                                        @slot('id', 'project_title')
                                                        @slot('name', 'project_title')
                                                        @slot('value', $project->title)
                                                        @slot('text', 'Project Title')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 ">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.update')
                                                        @slot('type','button')
                                                        @slot('id', 'update-project')
                                                        @slot('class', 'update-project')
                                                    @endcomponent

                                                    @include('frontend.common.buttons.reset')

                                                    @component('frontend.common.buttons.back')
                                                        @slot('href', route('frontend.project.index'))
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="row align-items-center">
                                                <div class="col-xl-8 order-2 order-xl-1">
                                                    <div class="form-group m-form__group row align-items-center">
                                                        <div class="col-md-4">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 order-1 order-xl-2 m--align-right">
                                                    <div class="m-btn-group m-btn-group--pill btn-group" role="group" aria-label="Button group with nested dropdown">
                                                        <button data-target="#modal_project" data-toggle="modal" type="button" class="m-btn btn btn-primary" >
                                                            <span>
                                                                <i class="la la-plus-circle"></i>
                                                            <span>Workpackage</span>
                                                            </span>
                                                        </button>

                                                        <div class="m-btn-group btn-group" role="group">
                                                        <button data-target="#modal_project" data-toggle="modal" type="button" class="m-btn btn btn-primary" >
                                                            <span>
                                                                <i class="la la-plus-circle"></i>
                                                            <span>Blank Workpackage</span>
                                                            </span>
                                                        </button>
                                                        </div>
                                                    </div>

                                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @include('frontend.project.hm.modal')

                                    {{-- datatables --}}
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <table class="project-hm-datatable" id="html_table" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th title="Field #1" data-field="OrderID">Workpackage ID</th>
                                                        <th title="Field #2" data-field="Owner">Workpackage Title</th>
                                                        <th title="Field #2" data-field="Action"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><a href="/project/hm/show">57520-0405</a> </td>
                                                        <td>Sunny Garton</td>
                                                        <td>
                                                            <button data-toggle="modal" data-target="#modal_workpackage" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-aircraft" title="Edit"
                                                            data-uuid='uuid'><i class="la la-pencil"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="/project/hm/show">43269-858</a></td>
                                                        <td>Sandor Engley</td>
                                                        <td>
                                                            <button data-toggle="modal" data-target="#modal_workpackage" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-aircraft" title="Edit"
                                                            data-uuid='uuid'><i class="la la-pencil"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="/project/hm/show">68084-462</a></td>
                                                        <td>Morgan Cradey</td>
                                                        <td>
                                                            <button data-toggle="modal" data-target="#modal_workpackage" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-aircraft" title="Edit"
                                                            data-uuid='uuid'><i class="la la-pencil"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="/project/hm/show">44356-0001</a></td>
                                                        <td>Tedd Alton</td>
                                                        <td>
                                                            <button data-toggle="modal" data-target="#modal_workpackage" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-aircraft" title="Edit"
                                                            data-uuid='uuid'><i class="la la-pencil"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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


    <script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/frontend/functions/select2/work-order.js') }}"></script> --}}
    <script src="{{ asset('js/frontend/functions/select2/template.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/functions/fill-combobox/customer.js') }}"></script> --}}

    <script src="{{ asset('js/frontend/functions/select2/aircraft.js') }}"></script>
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
    <script src="{{ asset('js/frontend/project/hm/edit.js') }}"></script>

@endpush
