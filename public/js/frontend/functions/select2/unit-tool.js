let UnitToolSelect2 = {
    init: function () {
        $('#unit_tool, #unit_tool_validate').select2({
            placeholder: 'Select an Unit'
        });
    }
};

jQuery(document).ready(function () {
    UnitToolSelect2.init();
});
