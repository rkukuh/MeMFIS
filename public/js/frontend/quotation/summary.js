// untuk formatting angka pada kolom cost
var locale = 'id';
var options = { style: 'currency', currency: 'idr', minimumFractionDigits: 2, maximumFractionDigits: 2 };
var formatter = new Intl.NumberFormat(locale, options);
let total = 0;
let quotation = $('#quotation_uuid').val();

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
            return (t.pivot.description + '<br>' +
              '- Manhours Price : ' + t.pivot.manhour_total + ' x ' + t.pivot.manhour_rate + '<br>' +
              '- Material Price'
            );
          }
        }, {
          field: 'ShipCity',
          title: 'Cost',
          template: function (a) {
            total = total + a.pivot.manhour_total * a.pivot.manhour_rate + 138;
            document.getElementById("sub_total").innerHTML = formatter.format(total);
            return ('Cost<br>' +
              formatter.format(a.pivot.manhour_total * a.pivot.manhour_rate) + '<br>' +
              ' 138'
            );
          }
        },
        {
          field: 'Currency',
          title: 'Disc %',
          sortable: 'asc',
          filterable: !1,
          template: function (t, e, i) {
            return (
              '<button data-toggle="modal" data-target="#discount" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
              t.uuid +
              '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
            );
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
