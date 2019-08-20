let BankNameSelect2 = {
    init: function () {
        $('#bank_name, #bank_name_validate').select2({
            placeholder: 'Select a Bank'
        });
    }
};

jQuery(document).ready(function () {
    BankNameSelect2.init();
});
