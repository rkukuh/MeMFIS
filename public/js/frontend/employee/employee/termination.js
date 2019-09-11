let Employee_termination = {
    init: function () {

    let termination = $(document).on('click', '.terminate', function () {

        let uuid = $('input[name=employee_uuid]').val() 
        
        // formData = new FormData($('#termination_form')[0])
        // if($("#education_document")[0].files[0]){
        //     formData.set('document',$("#education_document")[0].files[0])
        // }
        
        alert(uuid);
            // $.ajax({
            //  headers: {
            //      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //  },
            //  type: 'POST',
            //  url: '/employee/'+uuid+'/termination',
            //  data: formData,
            //  processData: false,
            //  contentType: false,
            //  success: function (data) {
            //     if (data.errors) {
            //         $.each(data.errors, function (key, value) {
            //             if (data.errors.institute) {
            //                 $('#institute-error').html(data.errors.institute[0]);
            //             }else{
            //                 $('#institute-error').html('');
            //             }

            //             if (data.errors.graduation_date) {
            //                 $('#graduation_date-error').html(data.errors.graduation_date[0]);
            //             }else{
            //                 $('#graduation_date-error').html('');
            //             }

            //             if (data.errors.field_of_study) {
            //                 $('#field_of_study-error').html(data.errors.field_of_study[0]);
            //             }else{
            //                 $('#field_of_study-error').html('');
            //             }
            //         });
            //     } else {
            //         toastr.success('Data has been saved.', 'Sukses', {
            //             timeOut: 5000
            //         });

            //         document.getElementById("education-reset").click();
                    
            //         location.reload();

            //     }
            //         }
            //     });
        })
    }
}


jQuery(document).ready(function () {
    Employee_termination.init();
});
