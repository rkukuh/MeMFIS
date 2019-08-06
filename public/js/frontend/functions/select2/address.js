let AddressSelect2 = {
    init: function () {
        $('#address, #address_validate').select2({
            placeholder: 'Select an Address'
        });
    }
};

jQuery(document).ready(function () {
    AddressSelect2.init();
});
