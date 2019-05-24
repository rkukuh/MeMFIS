let EmployeeSelect2 = {
    init: function () {
        $('#employee, #employee_validate').select2({
            placeholder: 'Select an Employee'
        });
    }
};

jQuery(document).ready(function () {
    EmployeeSelect2.init();
});
