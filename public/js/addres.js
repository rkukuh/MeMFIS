
$(document).ready(function() {
    var select = document.getElementById("m_select2_1");

    $.ajax({
        url: '/addres/country/',
        type: "GET",
        dataType: "json",
        success:function(data) {

          var angka = 1;
            $('select[name="city"]').empty();
            $.each(data, function(key, value) {

            select.options[select.options.length] = new Option(value, key);
            });


        }
    });

    });
$(document).ready(function() {

    $('select[name="country"]').on('change', function() {
        var stateID = $(this).val();
        if(stateID) {
            $.ajax({
                url: '/addres/city/'+stateID,
                type: "GET",
                dataType: "json",
                success:function(data) {

                  var angka = 1;
                    $('select[name="city"]').empty();
                    $.each(data, function(key, value) {
                      if (angka == 1){
                        $('select[name="city"]').append('<option> Select a City</option>');
                        angka = 0;
                      }
                        $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });


                }
            });
        }else{
            $('select[name="kota"]').empty();
        }
    });
});

