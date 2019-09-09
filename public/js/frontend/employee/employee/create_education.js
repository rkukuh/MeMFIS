let Employee_create_education = {
    init: function () {

    let create_education = $(document).on('click', '.create-education', function () {

       
        let uuid = $('input[name=employee_uuid]').val() 
        
        formData = new FormData($('#education_form')[0])
        if($("#education_document")[0].files[0]){
            formData.set('document',$("#education_document")[0].files[0])
        }
        
            $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type: 'POST',
             url: '/employee/'+uuid+'/education',
             data: formData,
             processData: false,
             contentType: false,
             success: function (data) {
                if (data.errors) {
                    $.each(data.errors, function (key, value) {
                        if (data.errors.institute) {
                            $('#institute-error').html(data.errors.institute[0]);
                        }else{
                            $('#institute-error').html('');
                        }

                        if (data.errors.graduation_date) {
                            $('#graduation_date-error').html(data.errors.graduation_date[0]);
                        }else{
                            $('#graduation_date-error').html('');
                        }
                    });
                } else {
                    toastr.success('Data has been saved.', 'Sukses', {
                        timeOut: 5000
                    });

                    document.getElementById("education-reset").click();
                    
                    location.reload();

                }
                    }
                });
        })
    }
}


jQuery(document).ready(function () {
    Employee_create_education.init();
});
