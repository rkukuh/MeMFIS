let Employee = {
    init: function () {

        $('#document').attr('accept','image/*')
        let create= $('.footer').on('click', '.add-employee', function () {

            let code = $('input[name=code]').val()
            let code_uppercase = code.toUpperCase()
            let job_tittle = $('#job_title option:selected').val()
            let dob = $('input[name="dob"]').val();
            let dob_place = $('input[name="dob_place"]').val();
            let first_name = $('input[name="first_name"]').val();
            let last_name = $('input[name="last_name"]').val();
            let card_number = $('input[name="card_number"]').val();
            let gender = $('#gender option:selected').val()
            if(gender == 'Male'){
                gender = 'm'
            }else if(gender == 'Female'){
                gender = 'f'
            }else{
                gender = '';
            }
            let nationality = $('input[name="nationality"]').val();
            let religion = $('input[name="religion"]').val();
            let marital_status = $('input[name="marital_status"]').val();
            let address_line_1 = $('input[name="address_line_1"]').val();
            let country = $('input[name="country"]').val();
            let city = $('input[name="first_name"]').val();
            let zip_code = $('input[name="zip_code"]').val();
            let home_phone = $('input[name="home_phone"]').val();
            let mobile_phone = $('input[name="mobile_phone"]').val();
            let work_phone = $('input[name="work_phone"]').val();
            let other_phone = $('input[name="other_phone"]').val();
            let email_1 = $('input[name="email_1"]').val();
            let email_2 = $('input[name="email_2"]').val();
            let joined_date = $('input[name="joined_date"]').val();
            let job_title = $('input[name="job_title"]').val();
            let job_position = $('input[name="job_position"]').val();
            let employee_status = $('input[name="employee_status"]').val();
            let department = $('input[name="department"]').val();
            let inderect_supervisor = $('input[name="inderect_supervisor"]').val();
            let supervisor = $('input[name="supervisor"]').val();

            formData = new FormData($('#employee_create_form')[0])
    
                   formData.set('code', code_uppercase)
                   formData.set('gender', gender)
                   formData.set('job_tittle', job_tittle)
                   if($("#document")[0].files[0]){
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

$(document).ready(function () {
    /** remove "ALL" from options */
    $('#gender option:selected').find('option').get(0).remove();
});