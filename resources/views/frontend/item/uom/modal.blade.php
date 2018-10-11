<div class="modal fade" id="modal_uom"  role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalUoM">
                    UoM (Unit of Measurement) for

                    <small id="item-unit" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="UoMForm" name="form_uom">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Qty @include('frontend.common.label.required')
                                    </label>

                                    @component('frontend.common.input.numeric')
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

                                @component('frontend.common.input.select')
                                    @slot('id', 'unit')
                                    @slot('text', 'Unit')
                                    @slot('name', 'unit')
                                    @slot('id_error', 'unit')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Qty @include('frontend.common.label.required')
                                    </label>

                                    @component('frontend.common.input.numeric')
                                        @slot('id', 'qty2')
                                        @slot('text', 'Qty')
                                        @slot('name', 'qty2')
                                        @slot('id_error', 'qty2')
                                    @endcomponent
                                </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Unit @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'unit2')
                                    @slot('text', 'Unit')
                                    @slot('name', 'unit2')
                                    @slot('id_error', 'unit2')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add-uom')
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
