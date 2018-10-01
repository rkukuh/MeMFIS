$(document).ready(function () {
    bank = function () {
        var select = document.getElementById("m_select2_1");

        $.ajax({
            url: "/bank/",
            type: "GET",
            dataType: "json",
            success: function (data) {
                var angka = 1;

                $('select[name="bank"]').empty();

                $.each(data, function (key, value) {
                    if (angka == 1) {
                        $('select[name="bank"]').append(
                            "<option> Select a Bank</option>"
                        );

                        angka = 0;
                    }

                    $('select[name="bank"]').append(
                        '<option value="' + key + '">' + value + "</option>"
                    );
                });
            }
        });
    };
    bank();
});

var simpan = $(".modal-footer").on("click", ".add2", function () {
    var code = $("input[name=code]").val();
    var name = $("input[name=bank_name]").val();

    $("#simpan").text("Simpan");
    $("#name-error").html("");
    $("#code-error").html("");

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "post",
        url: "/bank",
        data: {
            _token: $("input[name=_token]").val(),
            name: name,
            code: code
        },
        success: function (data) {
            // console.log(data);

            if (data.errors) {
                if (data.errors.name) {
                    $("#name-error").html(data.errors.name[0]);

                    document.getElementById("name").value = name;
                }

                if (data.errors.code) {
                    $("#code-error").html(data.errors.code[0]);

                    document.getElementById("code").value = code;
                }
            } else {
                bank();

                $("#modal_bank").modal("hide");

                toastr.success("Berhasil Disimpan.", "Sukses!!", {
                    timeOut: 5000
                });
            }
        }
    });
});

$("#modal_bank").on("hidden.bs.modal", function (e) {
    $(this).find("#BankForm")[0].reset();

    $("#name-error").html("");
});
