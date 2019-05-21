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
        $( document ).ready(function() {
            $.ajax({
                url: '/project/'+project_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if(workpackage_datatables_init == true){
                        workpackage_datatables_init = false;
                        workpackage(data.uuid);
                    }
                    else{
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

jQuery(document).ready(function () {
    Quotation.init();
});
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
            // document.getElementById("sub_total").value = formatter.format(total);
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
