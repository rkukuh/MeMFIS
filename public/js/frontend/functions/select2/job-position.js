let JobPositionSelect2 = {
    init: function () {
        $('select[name="job_position"], #job_position_validate').select2({
            placeholder: 'Select a Job Position'
        });
    }
};

jQuery(document).ready(function () {
    JobPositionSelect2.init();
});
