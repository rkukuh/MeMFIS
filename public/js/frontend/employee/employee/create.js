let Employee = {
    init: function () {

        $('#document').attr('accept','image/*')
        let create = $('.footer').on('click', '.add-employee', function () {

            let code = $('input[name=code]').val()
            let code_uppercase = code.toUpperCase()
            let gender = $('#gender option:selected').val()
            let job_tittle = $('#job_title option:selected').val()

            if(gender == 'Male'){
                gender = 'm'
            }else if(gender == 'Female'){
                gender = 'f'
            }else{
                gender = '';
            }

            formData = new FormData($('#employee_form')[0])
    
                   formData.set('code', code_uppercase)
                   formData.set('gender', gender)
                   formData.set('job_tittle', job_tittle)
                   if($("#document")[0].files[0].length != 0){
                    formData.set('document',$("#document")[0].files[0])
                   }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                enctype: 'multipart/form-data',
                type: 'post',
                url: '/employee',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.errors) {
                        $.each(data.errors, function (key, value) {
                            var name = $("input[name='"+key+"']");
                            if(key.indexOf(".") != -1){
                              var arr = key.split(".");
                              name = $("input[name='"+arr[0]+"']:eq("+arr[1]+")");
                            }
                            name.parent().find("div.form-control-feedback.text-danger").html(value[0]);
                            
                            if (data.errors.dob) {
                                $('#dob-error').html(data.errors.dob[0]);
                            }else{
                                $('#dob-error').html('');
                            }

                            if (data.errors.gender) {
                                $('#gender-error').html(data.errors.gender[0]);
                            }else{
                                $('#gender-error').html('');
                            }

                            if (data.errors.marital_status) {
                                $('#marital_status-error').html(data.errors.marital_status[0]);
                            }else{
                                $('#marital_status-error').html('');
                            }

                            if (data.errors.religion) {
                                $('#religion-error').html(data.errors.religion[0]);
                            }else{
                                $('#religion-error').html('');
                            }

                            if (data.errors.mobile_phone) {
                                $('#mobile_phone-error').html(data.errors.mobile_phone[0]);
                            }else{
                                $('#mobile_phone-error').html('');
                            }

                            if (data.errors.joined_date) {
                                $('#joined_date-error').html(data.errors.joined_date[0]);
                            }else{
                                $('#mobile_phone-error').html('');
                            }

                            if (data.errors.job_tittle) {
                                $('#job_title-error').html(data.errors.job_tittle[0]);
                            }else{
                                $('#job_title-error').html('');
                            }
                            
                            if (data.errors.mobile_phone) {
                                $('#mobile_phone-error').html(data.errors.mobile_phone[0]);
                            }else{
                                $('#mobile_phone-error').html('');
                            }

                            if (data.errors.job_position) {
                                $('#job_position-error').html(data.errors.job_position[0]);
                            }else{
                                $('#job_position-error').html('');
                            }

                            if (data.errors.employee_status) {
                                $('#employee_status-error').html(data.errors.employee_status[0]);
                            }else{
                                $('#employee_status-error').html('');
                            }

                            if (data.errors.department) {
                                $('#department-error').html(data.errors.department[0]);
                            }else{
                                $('#department-error').html('');
                            }

                            if (data.errors.email_1) {
                                $('#email_1-error').html(data.errors.email_1[0]);
                            }else{
                                $('#email_1-error').html('');
                            }
                        });
                    } else {

                        toastr.success('Data has been saved.', 'Sukses', {
                            timeOut: 5000
                        });

                        window.location.href = '/employee/'+data.uuid+'/edit';

                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Employee.init();
});
