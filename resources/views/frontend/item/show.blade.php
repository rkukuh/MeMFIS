@extends('frontend.master')

@section('content')
    <div class="m-subheader ">
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
                        <a href="{{route('frontend.item.index')}}" class="m-nav__link">
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

                                @include('frontend.common.label.create-new')

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

                                        <div class="form-group m-form__group row ">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Part Number
                                                </label>

                                                @component('frontend.common.label.p')
                                                    @slot('text', $item->code)
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Name
                                                </label>

                                                @component('frontend.common.label.p')
                                                    @slot('text', $item->name)
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row ">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                    Description
                                                </label>

                                                @component('frontend.common.label.p')
                                                    @slot('text', $item->description)
                                                @endcomponent
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group m-form__group row ">
                                        <div class="col-sm-6 col-md-6 col-lg-6 hidden">
                                            <label class="form-control-label">
                                                Barcode
                                            </label>

                                            @component('frontend.common.label.p')
                                                @slot('text', $item->barcode)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label" style="margin-right:100%">
                                                Category
                                            </label>

                                            @foreach($item->categories as $category)
                                                @component('frontend.common.label.label')
                                                    @slot('text', $category->name)
                                                @endcomponent
                                            @endforeach
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label" style="margin-right:100%">
                                                Tag
                                            </label>

                                            @foreach($item->tags as $tag)
                                                @component('frontend.common.label.label')
                                                    @slot('text', $tag->name.',')
                                                @endcomponent
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label" style="margin-right:100%">
                                                Quantity
                                            </label>

                                            @component('frontend.common.label.p')
                                                @slot('text', $item->unit_quantity)
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label" style="margin-right:100%">
                                                Unit
                                            </label>

                                            @component('frontend.common.label.p')
                                                @slot('text', $item->unit->name)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            @component('frontend.common.input.checkbox')
                                                @slot('id', 'isstock')
                                                @slot('name', 'isstock')
                                                @slot('text', 'Stockable?')

                                                @if($item->is_stock == 1)
                                                    @slot('editable','checked')
                                                @endif
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'isppn')
                                                    @slot('name', 'isppn')
                                                    @slot('text', 'Dikenai PPN?')

                                                    @if($item->is_ppn == 1)
                                                        @slot('editable','checked')
                                                    @endif
                                                @endcomponent

                                                @component('frontend.common.label.label')
                                                    @slot('text', 'PPN : ')
                                                @endcomponent

                                                @component('frontend.common.label.label')
                                                    @slot('text', $item->ppn_amount)
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Photos
                                            </label>

                                            <img src="{{ asset('img/LogoMMF.png') }}" alt="" width="100px">
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Account Code
                                            </label>

                                            @component('frontend.common.label.p')
                                                @slot('text', $journal_name)
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.back')
                                                        @slot('href', route('frontend.item.index') )
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
            <div class="col-lg-6">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Material &rsaquo; UoM (Unit of Measurement)
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                </div>
                            </div>

                            @include('frontend.item.uom.modal')

                            <div class="m_datatable1" id="fisrt"></div>
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
                                    Material &rsaquo; Min/Max Stock
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                </div>
                            </div>

                            @include('frontend.item.storage.modal')
                            @include('frontend.storage.modal')
                            @include('frontend.category.modal')

                            <div class="m_datatable2" id="second"></div>
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
        let code = '{{$item->code}}';
    </script>

    <script src="{{ asset('js/frontend/functions/reset.js')}}"></script>
    <script src="{{ asset('js/frontend/item/show.js') }}"></script>
@endpush
