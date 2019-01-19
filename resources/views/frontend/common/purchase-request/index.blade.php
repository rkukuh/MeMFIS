<div style="background-color: {{ $background_color or 'beige' }};
            padding: {{ $padding or '15px 10px 5px 15px' }};">

    <div class="form-group m-form__group row">
        <div class="col-sm-8 col-md-8 col-lg-8">
                <div class="search-pr" id="search-pr">
                    {{ $text or 'Search purchase request' }}
                </div>
        </div>

        <div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding: 0;">
            @component('frontend.common.purchase-request.button-create')
                @slot('text', '')
                @slot('size', 'sm')
                @slot('icon', 'search')
                @slot('data_target', '#modal_purchase_request')
                @slot('style','margin-top:1px')
            @endcomponent
        </div>
    </div>
</div>

@include('frontend.common.purchase-request.modal')

@push('footer-scripts')
    <script src="{{ asset('js/frontend/common/purchase-request.js') }}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
@endpush
