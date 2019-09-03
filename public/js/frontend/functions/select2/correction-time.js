let CorrectionTimeSelect2 = {
    init: function () {
        $('#correction_time, #correction_time_validate').select2({
            placeholder: 'Select a Correction Time'
        });
    }
};

jQuery(document).ready(function () {
    CorrectionTimeSelect2.init();
});
