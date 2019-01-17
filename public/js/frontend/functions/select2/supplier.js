let SupplierSelect2 = {
    init: function () {
        $('#supplier, #supplier_validate').select2({
            placeholder: 'Select a Supplier'
        });
    }
};

jQuery(document).ready(function () {
    SupplierSelect2.init();
});
