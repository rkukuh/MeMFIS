let item_reset = function () {
    document.getElementById('code').value = '';
    document.getElementById('name').value = '';
    document.getElementById('description').value = '';
    document.getElementById('ppn_amount').value = '';

    $('#code-error').html('');
    $('#name-error').html('');
    $('#unit-error').html('');
    $('#category-error').html('');
    $('#unit').select2('val', 'All');
    $('#category').select2('val', 'All');
    $('input[type=checkbox]').prop('checked', false);

    document.getElementById('ppn_amount').value = '';
    document.getElementById('ppn_amount').disabled = true;

    document.getElementById('account_code').value = '';
    $('.search-journal').html('Search account code');
}

let item_edit_reset = function () {
    window.location.href = '/item/' + item_uuid + '/edit';
}

let uom_reset = function () {
    document.getElementById('uom_quantity').value = '';

    $('#unit2-error').html('');
    $('#unit2').select2('val', 'All');
    $('#uom_quantity-error').html('');
}

let minmaxstock_reset = function () {
    document.getElementById('min').value = '';
    document.getElementById('max').value = '';

    $('#min-error').html('');
    $('#max-error').html('');
    $('#storage-error').html('');
    $('#storage').select2('val', 'All');
}