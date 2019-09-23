<div id="m_accordion_1" class="m-accordion m-accordion--default m-accordion--solid m-accordion--section m-accordion--padding-lg m-accordion--toggle-arrow" role="tablist">

        <!--begin::Item-->
        <div class="m-accordion__item ">
            <div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_1_item_1_basic_index" data-toggle="collapse" href="#m_accordion_1_item_1_body" aria-expanded="  false">
                <span class="m-accordion__item-icon"></span>
                <span class="m-accordion__item-title">Basic</span>

                <span class="m-accordion__item-mode"></span>
            </div>

            <div class="m-accordion__item-body collapse" id="m_accordion_1_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_1_basic_index" data-parent="#m_accordion_1">
                <div class="m-accordion__item-content">
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
                                    <div class="col-xl-6 order-1 order-xl-2 m--align-right b-t-n">
                                        @component('frontend.common.buttons.summary')
                                            @slot('text', 'Basic Summary')
                                            @slot('href', route('frontend.project-hm.summary.basic', ['project' => $project->uuid ,'workPackage' => $workPackage->uuid]) )
                                        @endcomponent
                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="basic_datatable wp-datatable" id="scrolling_both"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Item-->

        <!--begin::Item-->
        <div class="m-accordion__item ">
            <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_1_item_2_sip_index" data-toggle="collapse" href="#m_accordion_1_item_2_body" aria-expanded="    false">
                <span class="m-accordion__item-icon"></span>
                <span class="m-accordion__item-title">Structure Inspection Program</span>

                <span class="m-accordion__item-mode"></span>
            </div>

            <div class="m-accordion__item-body collapse" id="m_accordion_1_item_2_body" class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_2_sip_index" data-parent="#m_accordion_1">
                <div class="m-accordion__item-content">
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
                                    <div class="col-xl-6 order-1 order-xl-2 m--align-right b-t-n">
                                        @component('frontend.common.buttons.summary')
                                            @slot('text', 'SIP Summary')
                                            @slot('href', route('frontend.project-hm.summary.sip', ['project' => $project->uuid ,'workPackage' => $workPackage->uuid]) )
                                        @endcomponent
                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="sip_datatable wp-datatable" id="scrolling_both"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Item-->

        <!--begin::Item-->
        <div class="m-accordion__item ">
            <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_1_item_3_cpcp_index" data-toggle="collapse" href="#m_accordion_1_item_3_body" aria-expanded="    false">
                <span class="m-accordion__item-icon"></span>
                <span class="m-accordion__item-title">Corrotion Prevention and Control Programs</span>

                <span class="m-accordion__item-mode"></span>
            </div>

            <div class="m-accordion__item-body collapse" id="m_accordion_1_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_3_cpcp_index" data-parent="#m_accordion_1">
                <div class="m-accordion__item-content">

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
                                <div class="col-xl-6 order-1 order-xl-2 m--align-right b-t-n">
                                    @component('frontend.common.buttons.summary')
                                        @slot('text', 'CPCP Summary')
                                        @slot('href', route('frontend.project-hm.summary.cpcp', ['project' => $project->uuid ,'workPackage' => $workPackage->uuid]) )
                                    @endcomponent
                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>

                        <div class="cpcp_datatable wp-datatable" id="scrolling_both"></div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!--end::Item-->
        @if($workPackage->is_template == 0)
        <div class="form-group m-form__group row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="action-buttons m--align-center">
                @component('frontend.common.buttons.summary')
                    @slot('text', 'Blank Work Package Summary')
                    @slot('href', route('frontend.workPackage.summary.workpackage', $workPackage->uuid) )
                @endcomponent
                @component('frontend.common.buttons.summary')
                    @slot('text', 'routine Summary')
                    @slot('href', route('frontend.workPackage.summary.routine', $workPackage->uuid) )
                @endcomponent
                </div>
            </div>
        </div>
        @endif
    </div>
    @push('footer-scripts')
        <script src="{{ asset('js/frontend/project/hm/routine/show.js')}}"></script>
        <script src="{{ asset('js/frontend/project/hm/datatables.js')}}"></script>
        <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
    @endpush
