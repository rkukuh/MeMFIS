let Employee_approval_benefit = {
    init: function () {

    let approval_benefit = $('.footer').on('click', '.approve_benefit', function () {

        let uuid = $('input[name=employee_uuid]').val()

            $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type: 'POST',
             url: '/employee/'+uuid+'/benefit-approval',
             success: function (data) {
                if (data.errors) {
                    
                } else {
    
                         toastr.success('Data has been approved.', 'Sukses', {
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
    Employee_approval_benefit.init();
});
