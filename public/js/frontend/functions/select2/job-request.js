let JobRequestSelect2 = {
    init: function () {
        $('#job_request, #job_request_validate').select2({
            placeholder: 'Select an Job Request'
        });
    }
};

jQuery(document).ready(function () {
    JobRequestSelect2.init();
});
