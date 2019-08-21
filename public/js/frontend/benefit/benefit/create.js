let Benefit = {
    init: function () {

    let create = $('.footer').on('click', '.add-benefits', function () {

        let code = $('input[name=benefits_code]').val();
        let code_uppercase = code.toUpperCase();

        let name = $('input[name=benefits_name]').val();
        let description = $('#description').val();
        let baseCal = $('#calculation_reference').val();
        let proRate = $('#pro_rate_base_calculation').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/benefit',
            data: {
                _token: $('input[name=_token]').val(),
                benefits_code: code_uppercase,
                benefits_name: name,
                description: description,
                calculation_reference: baseCal,
                pro_rate_base_calculation: proRate,
            },
            success: function (data) {
                if (data.errors) {
                    $.each(data.errors, function (key, value) {
                        var name = $("input[name='"+key+"']");
                        if(key.indexOf(".") != -1){
                          var arr = key.split(".");
                          name = $("input[name='"+arr[0]+"']:eq("+arr[1]+")");
                        }
                        name.parent().find("div.form-control-feedback.text-danger").html(value[0]);
                      }); 

                } else {
                    toastr.success('Data has been saved.', 'Succes', {
                        timeOut: 5000
                    });
                }
            }
        });
    });

    }      
};

jQuery(document).ready(function () {
    Benefit.init()
});
