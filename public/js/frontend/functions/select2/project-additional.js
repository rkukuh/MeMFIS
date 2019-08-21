let ProjectAdditionalSelect2 = {
    init: function () {
        $('#project-additional, #project-additional_validate').select2({
            placeholder: 'Select a Project'
        });
    }
};

jQuery(document).ready(function () {
    ProjectAdditionalSelect2.init();
});
