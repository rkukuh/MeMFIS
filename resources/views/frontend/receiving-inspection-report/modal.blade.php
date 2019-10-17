<div class="modal fade" id="modal_grn_add" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalInstruction">
                    Good Received Notes

                    <small id="instruction" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="InstructionForm">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Item
                                </label>

                                @component('frontend.common.input.select2')
                                    @slot('text', 'Item')
                                    @slot('id', 'material')
                                    @slot('name', 'material')
                                    @slot('id_error', 'item')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Expired Date
                                </label>

                                @component('frontend.common.input.datepicker')
                                    @slot('id', 'exp_date2')
                                    @slot('text', 'Expired Date')
                                    @slot('name', 'exp_date2')
                                    @slot('id_error', 'exp_date2')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <label class="form-control-label">
                                    Recived Items
                                </label>
                                @component('frontend.common.label.data-info')
                                    @slot('text', '0')
                                    @slot('id', 'item_reciveded')
                                @endcomponent
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <label class="form-control-label">
                                    Qty Recieved
                                </label>

                                @component('frontend.common.input.number')
                                    @slot('id', 'quantity')
                                    @slot('text', 'Qty Recieved')
                                    @slot('name', 'quantity')
                                    @slot('id_error', 'quantity')
                                @endcomponent
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <label class="form-control-label">
                                    Unit
                                </label>

                                @component('frontend.common.input.select2')
                                    @slot('text', 'Unit')
                                    @slot('id', 'unit_material')
                                    @slot('name', 'unit_material')
                                    @slot('id_error', 'unit')
                                @endcomponent
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <label class="form-control-label">
                                    Serial Number
                                </label>

                                @component('frontend.common.input.checkbox')
                                    @slot('id', 'is_serial_number')
                                    @slot('name', 'is_serial_number')
                                    @slot('text', 'Include')
                                    @slot('style_div','margin-top:10px')
                                    @slot('size', '6')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row serial_numbers hidden">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Serial Number
                                </label>
                            </div>
                            <div class="serial_number_inputs">

                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 blueprint hidden">
                                @component('frontend.common.input.text')
                                    @slot('name', 'serial_number[]')
                                    @slot('required', 'required')
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
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                    @component('frontend.common.buttons.submit')
                                        @slot('class', 'add-item')
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
@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/datepicker/expired-date2.js')}}"></script>
@endpush
