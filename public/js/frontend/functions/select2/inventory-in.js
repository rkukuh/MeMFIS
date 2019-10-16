let NumberSelect2 = {
    init: function () {
        $('#number').select2({
            placeholder: 'Select a RefNo'
        });
    }
};

jQuery(document).ready(function () {
    NumberSelect2.init();
});
