let item_reset = function () {
    document.getElementById('code').value = '';
    document.getElementById('name').value = '';
    document.getElementById('description').value = '';
    document.getElementById('ppn_amount').value = '';

    $('#code-error').html('');
    $('#name-error').html('');
    $('#unit-error').html('');
    $('#category-error').html('');
    $('#unit_id').select2('val', 'All');
    $('#category').select2('val', 'All');
    $('input[type=checkbox]').prop('checked', false);

    document.getElementById('ppn_amount').value = '';
    document.getElementById('ppn_amount').disabled = true;

    document.getElementById('account_code').value = '';
    $('.search-journal').html('Search account code');
}