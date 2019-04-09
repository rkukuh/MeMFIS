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
            let yeah = this.options[this.selectedIndex].text;
            $("#project_number").html(yeah);
        });

        $(".footer").on("click", ".add-quotation", function() {
            $("#name-error").html("");
            $("#simpan").text("Simpan");

            let term_of_payment = $('#term_of_payment').val();

            let registerForm = $("#CustomerForm");
            let name = $("input[name=name]").val();
            let formData = registerForm.serialize();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url: "/category",
                data: {
                    _token: $("input[name=_token]").val(),
                    name: name
                },
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
