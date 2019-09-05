let scheduled_payments = {
    init: function () {
        let dataSet = [
            [ 1, 4, 7, "5421" ],
            [ 2, 5, 8, "8422"],
            [ 3, 6, 9, "1562" ]
        ];
         
        $('#scheduled_payments_datatables').DataTable( {
            data: dataSet,
            columns: [
                { title: "Description" },
                { title: "Work Progress(%)" },
                { title: "Amount" },
                { title: "Amount(%)" },
            ],
            searching: false, paging: false, info: false
        } );

        $('.add_scheduled_row').on('click', function () {
            let total_rupiah = $('#grand_total_rupiah').attr('value');

            let work_progress_scheduled = $("#work_progress_scheduled").val();
            let amount_scheduled = $("#amount_scheduled").val();
            let description_scheduled = $("#description_scheduled").val();
            let scheduled_payment_datatable = $('#scheduled_payments_datatables').DataTable();
 
            scheduled_payment_datatable
                .row.add( [ description_scheduled, work_progress_scheduled+"%", amount_scheduled, ((amount_scheduled/total_rupiah) * 100)+"%" ] )
                .draw();
        });

        // calculate amount
        $('.calculate_scheduled').on('click', function () {

            let scheduled_payment_datatable = $('#scheduled_payments_datatables').DataTable();
            let total = scheduled_payment_datatable.column(2).data().reduce( function (a,b) {
                return parseFloat(a) + parseFloat(b);
            } );

            console.log(total);
        });

        // calculate progress
        $('.calculate_scheduled').on('click', function () {

            let scheduled_payment_datatable = $('#scheduled_payments_datatables').DataTable();
            let total = scheduled_payment_datatable.column(1).data().reduce( function (a,b) {
                return parseFloat(a) + parseFloat(b);
            } );

            console.log(total);
        });

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
