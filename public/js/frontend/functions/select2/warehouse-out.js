let WarehouseOutSelect2 = {
    init: function () {
        $('#warehouse_out, #warehouse_out_validate').select2({
            placeholder: 'Select a Warehouse',
            tags: true
        });
    }
};

jQuery(document).ready(function () {
    WarehouseOutSelect2.init();
});
