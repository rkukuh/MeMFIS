let locale = 'id';
let IDRformatter = new Intl.NumberFormat(locale, { style: 'currency', currency: 'idr', minimumFractionDigits: 2, maximumFractionDigits: 2 });
let USDformatter = new Intl.NumberFormat(locale, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
let numberFormat = new Intl.NumberFormat(locale, { maximumFractionDigits: 3 });
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
            if(currency == 1){
              return (t.pivot.description + '<br>' +
                '- Manhours Price : ' + numberFormat.format(t.pivot.manhour_total) + ' x ' + IDRformatter.format(t.pivot.manhour_rate) + '<br>' +
                '- Material Price'
              );
            }else{
              return (t.pivot.description + '<br>' +
                '- Manhours Price : ' + numberFormat.format(t.pivot.manhour_total) + ' x $ ' + USDformatter.format(t.pivot.manhour_rate) + '<br>' +
                '- Material Price'
              );
            }
          }
        }, {
          field: 'ShipCity',
          title: 'Cost',
          template: function (a) {
            
            if(currency == 1){
              return ('Cost<br>' +
                IDRformatter.format(a.pivot.manhour_total * a.pivot.manhour_rate) + '<br>' +
                ' 138'
              );
            }else{
              return ('Cost<br>' +
                '$ '+USDformatter.format(a.pivot.manhour_total * a.pivot.manhour_rate) + '<br>' +
                ' 138'
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
                  if(currency == 1){
                    return (
                      IDRformatter.format(t.pivot.discount_value)+'<button data-toggle="modal" data-target="#discount" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount" title="Tool" data-uuid=' +
                      t.uuid +
                      '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    );
                  }else{
                    return (
                      '$ '+USDformatter.format(t.pivot.discount_value)+'<button data-toggle="modal" data-target="#discount" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount" title="Tool" data-uuid=' +
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
                total = t.pivot.manhour_total * t.pivot.manhour_rate + 138;
                subtotal = subtotal + t.pivot.manhour_total * t.pivot.manhour_rate ;
                document.getElementById("sub_total").innerHTML = IDRformatter.format(subtotal);
                document.getElementById("grand_total").innerHTML = IDRformatter.format(subtotal);
                $("#grand_total").attr("value", subtotal);
                $("#sub_total").attr("value", subtotal);
                if(currency == 1){ 
                    return (
                      IDRformatter.format(total)
                    );
                  }else{
                    return (
                      '$ '+IDRformatter.format(total * exchange_rate)
                    );
                  }
            }
            else{
                if(t.pivot.discount_type ==  'amount'){
                    total = t.pivot.manhour_total * t.pivot.manhour_rate + 138 - t.pivot.discount_value;
                    subtotal = subtotal + t.pivot.manhour_total * t.pivot.manhour_rate + 138 - t.pivot.discount_value;
                    document.getElementById("sub_total").innerHTML = IDRformatter.format(subtotal);
                    document.getElementById("grand_total").innerHTML = IDRformatter.format(subtotal);
                    $("#grand_total").attr("value", subtotal);
                    $("#sub_total").attr("value", subtotal);
                    if(currency == 1){ 
                      return (
                        IDRformatter.format(total)
                      );
                    }else{
                      return (
                      '$ '+IDRformatter.format(total * exchange_rate)
                      );
                    }
                }
                else if(t.pivot.discount_type == 'percentage'){
                    total = t.pivot.manhour_total * t.pivot.manhour_rate + 138 - (((t.pivot.manhour_total * t.pivot.manhour_rate + 138)*t.pivot.discount_value)/100);
                    subtotal = subtotal + t.pivot.manhour_total * t.pivot.manhour_rate + 138 - (((t.pivot.manhour_total * t.pivot.manhour_rate + 138)*t.pivot.discount_value)/100);
                    document.getElementById("sub_total").innerHTML = IDRformatter.format(subtotal);
                    document.getElementById("grand_total").innerHTML = IDRformatter.format(subtotal);
                    $("#grand_total").attr("value", subtotal);
                    $("#sub_total").attr("value", subtotal);
                    if(currency == 1){ 
                      return (
                        IDRformatter.format(total)
                      );
                    }else{
                      return (
                       '$ '+IDRformatter.format(total * exchange_rate)
                      );
                    }
                }
            }
            
          }
        },
      ],
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
