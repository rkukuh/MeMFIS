let receivedBySelect2 = {
    init: function () {
        $('#returned_by, #returned_by_validate').select2({
            placeholder: 'Select a Returned By'
        });
    }
};

jQuery(document).ready(function () {
    receivedBySelect2.init();
});
