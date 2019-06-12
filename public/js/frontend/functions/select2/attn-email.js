let AttnEmailSelect2 = {
    init: function () {
        $('.attn-email, #attn-email_validate').select2({
            placeholder: 'Email Address',
            tags: true
        });
    }
};

jQuery(document).ready(function () {
    AttnEmailSelect2.init();
});
