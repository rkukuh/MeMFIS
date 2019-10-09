let DiscountTypeSelect2 = {
    init: function () {
        $('select[name^="discount-type"]').append(
            '<option value="amount">Amount</option>',
            '<option value="percentage">Percentage</option>'
        );
        
        $('select[name^="discount-type"], #discount-type_validate').select2({
            placeholder: 'Select a Discount Type'
        });
    }
};

jQuery(document).ready(function () {
    DiscountTypeSelect2.init();
});
