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
                                        Qty @include('frontend.common.label.required')
                                    </label>

                                    @component('frontend.common.input.numeric')
                                        @slot('text', 'Qty')
                                        @slot('name', 'qty')
                                        @slot('id', 'qty')
                                        @slot('help_text','qty')
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
                                            @slot('text', 'Qty')
                                            @slot('name', 'qty2')
                                            @slot('id', 'qty2')
                                            @slot('help_text','qty')
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
                                                @slot('style', 'width:100%')
                                            @endcomponent
                                </div>
            
                            </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @include('frontend.common.buttons.submit')
            
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
