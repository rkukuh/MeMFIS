let Unit = {
    init: function () {
        $('#unit, #unit_validate').select2({
            placeholder: 'Select a Unit'
        }), $('#unit2, #unit2_validate').select2({
            placeholder: 'Select a Unit'
        });
    }
};

jQuery(document).ready(function () {
    Unit.init();
});
