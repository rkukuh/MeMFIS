@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Inventory In
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
                            Inventory In
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
                                Inventory In
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
                                            Date @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.datepicker')
                                        @slot('id', 'date')
                                        @slot('text', 'Date')
                                        @slot('name', 'date')
                                        @slot('id_error','inventoried_at')
                                        @slot('value', $inventoryIn->inventoried_at)
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Ref. Doc No. @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.text')
                                        @slot('id', 'ref-no')
                                        @slot('text', 'Ref No.')
                                        @slot('name', 'ref-no')
                                        @slot('id_error','ref-no')
                                        @slot('value', $additionals->ref_no)
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Ref. Quotation Workshop
                                        </label>

                                        @include('frontend.common.ref-quotation-workshop.index')

                                        @component('frontend.common.input.hidden')
                                        @slot('id', 'quotation_workshop')
                                        @slot('name', 'quotation_workshop')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Storage @include('frontend.common.label.required')
                                        </label>

                                        <select id="item_storage_id" name="item_storage_id" class="form-control m-select2">
                                            @foreach ($storages as $storage)
                                            <option value="{{ $storage->id }}" @if ($storage->id == $inventoryIn->storage_id) selected
                                                @endif>
                                                {{ $storage->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Section Code
                                        </label>

                                        @component('frontend.common.input.text')
                                        @slot('text', 'Section Code')
                                        @slot('id', 'section_code')
                                        @slot('name', 'section_code')
                                        @slot('id_error', 'section_code')
                                        @slot('value', $inventoryIn->section)
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Remark
                                        </label>

                                        @component('frontend.common.input.textarea')
                                        @slot('rows', '5')
                                        @slot('id', 'remark')
                                        @slot('name', 'remark')
                                        @slot('text', 'Remark')
                                        @slot('value', $inventoryIn->description)
                                        @endcomponent
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="m-portlet">
                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <span class="m-portlet__head-icon m--hide">
                                                            <i class="la la-gear"></i>
                                                        </span>

                                                        @include('frontend.common.label.datalist')

                                                        <h3 class="m-portlet__head-text">
                                                            Item
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-portlet m-portlet--mobile">
                                                <div class="m-portlet__body">
                                                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                                        <div class="row align-items-center">
                                                            <div class="col-xl-8 order-2 order-xl-1">
                                                                <div class="form-group m-form__group row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <div class="m-input-icon m-input-icon--left">
                                                                            <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                                                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                                <span><i class="la la-search"></i></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                                                @component('frontend.common.buttons.create-new')
                                                                @slot('text', 'Item')
                                                                @slot('data_target', '#modal_item')
                                                                @endcomponent


                                                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @include('frontend.inventory-in.modal')
                                                    <div class="item_datatable" id="scrolling_both"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                        <div class="flex">
                                            <div class="action-buttons">
                                                @component('frontend.common.buttons.submit')
                                                @slot('type','button')
                                                @slot('id', 'update-inventory-in')
                                                @slot('class', 'update-inventory-in')
                                                @endcomponent

                                                @include('frontend.common.buttons.reset')
                                                @include('frontend.common.item.modal')
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
    let inventoryin_uuid = '{{ $inventoryIn->uuid }}';
</script>

<script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>

<script src="{{ asset('js/frontend/functions/select2/storage.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/unit.js') }}"></script>
<!-- <script src="{{ asset('js/frontend/functions/fill-combobox/unit.js') }}"></script> -->

<script src="{{ asset('js/frontend/inventory-in/edit.js') }}"></script>
<script src="{{ asset('js/frontend/inventory-in/form-reset.js') }}"></script>

@endpush