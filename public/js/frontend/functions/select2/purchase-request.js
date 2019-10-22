let PurchaseRequestSelect2 = {
  init: function () {
      $('#purchase_request, #purchase_request_validate').select2({
          placeholder: 'Select a Purchase Rquest Number'
      });
  }
};

jQuery(document).ready(function () {
  PurchaseRequestSelect2.init();
});
