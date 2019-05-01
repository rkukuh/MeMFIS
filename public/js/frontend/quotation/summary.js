// untuk formatting angka pada kolom cost
var locale = 'id';
var options = {style: 'currency', currency: 'idr', minimumFractionDigits: 2, maximumFractionDigits: 2};
var formatter = new Intl.NumberFormat(locale, options);

// untuk datatable dengan accordion pada row tersebut
var DatatableAutoColumnHideDemo = function() {
    //== Private functions

    // basic demo
    var demo = function() {
        let quotation = $('#quotation_uuid').val();

    // var dataJSONArrayLong = JSON.parse('[{ "OrderID" : "OrderID","ShipCountry" : "ShipCountry","ShipCity" : "ShipCity","Currency" : "Currency","ShipDate" : "ShipDate", "Latitude" : "Latitude","Longitude" : "Longitude","Notes" : "Notes","Department" : "Department","Website" : "Website", "TotalPayment" : "TotalPayment","Status" : 1,"Type" : 1},{ "OrderID" : "OrderID","ShipCountry" : "ShipCountry","ShipCity" : "ShipCity","Currency" : "Currency","ShipDate" : "ShipDate", "Latitude" : "Latitude","Longitude" : "Longitude","Notes" : "Notes","Department" : "Department","Website" : "Website", "TotalPayment" : "TotalPayment","Status" : 1,"Type" : 1}]');

       $('.summary_datatable').mDatatable({
        // datasource definition
        data: {
        //   type: 'local',
        //   source: dataJSONArrayLong,

         type: 'remote',
         source: {
            read: {
                method: 'GET',
                url: '/datatables/quotation/'+quotation+'/job-request',
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
                return (t.pivot.description+'<br>'+
                        '- Manhours Price : '+t.pivot.manhour_total+' x '+t.pivot.manhour_rate+'<br>'+
                        '- Material Price'
                );
            }
          }, {
            field: 'ShipCity',
            title: 'Cost',
            template: function (a) {
                return ('Cost<br>'+
                        '$ '+formatter.format(a.pivot.manhour_total*a.pivot.manhour_rate)+'<br>'+
                        '$ 138'
                );
            }
          }, {
            field: 'Currency',
            title: 'Disc %',
          },
        ],
      });

    };

    return {
      // public functions
      init: function() {
        demo();
      },
    };
  }();

  jQuery(document).ready(function() {
    DatatableAutoColumnHideDemo.init();
  });
