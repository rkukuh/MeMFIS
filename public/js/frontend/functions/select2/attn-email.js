let AttnEmailSelect2 = {
    init: function () {
        $('select[name^=attn-email], #attn-email_validate').select2({
            placeholder: 'Email NumberAddresss',
            tags: true
        });
    }
};

jQuery(document).ready(function () {
    AttnEmailSelect2.init();
});
