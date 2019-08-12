<div class="modal fade" id="modal_pricelist_manhour" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalPriceList">Manhours</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="PriceListForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Remark @include('frontend.common.label.optional')
                                </label>
                                @component('frontend.common.input.textarea')
                                    @slot('rows', '5')
                                    @slot('id', 'remark_material')
                                    @slot('name', 'remark_material')
                                    @slot('text', 'Remark')
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
    