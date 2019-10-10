let PurchaseRequestTypeSelect2 = {
  init: function () {
      $('#purchase-request-type, #purchase-request-type_validate').select2({
          placeholder: 'Select a Type'
      });
  }
};

jQuery(document).ready(function () {
  PurchaseRequestTypeSelect2.init();
});
