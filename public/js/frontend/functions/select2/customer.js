let Customer = {
    init: function () {
        $('#customer, #customer_validate').select2({
            placeholder: 'Select a Customer'
        });
    }
};

jQuery(document).ready(function () {
    Customer.init();
});
