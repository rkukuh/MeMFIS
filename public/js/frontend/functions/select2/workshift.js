let WorkShiftSelect2 = {
    init: function () {
        $('select[name="job_position_workshift"], select[name="job_position_workshift"]_validate').select2({
            placeholder: 'Select a Workshift Name'
        });
    }
};


jQuery(document).ready(function () {
    WorkShiftSelect2.init()
});
