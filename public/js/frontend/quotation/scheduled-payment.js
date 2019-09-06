let scheduled_payments = {
    init: function () {
        let dataSet = [
            [ "DP", "10%", 100000000, "31.99%"],
            [ "MID", "50%", 200000000, "63.96%"],
        ];
        // let dataSet = [];
        $("#scheduled_payments_datatables").append('<tfoot><th></th><th></th><th></th><th></th></tfoot>');
        $('#scheduled_payments_datatables').DataTable( {
            data: dataSet,
            columns: [
                { title: "Description" },
                { title: "Work Progress(%)" },
                { title: "Amount" },
                { title: "Amount(%)" },
            ],
            searching: false, 
            paging: false, 
            info: false,
            footer: true,
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api();
                api.columns('2', {
                  page: 'current'
                }).every(function() {
                  var sum = this
                    .data()
                    .reduce(function(a, b) {
                      var x = parseFloat(a) || 0;
                      var y = parseFloat(b) || 0;
                      return x + y;
                    }, 0);
                  $( api.column( 2 ).footer() ).html("Total Amount : "+sum);
                });
                api.columns('1', {
                    page: 'current'
                  }).every(function() {
                    var sum = this
                      .data()
                      .reduce(function(a, b) {
                        var x = parseFloat(a) || 0;
                        var y = parseFloat(b) || 0;
                        return x + y;
                      }, 0);
                    $( api.column( 1 ).footer() ).html("Total Progress : "+sum+"%");
                  });
                  api.columns('3', {
                    page: 'current'
                  }).every(function() {
                    var sum = this
                      .data()
                      .reduce(function(a, b) {
                        var x = parseFloat(a) || 0;
                        var y = parseFloat(b) || 0;
                        return x + y;
                      }, 0);
                    $( api.column( 3 ).footer() ).html("Total Amount : "+sum+"%");
                  });
                  
              }
           
        } );

        $('.add_scheduled_row').on('click', function () {
            let total_rupiah = $('#grand_total_rupiah').attr('value');
            let work_progress_scheduled = $("#work_progress_scheduled").val();
            let amount_scheduled = $("#amount_scheduled").val();
            let description_scheduled = $("#description_scheduled").val();
            let scheduled_payment_datatable = $('#scheduled_payments_datatables').DataTable();
            let amount_scheduled_percentage = ( amount_scheduled / total_rupiah) * 100;
            scheduled_payment_datatable
                .row.add( [ description_scheduled, work_progress_scheduled+"%", amount_scheduled, amount_scheduled_percentage+"%" ] )
                .draw();

            calculate_amount();
            calculate_progress();
        });

        $('.get_all_data').on('click', function () {
            let scheduled_payment_datatable = $('#scheduled_payments_datatables').DataTable();
            let allData = scheduled_payment_datatable.rows().data();

            for(let ind = 0 ; ind < allData.length ; ind++){
                console.log(allData[ind]);
            }
        });

        // calculate amount
        
        function calculate_amount() {
            let scheduled_payment_datatable = $('#scheduled_payments_datatables').DataTable();
            let total = scheduled_payment_datatable.column(2).data().reduce( function (a,b) {
                return parseFloat(a) + parseFloat(b);
            } );
        }

        // calculate progress
        function calculate_progress() {
            let scheduled_payment_datatable = $('#scheduled_payments_datatables').DataTable();
            let total = scheduled_payment_datatable.column(1).data().reduce( function (a,b) {
                return parseFloat(a) + parseFloat(b);
            } );
        }


        // WIP Delete row
        $('#scheduled_payments_datatables tbody').on( 'click', 'tr', function () {
            let table = $('#scheduled_payments_datatables').DataTable();
            alert( 'Row index: '+ table.row( this ).index() );
        } );

    }
};

jQuery(document).ready(function () {
    scheduled_payments.init();
});
