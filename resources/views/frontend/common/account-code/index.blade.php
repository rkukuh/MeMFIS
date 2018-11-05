<div style="background-color: {{ $background_color or 'beige' }};
            padding: {{ $padding or '15px' }};">

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
    {{-- <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script> --}}
        
@endpush
