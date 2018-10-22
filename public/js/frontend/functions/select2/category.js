let Select2 = {
    init: function () {
        $('#category, #category_validate').select2({
            placeholder: 'Select a Category'
        });
    }
};

jQuery(document).ready(function () {
    Select2.init();
});
