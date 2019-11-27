let Employee_create_workshift = {
    init: function () {

    let create_workshift = $('.footer').on('click', '.create-workshift', function () {

        
        let  workshift = $('#job_position_workshift option:selected').val()
        let uuid = $('input[name=employee_uuid]').val()

            $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type: 'POST',
             url: '/employee/'+uuid+'/workshift',
             data: {
                 workshift: workshift
             },
             success: function (data) {
                        if (data.errors) {
                            
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
    Employee_create_workshift.init();
});
