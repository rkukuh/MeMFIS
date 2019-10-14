<div class="advanceFilter">
    <div class="hidden" id="advanceFilter">
        <div class="form-group m-form__group row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label class="form-control-label">
                    Customer
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Customer')
                    @slot('id', 'customer')
                    @slot('name', 'customer')
                    @slot('id_error', 'customer')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label class="form-control-label">
                    A/C Type
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Applicability Airplane')
                    @slot('id', 'applicability_airplane')
                    @slot('name', 'applicability_airplane')
                    @slot('multiple','multiple')
                    @slot('id_error', 'applicability-airplane')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label class="form-control-label">
                    Task
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Task Type')
                    @slot('id', 'task_type_id')
                    @slot('name', 'task_type_id')
                    @slot('id_error', 'task_type_id')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label class="form-control-label">
                    Skill
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Otr Certification')
                    @slot('id', 'otr_certification')
                    @slot('name', 'otr_certification')
                    @slot('id_error', 'otr-certification')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label class="form-control-label">
                    Taskcard Type
                </label>
                @component('frontend.common.input.select2')
                    @slot('text', 'Taskcard Type')
                    @slot('id', 'taskcard_routine_type')
                    @slot('multiple', 'multiple')
                    @slot('name', 'taskcard_routine_type')
                    @slot('id_error', 'taskcard_routine_type')
                    @slot('class','filter')
                @endcomponent
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label class="form-control-label">
                    Status Jobcard
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

<script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/customer.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/otr-certification.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/taskcard-routine-type.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-routine-type.js') }}"></script>

<script src="{{ asset('js/frontend/job-card/filter-ppc.js') }}"></script>


@endpush
