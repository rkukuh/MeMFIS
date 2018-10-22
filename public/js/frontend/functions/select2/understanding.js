let Uderstanding = {
    init: function () {
        $('#understanding, #understanding_validate').select2({
            placeholder: 'Select a Understanding Level'
        });
    }
};

jQuery(document).ready(function () {
    Uderstanding.init();
});
