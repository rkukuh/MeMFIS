$(document).ready(function () {
    DiscountType = function () {
        $('select[name^="discount-type"]').append(new Option('Amount', 'amount'));
        $('select[name^="discount-type"]').append(new Option('Percentage', 'percentage'));
    };

    DiscountType();
});