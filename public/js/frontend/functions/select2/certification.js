let Certification = {
    init: function () {
        $('#certification, #certification_validate').select2({
            placeholder: 'Select a Certification'
        });
    }
};

jQuery(document).ready(function () {
    Certification.init();
});
