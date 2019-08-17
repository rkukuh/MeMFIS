let IndirectSupervisorSelect2 = {
    init: function () {
        $('#inderect_supervisor, #inderect_supervisor_validate').select2({
            placeholder: 'Select a Inderect Supervisor'
        });
    }
};

jQuery(document).ready(function () {
    IndirectSupervisorSelect2.init();
});
