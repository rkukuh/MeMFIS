let EmployeeStatusSelect2 = {
    init: function () {
        $('#employee_status, #employee_status_validate').select2({
            placeholder: 'Select a Employee Status'
        });
    }
};

jQuery(document).ready(function () {
    EmployeeStatusSelect2.init();
});
