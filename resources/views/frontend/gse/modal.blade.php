<div class="modal fade" id="modal_gse_item_add" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalInstruction">
                    Item

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
                                    Item
                                </label>

                                @component('frontend.common.input.select2')
                                    @slot('text', 'Item')
                                    @slot('id', 'tool')
                                    @slot('name', 'tool')
                                    @slot('id_error', 'item')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Serial Number
                                </label>

                                @component('frontend.common.input.select2')
                                    @slot('text', 'Serial Number')
                                    @slot('id', 'serial_no')
                                    @slot('name', 'serial_no')
                                    @slot('id_error', 'serial_no')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <label class="form-control-label">
                                    Received Items
                                </label>
                                @component('frontend.common.label.data-info')
                                    @slot('text', '0')
                                    @slot('id', 'item_reciveded')
                                @endcomponent
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <label class="form-control-label">
                                    Qty Received
                                </label>

                                @component('frontend.common.input.number')
                                    @slot('id', 'quantity')
                                    @slot('text', 'Qty Received')
                                    @slot('name', 'quantity')
                                    @slot('id_error', 'quantity')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Unit
                                </label>

                                @component('frontend.common.input.select2')
                                    @slot('text', 'Unit')
                                    @slot('id', 'unit_tool')
                                    @slot('name', 'unit_tool')
                                    @slot('id_error', 'unit')
                                @endcomponent
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
                                    @slot('text', 'Description')
                                    @slot('required', 'required')
                                @endcomponent
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
