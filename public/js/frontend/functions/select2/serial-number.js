let SerialNumberSelect2 = {
    init: function () {
        $('#serial_no, #serial_no_validate').select2({
            placeholder: 'Select a Serial Number'
        });
        $('#sn, #sn_validate').select2({
            placeholder: 'Select a Serial Number'
        });
    }
};

jQuery(document).ready(function () {
    SerialNumberSelect2.init();
});
