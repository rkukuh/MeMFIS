let RefProjectSelect2 = {
    init: function () {
        $('#ref_project, #ref_project_validate').select2({
            placeholder: 'Select a project'
        });
    }
};

jQuery(document).ready(function () {
    RefProjectSelect2.init();
});
