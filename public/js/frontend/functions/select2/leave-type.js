let LeaveTypesSelect2 = {
    init: function () {
        $('#leave_type, #leave_type_validate').select2({
            placeholder: 'Select a Leave types'
        });
    }
};

jQuery(document).ready(function () {
    LeaveTypesSelect2.init();
});
