let Select2 = {
    init: function () {
        $('#customer, #customer_validate').select2({
            placeholder: 'Select a Customer'
        });
    }
};

jQuery(document).ready(function () {
    Select2.init();
});
