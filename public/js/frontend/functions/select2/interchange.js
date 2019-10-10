let InterchangeSelect2 = {
    init: function () {
        $('#interchange, #interchange_validate').select2({
            placeholder: 'Select an Interchange'
        });
    }
};

jQuery(document).ready(function () {
    InterchangeSelect2.init();
});
