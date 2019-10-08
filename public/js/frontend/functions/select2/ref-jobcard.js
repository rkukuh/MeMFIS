let RefJobcardSelect2 = {
    init: function () {
        $('#ref_jobcard, #ref_jobcard_validate').select2({
            placeholder: 'Select a jobcard'
        });
    }
};

jQuery(document).ready(function () {
    RefJobcardSelect2.init();
});
