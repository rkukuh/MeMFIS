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
// untuk formatting angka pada kolom cost
let locale = 'id';
let IDRformatter = new Intl.NumberFormat(locale, { style: 'currency', currency: 'idr', minimumFractionDigits: 2, maximumFractionDigits: 2 });
let USDformatter = new Intl.NumberFormat(locale, { style: 'currency', currency: 'usd', minimumFractionDigits: 2, maximumFractionDigits: 2 });
let numberFormat = new Intl.NumberFormat('id', { maximumSignificantDigits: 3 });
let total = 0;
let quotation = $('#quotation_uuid').val();

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
    let GTotal = USDformatter.format(document.getElementById("grand_total").innerHTML);
    document.getElementById("grand_total").innerHTML = GTotal;
    let subTotal = USDformatter.format(document.getElementById("sub_total").innerHTML);
    document.getElementById("sub_total").innerHTML = subTotal;
    if($('#charge ').length > 0){
      for (let index = 0; index < $('#charge ').length; index++) {
        let element = $('#charge ')[index];
        let tempAmount = USDformatter.format(element.innerHTML);
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
    console.log(quotation);
    // var dataJSONArrayLong = JSON.parse('[{ "OrderID" : "OrderID","ShipCountry" : "ShipCountry","ShipCity" : "ShipCity","Currency" : "Currency","ShipDate" : "ShipDate", "Latitude" : "Latitude","Longitude" : "Longitude","Notes" : "Notes","Department" : "Department","Website" : "Website", "TotalPayment" : "TotalPayment","Status" : 1,"Type" : 1},{ "OrderID" : "OrderID","ShipCountry" : "ShipCountry","ShipCity" : "ShipCity","Currency" : "Currency","ShipDate" : "ShipDate", "Latitude" : "Latitude","Longitude" : "Longitude","Notes" : "Notes","Department" : "Department","Website" : "Website", "TotalPayment" : "TotalPayment","Status" : 1,"Type" : 1}]');

    $('.summary_datatable').mDatatable({
      // datasource definition
      data: {
        type: 'remote',
        source: {
          read: {
            method: 'GET',
            url: '/datatables/quotation/' + quotation + '/job-request',
            map: function (raw) {
              let dataSet = raw;

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

        //   saveState: false,
        //   serverPaging: true,
        //   serverFiltering: true,
        //   serverSorting: true,
      },
      responsive: true,
      // column sorting
      sortable: true,

      pagination: true,

      toolbar: {
        // toolbar items
        items: {
          // pagination
          pagination: {
            // page size select
            pageSizeSelect: [10, 20, 30, 50, 100],
          },
        },
      },

      search: {
        input: $('#generalSearch'),
      },

      rows: {
        // auto hide columns, if rows overflow
        //   autoHide: true,
      },

      // columns definition
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
            if (currency == 1) {
              return (t.pivot.description + '<br>' +
                '- Manhours Price : ' + numberFormat.format(t.pivot.manhour_total) + ' x ' + IDRformatter.format(t.pivot.manhour_rate) + '<br>' +
                '- Material Price'
              );
            } else {
              return (t.pivot.description + '<br>' +
                '- Manhours Price : ' + numberFormat.format(t.pivot.manhour_total) + ' x ' + USDformatter.format(t.pivot.manhour_rate) + '<br>' +
                '- Material Price'
              );
            }
          }
        }, {
          field: 'ShipCity',
          title: 'Cost',
          template: function (a) {
            total = total + a.pivot.manhour_total * a.pivot.manhour_rate + 138;
            document.getElementById("sub_total").innerHTML = IDRformatter.format(total);
            $("#sub_total").attr("value", total);
            if (currency == 1) {
              return ('Cost<br>' +
                IDRformatter.format(a.pivot.manhour_total * a.pivot.manhour_rate) + '<br>' +
                ' 138'
              );
            } else {
              return ('Cost<br>' +
                USDformatter.format(a.pivot.manhour_total * a.pivot.manhour_rate) + '<br>' +
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
            if (t.pivot.discount_value == null && t.pivot.discount_type == null) {
              return (
                '<button data-toggle="modal" data-target="#discount" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount" title="Tool" data-uuid=' +
                t.uuid +
                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
              );
            }
            else {
              if (t.pivot.discount_type == 'amount') {
                if (currency == 1) {
                  return (
                    IDRformatter.format(t.pivot.discount_value) + '<button data-toggle="modal" data-target="#discount" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount" title="Tool" data-uuid=' +
                    t.uuid +
                    '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                  );
                } else {
                  return (
                    USDformatter.format(t.pivot.discount_value) + '<button data-toggle="modal" data-target="#discount" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount" title="Tool" data-uuid=' +
                    t.uuid +
                    '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                  );
                }

              }
              else if (t.pivot.discount_type == 'percentage') {
                return (
                  t.pivot.discount_value + '%' + '<button data-toggle="modal" data-target="#discount" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill discount" title="Tool" data-uuid=' +
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
            if (t.pivot.discount_value == null && t.pivot.discount_type == null) {
              total = total + t.pivot.manhour_total * t.pivot.manhour_rate + 138;
              if (currency == 1) {
                return (
                  IDRformatter.format(total)
                );
              } else {
                return (
                  USDformatter.format(total)
                );
              }
            }
            else {
              if (t.pivot.discount_type == 'amount') {
                total = total + t.pivot.manhour_total * t.pivot.manhour_rate + 138 - t.pivot.discount_value;
                if (currency == 1) {
                  return (
                    IDRformatter.format(total)
                  );
                } else {
                  return (
                    USDformatter.format(total)
                  );
                }
              }
              else if (t.pivot.discount_type == 'percentage') {
                total = total + t.pivot.manhour_total * t.pivot.manhour_rate + 138 - (((t.pivot.manhour_total * t.pivot.manhour_rate + 138) * t.pivot.discount_value) / 100);
                if (currency == 1) {
                  return (
                    IDRformatter.format(total)
                  );
                } else {
                  return (
                    USDformatter.format(total)
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
    // public functions
    init: function () {
      demo();
    },
  };
}();

jQuery(document).ready(function () {
  DatatableAutoColumnHideDemo.init();
});
