let Type = {
    init: function () {
        $('#type, #type_validate').select2({
            placeholder: 'Select a Type'
        });
    }
};

jQuery(document).ready(function () {
    Type.init();
});
