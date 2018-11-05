<div style="background-color: {{ $background_color or 'beige' }};
            padding: {{ $padding or '15px 10px 5px 15px' }};">

    <div class="form-group m-form__group row">
        <div class="col-sm-8 col-md-8 col-lg-8">
            @if (isset($item->journal))
                @component('frontend.common.label.data-info')
                    @slot('padding', '0')
                    @slot('class', 'search-journal')
                    @slot('text', $item->account_code_and_name)
                @endcomponent
            @else
                <div class="search-journal" id="search-journal">
                    {{ $text or 'Search account code' }}
                </div>
            @endif
        </div>

        <div class="col-sm-3 col-md-3 col-lg-3">
            @component('frontend.common.account-code.button-create')
                @slot('size', 'sm')
                @slot('text', 'Search')
                @slot('icon', 'search')
                @slot('style', 'margin-top: 0')
                @slot('data_target', '#modal_account_code')
            @endcomponent
        </div>
    </div>
</div>

@include('frontend.common.account-code.modal')

@push('footer-scripts')
    <script src="{{ asset('js/frontend/item/account-code.js') }}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
@endpush
