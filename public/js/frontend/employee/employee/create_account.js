let Employee_create_account = {
    init: function () {

    let create_account = $('.footer').on('click', '.create-account', function () {
        
        active = 0
        
        $("input[name='isActive']:checked").each(function(){
            active = 1
        });

       
        let uuid = $('input[name=employee_uuid]').val() 

        let email = $('input[name=email]').val()
        let password = $('input[name=password]').val()
        let confirm = $('input[name=password_confirmation]').val()
        let role = $('#role option:selected').val()

            $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type: 'POST',
             url: '/employee/'+uuid+'/account',
             data: {
                 email: email,
                 password: password,
                 password_confirmation: confirm,
                 role: role,
                 active: active
             },
             success: function (data) {
                        // if (data.errors) {
                    //         $.each(data.errors, function (key, value) {
                    //             if (data.errors.maximum_overtime) {
                    //                 $('#maximum_overtime-error').html(data.errors.maximum_overtime[0]);
                    //             }else{
                    //                 $('#maximum_overtime-error').html('');
                    //             }
    
                    //             if (data.errors.minimum_overtime) {
                    //                 $('#minimum_overtime-error').html(data.errors.minimum_overtime[0]);
                    //             }else{
                    //                 $('#minimum_overtime-error').html('');
                    //             }
    
                    //             if (data.errors.holiday_overtime) {
                    //                 $('#holiday_overtime-error').html(data.errors.holiday_overtime[0]);
                    //             }else{
                    //                 $('#holiday_overtime-error').html('');
                    //             }
    
                    //             if (data.errors.late_tolerance) {
                    //                 $('#late_tolerance-error').html(data.errors.late_tolerance[0]);
                    //             }else{
                    //                 $('#late_tolerance-error').html('');
                    //             }
    
                    //             if (data.errors.late_punishment) {
                    //                 $('#late_punishment-error').html(data.errors.late_punishment[0]);
                    //             }else{
                    //                 $('#late_punishment-error').html('');
                    //             }
    
                    //             if (data.errors.absence_punishment) {
                    //                 $('#absence_punishment-error').html(data.errors.absence_punishment[0]);
                    //             }else{
                    //                 $('#absence_punishment-error').html('');
                    //             }
                    //         });
                    //     } else {
    
                    //         toastr.success('Data has been saved.', 'Sukses', {
                    //             timeOut: 5000
                    //         });
    
                    //         location.reload();
    
                    //     }
                    }
                });
        })
    }
}


jQuery(document).ready(function () {
    Employee_create_account.init();
});
