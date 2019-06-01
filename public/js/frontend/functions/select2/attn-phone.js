let AttnPhoneSelect2 = {
    init: function () {
        $('select[name^=attn-phone], #attn-phone_validate').select2({
            placeholder: 'Phone Numbers',
            tags: true
        });
    }
};

jQuery(document).ready(function () {
    AttnPhoneSelect2.init();
});
