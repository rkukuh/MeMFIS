@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Material
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
                                Material
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-lg-6">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.show')

                                <h3 class="m-portlet__head-text">Material</h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <form id="itemform" name="itemform">
                                <div class="m-portlet__body">
                                    <fieldset class="border p-2">
                                        <legend class="w-auto">Identifier</legend>

                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Part Number
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $item->code)
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Name
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $item->name)
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                    Description
                                                </label>

                                                @if (empty($item->description))
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $item->description)
                                                    @endcomponent
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group m-form__group row hidden">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Barcode
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $item->barcode)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Unit
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', $item->unit->name)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Category
                                            </label>

                                            @if (empty($item->category->name))
                                                @include('frontend.common.label.data-info-nodata')
                                            @else
                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $item->category->name)
                                                @endcomponent
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Tagging
                                            </label>

                                            <div>
                                                @if ($item->tags->isEmpty())
                                                    @include('frontend.common.label.data-info-nodata')
                                                @else
                                                    @foreach ($item->tags as $tag)
                                                        @component('frontend.common.label.badge')
                                                            @slot('text', $tag->name)
                                                        @endcomponent
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Manufacturer
                                            </label>

                                            @if (empty($item->manufacturer_id))
                                                @include('frontend.common.label.data-info-nodata')
                                            @else
                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $item->manufacturer_id)
                                                @endcomponent
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6" style="padding-left: 0">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'is_stock')
                                                    @slot('name', 'is_stock')
                                                    @slot('text', 'Stockable?')
                                                    @slot('disabled', 'disabled')

                                                    @if ($item->is_stock == 1)
                                                        @slot('checked', 'checked')
                                                    @endif
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="checkbox">
                                                    @component('frontend.common.input.checkbox')
                                                        @slot('id', 'is_ppn')
                                                        @slot('name', 'is_ppn')
                                                        @slot('text', 'Taxable?')
                                                        @slot('disabled', 'disabled')

                                                        @if ($item->is_ppn == 1)
                                                            @slot('checked', 'checked')
                                                        @endif
                                                    @endcomponent

                                                    @if (isset($item->ppn_amount))
                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', 'PPN: ' . $item->ppn_amount . '%')
                                                        @endcomponent
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row hidden">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Account Code
                                            </label>

                                            @if (isset($item->journal))
                                                @component('frontend.common.label.data-info')
                                                    @slot('text', $item->account_code_and_name)
                                                @endcomponent
                                            @else
                                                @include('frontend.common.label.data-info-nodata')
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row" style="display: none">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Photos
                                            </label>

                                            <div>
                                                <img src="{{ asset('img/LogoMMF-100x42.png') }}" alt="">
                                            </div>
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
            <div class="col-lg-6">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.show')

                                <h3 class="m-portlet__head-text">
                                    Unit Conversion Table
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="item_unit_datatable" id="item_unit_datatable"></div>
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

                                @include('frontend.common.label.show')

                                <h3 class="m-portlet__head-text">
                                    Warehouse Stock Management
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="item_storage_datatable" id="item_storage_datatable"></div>
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
    </style>
@endpush

@push('footer-scripts')
    <script>
        let item_uuid = '{{ $item->uuid }}';
    </script>

    <script src="{{ asset('js/frontend/item/material/show.js') }}"></script>
@endpush
