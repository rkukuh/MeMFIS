@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Price List
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
                        <a href="{{ route('frontend.unit.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Price List
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

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Price List
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
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
                                        @include('frontend.common.buttons.filter')
                                    </div>
                                </div>
                                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                        <div class="m-btn-group m-btn-group--pill btn-group" role="group" aria-label="Button group with nested dropdown">
                                            <button  class="m-btn btn btn-primary"  data-target="#modal_pricelist_item" data-toggle="modal">
                                                <span>
                                                    <i class="la la-plus-circle"></i>
                                                <span>Item</span>
                                                </span>
                                            </button>
                                            <button type="button" class="btn btn-primary m-btn m-btn--pill-last" data-target="#modal_pricelist_manhour" data-toggle="modal">
                                                <span>
                                                    <i class="la la-plus-circle"></i>
                                                <span>Manhour</span>
                                                </span>
                                            </button>
                                        </div>
                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>

                            @include('frontend.price-list.item.modal-create')
                            @include('frontend.price-list.item.modal-edit')

                            @include('frontend.price-list.manhour.modal-create')
                            @include('frontend.price-list.manhour.modal-edit')


                            <div class="col-lg-12">
                                @include('frontend.price-list.filter')
                            </div>
                            <div class="price_list_datatable" id="price_list_datatable"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/unit-type.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/item.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/item.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/unit.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/action-botton/unit-type.js')}}"></script>
    <script src="{{ asset('js/frontend/price-list/index.js')}}"></script>
    <script src="{{ asset('js/frontend/common/item.js') }}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>

@endpush
