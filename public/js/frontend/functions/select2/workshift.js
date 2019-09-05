let WorkShiftSelect2 = {
    init: function () {
        $('#job_position_workshift, #job_position_workshift_validate').select2({
            placeholder: 'Select a Workshift Name'
        });
    }
};

jQuery(document).ready(function () {
    WorkShiftSelect2.init();
});
