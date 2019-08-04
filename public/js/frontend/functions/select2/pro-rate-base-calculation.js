let ProRateBaseCalculationSelect2 = {
    init: function () {
        $('#pro_rate_base_calculation, #pro_rate_base_calculation_validate').select2({
            placeholder: 'Select a Pro Rate Calculation'
        });
    }
};

jQuery(document).ready(function () {
    ProRateBaseCalculationSelect2.init();
});
