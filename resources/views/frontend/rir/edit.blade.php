@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                RIR (Receiving Insspection Report)
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
                    <a href="{{ route('frontend.quotation.index') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            RIR (Receiving Insspection Report)
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
                                RIR (Receiving Insspection Report)
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <form id="itemform" name="itemform">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            RIR No
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $receivingInspectionReport->number)
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Purchase Order Number
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $receivingInspectionReport->purchase_order->number)
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Vendor
                                                        </label>

                                                        <select id="vendor" name="vendor" class="form-control m-select2" style="width:100%">
                                                            <option value="">
                                                                &mdash; Select a Vendor &mdash;
                                                            </option>

                                                            @foreach ($vendors as $vendor)
                                                                <option value="{{ $vendor->uuid }}"
                                                                    @if ($vendor->uuid == $vendor_uuid) selected @endif>
                                                                    {{ $vendor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Delivery Document
                                                    </label>

                                                    @component('frontend.common.input.input')
                                                        @slot('name', 'document')
                                                        @slot('id', 'document')
                                                        @slot('value', $receivingInspectionReport->delivery_document_number)
                                                        @slot('placeholder', 'Delivery Document')
                                                    @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Date
                                                    </label>

                                                    @component('frontend.common.input.datepicker')
                                                        @slot('id', 'date')
                                                        @slot('text', 'Date')
                                                        @slot('name', 'date')
                                                        @slot('value', $receivingInspectionReport->rir_date)
                                                        @slot('id_error', 'date')
                                                    @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Status
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.input.radio')
                                                            @slot('name', 'status')
                                                            @slot('text','Purchase')
                                                            @slot('id','purchase')
                                                            @if($rir_status == 'purchase')
                                                                @slot('checked','checked')
                                                            @endif
                                                            @slot('value','purchase')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.input.radio')
                                                            @slot('name', 'status')
                                                            @slot('text','Repair')
                                                            @slot('id','repair')
                                                            @if($rir_status == 'repair')
                                                                @slot('checked','checked')
                                                            @endif
                                                            @slot('value','repair')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.input.radio')
                                                            @slot('name', 'status')
                                                            @slot('text','Serviceable')
                                                            @slot('id','serviceable')
                                                            @if($rir_status == 'serviceable')
                                                                @slot('checked','checked')
                                                            @endif
                                                            @slot('value','serviceable')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.input.radio')
                                                            @slot('name', 'status')
                                                            @slot('text','Unserviceable')
                                                            @slot('id','unserviceable')
                                                            @if($rir_status == 'unserviceable')
                                                                @slot('checked','checked')
                                                            @endif
                                                            @slot('value','unserviceable')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                    <div class="row align-items-center">
                                        <div class="col-xl-8 order-2 order-xl-1">
                                            <div class="form-group m-form__group row align-items-center">
                                                <div class="col-md-4">
                                                    <div class="m-input-icon m-input-icon--left">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                            @component('frontend.common.buttons.create-new')
                                                @slot('text', 'Item')
                                                @slot('data_target', '#modal_rir_add')
                                            @endcomponent

                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rir_datatable" id="scrolling_both"></div>
                                <hr>

                                @include('frontend.rir.modal')
                                @include('frontend.rir.modal-edit')

                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <fieldset class="border p-2">
                                            <legend class="w-auto">1. Packing & Handling Check</legend>
                                                <div class="m-portlet__body">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Type
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6 ">
                                                            <label class="form-control-label">
                                                                Condition
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group m-form__group row mt-5">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    <div class="row">
                                                                        @component('frontend.common.input.radio')
                                                                            @slot('id', 'reusable_container')
                                                                            @slot('value', 'reusable-container')
                                                                            @slot('name', 'type')
                                                                            @slot('size','12')
                                                                            @if($packing_type == 'reusable-container')
                                                                                @slot('checked','checked')
                                                                            @endif
                                                                            @slot('text', 'Reusable Container')
                                                                        @endcomponent
                                                                    </div>
                                                                    <div class="row">
                                                                        @component('frontend.common.input.radio')
                                                                            @slot('id', 'carton_box')
                                                                            @slot('value', 'carton-box')
                                                                            @slot('name', 'type')
                                                                            @slot('size','12')
                                                                            @if($packing_type == 'carton-box')
                                                                                @slot('checked','checked')
                                                                            @endif
                                                                            @slot('text', 'Carton Box')
                                                                        @endcomponent
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    <div class="row">
                                                                        @component('frontend.common.input.radio')
                                                                            @slot('id', 'wooden box')
                                                                            @slot('value', 'wooden-box')
                                                                            @slot('name', 'type')
                                                                            @slot('size','12')
                                                                            @if($packing_type == 'wooden-box')
                                                                                @slot('checked','checked')
                                                                            @endif
                                                                            @slot('text', 'Wooden Box')
                                                                        @endcomponent
                                                                    </div>
                                                                    <div class="row">
                                                                        @component('frontend.common.input.radio')
                                                                            @slot('id', 'unpacked')
                                                                            @slot('value', 'unpacked')
                                                                            @slot('name', 'type')
                                                                            @slot('size','12')
                                                                            @if($packing_type == 'unpacked')
                                                                                @slot('checked','checked')
                                                                            @endif
                                                                            @slot('text', 'Unpacked')
                                                                        @endcomponent
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    <div class="row">
                                                                        @component('frontend.common.input.radio')
                                                                            @slot('id', 'Satisfactory')
                                                                            @slot('value', 'satisfactory')
                                                                            @slot('name', 'condition_material')
                                                                            @slot('size','12')
                                                                            @if($packing_condition == 'satisfactory')
                                                                                @slot('checked','checked')
                                                                            @endif
                                                                            @slot('text', 'Satisfactory')
                                                                        @endcomponent
                                                                    </div>
                                                                    <div class="row">
                                                                        @component('frontend.common.input.radio')
                                                                            @slot('id', 'unsatisfactory')
                                                                            @slot('value', 'unsatisfactory')
                                                                            @slot('name', 'condition_material')
                                                                            @slot('size','12')
                                                                            @if($packing_condition == 'unsatisfactory')
                                                                                @slot('checked','checked')
                                                                            @endif
                                                                            @slot('text', 'Unsatisfactory')
                                                                        @endcomponent
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                If Unsatisfactory Explain
                                                            </label>

                                                            @component('frontend.common.input.input')
                                                                @slot('name', 'packing_handling_check')
                                                                @slot('name', 'packing_handling_check')
                                                                @slot('placeholder', $receivingInspectionReport->unsatisfactory_packing)
                                                            @endcomponent
                                                        <div>
                                                    </div>
                                                </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <fieldset class="border p-2">
                                            <legend class="w-auto">2. Preservation Check</legend>
                                                <div class="m-portlet__body">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'reusable_container')
                                                                        @slot('value', 'reusable-container')
                                                                        @slot('name', 'preservation_check')
                                                                        @slot('size','12')
                                                                        @if($preservation_check == 'reusable-container')
                                                                            @slot('checked','checked')
                                                                        @endif
                                                                        @slot('text', 'Reusable Container')
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'wooden_box')
                                                                        @slot('value', 'wooden-box')
                                                                        @slot('name', 'preservation_check')
                                                                        @slot('size','12')
                                                                        @if($preservation_check == 'wooden-box')
                                                                            @slot('checked','checked')
                                                                        @endif
                                                                        @slot('text', 'Wooden Box')
                                                                    @endcomponent
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                If Unsatisfactory Explain
                                                            </label>

                                                            @component('frontend.common.input.input')
                                                                @slot('name', 'preservation_check_explain')
                                                                @slot('id', 'preservation_check_explain')
                                                                @slot('placeholder', 'If Unsatisfactory Explain')
                                                                @slot('value',  $receivingInspectionReport->unsatisfactory_preservation)
                                                            @endcomponent
                                                        <div>
                                                    </div>
                                                </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <fieldset class="border p-2">
                                            <legend class="w-auto">3. Document Check</legend>
                                                <div class="m-portlet__body">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                General Document
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6 ">
                                                            <label class="form-control-label">
                                                                Technical Document
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group m-form__group row mt-5">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    @component('frontend.common.input.checkbox')
                                                                        @slot('id', 'invoice')
                                                                        @slot('class', 'general_document')
                                                                        @slot('name', 'general_document[]')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Invoice')
                                                                        @slot('value', 'invoice')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.checkbox')
                                                                        @slot('id', 'airway_bill')
                                                                        @slot('class', 'general_document')
                                                                        @slot('name', 'general_document[]')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Airway Bill')
                                                                        @slot('value', 'airway-bill')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.checkbox')
                                                                        @slot('id', 'shipping_document')
                                                                        @slot('class', 'general_document')
                                                                        @slot('name', 'general_document[]')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Shipping Document')
                                                                        @slot('value', 'shipping-document')
                                                                    @endcomponent
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    @component('frontend.common.input.checkbox')
                                                                        @slot('id', 'certificate_of_conformity')
                                                                        @slot('class', 'technical_document')
                                                                        @slot('name', 'technical_document[]')
                                                                        @slot('value', 'comformity-certificate')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Certificate of Conformity')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.checkbox')
                                                                        @slot('id', 'arc_aat')
                                                                        @slot('class', 'technical_document')
                                                                        @slot('name', 'technical_document[]')
                                                                        @slot('value', 'arc-aat')
                                                                        @slot('size','12')
                                                                        @slot('text', 'ARC/AAT')
                                                                    @endcomponent
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                If Unsatisfactory Explain
                                                            </label>

                                                            @component('frontend.common.input.input')
                                                                @slot('name', 'document_check')
                                                                @slot('name', 'document_check')
                                                                @slot('value',  $receivingInspectionReport->unsatisfactory_document)
                                                                @slot('placeholder', 'If Unsatisfactory Explain')
                                                            @endcomponent
                                                        <div>
                                                    </div>
                                                </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <fieldset class="border p-2">
                                            <legend class="w-auto">4. Material Check</legend>
                                                <div class="m-portlet__body">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                            <label class="form-control-label">
                                                                Condition
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                            <label class="form-control-label">
                                                                Quality/Complete
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                            <label class="form-control-label">
                                                                Identification
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group m-form__group row mt-5">
                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'Satisfactory')
                                                                        @slot('value', 'satisfactory')
                                                                        @slot('name', 'condition')
                                                                        @slot('size','12')
                                                                        @if($material_condition == 'satisfactory')
                                                                            @slot('checked','checked')
                                                                        @endif
                                                                        @slot('text', 'Satisfactory')
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'unsatisfactory')
                                                                        @slot('value', 'unsatisfactory')
                                                                        @slot('name', 'condition')
                                                                        @slot('size','12')
                                                                        @if($material_condition == 'unsatisfactory')
                                                                            @slot('checked','checked')
                                                                        @endif
                                                                        @slot('text', 'Unsatisfactory')
                                                                    @endcomponent
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'conform')
                                                                        @slot('value', 'conform')
                                                                        @slot('name', 'quality')
                                                                        @slot('size','12')
                                                                            @if($material_quality == 'conform')
                                                                            @slot('checked','checked')
                                                                        @endif
                                                                        @slot('text', 'Conform')
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'not_conform')
                                                                        @slot('value', 'not-conform')
                                                                        @slot('name', 'quality')
                                                                        @slot('size','12')
                                                                        @if($material_quality == 'not-conform')
                                                                            @slot('checked','checked')
                                                                        @endif
                                                                        @slot('text', 'Not Conform')
                                                                    @endcomponent
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'conform')
                                                                        @slot('value', 'conform')
                                                                        @slot('name', 'identification')
                                                                        @slot('size','12')
                                                                        @if($material_identification == 'conform')
                                                                            @slot('checked','checked')
                                                                        @endif
                                                                        @slot('text', 'Conform')
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'not_conform')
                                                                        @slot('value', 'not-conform')
                                                                        @slot('name', 'identification')
                                                                        @slot('size','12')
                                                                        @if($material_identification == 'not-conform')
                                                                            @slot('checked','checked')
                                                                        @endif
                                                                        @slot('text', 'Not Conform')
                                                                    @endcomponent
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                If Unsatisfactory Explain
                                                            </label>

                                                            @component('frontend.common.input.input')
                                                                @slot('name', 'material_check')
                                                                @slot('name', 'material_check')
                                                                @slot('value',  $receivingInspectionReport->unsatisfactory_material)
                                                                @slot('placeholder', 'If Unsatisfactory Explain')
                                                            @endcomponent
                                                        <div>
                                                    </div>
                                                </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <fieldset class="border p-2">
                                            <legend class="w-auto">5. Decision</legend>
                                                <div class="m-portlet__body">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            @component('frontend.common.input.textarea')
                                                                @slot('name', 'decision')
                                                                @slot('id', 'decision')
                                                                @slot('value',  $receivingInspectionReport->decision)
                                                                @slot('rows', '5')
                                                            @endcomponent
                                                        <div>
                                                    </div>
                                                </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                        <div class="flex">
                                            <div class="action-buttons">
                                                @component('frontend.common.buttons.update')
                                                    @slot('type','button')
                                                    @slot('id', 'update-rir')
                                                    @slot('class', 'update-rir')
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
    </div>
</div>
@endsection


@push('footer-scripts')
    <script>
        let uuid = '{{$receivingInspectionReport->uuid}}';
        let po_uuid = '{{$receivingInspectionReport->purchase_order->uuid}}';
        let rir_uuid = '{{$receivingInspectionReport->uuid}}';

    </script>

    <script src="{{ asset('js/frontend/rir/edit.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/vendor.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/expired-date.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/material-po.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/unit-material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-material.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/unit-item.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-item-uom.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/unit.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit.js') }}"></script>


@endpush
