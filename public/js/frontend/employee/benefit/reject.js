let Employee_reject_benefit = {
    init: function () {

        let reject_benefit = $('.footer').on('click', '#reject_benefit', function () {

            let uuid = $('input[name=employee_uuid]').val()

                $.ajax({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 type: 'POST',
                 url: '/employee/'+uuid+'/benefit-reject',
                 success: function (data) {
                    if (data.errors) {
                        
                    } else {
        
                             toastr.success('Data has been rejected.', 'Sukses', {
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
    Employee_reject_benefit.init();
});
