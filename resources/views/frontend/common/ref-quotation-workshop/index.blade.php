<div style="background-color: {{ $background_color or 'beige' }};
            height:{{ $height or '50px' }};
            margin-top:{{ $height or '0px' }};">

    <div class="form-group m-form__group row">
        <div class="col-sm-8 col-md-8 col-lg-8">
                <div class="search-jobcard" id="search-quotation-workshop"
                style="line-height:50px;margin-left:9px">
                    {{ $text or 'Search Ref. Quotation Workshop' }}
                </div>
        </div>

        <div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding: 0;">
            @component('frontend.common.purchase-order.button-create')
                @slot('text', '')
                @slot('size', 'sm')
                @slot('icon', 'search')
                @slot('data_target', '#modal_quotation_workshop')
                @slot('style','float:right;margin-top:10px;margin-right:6px;')
            @endcomponent
        </div>
    </div>

</div>

@include('frontend.common.ref-quotation-workshop.modal')

@push('footer-scripts')
    <script src="{{ asset('js/frontend/common/ref-quotation-workshop.js') }}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
@endpush
