let taskcard_reset = function () {
    document.getElementById('title').value = '';
    document.getElementById('source').value = '';
    document.getElementById('effectifity').value = '';
    document.getElementById('description').value = '';
    $('#taskcard').select2('val', 'All');
    $('#otr_certification').select2('val', 'All');
    $('#work_area').select2('val', 'All');
    $('#threshold_type').select2('val', 'All');
    $('#repeat_type').select2('val', 'All');
    $('#applicability_engine').select2('val', 'All');
    $('#aircraft_taskcard').select2('val', 'All');
    $('#relationship').select2('val', 'All');
    $('input[type=checkbox]').prop('checked', false);

    $('#title-error').html('');
    $('#taskcard-error').html('');
    $('#otr-certification-error').html('');
    $('#work-area-error').html('');
    $('#threshold-type-error').html('');
    $('#repeat-type-error').html('');
    $('#applicability-engine-error').html('');
    $('#aircraft-taskcard-error').html('');
    $('#relationship-error').html('');

}