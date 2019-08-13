let Position = {
    init: function () {
    let update = $('.footer').on('click', '#update-position', function () {
        
        let position_uuid = $('input[name=position_uuid]').val();
        let code = $('input[name=code]').val();
        let name = $('input[name=name]').val();
        let description = $('#descripiton').val();
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'put',
            url: '/position/' + position_uuid,
            data: {
                _token: $('input[name=_token]').val(),
                code: code,
                name: name,
                descripiton: description,
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
                }
            }
        });
    });

    }      
};

jQuery(document).ready(function () {
    Position.init();
});
