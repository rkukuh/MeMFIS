let Select2 = {
    init: function () {
        $('#school, #school_validate').select2({
            placeholder: 'Select a School'
        });
    }
};

jQuery(document).ready(function () {
    Select2.init();
});
