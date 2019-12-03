let MaritalStatusSelect2 = {
    init: function () {
        $('#marital_status, #marital_status_validate').select2({
            placeholder: 'Select a Marital Status'
        });
    }
};

jQuery(document).ready(function () {
    MaritalStatusSelect2.init();
});
