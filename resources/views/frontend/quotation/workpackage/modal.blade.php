<div class="modal fade" id="modal_item_price" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalUnit">Price</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="UnitForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Quantity @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.number')
                                    @slot('text', 'Quantity')
                                    @slot('name', 'qty')
                                    @slot('id', 'qty')
                                    @slot('id_error', 'qty')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Unit @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.select2')
                                    @slot('text', 'Unit')
                                    @slot('name', 'unit')
                                    @slot('id', 'unit')
                                    @slot('id_error', 'unit')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Selling Price @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.number')
                                    @slot('name', 'price')
                                    @slot('id', 'price')
                                    @slot('text', 'Type')
                                    @slot('id_error', 'price')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Marketing Note @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.textarea')
                                    @slot('name', 'note')
                                    @slot('id', 'note')
                                    @slot('text', 'Note')
                                    @slot('rows', '4')
                                    @slot('id_error', 'note')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add-unit')
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
