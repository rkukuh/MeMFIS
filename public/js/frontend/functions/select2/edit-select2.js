let EditSelect2 = {
    init: function () {
        $('.edit-select2').select2({
            placeholder: 'Select an Option'
        });
    }
};

jQuery(document).ready(function () {
    EditSelect2.init();
});
