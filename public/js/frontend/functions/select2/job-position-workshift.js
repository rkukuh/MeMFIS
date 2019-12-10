let JobPositionWorkShiftSelect2 = {
    init: function () {
        $('select[name="job_position_workshift"], select[name="job_position_workshift"]_validate').select2({
            placeholder: 'Select a Job Position'
        });
    }
};

jQuery(document).ready(function () {
    JobPositionWorkShiftSelect2.init();
});
