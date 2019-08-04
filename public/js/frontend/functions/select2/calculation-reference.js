let CalculationReferenceSelect2 = {
    init: function () {
        $('#calculation_reference, #calculation_reference_validate').select2({
            placeholder: 'Select a Calculation Reference'
        });
    }
};

jQuery(document).ready(function () {
    CalculationReferenceSelect2.init();
});
