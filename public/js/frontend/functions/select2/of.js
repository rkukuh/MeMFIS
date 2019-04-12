let OfSelect2 = {
  init: function () {
      $('#of, #of_validate').select2({
          placeholder: 'Select a Of'
      });
  }
};

jQuery(document).ready(function () {
  OfSelect2.init();
});
