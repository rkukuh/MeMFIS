<div class="px-4 pb-4">
    <div class='repeater'>
        <div data-repeater-list="group-facility">
            <div data-repeater-item>
                <div class="form-group m-form__group row">
                    <div class="col-sm-9 col-md-9 col-lg-9">
                        <select id="type_facility" name="type_facility" class="form-control project"  onchange="myFunction(this)">
                            <option value="">
                                Select a Facility
                            </option>
                            <option value="1">Hangar Line 1</option>
                            <option value="2">Hangar Line 2</option>
                            <option value="3">Hangar Line 3</option>
                            <option value="4">Hangar Line 4</option>
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
</div>


@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>
@endpush
