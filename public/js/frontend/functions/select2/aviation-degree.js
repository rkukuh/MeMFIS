let AviationDegreeSelect2 = {
    init: function () {
        $('#aviation_degree, #aviation_degree_validate').select2({
            placeholder: 'Select a aviation Degree'
        });
    }
};

jQuery(document).ready(function () {
    AviationDegreeSelect2.init();
});
