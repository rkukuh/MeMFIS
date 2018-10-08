<div class="modal fade" id="modal_uom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalCustomer">UoM (Unit of Measurement)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="CustomerForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Unit @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.select')
                                    @slot('id', 'unit')
                                    @slot('text', 'Unit')
                                    @slot('name', 'id_unit')
                                    @slot('style', 'width:100%')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Qty @include('frontend.common.label.required')
                                    </label>

                                    @component('frontend.common.input.numeric')
                                        @slot('text', 'Qty')
                                        @slot('name', 'qty')
                                    @endcomponent
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('size', 'md')
                                    @slot('class', 'add')
                                @endcomponent
        
                                @component('frontend.common.buttons.reset')
                                    @slot('size', 'md')
                                @endcomponent
        
                                @component('frontend.common.buttons.close')
                                    @slot('size', 'md')
                                    @slot('data_dismiss', 'modal')
                                @endcomponent        
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
