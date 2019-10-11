let PromoSelect2 = {
    init: function () {        
        $('select[name="promo-type"], #promo-type_validate').select2({
            placeholder: 'Select a Promo'
        });
    }
};

jQuery(document).ready(function () {
    PromoSelect2.init();
});
