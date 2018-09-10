// function bank() {
//     alert('reload');
//     // $('#myscript').remove();
//     // $.getScript("src/to/file-with-your-custom-scripts.js?s=" + salt, function() {
//     //   $('script:last').attr('id', 'myscript');
//     //   salt = Math.floor(Math.random() * 1000);
//     //   time = setTimeout(function() {
//     //     load_script();
//     //   }, 30 * 1000);
//     // });
//   }

$(document).ready(function() {
    var select = document.getElementById("m_select2_1");

    $.ajax({
        url: "/bank/",
        type: "GET",
        dataType: "json",
        success: function(data) {
            var angka = 1;
            $('select[name="bank"]').empty();
            $.each(data, function(key, value) {
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
});

var simpan = $(".modal-footer").on("click", ".add2", function() {
    var abbr = $("input[name=abbr]").val();
    var name = $("input[name=bank_name]").val();
    // alert(abbr);
    // alert(name);
    $("#simpan").text("Simpan");
    // var registerForm = $("#CustomerForm");
    // var formData = registerForm.serialize();
    $("#name-error").html("");
    $("#abbr-error").html("");
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "post",
        url: "/bank",
        data: {
            _token: $("input[name=_token]").val(),
            name: name,
            abbr: abbr
        },
        success: function(data) {
            alert('sukses')
            console.log(data);
            if (data.errors) {
                if (data.errors.name) {
                    $("#name-error").html(data.errors.name[0]);
                    document.getElementById("name").value = name;
                }
                if(data.errors.abbr){
                    $( '#abbr-error' ).html( data.errors.abbr[0] );
                    document.getElementById("abbr").value = abbr;
                }
            } else {
                $("#modal_bank").modal("hide");
                toastr.success("Berhasil Disimpan.", "Sukses!!", {
                    timeOut: 5000
                });
                var table = $(".m_datatable").mDatatable();
                // table.originalDataSet = [];
                // table.reload();
            }
        }
    });
});

$('#modal_bank').on('hidden.bs.modal', function(e) {
    $(this).find('#BankForm')[0].reset();
    $("#name-error").html("");

  });