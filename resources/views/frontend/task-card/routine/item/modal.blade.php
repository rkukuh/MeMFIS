<div class="modal fade" id="modal_item"  role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalItem" style="margin-top:0px">
                    Item

                    <small id="item-storage" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="ItemForm">
                        <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Item @include('frontend.common.label.required')
                                    </label>

                                    @component('frontend.common.item.index')
                                        @slot('name_item','material')
                                        @slot('id_item','material')
                                    @endcomponent
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <label class="form-control-label">
                                        Quantity @include('frontend.common.label.required')
                                    </label>

                                    @component('frontend.common.input.number')
                                        @slot('text', 'Quantity')
                                        @slot('name', 'quantity_material')
                                        @slot('id', 'quantity_material')
                                        @slot('id_error', 'quantity_material')
                                        @slot('min',0)
                                    @endcomponent
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <label class="form-control-label">
                                        Unit @include('frontend.common.label.required')
                                    </label>

                                    @component('frontend.common.input.select2')
                                        @slot('id', 'unit_material')
                                        @slot('text', 'Unit')
                                        @slot('name', 'unit_material')
                                        @slot('id_error', 'unit_material')
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
