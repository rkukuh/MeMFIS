let ReligionSelect2 = {
    init: function () {
        $('select[name="religion"], #religion_validate').select2({
            placeholder: 'Select a Religion'
        });
    }
};

jQuery(document).ready(function () {
    ReligionSelect2.init();
});
