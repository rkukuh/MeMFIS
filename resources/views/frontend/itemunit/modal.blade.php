<!-- begin::Modal-->
<div class="modal fade" id="modal_itemsunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TitleModalCustomer">Item Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!--begin::Form -->
                        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="CustomerForm">
                            <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Code *
                                        </label>

                                    @component('frontend.common.input.input')
                                        @slot('text', 'Code')
                                        @slot('name', 'code')
                                        @slot('type', 'text')
                                    @endcomponent

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Unit *
                                        </label>
                                        <br>
                                        @component('frontend.common.input.select')
                                            @slot('text', 'Unit')
                                            @slot('name', 'id_unit')
                                            @slot('id', 'm_select2_1')
                                            @slot('style', 'width:100%')
                                        @endcomponent
                                    </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Qty *
                                        </label>

                                    @component('frontend.common.input.input')
                                        @slot('text', 'Qty')
                                        @slot('name', 'qty')
                                        @slot('type', 'number')
                                    @endcomponent

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        Purchasing Price *
                                        </label>
                                        <br>
                                        @component('frontend.common.input.input')
                                        @slot('text', 'Purchasing Price')
                                        @slot('name', 'purchasingprice')
                                        @slot('type', 'number')
                                    @endcomponent

                                    </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        SellingPrice
                                        </label>
                                        <div id="m_repeater_1a">                    
                                        <div class="" id="m_repeater_1a">
                                            <div data-repeater-list="" >
                                                <div data-repeater-item class="row">     
                                                        <div class="m-form__group row">
                                                        <div class="col-md-0">
                                                        @component('frontend.common.input.input')
                                                            @slot('text', 'Selling Price')
                                                            @slot('name', 'sellingprice')
                                                            @slot('type', 'text')
                                                        @endcomponent

                                                        </div>
                                                        <div class="col-md-1">
                                                            <div data-repeater-delete="" class="btn-sm btn btn-danger">
                                                            <span>
                                                                <i class="la la-trash-o"></i>
                                                                <span>Delete</span>
                                                            </span>
                                                            </div>

                                                        </div>
                                                        </div>
                                                </div>                            
                                            </div>                 
                                        </div>
                                        <div class="m-form__group form-group row">
                                                <div data-repeater-create="" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
                                                    <span>
                                                        <i class="la la-plus"></i>
                                                        <span>Add</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-control-feedback text-danger" id="email-error"></div>
                                        <span class="m-form__help">
                                            SellingPrice
                                        </span>
                                    </div>
                                    <!-- <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        SellingPrice *
                                        </label>

                                    @component('frontend.common.input.input')
                                        @slot('text', 'Selling Price')
                                        @slot('name', 'sellingprice')
                                        @slot('type', 'number')
                                    @endcomponent

                                    </div> -->
                                    <!-- <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        SellingPrice2 *
                                        </label>
                                        <br>
                                        @component('frontend.common.input.input')
                                        @slot('text', 'Selling Price 2')
                                        @slot('name', 'sellingprice2')
                                        @slot('type', 'number')
                                    @endcomponent

                                    </div> -->
                                    </div>
                                    <!-- <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        SellingPrice3 *
                                        </label>

                                    @component('frontend.common.input.input')
                                        @slot('text', 'Selling Price 3')
                                        @slot('name', 'sellingprice3')
                                        @slot('type', 'number')
                                    @endcomponent

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                        SellingPrice4 *
                                        </label>
                                        <br>
                                        @component('frontend.common.input.input')
                                        @slot('text', 'Selling Price 4')
                                        @slot('name', 'sellingprice4')
                                        @slot('type', 'number')
                                    @endcomponent

                                    </div>
                                    </div> -->
                                    
                                    
                                    
                                </div>

                    <div class="modal-footer">
                          @component('frontend.common.buttons.close')
                            @slot('color', 'secondary')
                            @slot('size', 'md')
                            @slot('data_dismiss', 'modal')
                          @endcomponent

                          @component('frontend.common.buttons.submit')
                            @slot('color', 'success')
                            @slot('size', 'md')
                            @slot('class', 'add')
                        
                          @endcomponent

                    </div>
                    </div>
                            </form>
                </div>
                </div>
                </div>
                <!--end::Modal-->
