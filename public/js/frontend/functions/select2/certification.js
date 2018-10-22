let Select2 = {
    init: function () {
        $('#certification, #certification_validate').select2({
            placeholder: 'Select a Certification'
        });
    }
};

jQuery(document).ready(function () {
    Select2.init();
});
