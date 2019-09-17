let quotation = $('#quotation_uuid').val();
let exchange_rate = $('#exchange').val();
var DatatableAutoColumnHideDemo = function () {

  var demo = function () {
    let summary_datatable = $('.summary_datatable').mDatatable({
      data: {
        type: 'remote',
        source: {
          read: {
            method: 'GET',
            url: '/datatables/quotation/' + quotation + '/job-request',
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
        serverPaging: !0,
                serverFiltering: !0,
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
            if(t.pivot){
              if(currency.id == 1){
                return (t.pivot.description + '<br>' +
                  '- Manhours Price : ' + numberFormat.format(t.total_manhours_with_performance_factor) + ' x ' + IDRformatter.format(t.pivot.manhour_rate_amount) + '<br>' +
                  '- Facility Price : <br>' +
                  '- Material & Tool Price : ' 
                );
              }else{
                return (t.pivot.description + '<br>' +
                  '- Manhours Price : ' + numberFormat.format(t.total_manhours_with_performance_factor) + ' x ' + ForeignFormatter.format(t.pivot.manhour_rate_amount) + '<br>' +
                  '- Facility Price : <br>' +
                  '- Material & Tool Price : ' 
                );
              }
            }else if(t.data_htcrr){
              if(currency.id == 1){
                return (t.data_htcrr.description + '<br>' +
                  '- Manhours Price : ' + numberFormat.format(t.data_htcrr.total_manhours_with_performance_factor) + ' x ' + IDRformatter.format(t.data_htcrr.manhour_rate_amount) + '<br>' +
                  '- Material & Tool Price : ' 
                );
              }else{
                return (t.data_htcrr.description + '<br>' +
                  '- Manhours Price : ' + numberFormat.format(t.data_htcrr.total_manhours_with_performance_factor) + ' x ' + ForeignFormatter.format(t.data_htcrr.manhour_rate_amount) + '<br>' +
                  '- Material & Tool Price : ' 
                );
              }
            }else{
              if(currency.id == 1){
                return ('not filled yet<br>' +
                  '- Manhours Price : ' + numberFormat.format(0) + ' x ' + IDRformatter.format(0) + '<br>' +
                  '- Material & Tool Price : ' 
                );
              }else{
                return ('not filled yet<br>' +
                  '- Manhours Price : ' + numberFormat.format(0) + ' x ' + ForeignFormatter.format(0) + '<br>' +
                  '- Material & Tool Price : ' 
                );
              }
            }
        }
        }, {
          field: 'ShipCity',
          title: 'Cost',
          template: function (a) {
            if(a.pivot){
              if(currency.id == 1){
                return ('<br>' +
                  IDRformatter.format(a.total_manhours_with_performance_factor * a.pivot.manhour_rate_amount) + '<br>' +
                  IDRformatter.format(a.facilities_price_amount) + '<br>' +
                  IDRformatter.format(a.mat_tool_price) + '<br>' 
                );
              }else{
                return ('<br>' +
                  ForeignFormatter.format(a.total_manhours_with_performance_factor * a.pivot.manhour_rate_amount) + '<br>' +
                  ForeignFormatter.format(a.facilities_price_amount) + '<br>' +
                  ForeignFormatter.format(a.mat_tool_price) + '<br>' 
                );
              }
            }else if(a.data_htcrr){
              if(currency.id == 1){
                return ('<br>' +
                  IDRformatter.format(a.data_htcrr.total_manhours_with_performance_factor * a.data_htcrr.manhour_rate_amount) + '<br>' +
                  IDRformatter.format(a.mat_tool_price) + '<br>' 
                );
              }else{
                return ('<br>' +
                  ForeignFormatter.format(a.data_htcrr.total_manhours_with_performance_factor * a.data_htcrr.manhour_rate_amount) + '<br>' +
                  ForeignFormatter.format(a.mat_tool_price) + '<br>' 
                );
              }
            }else{
              if(currency.id == 1){
                return ('<br>' +
                  IDRformatter.format(0 * 0) + '<br>' +
                  IDRformatter.format(0) + '<br>' 
                );
              }else{
                return ('<br>' +
                  ForeignFormatter.format(0 * 0) + '<br>' +
                  ForeignFormatter.format(0) + '<br>' 
                );
              }
            }
          }
        },
        {
          field: 'discount',
          title: 'Discount',
          sortable: 'asc',
          filterable: !1,
          template: function (t, e, i) {
            if(t.pivot){
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
              }else if(t.data_htcrr){
                if(t.data_htcrr.discount_value == null && t.data_htcrr.discount_type == null){
                  return (
                      '<button data-toggle="modal" data-target="#discount_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount" title="Tool" data-uuid=' +
                      t.uuid +
                      '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    );
              }
              else{
                  if(t.data_htcrr.discount_type ==  'amount'){
                    if(currency.id == 1){
                      return (
                        IDRformatter.format(t.data_htcrr.discount_value)+'<button data-toggle="modal" data-target="#discount_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount_htcrr" title="Tool" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                      );
                    }else{
                      return (
                        ForeignFormatter.format(t.data_htcrr.discount_value)+'<button data-toggle="modal" data-target="#discount_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount_htcrr" title="Tool" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                      );
                    }
                      
                  }
                  else if(t.data_htcrr.discount_type == 'percentage'){
                      return (
                          t.data_htcrr.discount_value+'%'+'<button data-toggle="modal" data-target="#discount_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount_htcrr" title="Tool" data-uuid=' +
                          t.uuid +
                          '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                      );
                  }
              }
            }else{
              return ("not filled yet");
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
            if(t.pivot){
              total = t.total_manhours_with_performance_factor * t.pivot.manhour_rate_amount + t.facilities_price_amount + t.mat_tool_price;
              subtotal = subtotal + total;

              if(t.pivot.discount_type == 'amount'){
                TotalDiscount += t.pivot.discount_value;
                }else {
                  if(t.pivot.discount_type == 'percentage') {
                  TotalDiscount += total * (t.pivot.discount_value/100);
                }else{
                  TotalDiscount += 0;
                } 
              }
            }else if(t.data_htcrr){
              total = t.data_htcrr.total_manhours_with_performance_factor * t.data_htcrr.manhour_rate_amount + t.mat_tool_price;
              subtotal = subtotal + total;

              if(t.data_htcrr.discount_type == 'amount'){
                TotalDiscount += t.data_htcrr.discount_value;
                }else {
                  if(t.data_htcrr.discount_type == 'percentage') {
                  TotalDiscount += total * (t.data_htcrr.discount_value/100);
                }else{
                  TotalDiscount += 0;
                } 
              }
            }
              grandtotal = subtotal - TotalDiscount ;
              if(currency.id == 1){
                $("#sub_total").html(IDRformatter.format(subtotal));
                $("#sub_total").attr("value", subtotal);

                $("#total_discount").html(IDRformatter.format(TotalDiscount));
                $("#total_discount").attr("value", TotalDiscount);

                $("#grand_total").html(IDRformatter.format(grandtotal));
                $("#grand_total").attr("value", grandtotal);

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
              calculate_total();
              
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

