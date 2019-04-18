let UnitSelect2 = {
    init: function () {
        $('.unit, ._validate').select2({
            placeholder: 'Select an Unit'
        })
    }
};

jQuery(document).ready(function () {
    UnitSelect2.init();
});
