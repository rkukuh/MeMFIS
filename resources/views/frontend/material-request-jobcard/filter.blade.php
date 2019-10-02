<div class="advanceFilter">
    <div class="hidden" id="advanceFilter">
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Part Number
                </label>
            
                @component('frontend.common.input.input')
                    @slot('id', 'part_number')
                    @slot('name', 'part_number')
                    @slot('id_error', 'part_number')
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Date Period
                </label>
          
                @component('frontend.common.input.datepicker')
                    @slot('id', 'daterange_material_request')
                    @slot('name', 'daterange_material_request')
                    @slot('id_error', 'daterange_material_request')
                @endcomponent

            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    JC No
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'JC No')
                    @slot('id', 'jc_no')
                    @slot('name', 'jc_no')
                    @slot('id_error', 'jc_no')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Storage
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Storage')
                    @slot('id', 'item_storage_id')
                    @slot('name', 'item_storage_id')
                    @slot('id_error', 'item_storage_id')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Status
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Status Jobcard')
                    @slot('id', 'status_jobcard')
                    @slot('name', 'status_jobcard')
                    @slot('id_error', 'status_jobcard')
                    @slot('class','filter')
                @endcomponent
            </div>
        </div>
    </div>
</div>


@push('footer-scripts')

<script src="{{ asset('js/frontend/functions/select2/task-type.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/task-type.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/taskcard-routine-type.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-routine-type.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/storage.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/storage.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/jobcard-number.js') }}"></script>

<script src="{{ asset('js/frontend/functions/daterange/daterange-material-request.js')}}"></script>

<script src="{{ asset('js/frontend/job-card/filter.js') }}"></script>


@endpush
