<div class="m-portlet__body">
    <h1>Tool(S) List</h1>
    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
        <div class="row align-items-center">
            <div class="col-xl-6 order-2 order-xl-1">
                <div class="form-group m-form__group row align-items-center">
                    <div class="col-md-6">
                        <div class="m-input-icon m-input-icon--left">
                            <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
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

    <div class="htcrr_tools_datatable" id="scrolling_both"></div>
</div>
<div class="m-portlet__body">
    <h1>Material(S) List</h1>
    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
        <div class="row align-items-center">
            <div class="col-xl-6 order-2 order-xl-1">
                <div class="form-group m-form__group row align-items-center">
                    <div class="col-md-6">
                        <div class="m-input-icon m-input-icon--left">
                            <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
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

    <div class="htcrr_materials_datatable" id="scrolling_both"></div>
</div>

</div>

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12 footer">
        <div class="flex">
            <div class="action-buttons">
                @include('frontend.common.buttons.back')
            </div>
        </div>
    </div>
</div>