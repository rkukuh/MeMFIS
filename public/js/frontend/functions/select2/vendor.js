let VendorSelect2 = {
    init: function () {
        $('#vendor, #vendor_validate').select2({
            placeholder: 'Select a Vendor'
        });
    }
};

jQuery(document).ready(function () {
    VendorSelect2.init();
});
