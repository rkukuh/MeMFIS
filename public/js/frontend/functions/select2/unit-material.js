let UnitMaterialSelect2 = {
    init: function () {
        $('#unit_material, #unit_material_validate').select2({
            placeholder: 'Select an Unit'
        });
    }
};

jQuery(document).ready(function () {
    UnitMaterialSelect2.init();
});
