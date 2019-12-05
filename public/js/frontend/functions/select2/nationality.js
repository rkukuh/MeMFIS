let NationaltitySelect2 = {
    init: function () {
        $('select[name="nationality"], #nationality_validate').select2({
            placeholder: 'Select a Nationality',
            tags: true
        });
    }
};

jQuery(document).ready(function () {
    NationaltitySelect2.init();
});
