let UderstandingSelect2 = {
    init: function () {
        $('#understanding, #understanding_validate').select2({
            placeholder: 'Select a Understanding Level'
        });
    }
};

jQuery(document).ready(function () {
    UderstandingSelect2.init();
});
