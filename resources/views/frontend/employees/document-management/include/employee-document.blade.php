<div class="col-lg-12 col-md-12 col-sm-12">
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
                        @slot('text', 'Employee Document')
                        @slot('data_target', '#modal_employee_document')
                    @endcomponent

                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>

            @include('frontend.employees.document-management.modal.employee-document')

        <div class="m_datatable_employee_document" id="scrolling_both"></div>
    </div>