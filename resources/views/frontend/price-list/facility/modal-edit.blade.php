<div class="modal fade" id="modal_pricelist_facility_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalPriceList">Price List Facility</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="PriceListForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid-facility">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Facility  @include('frontend.common.label.required')
                                </label>
                                @component('frontend.common.label.data-info')
                                    @slot('id', 'facility')
                                    @slot('class', 'facility')
                                    @slot('name', 'facility')
                                    @slot('id_error', 'facility')
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
                                                    @slot('id', 'price_facility')
                                                    @slot('name', 'price_facility')
                                                    @slot('input_prepend','$')
                                                    @slot('id_error', 'price_1')
                                                @endcomponent      
                                                @component('frontend.common.input.hidden')
                                                    @slot('id', 'price_facility_uuid')
                                                    @slot('name', 'price_facility_uuid')
                                                    @slot('input_prepend','$')
                                                @endcomponent      
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Level 2 (low Price) 
                                                </label>

                                                @component('frontend.common.input.number')
                                                    @slot('id', 'price_facility')
                                                    @slot('name', 'price_facility')
                                                    @slot('input_prepend','$')
                                                    @slot('id_error', 'price_2')
                                                @endcomponent 
                                                @component('frontend.common.input.hidden')
                                                    @slot('id', 'price_facility_uuid')
                                                    @slot('name', 'price_facility_uuid')
                                                    @slot('input_prepend','$')
                                                @endcomponent           
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row ">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Level 3 (Normal Price) 
                                                </label>

                                                @component('frontend.common.input.number')
                                                    @slot('id', 'price_facility')
                                                    @slot('name', 'price_facility')
                                                    @slot('input_prepend','$')
                                                    @slot('id_error', 'price_3')
                                                @endcomponent  
                                                @component('frontend.common.input.hidden')
                                                    @slot('id', 'price_facility_uuid')
                                                    @slot('name', 'price_facility_uuid')
                                                    @slot('input_prepend','$')
                                                @endcomponent       
                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Level 4 (High Price) 
                                                </label>

                                                @component('frontend.common.input.number')
                                                    @slot('id', 'price_facility')
                                                    @slot('name', 'price_facility')
                                                    @slot('input_prepend','$')
                                                    @slot('id_error', 'price_4')
                                                @endcomponent     
                                                @component('frontend.common.input.hidden')
                                                    @slot('id', 'price_facility_uuid')
                                                    @slot('name', 'price_facility_uuid')
                                                    @slot('input_prepend','$')
                                                @endcomponent    
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row ">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                    Level 5 (Very High Price) 
                                                </label>

                                                @component('frontend.common.input.number')
                                                    @slot('id', 'price_facility')
                                                    @slot('name', 'price_facility')
                                                    @slot('input_prepend','$')
                                                    @slot('id_error', 'price_5')
                                                @endcomponent      
                                                @component('frontend.common.input.hidden')
                                                    @slot('id', 'price_facility_uuid')
                                                    @slot('name', 'price_facility_uuid')
                                                    @slot('input_prepend','$')
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
                                    @slot('class', 'update-price-facility')
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
        
    