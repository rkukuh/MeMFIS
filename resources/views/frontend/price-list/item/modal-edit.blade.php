<div class="modal fade" id="modal_pricelist_item_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalPriceList">Price List Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="PriceListForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid-item">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Item  @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.input.select2')
                                    {{-- @slot('id', 'item') --}}
                                    @slot('class', 'item')
                                    @slot('name', 'item')
                                    @slot('id_error', 'item')
                                @endcomponent    
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Part Number
                                </label>
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'name')
                                    @slot('name', 'name')
                                    @slot('id', 'name')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Unit
                                </label>
                                @component('frontend.common.input.select2')
                                    {{-- @slot('id', 'unit_id') --}}
                                    @slot('class','unit_id')
                                    @slot('name', 'unit_id')
                                    @slot('id_error', 'unit_id')
                                @endcomponent    
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <fieldset class="border p-2">
                                        <legend class="w-auto">Unit Price (USD) @include('frontend.common.label.required')</legend>

                                        <div class="form-group m-form__group row ">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Level 1 (Very low Price) 
                                                </label>

                                                @component('frontend.common.input.number')
                                                    @slot('id', 'price_1')
                                                    @slot('name', 'price')
                                                    @slot('text', 'price')
                                                    @slot('input_prepend','$')
                                                    @slot('id_error', 'price_1')
                                                @endcomponent      
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Level 2 (low Price) 
                                                </label>

                                                @component('frontend.common.input.number')
                                                    @slot('id', 'price_2')
                                                    @slot('name', 'price')
                                                    @slot('text', 'price')
                                                    @slot('input_prepend','$')
                                                    @slot('id_error', 'price_2')
                                                @endcomponent         
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row ">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Level 3 (Normal Price) 
                                                </label>

                                                @component('frontend.common.input.number')
                                                    @slot('id', 'price_3')
                                                    @slot('name', 'price')
                                                    @slot('text', 'price')
                                                    @slot('input_prepend','$')
                                                    @slot('id_error', 'price_3')
                                                @endcomponent      
                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Level 4 (High Price) 
                                                </label>

                                                @component('frontend.common.input.number')
                                                    @slot('id', 'price_4')
                                                    @slot('name', 'price')
                                                    @slot('text', 'price')
                                                    @slot('input_prepend','$')
                                                    @slot('id_error', 'price_4')
                                                @endcomponent      
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row ">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                    Level 5 (Very High Price) 
                                                </label>

                                                @component('frontend.common.input.number')
                                                    @slot('id', 'price_5')
                                                    @slot('name', 'price')
                                                    @slot('text', 'price')
                                                    @slot('input_prepend','$')
                                                    @slot('id_error', 'price_5')
                                                @endcomponent      
                                            </div>
                                        </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add-price')
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
        
    