let WarehouseInSelect2 = {
    init: function () {
        $('#warehouse_in, #warehouse_in_validate').select2({
            placeholder: 'Select a Warehouse',
            tags: true
        });
    }
};

jQuery(document).ready(function () {
    WarehouseInSelect2.init();
});
