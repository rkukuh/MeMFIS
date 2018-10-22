let AccountCode = {
    init: function () {
        $('#accountcode, #accountcode_validate').select2({
            placeholder: 'Select a Account Code'
        }), $('#accountcode2, #accountcode2_validate').select2({
            placeholder: 'Select a Account Code'
        }), $('#accountcode3, #accountcode3_validate').select2({
            placeholder: 'Select a Account Code'
        });
    }
};

jQuery(document).ready(function () {
    AccountCode.init();
});
