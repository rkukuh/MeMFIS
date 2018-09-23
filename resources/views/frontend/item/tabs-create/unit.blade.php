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
                @component('frontend.common.buttons.create-new')
                    @slot('size', 'md')
                    @slot('color', 'primary')
                    @slot('text', 'Add Item Unit')
                    @slot('data_target', '#modal_itemsunit')
                @endcomponent

                <div class="m-separator m-separator--dashed d-xl-none"></div>
            </div>
        </div>
    </div>
    <!--end: Search Form -->


    <!--begin: Datatable -->
    {{-- <div class="m_datatable" id="scrolling_both"></div> --}}