let ManufacturerSelect2 = {
    init: function () {
        $('#manufacturer_id, #manufacturer_id_validate').select2({
            placeholder: 'Select a menafacturer'
        });
    }
};

jQuery(document).ready(function () {
    ManufacturerSelect2.init();
});
