let Quotation = {
    init: function() {

        $(document).ready(function () {
            $('select[name="customer"]').on('change', function () {
                let customer = $(this).val();

                if (customer) {
                    let customerId = $('#customer').val();

                    $.ajax({
                        url: '/details/'+customerId+'/customer',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {

                            document.getElementById('name').innerHTML = data.name;
                            document.getElementById('telp').innerHTML = 'telp/fax';
                            document.getElementById('attn').innerHTML = 'attn';
                            document.getElementById('address').innerHTML = 'address';
                        }
                    });
                } else {
                }
            });
        });

        let workpackage_datatables_init = true;

        $('select[name="work-order"]').on('change', function() {
            let project_id = this.options[this.selectedIndex].value;
            $.ajax({
                url: '/project/'+project_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#project_number').html(data.title);
                    $('#name').html(data.customer.name);
                    $('#customer_id').val(data.customer_id);


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

        $('.action-buttons').on('click', '.add-quotation', function() {
            let data = new FormData();
            data.append("project_id", $('#work-order').val());
            data.append("customer_id", $('#customer_id').val());
            data.append("requested_at", $('#date').val());
            data.append("valid_until", $('#valid_until').val());
            data.append("currency_id", $('#currency').val());
            data.append("term_and_condition", $('#term_and_condition').val());
            data.append("exchange_rate", $('#exchange').val());
            data.append("scheduled_payment_type", $('#scheduled_payment_type').val());
            data.append("scheduled_payment_amount", $('#scheduled_payment').val());
            data.append("total",0.000000);
            data.append("title", $('#title').val());
            data.append("description", $('#description').val());
            data.append("top_description", $('#term_and_condition').val());


            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: 'post',
                url: '/quotation',
                processData: false,
                contentType: false,
                data:data,
                success: function(data) {
                    if (data.errors) {
                        if (data.errors.currency_id) {
                            $("#currency-error").html(data.errors.currency_id[0]);
                        }
                        if (data.errors.customer_id) {
                            $("#customer_id-error").html(data.errors.customer_id[0]);
                        }
                        if (data.errors.description) {
                            $("#description-error").html(data.errors.description[0]);
                        }
                        if (data.errors.exchange_rate) {
                            $("#exchange-error").html(data.errors.exchange_rate[0]);
                        }
                        if (data.errors.project_id) {
                            $("#work-order-error").html(data.errors.project_id[0]);
                        }
                        if (data.errors.requested_at) {
                            $("#requested_at-error").html(data.errors.requested_at[0]);
                        }
                        if (data.errors.scheduled_payment_amount) {
                            $("#scheduled_payment_amount-error").html(data.errors.scheduled_payment_amount[0]);
                        }
                        if (data.errors.scheduled_payment_type) {
                            $("#scheduled_payment_type-error").html(data.errors.scheduled_payment_type[0]);
                        }
                        if (data.errors.valid_until) {
                            $("#valid_until-error").html(data.errors.valid_until[0]);
                        }

                        document.getElementById("name").value = name;
                    } else {

                        toastr.success('Quotation has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/quotation/' + response.uuid + '/edit';


                    }
                }
            });
        });
    }
};

jQuery(document).ready(function() {
    Quotation.init();
});
