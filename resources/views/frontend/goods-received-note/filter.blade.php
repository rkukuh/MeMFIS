<div class="advanceFilter">
        <div class="hidden" id="advanceFilter">
            <div class="form-group m-form__group row">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <label class="form-control-label">
                        Part Number
                    </label>
                
                    @component('frontend.common.input.input')
                        @slot('id', 'part_number')
                        @slot('name', 'part_number')
                        @slot('id_error', 'part_number')
                    @endcomponent
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <label class="form-control-label">
                        Status
                    </label>
                    @component('frontend.common.input.select2')
                        @slot('text', 'Status Jobcard')
                        @slot('id', 'status_jobcard')
                        @slot('name', 'status_jobcard')
                        @slot('id_error', 'status_jobcard')
                        @slot('class','filter')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <label class="form-control-label">
                        Date 
                    </label>
              
                    @component('frontend.common.input.datepicker')
                        @slot('id', 'date')
                        @slot('name', 'date')
                        @slot('id_error', 'date')
                    @endcomponent
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <label class="form-control-label">
                        Vendor
                    </label>
                    @component('frontend.common.input.select2')
                        @slot('text', 'Vendor')
                        @slot('id', 'vendor')
                        @slot('name', 'vendor')
                        @slot('id_error', 'vendor')
                        @slot('class','filter')
                    @endcomponent
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <label class="form-control-label">
                        PO No.
                    </label>
                    @component('frontend.common.input.select2')
                        @slot('text', 'PO No.')
                        @slot('id', 'purchase_order')
                        @slot('name', 'purchase_order')
                        @slot('id_error', 'purchase_order')
                        @slot('class','filter')
                    @endcomponent
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <label class="form-control-label">
                        PR No.
                    </label>
                    @component('frontend.common.input.select2')
                        @slot('text', 'PR No.')
                        @slot('id', 'purchase_request')
                        @slot('name', 'purchase_request')
                        @slot('id_error', 'purchase_request')
                        @slot('class','filter')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
    
    
    @push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/select2/vendor.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/vendor.js') }}"></script>
    
    <script src="{{ asset('js/frontend/functions/select2/purchase-order.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/purchase-request.js') }}"></script>
    
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    
    <script src="{{ asset('js/frontend/good-received-note/filter.js') }}"></script>
    
    
    @endpush
    