let CompanyTypeSelect2 = {
    init: function () {
        $('select[name="company_type"], #company_type_validate').select2({
            placeholder: 'Select a Company'
        });
    }
};


jQuery(document).ready(function () {
    CompanyTypeSelect2.init();
    console.log($('#company_type'));
});
