let SupervisorSelect2 = {
    init: function () {
        $('#supervisor, #supervisor_validate').select2({
            placeholder: 'Select a Supervisor'
        });
    }
};

jQuery(document).ready(function () {
    SupervisorSelect2.init();
});
