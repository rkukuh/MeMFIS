<div class="m-accordion m-accordion--default m-accordion--solid m-accordion--section m-accordion--padding-lg m-accordion--toggle-arrow" id="m_accordion_2" role="tablist">
        <div class="m-portlet m-portlet--mobile">
            <!--begin::Item-->
            <div class="m-accordion__item ">
                <div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_2_item_1_head" data-toggle="collapse" href="#m_accordion_2_item_1_body" aria-expanded="false">
                    <span class="m-accordion__item-icon"></span>
                    <span class="m-accordion__item-title">AD/SB</span>
                    <span class="m-accordion__item-mode"></span>
                </div>

                <div class="m-accordion__item-body collapse" id="m_accordion_2_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_1_head" data-parent="#m_accordion_2">
                    <div class="m-accordion__item-content">
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
                                        @component('frontend.common.buttons.summary')
                                            @slot('text', 'AD/SB Summary')
                                            @slot('href', route('frontend.project-hm.summary.ad-sb', ['project' => $project->uuid ,'workPackage' => $workPackage->uuid]) )
                                        @endcomponent
                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="ad-sb_datatable wp-datatable" id="scrolling_both"></div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Item-->

            <!--begin::Item-->
            <div class="m-accordion__item ">
                <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_2_head" data-toggle="collapse" href="#m_accordion_2_item_2_body" aria-expanded="    false">
                    <span class="m-accordion__item-icon"></span>
                    <span class="m-accordion__item-title">CMR/AWL</span>

                    <span class="m-accordion__item-mode"></span>
                </div>

                <div class="m-accordion__item-body collapse" id="m_accordion_2_item_2_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_2_head" data-parent="#m_accordion_2">
                    <div class="m-accordion__item-content">
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
                                            @component('frontend.common.buttons.summary')
                                                @slot('text', 'CMR/AWL Summary')
                                                @slot('href', route('frontend.project-hm.summary.cmr-awl', ['project' => $project->uuid ,'workPackage' => $workPackage->uuid]) )
                                            @endcomponent
                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="cmr-awl_datatable wp-datatable" id="scrolling_both"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Item-->

            <!--begin::Item-->
            <div class="m-accordion__item ">
                <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_3_head" data-toggle="collapse" href="#m_accordion_2_item_3_body" aria-expanded="    false">
                    <span class="m-accordion__item-icon"></span>
                    <span class="m-accordion__item-title">Special Instruction</span>

                    <span class="m-accordion__item-mode"></span>
                </div>

                <div class="m-accordion__item-body collapse" id="m_accordion_2_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_3_head" data-parent="#m_accordion_2">
                    <div class="m-accordion__item-content">
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
                                            @component('frontend.common.buttons.summary')
                                                @slot('text', 'SI Summary')
                                                @slot('href', route('frontend.project-hm.summary.si', ['project' => $project->uuid ,'workPackage' => $workPackage->uuid]) )
                                            @endcomponent
                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="si_datatable wp-datatable" id="scrolling_both"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Item-->

                    <!--begin::Item-->
        <div class="m-accordion__item ">
                <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_4_head" data-toggle="collapse" href="#m_accordion_2_item_4_body" aria-expanded="false">
                    <span class="m-accordion__item-icon"></span>
                    <span class="m-accordion__item-title">Engineering Authorization</span>

                    <span class="m-accordion__item-mode"></span>
                </div>

                <div class="m-accordion__item-body collapse" id="m_accordion_2_item_4_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_4_head" >
                    <div class="m-accordion__item-content">
                        <div class="m-portlet m-portlet--mobile">
                            <div class="m-portlet__body">
                                <h1>Engineering Authorization</h1>
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
                                                @slot('text', 'EA Summary')
                                                @slot('href', route('frontend.project-hm.summary.ea',['project' => $project->uuid ,'workPackage' => $workPackage->uuid]) )
                                            @endcomponent


                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ea_datatable wp-datatable" id="scrolling_both"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Item-->

            <!--begin::Item-->
            <div class="m-accordion__item ">
                <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_5_head" data-toggle="collapse" href="#m_accordion_2_item_5_body" aria-expanded="false">
                    <span class="m-accordion__item-icon"></span>
                    <span class="m-accordion__item-title">Engineering Order</span>

                    <span class="m-accordion__item-mode"></span>
                </div>

                <div class="m-accordion__item-body collapse" id="m_accordion_2_item_5_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_5_head" >
                    <div class="m-accordion__item-content">
                        <div class="m-portlet m-portlet--mobile">
                            <div class="m-portlet__body">
                                <h1>Engineering Order</h1>
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
                                                @slot('text', 'EO Summary')
                                                @slot('href', route('frontend.project-hm.summary.eo',['project' => $project->uuid ,'workPackage' => $workPackage->uuid]) )
                                            @endcomponent


                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="eo_datatable wp-datatable" id="scrolling_both"></div>
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
                        @slot('text', 'Non-routine Summary')
                        @slot('href', route('frontend.workPackage.summary.nonroutine', $workPackage->uuid) )
                    @endcomponent
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    @push('footer-scripts')
        <script src="{{ asset('js/frontend/project/hm/non-routine/show.js')}}"></script>
    @endpush
