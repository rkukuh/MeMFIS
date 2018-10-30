let item_reset = function () {
    document.getElementById('code').value = "";
    document.getElementById('name').value = "";
    document.getElementById('description').value = "";
    document.getElementById('barcode').value = "";
    document.getElementById('ppn').value = "";
    document.getElementById('qty').value = "";
    document.getElementById('search-journal').value = "";
    $("#accountcode2").select2('val', 'All');
    $("#category").select2('val', 'All');
    $("#unit").select2('val', 'All');
    $("#tag").select2('val', 'All');
    $('input[type=file]').val("");
    $('input[type=checkbox]').prop('checked',false);
    $('#code-error').html('');
    $('#name-error').html('');

}

let uom_reset = function () {
    document.getElementById('uom_quantity').value = "";
    $("#unit2").select2('val', 'All');
    $('#uom_quantity-error').html('');
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

let employee_employee_reset = function () {
    // $("#type").select2('val', 'All');
    document.getElementById('code').value = "";
    document.getElementById('first_name').value = "";
    document.getElementById('middle_name').value = "";
    document.getElementById('last_name').value = "";
    document.getElementById('dob').value = "";
    document.getElementById('hired_at').value = "";
    $('#code_employee-error').html('');
    $('#first-name-error').html('');

}

let employee_general_license_reset = function () {
    document.getElementById('code_general_license').value = "";
    document.getElementById('exam_no').value = "";
    document.getElementById('exam_date').value = "";
    document.getElementById('attendance_no').value = "";
    document.getElementById('aviation_degree_no').value = "";
    document.getElementById('issued_at').value = "";
    document.getElementById('valid_until').value = "";
    document.getElementById('revoke_at').value = "";
    document.getElementById('general_license').value = "";
    document.getElementById('employee_license').value = "";
    $("#name4").select2('val', 'All');
    $("#aviation_degree").select2('val', 'All');


}