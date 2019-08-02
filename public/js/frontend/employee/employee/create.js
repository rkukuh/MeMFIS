let Employee = {
    init: function () {
        let create = $('.footer').on('click', '.add-employee', function () {

            let code = $('input[name=code]').val();
            let code_uppercase = code.toUpperCase();
            
            let first_name = $('input[name=first_name]').val();
            let middle_name = $('input[name=middle_name]').val();
            let last_name = $('input[name=last_name]').val();
            let dob = $('input[name=dob]').val();
            let gender
            let hired_at = $('input[name=hired_at]').val();

            if($('input[name=gender]').val() == 'male'){

            }else if($('input[name=gender]').val() == 'female'){

            }else{
                gender = null;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/employee',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code_uppercase,
                    first_name: first_name,
                    middle_name: middle_name,
                    last_name: last_name,
                    dob: dob,
                    gender: gender,
                    hired_at: hired_at,
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

                        window.location.href = '/employee';

                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Employee.init();
});
