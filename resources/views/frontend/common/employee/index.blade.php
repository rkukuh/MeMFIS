<div style="background-color: {{ $background_color or 'beige' }};
            padding: {{ $padding or '0px 8px' }};">

    <div class="form-group m-form__group row">
        <div class="col-sm-8 col-md-8 col-lg-8 mt-3">
                <div class="search-journal" id="search-journal" name="search-journal">
                    {{ $text or 'Search Employee Name' }}
                </div>
                <input type="hidden" name="search-journal-val" id="search-journal-val">
        </div>

        <div class="col-sm-3 col-md-3 col-lg-3 text-right p-2" style="padding: 0;">
            @component('frontend.common.account-code.button-create')
                @slot('text', '')
                @slot('size', 'sm')
                @slot('icon', 'search')
                @slot('data_target', '#modal_employee')
            @endcomponent
        </div>
    </div>
</div>

@include('frontend.common.employee.modal')

@push('footer-scripts')
    <script src="{{ asset('js/frontend/common/employee.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/common/create.js') }}"></script> --}}
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
@endpush
