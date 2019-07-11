<div class="modal fade" id="add_modal_predecessor"  role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalItem">
                    Predecessor
                    <small id="item-storage" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="ItemForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid-predecessor" id="uuid-predecessor">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Taskcard @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.select2')
                                    @slot('id', 'taskcard_predecessor')
                                    @slot('text', 'Taskcard')
                                    @slot('name', 'taskcard')
                                    @slot('id_error', 'taskcard_predecessor')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Order @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.number')
                                    @slot('text', 'Order Predecessor')
                                    @slot('name', 'order_predecessor')
                                    @slot('id', 'order_predecessor')
                                    @slot('id_error', 'order_predecessor')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                    @component('frontend.common.buttons.submit')
                                        @slot('class', 'add-predecessor')
                                        @slot('type', 'button')
                                    @endcomponent
                                    @component('frontend.common.buttons.reset')
                                        @slot('class', 'reset-predecessor')
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
