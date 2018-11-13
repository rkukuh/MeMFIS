let Quotation = {
    init: function() {

        $(document).ready(function () {
            $('select[name="customer"]').on('change', function () {
                let stateID = $(this).val();
        
                if (stateID) {
                    document.getElementById('name').innerHTML = 'name';
                    document.getElementById('telp').innerHTML = 'telp/fax';
                    document.getElementById('attn').innerHTML = 'attn';
                    document.getElementById('ref').innerHTML = 'ref';
                    document.getElementById('address').innerHTML = 'address';
                    // $.ajax({
                    //     url: '/addres/city/' + stateID,
                    //     type: 'GET',
                    //     dataType: 'json',
                    //     success: function (data) {
                    //         let angka = 1;
        
                    //         $('select[name="city"]').empty();
        
                    //         $.each(data, function (key, value) {
                    //             if (angka == 1) {
                    //                 $('select[name="city"]').append(
                    //                     '<option> Select a City</option>'
                    //                 );
        
                    //                 angka = 0;
                    //             }
        
                    //             $('select[name="city"]').append(
                    //                 '<option value="' + key + '">' + value + '</option>'
                    //             );
                    //         });
                    //     }
                    // });
                } else {
                }
            });
        });

        $(".modal-footer").on("click", ".add", function() {
            $("#name-error").html("");
            $("#simpan").text("Simpan");

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
