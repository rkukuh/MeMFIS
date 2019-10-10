let LoanedSelect2 = {
    init: function () {
        $('#loaned, #loaned_validate').select2({
            placeholder: 'Select a Loaned'
        });
    }
};

jQuery(document).ready(function () {
    LoanedSelect2.init();
});
