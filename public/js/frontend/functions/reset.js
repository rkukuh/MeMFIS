let item_reset = function () {
    document.getElementById('code').value = "";
    document.getElementById('name').value = "";
    document.getElementById('description').value = "";
    document.getElementById('barcode').value = "";
    document.getElementById('ppn').value = "";
    $("#accountcode2").select2('val', 'All');
    $("#category").select2('val', 'All');
    $('input[type=file]').val("");
    $('input[type=checkbox]').prop('checked',false);
    $('#code-error').html('');
    $('#name-error').html('');

}

let uom_reset = function () {
    document.getElementById('qty').value = "";
    document.getElementById('qty2').value = "";
    $("#unit").select2('val', 'All');
    $("#unit2").select2('val', 'All');
    $('#qty-error').html('');
    $('#qty2-error').html('');
    $('#unit-error').html('');
    $('#unit2-error').html('');


}
let minmaxstock_reset = function () {
    $("#storage").select2('val', 'All');
    document.getElementById('min').value = "";
    document.getElementById('max').value = "";
    $('#min-error').html('');
    $('#max-error').html('');
    $('#storage-error').html('');

}

let journal_reset = function () {
    $("#type").select2('val', 'All');
    document.getElementById('code').value = "";
    document.getElementById('name').value = "";
    document.getElementById('level').value = "1";
    document.getElementById('description').value = "";
    $('#code-error').html('');
    $('#nameerror').html('');

}
