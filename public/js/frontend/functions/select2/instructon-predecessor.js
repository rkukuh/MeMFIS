let InstructionPredecessorSelect2 = {
    init: function () {
        $('#instruction_predecessor, #instruction_predecessor_validate').select2({
            placeholder: 'Select a Taskcard'
        });
    }
};

jQuery(document).ready(function () {
    InstructionPredecessorSelect2.init();
});
