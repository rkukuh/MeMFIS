let ApplicabilityAirplaneSelect2 = {
    init: function () {
        $('#applicability_airplane, #applicability_airplane_validate').select2({
            placeholder: 'Select a Applicability',
        });
    }
};

jQuery(document).ready(function () {
     ApplicabilityAirplaneSelect2.init();
});
