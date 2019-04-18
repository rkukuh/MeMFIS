let ItemUnitSelect2 = {
    init: function () {
        $('#item_unit_id, #item_unit_id_validate').select2({
            placeholder: 'Select an Unit'
        })
    }
};

jQuery(document).ready(function () {
    ItemUnitSelect2.init();
});
