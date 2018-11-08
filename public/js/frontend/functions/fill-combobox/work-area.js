let WorkAreaSelect2 = {
    init: function () {
        $('#work_area, #work_area_validate').select2({
            placeholder: 'Select a Work Area'
        });
    }
};

jQuery(document).ready(function () {
    WorkAreaSelect2.init();
});
