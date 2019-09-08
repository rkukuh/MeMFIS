let scheduled_payments = {
    init: function () {
        
        let scheduled_payment_datatable = $('#scheduled_payments_datatables').DataTable( {
            data: dataSet,
            columns: [
                { 
                  title: "Work Progress(%)",
                  data: "work_progress",
                  "render": function ( data, type, row, meta ) {
                    return data+"%";
                  }
                },
                { 
                  title: "Amount", 
                  data: "amount",
                  "render": function ( data, type, row, meta ) {
                    return ForeignFormatter.format(data);
                  }
                },
                { title: "Amount(%)",
                data: "amount_percentage",
                  "render": function ( data, type, row, meta ) {
                    return data+"%";
                  }
                },
                { 
                  title: "Description",
                  data: "description"
                }
            ],
            searching: false, 
            paging: false, 
            info: false,
            footer: true,
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api();
                api.columns('0', {
                  page: 'current'
                }).every(function() {
                  var sum = this
                    .data()
                    .reduce(function(a, b) {
                      var x = parseFloat(a) || 0;
                      var y = parseFloat(b) || 0;
                      return x + y;
                    }, 0);
                  $( api.column( 0 ).footer() ).html("Total Work Progress : "+sum+"%");
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
                  $( api.column( 1 ).footer() ).html("Total Amount : "+ForeignFormatter.format(sum));
                });

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
                    $( api.column( 2 ).footer() ).html("Total Amount : "+sum+"%");
                  });
                  
              }
           
        } );

        $('.add_scheduled_row').on('click', function () {
            let total_rupiah = $('#grand_total_rupiah').attr('value');
            let work_progress_scheduled = $("#work_progress_scheduled").val();
            let amount_scheduled = $("#amount_scheduled").val();
            let description_scheduled = $("#description_scheduled").val();
            let amount_scheduled_percentage = ( amount_scheduled / total_rupiah) * 100;
            let newRow = [];
            newRow["description"] = description_scheduled;
            newRow["work_progress"] = work_progress_scheduled;
            newRow["amount"] = amount_scheduled;
            newRow["amount_percentage"] = amount_scheduled_percentage;
            scheduled_payment_datatable
                .row.add( newRow )
                .draw();

            $("#work_progress_scheduled").val(0);
            $("#amount_scheduled").val(0);
            $("#description_scheduled").val("");

            calculate_amount();
            calculate_progress();
        });

        $('#scheduled_payments_datatables tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
              scheduled_payment_datatable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );

        $('.delete_row').on('click', function () {
            scheduled_payment_datatable.row('.selected').remove().draw( false );
        });

        // calculate amount
        
        function calculate_amount() {
            let scheduled_payment_datatable = $('#scheduled_payments_datatables').DataTable();
            let total = scheduled_payment_datatable.column(2).data().reduce( function (a,b) {
                return parseFloat(a) + parseFloat(b);
            } );

            return total;
        }

        // calculate progress
        function calculate_progress() {
            let scheduled_payment_datatable = $('#scheduled_payments_datatables').DataTable();
            let total = scheduled_payment_datatable.column(1).data().reduce( function (a,b) {
                return parseFloat(a) + parseFloat(b);
            } );

            return total;
        }
    }
};

jQuery(document).ready(function () {
    scheduled_payments.init();
});
