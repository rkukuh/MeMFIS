let ReligionSelect2 = {
    init: function () {
        $('#religion, #religion_validate').select2({
            placeholder: 'Select a Religion'
        });
    }
};

jQuery(document).ready(function () {
    ReligionSelect2.init();
});
