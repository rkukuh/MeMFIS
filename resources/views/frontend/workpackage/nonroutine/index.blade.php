<div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <h1>AD/SB</h1>
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
                    <div class="col-xl-6 order-1 order-xl-2 m--align-right b-t-n">
                        @component('frontend.common.buttons.create-new')
                            @slot('text', 'AD/SB')
                            @slot('class', 'btn-add')
                            @slot('data_target', '#modal_ad_sb')
                            @endcomponent
                        @component('frontend.common.buttons.summary')
                            @slot('text', 'AD/SB Summary')
                            @slot('href', route('frontend.workPackage.summary.ad-sb', $workPackage->uuid) )
                        @endcomponent

                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>

            <div class="ad-sb_datatable wp-datatable" id="scrolling_both"></div>
        </div>
    </div>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <h1>CMR/AWL</h1>
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
                    <div class="col-xl-6 order-1 order-xl-2 m--align-right b-t-n">
                        @component('frontend.common.buttons.create-new')
                            @slot('text', 'CMR/AWL')
                            @slot('class', 'btn-add')
                            @slot('data_target', '#modal_cmr_awl')
                            @endcomponent
                        @component('frontend.common.buttons.summary')
                            @slot('text', 'CMR/AWL Summary')
                            @slot('href', route('frontend.workPackage.summary.cmr-awl', $workPackage->uuid) )
                        @endcomponent


                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>

            <div class="cmr-awl_datatable wp-datatable" id="scrolling_both"></div>
        </div>
    </div>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <h1>Special Instruction</h1>
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
                    <div class="col-xl-6 order-1 order-xl-2 m--align-right b-t-n">
                        @component('frontend.common.buttons.create-new')
                            @slot('text', 'Special Instruction')
                            @slot('class', 'btn-add')
                            @slot('data_target', '#modal_si')
                            @endcomponent
                        @component('frontend.common.buttons.summary')
                            @slot('text', 'SI Summary')
                            @slot('href', route('frontend.workPackage.summary.si', $workPackage->uuid) )
                        @endcomponent


                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>

            <div class="si_datatable wp-datatable" id="scrolling_both"></div>
        </div>
    </div>

    @push('footer-scripts')
        <script src="{{ asset('js/frontend/workpackage/non-routine/index.js')}}"></script>
    @endpush
