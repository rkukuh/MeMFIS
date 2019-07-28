let Employee = {
    init: function () {
    let update = $('.footer').on('click', '.edit-employee', function () {

        let employee_uuid = $('input[name=employee_uuid]').val();
        let code = $('input[name=code]').val();
        let first_name = $('input[name=first_name]').val();
        let middle_name = $('input[name=middle_name]').val();
        let last_name = $('input[name=last_name]').val();
        let dob = $('input[name=dob]').val(); 
        let gender;

        if($('input[name=gender]').val() == 'male'){
            gender = 'm'
        }else if($('input[name=gender]').val() == 'female'){
            gender = 'f'
        }
       
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'put',
            url: '/employee/' + employee_uuid,
            data: {
                _token: $('input[name=_token]').val(),
                code: code,
                first_name: first_name,
                middle_name: middle_name,
                last_name: last_name,
                dob: dob,
                gender: gender
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
    Employee.init();
});
