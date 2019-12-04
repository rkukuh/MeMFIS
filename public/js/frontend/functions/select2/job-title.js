let JobTitleSelect2 = {
    init: function () {
        $('#job_title, #job_title_validate').select2({
            placeholder: 'Select a Job Title'
        });
    }
};

jQuery(document).ready(function () {
    JobTitleSelect2.init();
});
