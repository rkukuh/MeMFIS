let airframe = {
  init: function () {
      $('#airframe, #airframe_validate').select2({
          placeholder: 'Select a Airframe',
      });
  }
};

jQuery(document).ready(function () {
  airframe.init();
});
