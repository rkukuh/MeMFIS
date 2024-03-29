<div class="modal fade" id="modal_general_tool" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalCustomer">Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="CustomerForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid_tool" id="uuid_tool">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Tool
                                </label>

                                @component('frontend.common.label.data-info')
                                    @slot('id','tool')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Request Qty
                                </label>

                                @component('frontend.common.input.number')
                                    @slot('id', 'qty_tool')
                                    @slot('text', 'Request Qty')
                                    @slot('name', 'qty_tool')
                                    @slot('id_error', 'quantity')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Unit
                                </label>

                                @component('frontend.common.input.select2')
                                    @slot('id', 'unit_tool')
                                    @slot('text', 'Unit')
                                    @slot('name', 'unit_tool')
                                    @slot('id_error', 'unit_tool')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Remark
                                </label>

                                @component('frontend.common.input.textarea')
                                    @slot('id', 'remark_tool')
                                    @slot('text', 'Remark')
                                    @slot('name', 'remark_tool')
                                @endcomponent
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer modal-footer-tool">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'update-tool')
                                    @slot('type', 'button')
                                @endcomponent

                                @include('frontend.common.buttons.reset')

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
    <script src="{{ asset('js/frontend/functions/select2/unit-tool.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/functions/fill-combobox/unit-material-uom.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/frontend/functions/select2/item.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/item-uuid.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/unit.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-uom.js') }}"></script> --}}
@endpush
