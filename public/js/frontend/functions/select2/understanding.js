let Select2 = {
    init: function () {
        $('#understanding, #understanding_validate').select2({
            placeholder: 'Select a Understanding Level'
        });
    }
};

jQuery(document).ready(function () {
    Select2.init();
});
