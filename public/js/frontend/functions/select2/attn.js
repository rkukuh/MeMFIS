let AttnSelect2 = {
    init: function () {
        $('#attn, #attn_validate').select2({
            placeholder: 'Select a Attn'
        });
    }
};

jQuery(document).ready(function () {
    AttnSelect2.init();
});
