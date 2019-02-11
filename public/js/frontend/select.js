$(document).ready(function() {
    var select = document.getElementById("m_select2_3");

    $.ajax({
        url: '/select',
        type: "GET",
        dataType: "json",
        success:function(data) {

          var angka = 1;
            $('select[name="name"]').empty();
            $.each(data, function(key, value) {
                if (angka == 1){
                  $('select[name="name"]').append('<option> Select a Select</option>');
                  angka = 0;
                }
                  $('select[name="name"]').append('<option value="'+ key +'">'+ value +'</option>');
              });


        }
    });

    });


    $(document).ready(function() {

        $('select[name="name"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    type: "get",
                    url: "/complate/" + stateID ,
                    success: function(data) {
                        // alert(data.name);
                        document.getElementById("address").value = data.address;
                        // document.getElementById("id").value = data.id;
                        // $(".btn-success").addClass("update");
                        // $(".btn-success").removeClass("add");
                    },
                    error: function(jqXhr, json, errorThrown) {
                        // this are default for ajax errors
                        var errors = jqXhr.responseJSON;
                        var errorsHtml = "";
                        $.each(errors["errors"], function(index, value) {
                            $("#kategori-error").html(value);
                        });
                    }
                });
                // $.ajax({
                //     headers: {
                //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                //     },    
                //     type: "get",
                //     url: '/complate/'+stateID,
                //     // dataType: "json",
                //     success:function(data) {
                //         document.getElementById("address").value = data.address;

                //         // alert(data.name[0]);
                //         // $('textarea[name="address"]').value="sas";
                //     //   var angka = 1;
                //         // $('select[name="city"]').empty();
                //         // $.each(data, function(key, value) {
                //         //   if (angka == 1){
                //         //     $('select[name="city"]').append('<option> Select a City</option>');
                //         //     angka = 0;
                //         //   }
                //         //     $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                //         // });
    
    
                //     }
                // });
            }else{
                $('select[name="kota"]').empty();
            }
        });
    });