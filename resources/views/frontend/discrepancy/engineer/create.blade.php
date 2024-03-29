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
                                                @slot('text', $jobcard->quotation->quotationable->created_at)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                A/C Type
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $jobcard->quotation->quotationable->aircraft->name)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Sequence No
                                            </label>

                                            @component('frontend.common.input.number')
                                                @slot('id', 'sequence')
                                                @slot('name', 'sequence')
                                                @slot('text', 'Sequence')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                A/C Reg
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $jobcard->quotation->quotationable->aircraft_register)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                JC No Refference
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $jobcard->number)
                                            @endcomponent
                                            <input type="hidden"id="uuid" name="uuid" value="{{$jobcard->uuid}}">
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                A/C S/N
                                            </label>

                                            @component('frontend.common.label.data-info')
                                            @slot('text', $jobcard->quotation->quotationable->aircraft_sn)
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
                                                Zone  @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'zone')
                                                @slot('text', 'Zone')
                                                @slot('name', 'zone')
                                                @slot('id_error', 'zone')
                                                @slot('multiple','multiple')
                                                @slot('help_text','You can chose multiple value')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                ATA
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'ata')
                                                @slot('name', 'ata')
                                                @slot('text', 'ATA')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Est. Mhrs @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.number')
                                                    @slot('text', 'Manhours')
                                                    @slot('id', 'manhours')
                                                    @slot('name', 'manhours')
                                                    @slot('id_error', 'manhours')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Attachment @include('frontend.common.label.optional')
                                            </label>
                                            <br>

                                            <input type="file" id="file" multiple name="name">
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                            </label>

                                            @component('frontend.common.input.checkbox')
                                                @slot('id', 'is_rii')
                                                @slot('name', 'is_rii')
                                                @slot('text', 'RII?')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Complaint @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('multiple', 'multiple')
                                                @slot('id', 'complaint')
                                                @slot('name', 'complaint')
                                                @slot('id_error', 'complaint')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <fieldset class="border p-2">
                                        <legend class="w-auto">
                                            Propose Correction @include('frontend.common.label.required')
                                        </legend>

                                        <div class="form-control-feedback text-danger" id="propose-error"></div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'remove')
                                                    @slot('value', 'remove')
                                                    @slot('name', 'propose[]')
                                                    @slot('text', '1. REMOVE')
                                                    @slot('size', '12')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'repair')
                                                    @slot('value', 'repair')
                                                    @slot('name', 'propose[]')
                                                    @slot('text', '4. REPAIR')
                                                    @slot('size', '12')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'test')
                                                    @slot('value', 'test')
                                                    @slot('name', 'propose[]')
                                                    @slot('text', '7. TEST')
                                                    @slot('size', '12')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'install')
                                                    @slot('value', 'install')
                                                    @slot('name', 'propose[]')
                                                    @slot('text', '2. INSTALL')
                                                    @slot('size', '12')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'replace')
                                                    @slot('value', 'replace')
                                                    @slot('name', 'propose[]')
                                                    @slot('text', '5. REPLACE')
                                                    @slot('size', '12')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'shop_visit')
                                                    @slot('value', 'shop-visit')
                                                    @slot('name', 'propose[]')
                                                    @slot('text', '8. SHOP VISIT')
                                                    @slot('size', '12')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'rectification')
                                                    @slot('value', 'rectification')
                                                    @slot('name', 'propose[]')
                                                    @slot('text', '3. RECTIFICATION')
                                                    @slot('size', '12')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'ndt')
                                                    @slot('value', 'ndt')
                                                    @slot('name', 'propose[]')
                                                    @slot('text', '6. NDT')
                                                    @slot('size', '12')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('id', 'other')
                                                            @slot('value', 'other')
                                                            @slot('name', 'propose[]')
                                                            @slot('text', '9. Other')
                                                            @slot('size', '12')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        @component('frontend.common.input.textarea')
                                                            @slot('id', 'other_text')
                                                            @slot('text', 'Other')
                                                            @slot('name', 'other')
                                                            @slot('disabled', 'disabled')
                                                            @slot('rows', '3')
                                                            @slot('id_error', 'other')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                    Remark/Description @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('multiple', 'multiple')
                                                @slot('id', 'description')
                                                @slot('name', 'description')
                                                @slot('id_error', 'description')
                                            @endcomponent
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'add-discrepancy')
                                                        @slot('class', 'add-discrepancy')
                                                        @slot('text','Save')
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
                                    Helper(s) List
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                            <div class="defectcard_helper_datatable" id="scrolling_both"></div>
                                            <button data-toggle="modal" data-target="#modal_helper" type="button" href="#" 
                                            class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-md add-helper" title="Add Helper" 
                                   ><i class="la la-plus-circle"></i> Add Helper</button>
                                        @component('frontend.common.buttons.delete_repeater')
                                            @slot('class', 'delete_helper_row')
                                        @endcomponent
                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
                            @include('frontend.discrepancy.engineer.modal-helper')
                            <table id="helper_datatable" class="table table-striped table-bordered" width="100%"></table>
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
                                            @slot('text', 'Tool')
                                            @slot('attribute', 'disabled')
                                            @slot('data_target', '#modal_uom')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
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
                                            @slot('attribute', 'disabled')
                                            @slot('text', 'Material')
                                            @slot('id', 'material')
                                            @slot('data_target', '#modal_storage_stock')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
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
    <script src="{{ asset('/assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/frontend/discrepancy/engineer/create.js') }}"></script>
    <script src="{{ asset('js/frontend/discrepancy/form-reset.js') }}"></script>
    <script src="{{ asset('js/frontend/discrepancy/repeater.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/fill-combobox/otr-certification.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/helper.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/zone.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/zone.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>

@endpush
