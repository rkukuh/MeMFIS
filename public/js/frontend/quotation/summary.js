// untuk datatable dengan accordion pada row tersebut
var DatatableAutoColumnHideDemo = function() {
    //== Private functions

    // basic demo
    var demo = function() {
        let quotation = $('#quotation_uuid').val();

    // var dataJSONArrayLong = JSON.parse('[{ "OrderID" : "OrderID","ShipCountry" : "ShipCountry","ShipCity" : "ShipCity","Currency" : "Currency","ShipDate" : "ShipDate", "Latitude" : "Latitude","Longitude" : "Longitude","Notes" : "Notes","Department" : "Department","Website" : "Website", "TotalPayment" : "TotalPayment","Status" : 1,"Type" : 1},{ "OrderID" : "OrderID","ShipCountry" : "ShipCountry","ShipCity" : "ShipCity","Currency" : "Currency","ShipDate" : "ShipDate", "Latitude" : "Latitude","Longitude" : "Longitude","Notes" : "Notes","Department" : "Department","Website" : "Website", "TotalPayment" : "TotalPayment","Status" : 1,"Type" : 1}]');

       $('.long_datatable').mDatatable({
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
          autoHide: true,
        },

        // columns definition
        columns: [
          {
            field: 'code',
            title: 'No',
          }, {
            field: 'pivot.description',
            title: 'Job Request Description',
            template: function (t) {
                // if (t.description) {
                //     data = strtrunc(t.description, 50);
                //     return (
                //         '<p>' + data + '</p>'
                //     );
                // }

                return '+'
            }
          }, {
            field: 'ShipCity',
            title: 'Cost',
          }, {
            field: 'Currency',
            title: 'Disc %',
          },
        //    {
        //     field: 'Manhour',
        //     title: 'Manhours Price',
        //   }, {
        //     field: 'Currency2',
        //     title: 'Material Price',
        //   },
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
