let CorrectionTimeSelect2 = {
    init: function () {
        $('#attendance_correction_time_type, #attendance_correction_time_type_validate').select2({
            placeholder: 'Select a Correction Time'
        });
    }
};

jQuery(document).ready(function () {
    CorrectionTimeSelect2.init();
});
