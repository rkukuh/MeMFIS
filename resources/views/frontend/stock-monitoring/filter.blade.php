<div class="advanceFilter">
    <div class="hidden" id="advanceFilter">
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Storage
                </label>
            
                @component('frontend.common.input.select2')
                    @slot('id', 'part_number')
                    @slot('name', 'part_number')
                    @slot('id_error', 'part_number')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Part Number
                </label>
            
                @component('frontend.common.input.select2')
                    @slot('id', 'part_number')
                    @slot('name', 'part_number')
                    @slot('id_error', 'part_number')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Serial Number
                </label>
            
                @component('frontend.common.input.select2')
                    @slot('id', 'serial_number')
                    @slot('name', 'serial_number')
                    @slot('id_error', 'serial_number')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Category
                </label>
            
                @component('frontend.common.input.select2')
                    @slot('id', 'category')
                    @slot('name', 'category')
                    @slot('id_error', 'category')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Expired Date
                </label>
            
                @component('frontend.common.input.select2')
                    @slot('id', 'date')
                    @slot('name', 'date')
                    @slot('id_error', 'date')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Total Stock
                </label>
            
                @component('frontend.common.input.select2')
                    @slot('id', 'total_stock')
                    @slot('name', 'total_stock')
                    @slot('id_error', 'total_stock')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Allocated Stock
                </label>
            
                @component('frontend.common.input.select2')
                    @slot('id', 'allocated_stock')
                    @slot('name', 'allocated_stock')
                    @slot('id_error', 'allocated_stock')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Unit
                </label>
            
                @component('frontend.common.input.select2')
                    @slot('id', 'unit')
                    @slot('name', 'unit')
                    @slot('id_error', 'unit')
                @endcomponent
            </div>
        </div>
    </div>
</div>
    
    
@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/select2/task-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/task-type.js') }}"></script>
@endpush
