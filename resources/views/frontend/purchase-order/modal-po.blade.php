<div class="modal fade show" id="modal_po" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TitleModalCheck">Check Stocl</h5>
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
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Request Qty
                                    </label>
                                    @component('frontend.common.input.number')
                                        @slot('text', 'Request Qty')
                                        @slot('name','qty')
                                        @slot('id','qty')
                                    @endcomponent
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Unit
                                    </label>
                                    @component('frontend.common.input.select2')
                                        @slot('text', 'Unit')
                                        @slot('name','unit_id')
                                        @slot('id','unit_id')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
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
                                        Disc
                                    </label>
                                    @component('frontend.common.input.number')
                                        @slot('text', 'Disc')
                                        @slot('name','disc_dollar')
                                        @slot('id','disc_dollar')
                                        @slot('input_append','$')
                                    @endcomponent
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Disc
                                    </label>
                                    @component('frontend.common.input.number')
                                        @slot('text', 'Disc')
                                        @slot('name','disc_percentage')
                                        @slot('id','disc_percentage')
                                        @slot('input_append','%')
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
                                        @slot('name', 'remark_tool')
                                        @slot('id', 'remark_tool')
                                        @slot('id_error', 'remark_tool')
                                    @endcomponent
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="flex">
                                <div class="action-buttons">
                                    @include('frontend.common.buttons.close')
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
