let CompanySelect2 = {
    init: function () {
        $('#company_type, #company_type_validate').select2({
            placeholder: 'Select a Company'
        });
    }
};


jQuery(document).ready(function () {
    CompanySelect2.init();
});
