let AcTypeSelect2 = {
    init: function () {
        $('#ac-type, #ac-type_validate').select2({
            placeholder: 'Select a AC Type'
        });
    }
};

jQuery(document).ready(function () {
    AcTypeSelect2.init();
});
