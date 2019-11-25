let PartNumberSelect2 = {
    init: function () {
        $('#part_number, #part_number_validate').select2({
            placeholder: 'Select an Part Number'
        });
    }
};

jQuery(document).ready(function () {
    PartNumberSelect2.init();
});
