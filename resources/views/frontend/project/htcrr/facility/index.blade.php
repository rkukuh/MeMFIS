<div class="px-4 pb-4">
    <div class="repeaterFacility">
        @if(isset($project_workpackage->facilities) && sizeof($project_workpackage->facilities) > 0)
            @foreach($project_workpackage->facilities as $facility)
                <div class="repeaterRow">
                    <div class="form-group m-form__group row">
                        <div class="col-sm-9 col-md-9 col-lg-9">
                            <select name="facility" style="width:100%" class="form-control facility">
                                <option value="">
                                    Select a Facility
                                </option>
                                @foreach($facilities as $facilityItem)
                                    <option value="{{ $facilityItem->uuid }}" @if($facilityItem->code == $facility->facility->code) selected @endif>{{ $facilityItem->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1">
                            @component('frontend.common.buttons.delete_repeater')
                                @slot('class', 'DeleteRow')
                            @endcomponent
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1">
                            @component('frontend.common.buttons.create_repeater')
                                @slot('class', 'AddRow')
                            @endcomponent
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="repeaterRow">
                <div class="form-group m-form__group row">
                    <div class="col-sm-9 col-md-9 col-lg-9">
                        <select name="facility" style="width:100%" class="form-control facility">
                            <option value="">
                                Select a Facility
                            </option>
                            @foreach($facilities as $facilityItem)
                                <option value="{{ $facilityItem->uuid }}">{{ $facilityItem->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1">
                        @component('frontend.common.buttons.delete_repeater')
                            @slot('class', 'DeleteRow')
                        @endcomponent
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1">
                        @component('frontend.common.buttons.create_repeater')
                            @slot('class', 'AddRow')
                        @endcomponent
                    </div>
                </div>
            </div>
        @endif
            <div class="repeaterRow CopyFacility hidden">
                    <div class="form-group m-form__group row">
                            <div class="col-sm-9 col-md-9 col-lg-9">
                                <select name="facility" class="form-control">
                                    <option value="">
                                        Select a Facility
                                    </option>
                                    @foreach($facilities as $facilityItem)
                                        <option value="{{ $facilityItem->uuid }}">{{ $facilityItem->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-1 col-md-1 col-lg-1">
                                @component('frontend.common.buttons.delete_repeater')
                                    @slot('class', 'DeleteRow')
                                @endcomponent
                            </div>
                            <div class="col-sm-1 col-md-1 col-lg-1">
                                @component('frontend.common.buttons.create_repeater')
                                    @slot('class', 'AddRow')
                                @endcomponent
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

                @include('frontend.common.buttons.back')

            </div>
        </div>
    </div>
</div>


@push('footer-scripts')
    {{-- <script src="{{ asset('js/frontend/functions/fill-combobox/facility.js') }}"></script> --}}
    <script src="{{ asset('js/frontend/functions/select2/facility.js') }}"></script>
@endpush
