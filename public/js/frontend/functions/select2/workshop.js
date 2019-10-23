let CodeSelect2 = {
    init: function () {
        $('#item_number_id').select2({
            placeholder: 'Select a Ref No'
        });
    }
};

jQuery(document).ready(function () {
    CodeSelect2.init();
});
