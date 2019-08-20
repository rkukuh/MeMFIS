let RoleSelect2 = {
    init: function () {
        $('#role, #role_validate').select2({
            placeholder: 'Select a Role'
        });
    }
};

jQuery(document).ready(function () {
    RoleSelect2.init();
});
