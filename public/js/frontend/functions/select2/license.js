let License = {
    init: function () {
        $('#license, #license_validate').select2({
            placeholder: 'Select a License'
        }),$('#license2, #license2_validate').select2({
            placeholder: 'Select a License'
        });
    }
};

jQuery(document).ready(function () {
    License.init();
});
