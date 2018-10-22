let Category = {
    init: function () {
        $('#category, #category_validate').select2({
            placeholder: 'Select a Category'
        });
    }
};

jQuery(document).ready(function () {
    Category.init();
});
