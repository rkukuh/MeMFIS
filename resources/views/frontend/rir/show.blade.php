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

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $receivingInspectionReport->vendor->name)
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Delivery Document
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                    @slot('text', $receivingInspectionReport->delivery_document_number)
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

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text',  $receivingInspectionReport->rir_date)
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
                                                        @component('frontend.common.label.data-info')
                                                            @slot('text',  $receivingInspectionReport->status->name)
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
                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rir_datatable" id="scrolling_both"></div>
                                <hr>
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
                                                            @component('frontend.common.label.data-info')
                                                                @slot('text',  $packing_type)
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            @component('frontend.common.label.data-info')
                                                                @slot('text',  $packing_condition)
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                If Unsatisfactory Explain
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text',  $receivingInspectionReport->unsatisfactory_packing)
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
                                                            @component('frontend.common.label.data-info')
                                                                @slot('text',  $preservation_check)
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                If Unsatisfactory Explain
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text',  $receivingInspectionReport->unsatisfactory_preservation)
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
                                                                        @if(in_array('invoice',$general_decument))
                                                                            @slot('checked', 'checked')
                                                                        @endif
                                                                    @endcomponent
                                                                    @component('frontend.common.input.checkbox')
                                                                        @slot('id', 'airway_bill')
                                                                        @slot('class', 'general_document')
                                                                        @slot('name', 'general_document[]')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Airway Bill')
                                                                        @slot('value', 'airway bill')
                                                                        @if(in_array('airway-bill',$general_decument))
                                                                            @slot('checked', 'checked')
                                                                        @endif
                                                                    @endcomponent
                                                                    @component('frontend.common.input.checkbox')
                                                                        @slot('id', 'shipping_document')
                                                                        @slot('class', 'general_document')
                                                                        @slot('name', 'general_document[]')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Shipping Document')
                                                                        @slot('value', 'shipping document')
                                                                        @if(in_array('shipping-document',$general_decument))
                                                                            @slot('checked', 'checked')
                                                                        @endif
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
                                                                        @slot('value', 'certificate of conformity')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Certificate of Conformity')
                                                                        @if(in_array('comformity-certificate',$technical_decument))
                                                                            @slot('checked', 'checked')
                                                                        @endif
                                                                    @endcomponent
                                                                    @component('frontend.common.input.checkbox')
                                                                        @slot('id', 'arc_aat')
                                                                        @slot('class', 'technical_document')
                                                                        @slot('name', 'technical_document[]')
                                                                        @slot('value', 'arc/aat')
                                                                        @slot('size','12')
                                                                        @slot('text', 'ARC/AAT')
                                                                        @if(in_array('arc-aat',$technical_decument))
                                                                            @slot('checked', 'checked')
                                                                        @endif
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

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', $receivingInspectionReport->unsatisfactory_document)
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
                                                            @component('frontend.common.label.data-info')
                                                                @slot('text',  $material_condition)
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                            @component('frontend.common.label.data-info')
                                                                @slot('text',  $material_quality)
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                            @component('frontend.common.label.data-info')
                                                                @slot('text',  $material_identification)
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                If Unsatisfactory Explain
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', $receivingInspectionReport->unsatisfactory_material)
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
                                                                @slot('rows', '5')
                                                                @slot('value', $receivingInspectionReport->decision)
                                                                @slot('disabled', 'disabled')
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
    <script src="{{ asset('js/frontend/rir/show.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/vendor.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/vendor.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/purchase-order.js')}}"></script>
@endpush
