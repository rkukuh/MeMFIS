@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Inventory Out Material
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
                            Inventory Out Material
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
                                Inventory Out Material
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
                                        @slot('value', $inventoryOut->inventoried_at)
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
                                            <option value="{{ $storage->id }}" @if ($storage->id == $inventoryOut->storage_id) selected
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
                                        @slot('value', $inventoryOut->section)
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Ref. Document @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.text')
                                        @slot('id', 'material')
                                        @slot('text', 'Ref. Document ')
                                        @slot('name', 'material')
                                        @slot('id_error','material')
                                        @slot('value', $inventoryOut->number)
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Received By @include('frontend.common.label.required')
                                        </label>

                                        <select id="received-by" name="received-by" class="form-control m-select2">
                                            @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}" @if ($employee->id == $inventoryOut->received_by) selected
                                                @endif>
                                                {{ $employee->first_name }}
                                            </option>
                                            @endforeach
                                        </select>
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
                                        @slot('value', $inventoryOut->description)
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
                                                    @include('frontend.inventory-out.material.modal')
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
                                                @slot('id', 'add-inventory-out')
                                                @slot('class', 'add-inventory-out')
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
    let inventoryout_uuid = '{{ $inventoryOut->uuid }}';
</script>

<script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>

<script src="{{ asset('js/frontend/functions/select2/storage.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/storage.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/received-by.js') }}"></script>
<!-- <script src="{{ asset('js/frontend/functions/fill-combobox/received-by.js') }}"></script> -->

<script src="{{ asset('js/frontend/functions/select2/tool.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/tool.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/unit.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/unit.js') }}"></script>

<script src="{{ asset('js/frontend/inventory-out/material/edit.js') }}"></script>
@endpush