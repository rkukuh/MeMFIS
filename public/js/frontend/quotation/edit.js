let Quotation = {
    init: function() {
        let edit = $(".m_datatable").on("click", ".edit", function() {
            $("#button").show();
            $("#simpan").text("Perbarui");

            let triggerid = $(this).data("id");

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "get",
                url: "/category/" + triggerid + "/edit",
                success: function(data) {
                    document.getElementById("id").value = data.id;
                    document.getElementById("name").value = data.name;

                    $(".btn-success").addClass("update");
                    $(".btn-success").removeClass("add");
                },
                error: function(jqXhr, json, errorThrown) {
                    let errorsHtml = "";
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function(index, value) {
                        $("#kategori-error").html(value);
                    });
                }
            });
        });

        let update = $(".modal-footer").on("click", ".update", function() {
            $("#button").show();
            $("#name-error").html("");
            $("#simpan").text("Perbarui");

            let name = $("input[name=name]").val();
            let triggerid = $("input[name=id]").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/category/" + triggerid,
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
