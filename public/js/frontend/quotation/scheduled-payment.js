let scheduled_payments = {
    init: function () {
        let dataSet = [
            [ 1, "4%", 7, 100000],
            [ 2, "5%", 8, 75000],
            [ 3, "6%", 9, 185000]
        ];
        $("#scheduled_payments_datatables").append('<tfoot><th></th></tfoot>');
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
                  console.log(sum); //alert(sum);
                  console.log($(this.footer()).html(sum));
                  $( api.column( 2 ).footer() ).html(sum);
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

        // calculate amount
        
        function calculate_amount() {
            let scheduled_payment_datatable = $('#scheduled_payments_datatables').DataTable();
            let total = scheduled_payment_datatable.column(2).data().reduce( function (a,b) {
                return parseFloat(a) + parseFloat(b);
            } );

            console.log(total);
        }

        // calculate progress
        function calculate_progress() {
            let scheduled_payment_datatable = $('#scheduled_payments_datatables').DataTable();
            let total = scheduled_payment_datatable.column(1).data().reduce( function (a,b) {
                return parseFloat(a) + parseFloat(b);
            } );

            console.log(total);
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
