let ParentStructureSelect2 = {
    init: function () {
        $('#parent_structure, #parent_structure_validate').select2({
            placeholder: 'Select a Parent structure'
        });
    }
};

jQuery(document).ready(function () {
    ParentStructureSelect2.init();
});
