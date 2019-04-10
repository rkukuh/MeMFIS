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

        $('select[name="project"]').on('change', function() {
            $("#project_number").html(this.options[this.selectedIndex].text);
            let project_id = this.options[this.selectedIndex].value;
            $.ajax({
                url: '/project/'+project_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                }
            });
        });

            let yeah = this.options[this.selectedIndex].text;
            $("#project_number").html(yeah);
        });

        $(".action-buttons").on("click", ".add-quotation", function() {
            $("#name-error").html("");
            $("#simpan").text("Simpan");
            // alert('tes');

            let work_order = $('#work-order').val();
            let date = $('#date').val();
            let valid_until = $('#valid_until').val();
            let currency = $('#currency').val();
            let exchange = $("input[name=exchange]").val();
            let term_of_payment = $("input[name=term_of_payment]").val();
            let scheduled_payment_type = $('#scheduled_payment_type').val();
            let scheduled_payment = $("input[name=scheduled_payment]").val();
            let title = $('#title').val();
            let description = $('#description').val();
            let top_description = $('#top_description').val();
            let customer_id = $('#customer_id').val();

            // let term_of_payment = $('#term_of_payment').val();
            // let ppn_amount = $('input[name=ppn_amount]').val();
            // let account_code = $('#account_code').val();

            // let registerForm = $("#CustomerForm");
            // let name = $("input[name=name]").val();
            // let formData = registerForm.serialize();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url: "/quotation",
                data: {
                    _token: $("input[name=_token]").val(),
                    project_id: work_order,
                    // customer_id: customer_id,
                    requested_at: date,
                    valid_until: valid_until,
                    currency_id: currency,
                    exchange_rate: exchange,
                    // name: term_of_payment,
                    scheduled_payment_type: scheduled_payment_type,
                    // scheduled_payment_amount: scheduled_payment,
                    // title: title,
                    description: description,
                    term_of_condition: term_and_condition,
                },
                success: function(data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $("#name-error").html(data.errors.name[0]);

                        //     document.getElementById("name").value = name;
                        // }
                    } else {
                        // $("#modal_customer").modal("hide");

                        toastr.success('Quotation has been created.', 'Success', {
                            timeOut: 5000
                        });

                        // let table = $(".m_datatable").mDatatable();

                        // table.originalDataSet = [];
                        // table.reload();
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function() {
    Quotation.init();
});
