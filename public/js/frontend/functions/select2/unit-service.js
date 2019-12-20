let UnitMaterialSelect2 = {
    init: function () {
        $('#unit_service, #unit_service_validate').select2({
            placeholder: 'Select a Unit'
        });
    }
};

jQuery(document).ready(function () {
    UnitMaterialSelect2.init();
});
