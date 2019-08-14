let material_modal_reset = function () {
    $('#material').select2('val', 'All');
    $('#unit_material').select2('val', 'All');
    document.getElementById('quantity_item').value = '';
    document.getElementById('remark_item').value = '';
    $('#material-error').html('');
    $('#quantity_item-error').html('');
    $('#unit_material-error').html('');
    $('#remark_item-error').html('');

}
