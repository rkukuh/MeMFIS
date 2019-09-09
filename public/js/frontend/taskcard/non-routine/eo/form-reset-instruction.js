let instruction_reset = function () {
    $('#work_area').select2('val', 'All');
    $('#otr_certification').select2('val', 'All');
    document.getElementById('manhour').value = '';
    document.getElementById('performa').value = '';
    document.getElementById('helper_quantity').value = '';
    document.getElementById('engineer_quantity').value = '';
    document.getElementById('sequence').value = '';
    document.getElementById('instuction_description').value = '';
    $('#work_area-error').html('');
    $('#otr-certification-error').html('');
    $('#manhour-error').html('');
    $('#performa-error').html('');
    $('#helper_quantity-error').html('');
    $('#engineer_quantity-error').html('');
    $('#sequence-error').html('');
    $('input[type=checkbox]').prop('checked', false);

}
