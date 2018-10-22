let Select2 = {
    init: function () {
        $('#reading, #reading_validate').select2({
            placeholder: 'Select a Reading Level'
        });
    }
};

jQuery(document).ready(function () {
    Select2.init();
});
