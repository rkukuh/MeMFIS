let Position = {
    init: function () {
        let create = $('.footer').on('click', '.add-position', function () {

            let code = $('input[name=code]').val();
            let code_uppercase = code.toUpperCase();
            
            let position_name = $('input[name=name]').val();
            let description = $('#description').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/position',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code_uppercase,
                    name: position_name,
                    description: description,
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

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        window.location.href = '/position';

                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Position.init();
});