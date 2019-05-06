<div class="m-accordion m-accordion--default m-accordion--solid m-accordion--section m-accordion--padding-lg m-accordion--toggle-arrow" id="m_accordion_3" role="tablist">
    <!--begin::Item-->
    <div class="m-accordion__item ">
        <div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_3_item_1_head" data-toggle="collapse" href="#m_accordion_3_item_1_body" aria-expanded="  false">
            <span class="m-accordion__item-icon"></span>
            <span class="m-accordion__item-title">General Tool(S) List</span>

            <span class="m-accordion__item-mode"></span>
        </div>

        <div class="m-accordion__item-body collapse" id="m_accordion_3_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_3_item_1_head" data-parent="#m_accordion_3">
            <div class="m-accordion__item-content">
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <h1>General Tool(S) List</h1>
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
                                @include('frontend.workpackage.item.tool.index')

                                </div>
                        </div>

                        <div class="tools_datatable" id="scrolling_both"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Item-->

<!--begin::Item-->
<div class="m-accordion__item ">
        <div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_3_item_2_head" data-toggle="collapse" href="#m_accordion_3_item_2_body" aria-expanded="  false">
            <span class="m-accordion__item-icon"></span>
            <span class="m-accordion__item-title">General Material(S) List</span>

            <span class="m-accordion__item-mode"></span>
        </div>

        <div class="m-accordion__item-body collapse" id="m_accordion_3_item_2_body" class=" " role="tabpanel" aria-labelledby="m_accordion_3_item_2_head" data-parent="#m_accordion_3">
            <div class="m-accordion__item-content">
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <h1>General Material(S) List</h1>
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
                                @include('frontend.workpackage.item.item.index')

                            </div>
                        </div>

                        <div class="materials_datatable" id="scrolling_both"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Item-->

</div>
