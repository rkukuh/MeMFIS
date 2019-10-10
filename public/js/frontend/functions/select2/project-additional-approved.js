let ProjectAdditionalApprovedSelect2 = {
    init: function () {
        $('#project-additional-approved, #project-additional-approved_validate').select2({
            placeholder: 'Select a Project'
        });
    }
};

jQuery(document).ready(function () {
    ProjectAdditionalApprovedSelect2.init();
});
