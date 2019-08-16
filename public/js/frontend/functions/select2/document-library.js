let DocumentLibrarySelect2 = {
    init: function () {
        $('#document-library, #document-library_validate').select2({
            placeholder: 'Select a Document Library',
            tags: true
        });
    }
};

jQuery(document).ready(function () {
    DocumentLibrarySelect2.init();
});
