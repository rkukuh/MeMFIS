let exchange_rate = $('#exchange').val();
let total_manhour = $('#total_manhour').attr('value');
var DatatableAutoColumnHideDemo = function () {

  var demo = function () {
    let summary_datatable = $('.summary_datatable').mDatatable({
      data: {
        type: 'remote',
        source: {
          read: {
            method: 'GET',
            url: '/datatables/quotation/' + quotation_uuid + '/additional/job-request',
            map: function (raw) {
              let dataSet = raw;
              let = subtotal = grandtotal = total = TotalDiscount = 0;

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
          field: 'description',
          title: 'Job Request Description',
          width: '700px',

          template: function (t) {
            if(currency.id == 1){
              return (t.description + '<br>' +
                '- Manhours Price : ' + numberFormat.format(t.total_manhours_with_performance_factor) + ' x ' + IDRformatter.format(t.manhour_rate_amount) + '<br>' +
                '- Material & Tool Price : ' 
              );
            }else{
              return (t.description + '<br>' +
                '- Manhours Price : ' + numberFormat.format(t.total_manhours_with_performance_factor) + ' x ' + ForeignFormatter.format(t.manhour_rate_amount) + '<br>' +
                '- Material & Tool Price : ' 
              );
            }
        }
        }, {
          field: 'ShipCity',
          title: 'Cost',
          template: function (t) {
            if(currency.id == 1){
              return ('<br>' +
                IDRformatter.format(t.total_manhours_with_performance_factor * t.manhour_rate_amount) + '<br>' +
                IDRformatter.format(t.mat_tool_price) + '<br>' 
              );
            }else{
              return ('<br>' +
                ForeignFormatter.format(t.total_manhours_with_performance_factor * t.manhour_rate_amount) + '<br>' +
                ForeignFormatter.format(t.mat_tool_price) + '<br>' 
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
            if(t.discount_value == null && t.discount_type == null){
                  return (
                      '<button data-toggle="modal" data-target="#discount_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount" title="Tool" data-uuid=' +
                      t.uuid +
                      '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    );
              }
              else{
                  if(t.discount_type ==  'amount'){
                    if(currency.id == 1){
                      return (
                        IDRformatter.format(t.discount_value)+'<button data-toggle="modal" data-target="#discount_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount_htcrr" title="Tool" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                      );
                    }else{
                      return (
                        ForeignFormatter.format(t.discount_value)+'<button data-toggle="modal" data-target="#discount_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount_htcrr" title="Tool" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                      );
                    }
                      
                  }
                  else if(t.discount_type == 'percentage'){
                      return (
                          t.discount_value+'%'+'<button data-toggle="modal" data-target="#discount_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount_htcrr" title="Tool" data-uuid=' +
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
              total = t.total_manhours_with_performance_factor * t.manhour_rate_amount + t.mat_tool_price;
              subtotal = subtotal + total;

              if(t.discount_type == 'amount'){
                TotalDiscount += t.discount_value;
                }else {
                  if(t.discount_type == 'percentage') {
                  TotalDiscount += total * (t.discount_value/100);
                }else{
                  TotalDiscount += 0;
                } 
              }

              grandtotal = subtotal - TotalDiscount ;
              if(currency.id == 1){
                $("#sub_total").html(IDRformatter.format(subtotal));
                $("#sub_total").attr("value", subtotal);

                $("#total_discount").html(IDRformatter.format(TotalDiscount));
                $("#total_discount").attr("value", TotalDiscount);

                $("#grand_total_rupiah").html(IDRformatter.format(grandtotal));
                $("#grand_total_rupiah").attr("value", grandtotal);
              }else{
                let totalRupiah = ( grandtotal ) * exchange_rate; 
                $("#sub_total").html(ForeignFormatter.format(subtotal));
                $("#sub_total").attr("value", subtotal);

                $("#total_discount").html(ForeignFormatter.format(TotalDiscount));
                $("#total_discount").attr("value", TotalDiscount);

                $("#grand_total").html(ForeignFormatter.format(grandtotal));
                $("#grand_total").attr("value", grandtotal);
        
                $("#grand_total_rupiah").html(IDRformatter.format(totalRupiah));
                $("#grand_total_rupiah").attr("value", totalRupiah);
              }
              // calculate_total();
              
              if(currency.id == 1){
              return (
                  IDRformatter.format(total)
                );
              }else{
              return (
                  ForeignFormatter.format(total)
                );
              }
          }
        },
      ]
    });
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
