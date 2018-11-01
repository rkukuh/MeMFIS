<div style="background-color: {{ $background_color or 'beige' }};
            padding: {{ $padding or '15' }}px;">

    <div class="search-journal" id="search-journal">
        {{ $text or 'Search account code' }}
    </div>

    @component('frontend.common.account-code.button-create')
        @slot('size', 'sm')
        @slot('text', 'Search')
        @slot('icon', 'search')
        @slot('class', 'pull-right')
        @slot('style', 'margin-top: -23px')
        @slot('data_target', '#modal_account_code')
    @endcomponent
</div>

@include('frontend.common.account-code.modal')

@push('footer-scripts')
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/frontend/item/account-code.js') }}"></script>
@endpush
