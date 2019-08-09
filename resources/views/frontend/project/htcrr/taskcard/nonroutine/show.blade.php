<div class="m-accordion__item-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body">
            <h1>HT/CRR</h1>
                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row align-items-center">
                        <div class="col-xl-6 order-2 order-xl-1">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-6">
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
                        <div class="col-xl-6 order-1 order-xl-2 m--align-right">
                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                        </div>
                    </div>
                </div>

                <div class="ht_crr_datatable wp-datatable" id="scrolling_both"></div>
            </div>
        </div>
    </div>
    @push('footer-scripts')
        <script src="{{ asset('js/frontend/project/hm/non-routine/show.js')}}"></script>
    @endpush
