let material_reset = function () {
    document.getElementById('quantity_item').value = '';
    $('#material').select2('val', 'All');
    $('#unit_material').select2('val', 'All');
}

let tool_reset = function () {
    document.getElementById('quantity').value = '';
    $('#tool').select2('val', 'All');
    $('#unit_tool').select2('val', 'All');
}