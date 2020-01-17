let Employee_edit_workshift = {
    init: function () {

    let edit_workshift = $('.footer').on('click', '.edit-workshift', function () {

        
        let  workshift = $('#job_position_workshift option:selected').val()
        let uuid = $('input[name=employee_uuid]').val()

            $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type: 'PUT',
             url: '/employee/'+uuid+'/workshift/'+null,
             data: {
                 workshift: workshift
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
    Employee_edit_workshift.init();
});
