let quotation = $('#quotation_uuid').val();
let exchange_rate = $('#exchange').val();
var DatatableAutoColumnHideDemo = function () {

  var demo = function () {
    $('.summary_datatable').mDatatable({
      data: {
        type: 'remote',
        source: {
          read: {
            method: 'GET',
            url: '/datatables/quotation/' + quotation + '/job-request',
            map: function (raw) {
              let dataSet = raw;
              let total = subtotal = 0;
             
              if (typeof raw.data !== 'undefined') {
                dataSet = raw.data;
              }

              return dataSet;
            }
          }
        },
        pageSize: 10,
        serverPaging: !1,
        serverSorting: !1

    },
      responsive: true,

      sortable: true,

      pagination: true,

      toolbar: {

        items: {

            pagination: {

            pageSizeSelect: [10, 20, 30, 50, 100],
          },
        },
      },

      search: {
        input: $('#generalSearch'),
      },

      rows: {


      },
      columns: [
        {
          field: 'code',
          title: 'No',
          width: '100px',
        }, {
          field: 'pivot.description',
          title: 'Job Request Description',
          width: '700px',

          template: function (t) {
            if(currency.id == 1){
              return (t.pivot.description + '<br>' +
                '- Manhours Price : ' + numberFormat.format(t.pivot.manhour_total) + ' x ' + IDRformatter.format(t.pivot.manhour_rate) + '<br>' +
                '- Facility Price : '
              );
            }else{
              return (t.pivot.description + '<br>' +
                '- Manhours Price : ' + numberFormat.format(t.total_manhours_with_performance_factor) + ' x ' + ForeignFormatter.format(t.pivot.manhour_rate) + '<br>' +
                '- Facility Price : <br>' +
                '- Material & Tool Price : ' 
              );
            }
          }
        }, {
          field: 'ShipCity',
          title: 'Cost',
          template: function (a) {
            
            if(currency.id == 1){
              return ('<br>' +
                IDRformatter.format(a.total_manhours_with_performance_factor * a.pivot.manhour_rate) + '<br>' +
                IDRformatter.format(a.facilities_price_amount) + '<br>' +
                IDRformatter.format(a.mat_tool_price) + '<br>' 
              );
            }else{
              return ('<br>' +
                ForeignFormatter.format(a.total_manhours_with_performance_factor * a.pivot.manhour_rate) + '<br>' +
                ForeignFormatter.format(a.facilities_price_amount) + '<br>' +
                ForeignFormatter.format(a.mat_tool_price) + '<br>' 
              );
            }
          }
        },
        {
          field: 'discount',
          title: 'Discount',
          sortable: 'asc',
          filterable: !1,
          template: function (t, e, i) {
            if(t.pivot.discount_value == null && t.pivot.discount_type == null){
                return (
                    '<button data-toggle="modal" data-target="#discount" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount" title="Tool" data-uuid=' +
                    t.uuid +
                    '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                  );
            }
            else{
                if(t.pivot.discount_type ==  'amount'){
                  if(currency.id == 1){
                    return (
                      IDRformatter.format(t.pivot.discount_value)+'<button data-toggle="modal" data-target="#discount" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount" title="Tool" data-uuid=' +
                      t.uuid +
                      '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    );
                  }else{
                    return (
                      ForeignFormatter.format(t.pivot.discount_value)+'<button data-toggle="modal" data-target="#discount" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount" title="Tool" data-uuid=' +
                      t.uuid +
                      '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    );
                  }
                    
                }
                else if(t.pivot.discount_type == 'percentage'){
                    return (
                        t.pivot.discount_value+'%'+'<button data-toggle="modal" data-target="#discount" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount" title="Tool" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    );
                }
            }
          }
        },
        {
          field: 'total',
          title: 'Total',
          sortable: 'asc',
          filterable: !1,
          template: function (t, e, i) {
            total = 0;
            if(t.pivot.discount_value == null && t.pivot.discount_type == null){
                total = t.total_manhours_with_performance_factor * t.pivot.manhour_rate + t.facilities_price_amount + t.mat_tool_price;
                subtotal = subtotal + total;
            }
            else{
                if(t.pivot.discount_type ==  'amount'){
                    total = t.total_manhours_with_performance_factor * t.pivot.manhour_rate + t.facilities_price_amount + t.mat_tool_price - t.pivot.discount_value;
                    subtotal = subtotal + total;
                    
                }
                else if(t.pivot.discount_type == 'percentage'){
                    total = t.total_manhours_with_performance_factor * t.pivot.manhour_rate + t.facilities_price_amount + t.mat_tool_price - (((t.total_manhours_with_performance_factor * t.pivot.manhour_rate + t.facilities_price_amount + t.mat_tool_price)*t.pivot.discount_value)/100);
                    subtotal = subtotal + total;
                }
            }

            if(currency.id == 1){
              $("#sub_total").html(IDRformatter.format(subtotal));
              $("#grand_total_rupiah").html(IDRformatter.format(subtotal));
              $("#grand_total_rupiah").attr("value", subtotal);
              $("#sub_total").attr("value", subtotal);
              return (
                IDRformatter.format(total)
              );
            }else{
              let totalRupiah = subtotal * exchange_rate; 
              $("#sub_total").html(ForeignFormatter.format(subtotal));
              $("#grand_total").html(ForeignFormatter.format(subtotal));
              $("#grand_total").attr("value", subtotal);
              $("#sub_total").attr("value", subtotal);

              $("#grand_total_rupiah").html(IDRformatter.format(totalRupiah));
              $("#grand_total_rupiah").attr("value", totalRupiah);
              return (
                ForeignFormatter.format(total)
              );
            }
          }
        },
      ],
    });
    let value = [];
    let inputs = $(".charge");
    let currency = $("#currency").val();
    let exchange_rate = $("#exchange").val();
    let grandTotal = grandTotalRupiah = 0;
    //get all values
    for (let i = 0; i < inputs.length; i++) {
        value[i] = parseInt($(inputs[i]).val());
    }
    const arrSum = arr => arr.reduce((a, b) => a + b, 0);
    let subTotal = $('#sub_total').attr("value");
    grandTotal = parseInt(subTotal) + parseInt(arrSum(value));

    if(currency !== 1){
        grandTotalRupiah = ( parseInt(subTotal) + parseInt(arrSum(value)) ) * exchange_rate;
    }
                
    $('#grand_total').attr("value", grandTotal);
    $('#grand_total_rupiah').attr("value", grandTotalRupiah);
    $('#grand_total').html(ForeignFormatter.format(grandTotal));
    $('#grand_total_rupiah').html(IDRformatter.format(grandTotalRupiah));
  };

  return {
    init: function () {
      demo();
    },
  };
}();

jQuery(document).ready(function () {
  DatatableAutoColumnHideDemo.init();
});
