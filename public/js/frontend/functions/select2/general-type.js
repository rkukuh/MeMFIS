let generaltypeSelect2 = {
    init: function () {
        $('#general_type, #general_type_validate').select2({
            placeholder: 'Select an General Type',
        });
    }
  };
  
  jQuery(document).ready(function () {
    generaltypeSelect2.init();
  });
  