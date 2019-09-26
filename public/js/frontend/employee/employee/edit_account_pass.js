let Employee_pass_account = {
    init: function () {

    let edit_pass_account = $('.footer').on('click', '.edit-account-pass', function () {

       
        let uuid = $('input[name=employee_uuid]').val()
        let account_uuid = $('input[name=account_uuid]').val()
        let password = $('input[name=password]').val()
        let confirm = $('input[name=password_confirmation]').val()

            $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type: 'PUT',
             url: '/employee/account-pass/'+account_uuid,
             data: {
                 password: password,
                 password_confirmation: confirm
             },
             success: function (data) {
                        if (data.errors) {
                            $.each(data.errors, function (key, value) {
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
    
                            location.reload();
    
                        }
                    }
                });
        })
    }
}


jQuery(document).ready(function () {
    Employee_pass_account.init();
});
