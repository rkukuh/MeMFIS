let IndirectSupervisorSelect2 = {
    init: function () {
        $('#indirect_supervisor, #indirect_supervisor_validate').select2({
            placeholder: 'Select a indirect Supervisor'
        });
    }
};

jQuery(document).ready(function () {
    IndirectSupervisorSelect2.init();
});
