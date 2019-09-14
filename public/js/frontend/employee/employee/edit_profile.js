let Employee_create_profile = {
    init: function () {

    let create_profile = $(document).on('click', '.create-photo-profile', function () {

        let uuid = $('input[name=employee_uuid]').val() 
        let active = $('input[name=profile]:checked').val()

        formData = new FormData()
        if($('#file-input-1')[0].files[0]){
            formData.append('file_input_1',$('#file-input-1')[0].files[0])
        }

        if($('#file-input-2')[0].files[0]){
            formData.append('file_input_2',$('#file-input-2')[0].files[0])
        }

        if($('#file-input-3')[0].files[0]){
            formData.append('file_input_3',$('#file-input-3')[0].files[0])
        }

        if($('#file-input-3')[0].files[0]){
            formData.append('file-input-3',$('#file-input-3')[0].files[0])
        }
        
        if($('#file-input-4')[0].files[0]){
            formData.append('file_input_4',$('#file-input-4')[0].files[0])
        }

        formData.append('active',active)

            $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type: 'POST',
             url: '/employee/'+uuid+'/photo-profile',
             data: formData,
             processData: false,
             contentType: false,
             success: function (data) {
                if (data.errors) {
                    $.each(data.errors, function (key, value) {
                        // if (data.errors.institute) {
                        //     $('#institute-error').html(data.errors.institute[0]);
                        // }else{
                        //     $('#institute-error').html('');
                        // }

                        // if (data.errors.graduation_date) {
                        //     $('#graduation_date-error').html(data.errors.graduation_date[0]);
                        // }else{
                        //     $('#graduation_date-error').html('');
                        // }

                        // if (data.errors.field_of_study) {
                        //     $('#field_of_study-error').html(data.errors.field_of_study[0]);
                        // }else{
                        //     $('#field_of_study-error').html('');
                        // }
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
    Employee_create_profile.init();
});
