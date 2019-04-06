<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
        <h1>Basic</h1>
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
                    @component('frontend.common.buttons.create-new')
                        @slot('text', 'Basic')
                        @slot('data_target', '#modal_basic')
                    @endcomponent
                    @component('frontend.common.buttons.summary')
                        @slot('text', 'Basic Summary')
                        @slot('href', route('frontend.summary.basic') )
                    @endcomponent

                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>

        <div class="basic_datatable wp-datatable" id="scrolling_both"></div>
    </div>
</div>
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
        <h1>Structure Inspection Program</h1>
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
                    @component('frontend.common.buttons.create-new')
                        @slot('text', 'SIP')
                        @slot('data_target', '#modal_sip')
                        @endcomponent
                    @component('frontend.common.buttons.summary')
                        @slot('text', 'SIP Summary')
                        @slot('href', route('frontend.summary.sip') )
                    @endcomponent


                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>

        <div class="sip_datatable wp-datatable" id="scrolling_both"></div>
    </div>
</div>
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
    <h1>Corrotion Prevention and Control Programs</h1>
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
                    @component('frontend.common.buttons.create-new')
                        @slot('text', 'CPCP')
                        @slot('data_target', '#modal_cpcp')
                        @endcomponent
                    @component('frontend.common.buttons.summary')
                        @slot('text', 'CPCP Summary')
                        @slot('href', route('frontend.summary.cpcp') )
                    @endcomponent


                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>

        <div class="cpcp_datatable wp-datatable" id="scrolling_both"></div>
    </div>
</div>

@push('footer-scripts')
    <script src="{{ asset('js/frontend/workpackage/routine/index.js')}}"></script>
    <script src="{{ asset('js/frontend/workpackage/datatables.js')}}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
@endpush
