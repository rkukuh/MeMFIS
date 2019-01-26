let routine_reset = function () {
    document.getElementById('title').value = '';
    document.getElementById('number').value = '';
    document.getElementById('description').value = '';
    document.getElementById('manhour').value = '';
    document.getElementById('performa').value = '';
    document.getElementById('helper_quantity').value = '';
    document.getElementById('source').value = '';
    document.getElementById('effectivity').value = '';

    $('#number-error').html('');
    $('#taskcard_routine_type-error').html('');
    $('#title-error').html('');
    $('#applicability-airplane-error').html('');
    $('#task_type_id-error').html('');
    $('#otr-certification-airplane-error').html('');
    $('#manhour-error').html('');
    $('#performa-error').html('');

    $('#taskcard_routine_type').select2('val', 'All');
    $('#applicability_airplane').select2('val', 'All');
    $('#task_type_id').select2('val', 'All');
    $('#otr_certification').select2('val', 'All');
    $('#work_area').select2('val', 'All');
    $('#access').select2('val', 'All');
    $('#zone').select2('val', 'All');
    $('#relationship').select2('val', 'All');
    $('#version').select2('val', 'All');

    $('input[type=checkbox]').prop('checked', false);

}
