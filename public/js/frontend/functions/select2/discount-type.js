let TypeSelect2 = {
    init: function () {
        $('select[name^="discount-type"]').append(
            '<option value="amount">Amount</option>',
            '<option value="percentage">Percentage</option>'
        );
        
        $('select[name^="discount-type"], #discount-type_validate').select2({
            placeholder: 'Select a Type'
        });
    }
};

jQuery(document).ready(function () {
    TypeSelect2.init();
});
