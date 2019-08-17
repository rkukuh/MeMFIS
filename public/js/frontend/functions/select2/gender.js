let GenderSelect2 = {
    init: function () {
        $('#gender, #gender_validate').select2({
            placeholder: 'Select a Gender'
        });
    }
};

jQuery(document).ready(function () {
    GenderSelect2.init();
});
