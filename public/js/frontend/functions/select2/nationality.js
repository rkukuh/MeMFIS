let NationaltitySelect2 = {
    init: function () {
        $('#nationality, #nationality_validate').select2({
            placeholder: 'Select a Nationality',
            tags: true
        });
    }
};

jQuery(document).ready(function () {
    NationaltitySelect2.init();
});
