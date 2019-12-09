let CountrySelect2 = {
    init: function () {
        $('select[name="country"], #country_validate').select2({
            placeholder: 'Select Country'
        });
    }
};

jQuery(document).ready(function () {
    CountrySelect2.init();
});
