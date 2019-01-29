<div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <h2>AD/SB</h2>
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
                        @component('frontend.common.buttons.summary')
                            @slot('text', 'AD/SB Summary')
                            @slot('href', route('frontend.summary.ad-sb') )
                        @endcomponent

                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>

            <div class="ad-sb_datatable" id="scrolling_both"></div>
        </div>
    </div>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <h2>CMR/AWL</h2>
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
                        @component('frontend.common.buttons.summary')
                            @slot('text', 'CMR/AWL Summary')
                            @slot('href', route('frontend.summary.cmr-awl') )
                        @endcomponent

                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>

            <div class="cmr-awl_datatable" id="scrolling_both"></div>
        </div>
    </div>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <h2>Special Instruction</h2>
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
                        @component('frontend.common.buttons.summary')
                            @slot('text', 'SI Summary')
                            @slot('href', route('frontend.summary.si') )
                        @endcomponent


                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>

            <div class="si_datatable" id="scrolling_both"></div>
        </div>
    </div>

    @push('footer-scripts')
        <script src="{{ asset('js/frontend/workpackage/non-routine/create.js')}}"></script>
    @endpush
