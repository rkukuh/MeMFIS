let QualificationSelect2 = {
    init: function () {
        $('#qualification, #qualification_validate').select2({
            placeholder: 'Select an Qualification'
        });
    }
};

jQuery(document).ready(function () {
    QualificationSelect2.init();
});
