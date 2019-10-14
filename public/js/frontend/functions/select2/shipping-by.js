let ShippingBySelect2 = {
    init: function () {
        $('#shipping_by, #shipping_by_validate').select2({
            placeholder: 'Select a User MMF'
        });
    }
};

jQuery(document).ready(function () {
    ShippingBySelect2.init();
});
