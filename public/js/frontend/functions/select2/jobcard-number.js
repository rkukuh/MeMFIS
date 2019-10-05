let JCSelect2 = {
    init: function () {
        $('#jc_no, #jc_novalidate').select2({
            placeholder: 'Select an Jobcard Number'
        });
    }
};

jQuery(document).ready(function () {
    JCSelect2.init();
});
