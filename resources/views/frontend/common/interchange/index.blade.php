<div style="background-color: {{ $background_color or 'beige' }};
            height:{{ $height or '50px' }};
            margin-top:{{ $margintop or '10px' }};">

    <div class="form-group m-form__group row">
        <div class="col-sm-8 col-md-8 col-lg-8">
                <div class="search-interchange" id="search-interchange"
                style="line-height:50px;margin-left:9px">
                    {{ $text or 'Search Interchange' }}
                </div>
        </div>

        <div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding: 0;">
            @component('frontend.common.account-code.button-create')
                @slot('text', '')
                @slot('size', 'sm')
                @slot('icon', 'search')
                @slot('data_target', '#modal_interchange')
                @slot('style','float:right;margin-top:10px;margin-right:-10px;')
            @endcomponent
        </div>
    </div>
</div>

@include('frontend.common.interchange.modal')

@push('footer-scripts')
    <script src="{{ asset('js/frontend/common/interchange.js') }}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
@endpush
