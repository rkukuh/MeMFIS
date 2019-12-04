<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="row align-items-center" style="padding-bottom:15px">
        <div class="col-xl-8 order-2 order-xl-1">
            <div class="form-group m-form__group row align-items-center">
                <div class="col-md-4">
                    {{-- <div class="m-input-icon m-input-icon--left">
                    </div> --}}
                    {{-- @component('frontend.common.item.index')
                        @slot('name_item','part_number')
                        @slot('id_item','part_number')
                    @endcomponent --}}

                    <div style="height:50px;background-color:beige;
                            padding:5px 5px 5px 5px;">

                    <div class="row">
                        <div class="col-sm-8 col-md-8 col-lg-8">
                                <label for="Item" class="search-item" id="search-item" style="margin-top:5px">Search Item</label>
                                {{-- <div class="search-item" id="search-item"> --}}

                                {{-- </div> --}}
                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding: 0;">
                            @component('frontend.common.item.button-create')
                                @slot('text', '')
                                @slot('size', 'sm')
                                @slot('icon', 'search')
                                @slot('data_target', '#modal_item_search')
                            @endcomponent
                        </div>

                        <input type="hidden" class="input-item-uuid" name="part_number" id="part_number">
                    </div>
                </div>




                </div>
            </div>
        </div>
        @include('frontend.common.item.modal')

        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <div class="m-separator m-separator--dashed d-xl-none"></div>
        </div>
    </div>

    <div class="m_datatable_by_partnumber" id="scrolling_both"></div>
</div>

@push('header-scripts')
    <link
        href="https://cdn.datatables.net/1.10.12/css/dataTables.material.min.css"
        rel="stylesheet">
    <link
        href="//cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"
        rel="stylesheet">
@endpush

@push('footer-scripts')
    {{-- <script src="{{ asset('js/frontend/common/item.js') }}"></script> --}}
    <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
@endpush
