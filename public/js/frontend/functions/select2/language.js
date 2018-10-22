let Select2 = {
    init: function () {
        $('#language, #language_validate').select2({
            placeholder: 'Select a Language'
        });
    }
};

jQuery(document).ready(function () {
    Select2.init();
});
