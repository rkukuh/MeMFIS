<div class="modal fade" id="modal_tool_request" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalInstruction">
                    Tool Request Jobcard

                    <small id="instruction" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="InstructionForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Part Number
                                </label>

                                @component('frontend.common.label.data-info')
                                    @slot('text', 'generate')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Item Description
                                </label>

                                @component('frontend.common.label.data-info')
                                    @slot('text', 'generate')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Item
                                </label>

                                @component('frontend.common.input.select2')
                                    @slot('text', 'Item')
                                    @slot('id', 'item')
                                    @slot('name', 'item')
                                    @slot('id_error', 'item')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Serial Number
                                </label>
        
                                @component('frontend.common.input.number')
                                    @slot('id', 'qty')
                                    @slot('text', 'Qty')
                                    @slot('name', 'qty')
                                    @slot('id_error', 'qty')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Expired Date
                                </label>

                                @component('frontend.common.label.data-info')
                                    @slot('text', 'generate')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Jobcard Qty 
                                </label>
        
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'generate')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                           Qty Request
                                        </label>
        
                                        @component('frontend.common.input.number')
                                            @slot('text', 'Qty Request')
                                            @slot('id', 'qty_request')
                                            @slot('name', 'qty_request')
                                            @slot('id_error', 'qty_request')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Unit
                                        </label>
        
                                        @component('frontend.common.input.select2')
                                            @slot('text', 'Unit')
                                            @slot('id', 'unit_id')
                                            @slot('name', 'unit_id')
                                            @slot('id_error', 'unit')
                                        @endcomponent
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Remark
                                </label>

                                @component('frontend.common.input.textarea')
                                    @slot('rows', '3')
                                    @slot('id', 'remark')
                                    @slot('name', 'remark')
                                    @slot('text', 'Remark')
                                    @slot('required', 'required')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <fieldset class="border p-1">
                                    <legend class="w-auto font-weight-bold">Stock Information</legend>
                                    <div class="form-group m-form__group row ">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group m-form__group row ">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Stock Qty
                                                    </label>
                    
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', 'generate')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Qty Form
                                                    </label>
                    
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', 'generate')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group m-form__group row ">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Reserved Qty
                                                    </label>
                    
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', 'generate')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Total Stock
                                                    </label>
                    
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', 'generate')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-instruction">
                        <div class="flex">
                            <div class="action-buttons">
                                    @component('frontend.common.buttons.submit')
                                        @slot('class', 'add-instruction')
                                        @slot('type', 'button')
                                    @endcomponent
                                    @component('frontend.common.buttons.reset')
                                        @slot('class', 'reset-item')
                                    @endcomponent
                                @include('frontend.common.buttons.close')
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
