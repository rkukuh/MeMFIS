let Employee_edit_account = {
    init: function () {

    let edit_account = $('.footer').on('click', '.edit-account', function () {
        
        active = 0
        
        $("input[name='isActive']:checked").each(function(){
            active = 1
        });

       
        let uuid = $('input[name=employee_uuid]').val() 
        let account_uuid = $('input[name=account_uuid]').val()
        let email = $('input[name=email]').val()
        let password = $('input[name=password]').val()
        let confirm = $('input[name=password_confirmation]').val()
        let role = $('#role option:selected').val()

            $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type: 'PUT',
             url: '/employee/'+uuid+'/account/'+account_uuid,
             data: {
                 email: email,
                 password: password,
                 password_confirmation: confirm,
                 role: role,
                 active: active
             },
             success: function (data) {
                        if (data.errors) {
                            $.each(data.errors, function (key, value) {
                                if (data.errors.email) {
                                    $('#email-error').html(data.errors.email[0]);
                                }else{
                                    $('#email-error').html('');
                                }
    
                                if (data.errors.password) {
                                    $('#password-error').html(data.errors.password[0]);
                                }else{
                                    $('#password-error').html('');
                                }
                            });
                        } else {
    
                            toastr.success('Data has been saved.', 'Sukses', {
                                timeOut: 5000
                            });
    
                            // location.reload();
    
                        }
                    }
                });
        })
    }
}


jQuery(document).ready(function () {
    Employee_edit_account.init();
});
