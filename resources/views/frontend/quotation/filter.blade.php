<div class="advanceFilter">
    <div class="hidden" id="advanceFilter">
        <div class="form-group m-form__group row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label class="form-control-label">
                    Customer
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Customer')
                    @slot('id', 'customer')
                    @slot('name', 'customer')
                    @slot('id_error', 'customer')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label class="form-control-label">
                    Status
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Status Quotation')
                    @slot('id', 'quotation_status_filter')
                    @slot('name', 'quotation_status_filter')
                    @slot('id_error', 'quotation_status_filter')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label class="form-control-label">
                    Quotation type
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Quotation Type')
                    @slot('id', 'quotation_type_filter')
                    @slot('name', 'quotation_type_filter')
                    @slot('id_error', 'quotation_type_filter')
                    @slot('class','filter')
                @endcomponent
            </div>
        </div>
    </div>
</div>


@push('footer-scripts')

<script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/customer.js') }}"></script>

<script src="{{ asset('js/frontend/quotation/filter.js') }}"></script>


@endpush