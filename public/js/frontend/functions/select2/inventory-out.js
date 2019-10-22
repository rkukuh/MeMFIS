let NumberSelect2 = {
    init: function () {
        $('#item_number_id').select2({
            placeholder: 'Select a Ref No'
        });
    }
};

jQuery(document).ready(function () {
    NumberSelect2.init();
});
