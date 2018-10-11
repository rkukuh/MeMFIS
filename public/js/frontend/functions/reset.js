var item_reset = function () {
    var frm = document.getElementsByName('item-form')[0];
    frm.reset();
    $("#accountcode2").select2('val', 'All');
    $("#category").select2('val', 'All');
    $('input[type=file]').val("");
    // document.getElementById('largeImage-label').innerHTML = '';

}

var uom_reset = function () {
    var frm = document.getElementsByName('item-form')[0];
    frm.reset();
    $("#unit").select2('val', 'All');
    $("#unit2").select2('val', 'All');

}
