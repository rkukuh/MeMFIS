let InstructionSuccessorSelect2 = {
    init: function () {
        $('#instruction_successor, #instruction_validate').select2({
            placeholder: 'Select a Taskcard'
        });
    }
};

jQuery(document).ready(function () {
    InstructionSuccessorSelect2.init();
});
