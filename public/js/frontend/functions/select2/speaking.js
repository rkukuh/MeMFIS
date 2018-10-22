let Speaking = {
    init: function () {
        $('#speaking, #speaking_validate').select2({
            placeholder: 'Select a Speaking Level'
        });
    }
};

jQuery(document).ready(function () {
    Speaking.init();
});
