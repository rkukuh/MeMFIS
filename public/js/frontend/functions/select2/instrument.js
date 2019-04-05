let instrument = {
  init: function () {
      $('#instrument, #instrument_validate').select2({
          placeholder: 'Select a Instrument',
      });
  }
};

jQuery(document).ready(function () {
  instrument.init();
});
