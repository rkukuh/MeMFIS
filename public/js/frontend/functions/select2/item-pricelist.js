let ItemPriceListSelect2 = {
    init: function () {
        $('.item, .item_validate').select2({
            placeholder: 'Select an Item'
        });
    }
};

jQuery(document).ready(function () {
    ItemPriceListSelect2.init();
});
