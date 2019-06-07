<div class="px-4 pb-4">
    <div class='repeater'>
        <div data-repeater-list="group-facility">
            <div data-repeater-item>
                <div class="form-group m-form__group row">
                    <div class="col-sm-9 col-md-9 col-lg-9">
                        {{-- @component('frontend.common.input.select')
                            @slot('id', 'facility')
                            @slot('text', 'facility')
                            @slot('class', 'facility')
                            @slot('name', 'facility')
                            @slot('id_error', 'facility')
                        @endcomponent --}}
                        <select id="facility" name="facility" class="form-control project"  onchange="myFunction(this)">
                            <option value="">
                                Select a Facility
                            </option>
                            <option value="1">Hangar Line 1</option>
                            <option value="2">Hangar Line 2</option>
                            <option value="3">Hangar Line 3</option>
                            <option value="4">Hangar Line 4</option>
                            <option value="5">Hangar Line 5</option>
                        </select>

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
    <div class="col-sm-12 col-md-12 col-lg-12 footer">
        <div class="flex">
            <div class="action-buttons">
                @component('frontend.common.buttons.submit')
                @slot('type','button')
                @slot('id', 'add-facility')
                @slot('class', 'add-facility')
                @endcomponent

                @include('frontend.common.buttons.reset')

                @component('frontend.common.buttons.back')
                @slot('href', route('frontend.workpackage.index'))
                @endcomponent
            </div>
        </div>
    </div>
</div>


@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/functions/fill-combobox/facility.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/frontend/functions/select2/facility.js') }}"></script> --}}

@endpush
