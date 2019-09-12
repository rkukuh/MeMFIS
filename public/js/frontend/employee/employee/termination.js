let Employee_termination = {
    init: function () {

    let termination = $(document).on('click', '.terminate', function () {

        let uuid = $('input[name=employee_uuid]').val() 
        
        formData = new FormData($('#termination_form')[0])
        if($("#termination_document")[0].files[0]){
            formData.set('document',$("#termination_document")[0].files[0])
        }
        
            $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type: 'POST',
             url: '/employee/'+uuid+'/termination',
             data: formData,
             processData: false,
             contentType: false,
             success: function (data) {
                if (data.errors) {
                    $.each(data.errors, function (key, value) {
                        if (data.errors.institute) {
                            $('#date_temination-error').html(data.errors.date_temination[0]);
                        }else{
                            $('#date_temination-error').html('');
                        }

                        if (data.errors.reason) {
                            $('#reason-error').html(data.errors.reason[0]);
                        }else{
                            $('#reason-error').html('');
                        }

                        if (data.errors.remark) {
                            $('#remark-error').html(data.errors.remark[0]);
                        }else{
                            $('#remark-error').html('');
                        }
                    });
                } else {
                    toastr.success('Data has been saved.', 'Sukses', {
                        timeOut: 5000
                    });

                    $("#termination_document").val(null)

                    // location.reload();
                }
                    }
                });
        })
    }
}


jQuery(document).ready(function () {
    Employee_termination.init();
});
