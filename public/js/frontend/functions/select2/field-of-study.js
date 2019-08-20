let FieldOfStudySelect2 = {
    init: function () {
        $('#field_of_study, #field_of_study_validate').select2({
            placeholder: 'Select an Field Of Study'
        });
    }
};

jQuery(document).ready(function () {
    FieldOfStudySelect2.init();
});
