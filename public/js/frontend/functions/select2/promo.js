let PromoSelect2 = {
    init: function () {        
        $('select[name="promo"], #promo_validate').select2({
            placeholder: 'Select a Promo'
        });
    }
};

jQuery(document).ready(function () {
    PromoSelect2.init();
});
