$(document).ready(function() {
    $('#qty').on('blur', function() {
        let qty = $('#qty').val();
        let convert = accounting.formatNumber(qty, 2, ".", ",");
        document.getElementById('qty').value = convert;
    });
}); //end ready