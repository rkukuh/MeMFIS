<div style="background-color: beige; padding: 15px;">
    <div class="search-journal" id="search-journal">{{ $text or 'Search the account code' }}</div>

    @component('frontend.common.account-code.button-create')
        @slot('size', 'sm')
        @slot('text', 'Search')
        @slot('style', 'margin-top: -23px')
        @slot('class', 'pull-right')
        @slot('icon', 'search')
        @slot('data_target', '#modal_account_code')
    @endcomponent
</div>

@include('frontend.common.account-code.modal')

@push('footer-scripts')
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/frontend/item/journal.js') }}"></script>
@endpush
