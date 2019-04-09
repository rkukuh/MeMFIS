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

        $(".footer").on("click", ".add-quotation", function() {
            let data = new FormData();
            data.append("project_id", JSON.stringify($('#project').val()));
            data.append("date", $('input[name=date]').val());
            data.append("valid_until", $('input[name=valid_until]').val());
            data.append("currency_id", JSON.stringify($('#currency').val()));
            data.append("exchange_rate", $('input[name=exchange]').val());
            data.append("term_of_payment", $('input[name=term_of_payment]').val());
            data.append("scheduled_payment_type", JSON.stringify($('#scheduled_payment_type').val()));
            data.append("scheduled_payment_amount", $('input[name=scheduled_payment]').val());
            data.append("title", $('input[name=title]').val());
            data.append("description", $('input[name=description]').val());
            data.append("top_description", $('input[name=top_description]').val());

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url: "/category",
                processData: false,
                contentType: false,
                cache: false,
                data: data,
                success: function(data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $("#name-error").html(data.errors.name[0]);

                            document.getElementById("name").value = name;
                        }
                    } else {
                        $("#modal_customer").modal("hide");

                        toastr.success("Data berhasil disimpan.", "Sukses", {
                            timeOut: 5000
                        });

                        let table = $(".m_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function() {
    Quotation.init();
});
