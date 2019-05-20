<div id="m_accordion_1" class="m-accordion m-accordion--defaultx m-accordion--toggle-arrow" role="tablist">

    <div class="m-accordion__item ">
        <div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_1_item_1_head" data-toggle="collapse" href="#m_accordion_1_item_1_body" aria-expanded="false">
            <span class="m-accordion__item-icon"></span>
            <span class="m-accordion__item-title">
                <h3>Filter</h3>
            </span>
            <span class="m-accordion__item-mode"></span>
        </div>

        <div class="m-accordion__item-body collapse show" id="m_accordion_1_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_1_head" data-parent="#m_accordion_1">
            <div class="m-accordion__item-content">
                <div class="form-group m-form__group row">

                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="form-control-label">
                            Task
                        </label>
                        @component('frontend.common.input.select2')
                        @slot('text', 'Task Type')
                        @slot('id', 'task_type_id')
                        @slot('name', 'task_type_id')
                        @slot('id_error', 'task_type_id')
                        @endcomponent
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="form-control-label">
                            A/C Type
                        </label>
                        @component('frontend.common.input.select2')
                        @slot('text', 'Applicability Airplane')
                        @slot('id', 'applicability_airplane')
                        @slot('name', 'applicability_airplane')
                        @slot('multiple','multiple')
                        @slot('id_error', 'applicability-airplane')
                        @slot('help_text','You can chose multiple value')
                        @endcomponent
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="form-control-label">
                            Skill
                        </label>
                        @component('frontend.common.input.select2')
                        @slot('text', 'Otr Certification')
                        @slot('id', 'otr_certification')
                        @slot('name', 'otr_certification')
                        @slot('id_error', 'otr-certification')
                        @endcomponent
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="form-control-label">
                            Project No
                        </label>
                        @component('frontend.common.input.select2')
                        @slot('text', 'Project No')
                        @slot('id', 'project_no')
                        @slot('name', 'project_no')
                        @slot('id_error', 'project_no')
                        @endcomponent
                    </div>

                </div>
                <div class="form-group m-form__group row">

                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="form-control-label">
                            Taskcard Type
                        </label>
                        @component('frontend.common.input.select2')
                        @slot('text', 'Taskcard Type')
                        @slot('id', 'taskcard_routine_type')
                        @slot('multiple', 'multiple')
                        @slot('name', 'taskcard_routine_type')
                        @slot('id_error', 'taskcard_routine_type')
                        @endcomponent
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <label class="form-control-label">
                            Date Issued
                        </label>
                        @component('frontend.common.input.select2')
                        @slot('text', 'Date Issued')
                        @slot('id', 'date_issued')
                        @slot('name', 'date_issued')
                        @slot('id_error', 'date_issued')
                        @endcomponent
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <label class="form-control-label">
                            JC No
                        </label>
                        @component('frontend.common.input.select2')
                        @slot('text', 'JC No')
                        @slot('id', 'jc_no')
                        @slot('name', 'jc_no')
                        @slot('id_error', 'jc_no')
                        @endcomponent
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="form-control-label">
                            Customer
                        </label>
                        @component('frontend.common.input.select2')
                        @slot('text', 'Customer')
                        @slot('id', 'customer')
                        @slot('name', 'customer')
                        @slot('id_error', 'customer')
                        @endcomponent
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <label class="form-control-label">
                            Status Jobcard
                        </label>
                        @component('frontend.common.input.select2')
                        @slot('text', 'Status Jobcard')
                        @slot('id', 'status_jobcard')
                        @slot('name', 'status_jobcard')
                        @slot('id_error', 'status_jobcard')
                        @endcomponent
                    </div>
                </div>

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


<script>
    console.log($('#taskcard_type'));
    let dateIssued = {
        init: function() {
            $('#date_issued').select2({
                placeholder: 'Select a date issued '
            });
        }
    };


    let jcNo = {
        init: function() {
            $('#jc_no').select2({
                placeholder: 'Select a JC Number '
            });
        }
    };

    let projectNo = {
        init: function() {
            $('#project_no').select2({
                placeholder: 'Select a Project Number '
            });
        }
    };

    let jobcardStatus = {
        init: function() {
            $('#status_jobcard').select2({
                placeholder: 'Select a Job Card Status '
            });
        }
    };

    $('select[name="date_issued"]').append('<option value="Ascending">Ascending</option>');
    $('select[name="jc_no"]').append('<option value="Ascending">Ascending</option>');
    $('select[name="project_no"]').append('<option value="Ascending">Ascending</option>');

    $('select[name="date_issued"]').append('<option value="Descending">Descending</option>');
    $('select[name="jc_no"]').append('<option value="Descending">Descending</option>');
    $('select[name="project_no"]').append('<option value="Descending">Descending</option>');

    $('select[name="status_jobcard"]').append('<option value="Open">Open</option>');
    $('select[name="status_jobcard"]').append('<option value="On Progress">On Progress</option>');
    $('select[name="status_jobcard"]').append('<option value="Pending/Pause">Pending/Pause</option>');
    $('select[name="status_jobcard"]').append('<option value="Closed">Closed</option>');

    $(document).ready(function() {
        dateIssued.init();
        jcNo.init();
        projectNo.init();
        jobcardStatus.init();
    });
</script>

@endpush