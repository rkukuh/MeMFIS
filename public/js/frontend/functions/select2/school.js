let School = {
    init: function () {
        $('#school, #school_validate').select2({
            placeholder: 'Select a School'
        });
    }
};

jQuery(document).ready(function () {
    School.init();
});
