<div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row align-items-center" style="padding-bottom:15px">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-md-4">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" class="form-control m-input" placeholder="Search..."
                                    id="generalSearch4">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span><i class="la la-search"></i></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <div class="general_license_class">
                            @component('frontend.common.buttons.create-new')
                                @slot('text', 'Add General License')
                                @slot('data_target', '#modal_general_license')
                            @endcomponent    
                    </div>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
            @include('frontend.employee.employee.modal.general-license')

        <div class="m_datatable_general_license" id="scrolling_both"></div>
    </div>