@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Discrepancy Found
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
                        <a href="{{ route('frontend.item.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Discrepancy Found
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
                                    Discrepancy Found
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
                                                Date
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $discrepancy->jobcard->quotation->project->created_at)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                A/C Type
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text',  $discrepancy->jobcard->quotation->project->aircraft->name)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Discrepenct No
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generated')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                A/C Reg
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $discrepancy->jobcard->quotation->project->aircraft_register)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                JC No Refference
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $discrepancy->jobcard->number)
                                            @endcomponent
                                            <input type="hidden"id="uuid" name="uuid" value="{{$discrepancy->jobcard->uuid}}">
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                A/C S/N
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $discrepancy->jobcard->quotation->project->aircraft_sn)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Sequence No
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generated')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Qty Engineer
                                            </label>

                                            @component('frontend.common.input.number')
                                                    @slot('text', 'PPN')
                                                    @slot('id', 'ppn_amount')
                                                    @slot('value', $discrepancy->engineer_quantity)
                                                    @slot('name', 'ppn_amount')
                                                    @slot('id_error', 'ppn_amount')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                ATA
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generated')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Qty Helper
                                            </label>

                                            @component('frontend.common.input.number')
                                                    @slot('text', 'PPN')
                                                    @slot('id', 'ppn_amount')
                                                    @slot('value', $discrepancy->helper_quantity)
                                                    @slot('name', 'ppn_amount')
                                                    @slot('id_error', 'ppn_amount')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Area/Zone
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text',  $discrepancy->jobcard->taskcard->work_area)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Est. Mhrs
                                            </label>

                                            @component('frontend.common.input.number')
                                                    @slot('text', 'PPN')
                                                    @slot('id', 'ppn_amount')
                                                    @slot('value', $discrepancy->estimation_manhour)
                                                    @slot('name', 'ppn_amount')
                                                    @slot('id_error', 'ppn_amount')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Skill
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $discrepancy->jobcard->taskcard->skill->name)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                RII
                                            </label>

                                            @component('frontend.common.input.checkbox')
                                                @slot('id', 'is_rii')
                                                @slot('name', 'is_rii')
                                                @slot('text', 'IS RII?')
                                                @if ($discrepancy->is_rii == 1)
                                                        @slot('checked', 'checked')
                                                    @endif
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Complaint @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('multiple', 'multiple')
                                                @slot('id_error', 'tag')
                                                @slot('value', $discrepancy->complaint)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <fieldset class="border p-2">
                                                <legend class="w-auto">Propose Correction</legend>

                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', 'remove')
                                                            @slot('name', 'remove')
                                                            @slot('text', '1. REMOVE')
                                                            @slot('size', '12')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', 'repair')
                                                            @slot('name', 'repair')
                                                            @slot('text', '4. REPAIR')
                                                            @slot('size', '12')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', 'test')
                                                            @slot('name', 'test')
                                                            @slot('text', '7. TEST')
                                                            @slot('size', '12')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', 'install')
                                                            @slot('name', 'install')
                                                            @slot('text', '2. INSTALL')
                                                            @slot('size', '12')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', 'replace')
                                                            @slot('name', 'replace')
                                                            @slot('text', '5. REPLACE')
                                                            @slot('size', '12')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', 'shop_visit')
                                                            @slot('name', 'shop_visit')
                                                            @slot('text', '8. SHOP VISIT')
                                                            @slot('size', '12')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', 'rectification')
                                                            @slot('name', 'rectification')
                                                            @slot('text', '3. RECTIFICATION')
                                                            @slot('size', '12')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', 'ndt')
                                                            @slot('name', 'ndt')
                                                            @slot('text', '6. NDT')
                                                            @slot('size', '12')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                @component('frontend.common.input.checkbox')
                                                                    @slot('id', 'other')
                                                                    @slot('name', 'other')
                                                                    @slot('text', '9. Other')
                                                                    @slot('size', '12')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                @component('frontend.common.input.textarea')
                                                                    @slot('id', 'code')
                                                                    @slot('text', 'Code')
                                                                    @slot('name', 'code')
                                                                    @slot('rows', '3')
                                                                    @slot('id_error', 'code')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Note @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('multiple', 'multiple')
                                                @slot('id_error', 'tag')
                                                @slot('value', $discrepancy->description)
                                            @endcomponent
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.update')
                                                        @slot('type','button')
                                                        @slot('id', 'add-item')
                                                        @slot('class', 'add-item')
                                                        @slot('text','Save & Approved')
                                                    @endcomponent

                                                    @include('frontend.common.buttons.reset')

                                                    @component('frontend.common.buttons.back')
                                                        @slot('href', route('frontend.item.index'))
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
                                    Tool(s) List
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
                                            @slot('id', 'tool')
                                            @slot('text', 'Tool')
                                            @slot('data_target', '#modal_tool')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            @include('frontend.discrepancy.engineer.tool.modal')

                            <div class="tools_datatable" id="scrolling_both"></div>

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
                                    Material(s) List
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
                                            @slot('text', 'Material')
                                            @slot('data_target', '#modal_material')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            @include('frontend.discrepancy.engineer.material.modal')

                            <div class="materials_datatable" id="scrolling_both"></div>
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
    <script src="{{ asset('js/frontend/functions/select2/unit-material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-material.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/unit-tool.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-tool.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/item.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/item.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/material.js') }}"></script>
@endpush
