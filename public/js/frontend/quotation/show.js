
let Quotation = {
  init: function () {
   
    let show = $('.m_datatable').on('click', '.show', function () {
      $('#button').hide();
      $('#simpan').text('Perbarui');

      let triggerid = $(this).data('id');

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'get',
        url: '/category/' + triggerid,
        success: function (data) {
          document.getElementById('TitleModalCustomer').innerHTML = 'Detail Customer #ID-' + triggerid;
          document.getElementById('name').value = data.name;
          document.getElementById('name').readOnly = true;
        },
        error: function (jqXhr, json, errorThrown) {
          let errorsHtml = '';
          let errors = jqXhr.responseJSON;

          $.each(errors.errors, function (index, value) {
            $('#kategori-error').html(value);
          });
        }
      });
    });

    let workpackage_datatables_init = true;
    $(document).ready(function () {
      $.ajax({
        url: '/project/' + project_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
          if (workpackage_datatables_init == true) {
            workpackage_datatables_init = false;
            workpackage(data.uuid);
          }
          else {
            let table = $('.workpackage_datatable').mDatatable();
            table.destroy();
            workpackage(data.uuid);
            table = $('.workpackage_datatable').mDatatable();
            table.originalDataSet = [];
            table.reload();
          }
        }
      });
    });

    $('.nav-tabs').on('click', '.workpackage', function () {
      let workpackage = $('.workpackage_datatable').mDatatable();

      workpackage.originalDataSet = [];
      workpackage.reload();
    });


    $('.nav-tabs').on('click', '.summary', function () {

      let summary = $('.summary_datatable').mDatatable();

      summary.originalDataSet = [];
      summary.reload();

    });


  }
};

// jQuery(document).ready(function () {
//   Quotation.init();
// });
let total = 0;
let quotation = $('#quotation_uuid').val();
let exchange_rate = parseInt($('#exchange_rate').attr('value'));
$(document).ready(function () {
  if(currency == 1){
    let GTotal = IDRformatter.format(document.getElementById("grand_total").innerHTML);
    document.getElementById("grand_total").innerHTML = GTotal;
    let subTotal = IDRformatter.format(document.getElementById("sub_total").innerHTML);
    document.getElementById("sub_total").innerHTML = subTotal;
    if($('#charge ').length > 0){
      for (let index = 0; index < $('#charge ').length; index++) {
        let element = $('#charge ')[index];
        let tempAmount = IDRformatter.format(element.innerHTML);
        element.innerHTML = tempAmount;
      }
    }
  }else{
    let GTotal = ForeignFormatter.format(document.getElementById("grand_total").innerHTML);
    let IDRGTotal = $("#grand_total").attr('value');
    IDRGTotal = IDRformatter.format(IDRGTotal * exchange_rate);
    document.getElementById("grand_total").innerHTML = GTotal;
    document.getElementById("grand_total_rupiah").innerHTML = IDRGTotal;
    let subTotal = ForeignFormatter.format(document.getElementById("sub_total").innerHTML);
    document.getElementById("sub_total").innerHTML = subTotal;
    if($('#charge ').length > 0){
      for (let index = 0; index < $('#charge ').length; index++) {
        let element = $('#charge ')[index];
        let tempAmount = ForeignFormatter.format(element.innerHTML);
        element.innerHTML = tempAmount;
      }
    }
  }
});
// untuk datatable dengan accordion pada row tersebut
var DatatableAutoColumnHideDemo = function () {
  //== Private functions

  // basic demo
  var demo = function () {
    // var dataJSONArrayLong = JSON.parse('[{ "OrderID" : "OrderID","ShipCountry" : "ShipCountry","ShipCity" : "ShipCity","Currency" : "Currency","ShipDate" : "ShipDate", "Latitude" : "Latitude","Longitude" : "Longitude","Notes" : "Notes","Department" : "Department","Website" : "Website", "TotalPayment" : "TotalPayment","Status" : 1,"Type" : 1},{ "OrderID" : "OrderID","ShipCountry" : "ShipCountry","ShipCity" : "ShipCity","Currency" : "Currency","ShipDate" : "ShipDate", "Latitude" : "Latitude","Longitude" : "Longitude","Notes" : "Notes","Department" : "Department","Website" : "Website", "TotalPayment" : "TotalPayment","Status" : 1,"Type" : 1}]');

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
          }
        }, {
          field: 'ShipCity',
          title: 'Cost',
          template: function (a) {
            
            if(currency == 1){
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
                    '-'
                  );
            }
            else{
                if(t.pivot.discount_type ==  'amount'){
                  if(currency == 1){
                    return (
                      IDRformatter.format(t.pivot.discount_value)
                    );
                  }else{
                    return (
                      ForeignFormatter.format(t.pivot.discount_value)
                    );
                  }
                    
                }
                else if(t.pivot.discount_type == 'percentage'){
                    return (
                        t.pivot.discount_value+'%'
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
                total = t.total_manhours_with_performance_factor * t.pivot.manhour_rate_amount + t.facilities_price_amount + t.mat_tool_price;
                subtotal = subtotal + total;
            }
            else{
                if(t.pivot.discount_type ==  'amount'){
                    total = t.total_manhours_with_performance_factor * t.pivot.manhour_rate_amount + t.facilities_price_amount + t.mat_tool_price;
                    subtotal = subtotal + total;
                    
                }
                else if(t.pivot.discount_type == 'percentage'){
                    total = t.total_manhours_with_performance_factor * t.pivot.manhour_rate_amount + t.facilities_price_amount + t.mat_tool_price;
                    subtotal = subtotal + total;
                }
            }

            if(currency.id == 1){
              $("#grand_total_rupiah").attr("value", subtotal);
              $("#sub_total").attr("value", subtotal);
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
      ],
    });

  };

  return {
    // public functions
    init: function () {
      demo();
    },
  };
}();

jQuery(document).ready(function () {
  DatatableAutoColumnHideDemo.init();
});
