let Employee_edit_bank = {
    init: function () {

    let edit_bank = $('.footer').on('click', '.edit-bank', function () {

        let account_number = $('input[name=bank_account_number]').val()
        let bank_name = $('#bank_name option:selected').val()
        let uuid = $('input[name=employee_uuid]').val()

            $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type: 'PUT',
             url: '/employee/'+uuid+'/bank/'+null,
             data: {
                 account_number: account_number, 
                 bank_name: bank_name
             },
             success: function (data) {
                        if (data.errors) {
                            
                        } else {
    
                            toastr.success('Data has been updated.', 'Sukses', {
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
    Employee_edit_bank.init();
});
