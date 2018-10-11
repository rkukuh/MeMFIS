var item_reset = function () {
    document.getElementById('code').value = "";
    document.getElementById('name').value = "";
    document.getElementById('description').value = "";
    document.getElementById('barcode').value = "";
    document.getElementById('ppn').value = "";
    $("#accountcode2").select2('val', 'All');
    $("#category").select2('val', 'All');
    $('input[type=file]').val("");
    $('input[type=checkbox]').prop('checked',false);
}

var uom_reset = function () {
    document.getElementById('qty').value = "";
    document.getElementById('qty2').value = "";
    $("#unit").select2('val', 'All');
    $("#unit2").select2('val', 'All');

}

var minmaxstock_reset = function () {
    $("#storage").select2('val', 'All');
    document.getElementById('min').value = "";
    document.getElementById('max').value = "";
}
