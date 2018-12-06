let EmailSelect2 = {
    init: function () {
        $('#email, #email_validate').select2({
            placeholder: 'Select a Email'
        });
    }
};

jQuery(document).ready(function () {
    EmailSelect2.init();
});
