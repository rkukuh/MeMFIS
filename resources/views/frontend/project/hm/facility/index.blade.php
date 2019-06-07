<div class="px-4 pb-4">
    <div class='repeater'>
        <div data-repeater-list="group-facility">
            <div data-repeater-item>
                <div class="form-group m-form__group row">
                    <div class="col-sm-9 col-md-9 col-lg-9">
                        @component('frontend.common.input.select')
                            @slot('id', 'facility')
                            @slot('text', 'facility')
                            @slot('name', 'facility')
                            @slot('id_error', 'facility')
                        @endcomponent

                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1">
                        @include('frontend.common.buttons.create_repeater')
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1">
                        @include('frontend.common.buttons.delete_repeater')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/facility.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/functions/select2/facility.js') }}"></script> --}}

@endpush
