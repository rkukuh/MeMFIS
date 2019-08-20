let JobPositionWorkShiftSelect2 = {
    init: function () {
        $('#job_position_workshift, #job_position_workshift_validate').select2({
            placeholder: 'Select a Job Position'
        });
    }
};

jQuery(document).ready(function () {
    JobPositionWorkShiftSelect2.init();
});
