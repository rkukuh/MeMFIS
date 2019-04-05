let electrical = {
  init: function () {
      $('#electrical, #electrical_validate').select2({
          placeholder: 'Select a Electrical',
      });
  }
};

jQuery(document).ready(function () {
  electrical.init();
});
