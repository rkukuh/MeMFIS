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
                                                            @slot('text', 'PR-2121212')
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
                                                        @slot('text', 'Part Number')
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
                                                        @slot('text', 'Part Number')
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
                                                    @slot('text', 'Part Number')
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
                                                    @slot('text', 'Part Number')
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
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('name', '1')
                                                            @slot('text','Purchase')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('name', '2')
                                                            @slot('text','Repair')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('name', '3')
                                                            @slot('text','Serviceable')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.input.checkbox')
                                                            @slot('name', '4')
                                                            @slot('text','Unserviceable')
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
                                                        <input type="text" class="form-control m-input" placeholder="Search..."
                                                            id="generalSearch">
                                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                                            <span><i class="la la-search"></i></span>
                                                        </span>
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
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'reusable_container')
                                                                        @slot('value', 'reusable container')
                                                                        @slot('name', 'type')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Reusable Container')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'carton_box')
                                                                        @slot('value', 'carton box')
                                                                        @slot('name', 'type')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Carton Box')
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'wooden box')
                                                                        @slot('value', 'wooden box')
                                                                        @slot('name', 'type')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Wooden Box')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'unpacked')
                                                                        @slot('id', 'unpacked')
                                                                        @slot('name', 'type')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Unpacked')
                                                                    @endcomponent
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'statisfactory')
                                                                        @slot('value', 'statisfactory')
                                                                        @slot('name', 'condition')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Statisfactory')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'unsatisfactory')
                                                                        @slot('value', 'unsatisfactory')
                                                                        @slot('name', 'condition')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Unsatisfactory')
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
                                                                @slot('name', 'packing_handling_check')
                                                                @slot('name', 'packing_handling_check')
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
                                            <legend class="w-auto">2. Preservation Check</legend>
                                                <div class="m-portlet__body">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'reusable_container')
                                                                        @slot('value', 'reusable container')
                                                                        @slot('name', 'preservation_check')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Reusable Container')
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'wooden_box')
                                                                        @slot('value', 'wooden box')
                                                                        @slot('name', 'preservation_check')
                                                                        @slot('size','12')
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
                                                                @slot('name', 'preservation_check')
                                                                @slot('name', 'preservation_check')
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
                                                                        @slot('name', 'general_document')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Invoice')
                                                                        @slot('value', 'invoice')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.checkbox')
                                                                        @slot('id', 'airway_bill')
                                                                        @slot('name', 'is_stock')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Airway Bill')
                                                                        @slot('value', 'airway bill')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.checkbox')
                                                                        @slot('id', 'shipping_document')
                                                                        @slot('name', 'general_document')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Shipping Document')
                                                                        @slot('value', 'shipping document')
                                                                    @endcomponent
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    @component('frontend.common.input.checkbox')
                                                                        @slot('id', 'certificate_of_conformity')
                                                                        @slot('name', 'technical_document')
                                                                        @slot('value', 'certificate of conformity')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Certificate of Conformity')
                                                                    @endcomponent
                                                                    @component('frontend.common.input.checkbox')
                                                                        @slot('id', 'arc_aat')
                                                                        @slot('name', 'technical_document')
                                                                        @slot('value', 'arc/aat')
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
                                                                        @slot('id', 'statisfactory')
                                                                        @slot('value', 'statisfactory')
                                                                        @slot('name', 'condition')
                                                                        @slot('size','12')
                                                                        @slot('text', 'Statisfactory')
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'unsatisfactory')
                                                                        @slot('value', 'unsatisfactory')
                                                                        @slot('name', 'condition')
                                                                        @slot('size','12')
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
                                                                        @slot('text', 'Conform')
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'not_conform')
                                                                        @slot('value', 'not_conform')
                                                                        @slot('name', 'quality')
                                                                        @slot('size','12')
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
                                                                        @slot('text', 'Conform')
                                                                    @endcomponent
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    @component('frontend.common.input.radio')
                                                                        @slot('id', 'not_conform')
                                                                        @slot('value', 'not_conform')
                                                                        @slot('name', 'identification')
                                                                        @slot('size','12')
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
                                                                @slot('placeholder', 'If Unsatisfactory Explain')
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
        let uuid = '8083d4fc-7c10-4882-bfa3-888cd081a3e5';
    </script>

    <script src="{{ asset('js/frontend/receiving-inspection-report/show.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/vendor.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/vendor.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/purchase-order.js')}}"></script>
@endpush
