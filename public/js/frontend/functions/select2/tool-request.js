let ToolRequesteSelect2 = {
    init: function () {
        $('#tool_request, #tool_request_validate').select2({
            placeholder: 'Select a Tool Request'
        });
    }
};

jQuery(document).ready(function () {
    ToolRequesteSelect2.init();
});
