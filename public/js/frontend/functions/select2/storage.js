let Storage = {
    init: function () {
        $('#storage, #storage_validate').select2({
            placeholder: 'Select a Storage'
        });
    }
};

jQuery(document).ready(function () {
    Storage.init();
});
