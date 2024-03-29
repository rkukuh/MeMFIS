<div class="modal fade" id="modal_item" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalInstruction">
                    Inventory In

                    <small id="instruction" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="ItemForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Item @include('frontend.common.label.required')
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
                                    Expired Date @include('frontend.common.label.optional')
                                </label>

                                @component('frontend.common.input.datepicker')
                                @slot('id', 'exp_date')
                                @slot('text', 'Expired Date')
                                @slot('name', 'exp_date')
                                @slot('id_error', 'exp_date')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Qty @include('frontend.common.label.required')
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
                                            Unit @include('frontend.common.label.required')
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
                                    Location
                                </label>

                                @component('frontend.common.input.textarea')
                                @slot('rows', '3')
                                @slot('id', 'item_remark')
                                @slot('name', 'remark')
                                @slot('text', 'Remark')
                                @slot('required', 'required')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                @component('frontend.common.input.checkbox')
                                @slot('id', 'is_serial_number')
                                @slot('name', 'is_serial_number')
                                @slot('text', 'Serial Number')
                                @endcomponent

                                <!-- <label class="form-control-label">
                                    Serial Number @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.number')
                                @slot('id', 'serial_no')
                                @slot('text', 'Serial Number')
                                @slot('name', 'serial_no')
                                @slot('id_error', 'serial_no')
                                @endcomponent -->
                                <div class="form-group m-form__group row serial_numbers hidden">
                                    <div class="cohiddenhiddenl-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Serial Number @include('frontend.common.label.required')
                                        </label>
                                    </div>
                                    <div class="serial_number_inputs">

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 blueprint hidden">
                                        @component('frontend.common.input.text')
                                        @slot('id', 'serial_number')
                                        @slot('name', 'serial_number[]')
                                        @slot('required', 'required')
                                        @endcomponent
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-instruction">
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
<script src="{{ asset('js/frontend/functions/datepicker/expired-date.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/item.js')}}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/item-uuid.js')}}"></script>
@endpush