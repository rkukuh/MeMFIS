<div class="modal fade" id="modal_supplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalCustomer">New Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="CustomerForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <ul class="nav nav-tabs  m-tabs-line m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#general" role="tab">
                                    <i class="la la-book"></i>
                                    General
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#address" role="tab">
                                    <i class="la la-map"></i>
                                    Address
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#contact" role="tab">
                                    <i class="la la-phone"></i>
                                    Contact
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="general" role="tabpanel">
                                @include('frontend.supplier.tabs-create.general')
                            </div>
                            <div class="tab-pane" id="address" role="tabpanel">
                                @include('frontend.supplier.tabs-create.address')
                            </div>
                            <div class="tab-pane" id="contact" role="tabpanel">
                                @include('frontend.supplier.tabs-create.contact')
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add')
                                @endcomponent
        
                                @component('frontend.common.buttons.reset')
                                @endcomponent
        
                                @component('frontend.common.buttons.close')
                                    @slot('data_dismiss', 'modal')
                                @endcomponent        
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
