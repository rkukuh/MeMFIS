let leaveType = {
    init: function () {
    let create = $('.footer').on('click', '.add-leave-types', function () {

        let code = $('input[name=code]').val();
        let code_uppercase = code.toUpperCase();

        let name = $('input[name=name]').val();
        let period_start = $('input[name=period_start]').val();
        let period_end = $('input[name=period_end]').val();
        let description = $('#description').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/leave-period',
            data: {
                _token: $('input[name=_token]').val(),
                code: code_uppercase,
                name: name,
                period_start: period_start,
                period_end: period_end,
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
    leaveType.init()
});