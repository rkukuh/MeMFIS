<div class="modal fade show" id="modal_po" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TitleModalCheck">Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="CheckForm">
                        <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label class="form-control-label">
                                        Item
                                    </label>
                                    @component('frontend.common.label.data-info')
                                        @slot('text', 'Item')
                                        @slot('id', 'item_name')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <label class="form-control-label">
                                        Request Qty
                                    </label>
                                    @component('frontend.common.input.number')
                                        @slot('text', 'Request Qty')
                                        @slot('name','qty')
                                        @slot('id','qty')
                                    @endcomponent
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <label class="form-control-label">
                                        Unit
                                    </label>
                                    
                                    @component('frontend.common.input.select2')
                                        @slot('text', 'Unit')
                                        @slot('name','unit_id')
                                        @slot('id','unit_id')
                                    @endcomponent
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Price
                                    </label>
                                    @component('frontend.common.input.number')
                                        @slot('text', 'Price')
                                        @slot('name','price')
                                        @slot('id','price')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Disc Type
                                    </label>

                                    @component('frontend.common.input.select2')
                                        @slot('text', 'Promo')
                                        @slot('name', 'promo-type')
                                        @slot('id', 'promo-type')
                                        @slot('class', 'promo-type')
                                        @slot('id_error', 'promo-type')
                                    @endcomponent
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Disc  Amount
                                    </label>
                                    @component('frontend.common.input.number')
                                        @slot('text', 'Discount')
                                        @slot('name', 'promo')
                                        @slot('id', 'promo')
                                        @slot('id_error', 'promo')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label class="form-control-label">
                                        Remark @include('frontend.common.label.optional')
                                    </label>

                                    @component('frontend.common.input.textarea')
                                        @slot('text', 'Remark')
                                        @slot('rows', '5')
                                        @slot('name', 'remark_material')
                                        @slot('id', 'remark_material')
                                        @slot('id_error', 'remark_material')
                                    @endcomponent
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="flex">
                                <div class="action-buttons">
                                    @component('frontend.common.buttons.update')
                                        @slot('class', 'update-item')
                                        @slot('type', 'button')
                                    @endcomponent
                                    @component('frontend.common.buttons.reset')
                                        @slot('class', 'reset-sequance')
                                    @endcomponent
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
