let Employee_edit_basic = {
    init: function () {

    $('#id_card_photo').attr('accept','image/*')

    let update_basic = $('.footer').on('click', '.edit-basic-information', function () {

            let code = $('input[name=code]').val()
            let code_uppercase = code.toUpperCase()
            let dob = $('input[name=dob]').val()
            let dob_place = $('input[name=birthplace]').val()
            let first_name = $('input[name=first_name]').val()
            let last_name = $('input[name=last_name]').val()
            let card_number = $('input[name=card_number]').val()

            let gender = $('#gender option:selected').val()
            let nationality = $('input[name=nationality]').val()
            let religion = $('#religion option:selected').val()
            let marital_status = $('#marital_status option:selected').val()
            let address_line_1 = $('input[name=address_line_1]').val()
            let address_line_2 = $('input[name=address_line_2]').val()
            let country = $('input[name=country]').val()
            let city = $('input[name=city]').val()
            let zip = $('input[name=zip_code]').val()
            let home_phone = $('input[name=home_phone]').val()
            let mobile_phone = $('input[name=mobile_phone]').val()
            let work_phone = $('input[name=work_phone]').val()
            let other_phone = $('input[name=other_phone]').val()
            let email_1 = $('input[name=email_1]').val()
            let email_2 = $('input[name=email_2]').val()
            let joined_date = $('input[name=joined_date]').val()
            let job_tittle = $('#job_title option:selected').val()
            let job_position = $('#job_position option:selected').val()
            let employee_status = $('#employee_status option:selected').val()
            let department = $('#department option:selected').val()
            let indirect_supervisor = $('#inderect_supervisor option:selected').val()
            let supervisor = $('#supervisor option:selected').val()
            
            
            if(gender == 'Male'){
                gender = 'm'
            }else if(gender == 'Female'){
                gender = 'f'
            }else{
                gender = '';
            }

            let uuid = $('input[name=employee_uuid]').val()

            id_card_file = null;
            
            formData = new FormData()
            if($("#id_card_photo")[0].files[0]){
             formData.append('document',$("#id_card_photo")[0].files[0])
             id_card_file = formData.get('document')
            }

            $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             enctype: 'multipart/form-data',
             type: 'PUT',
             url: '/employee/'+uuid,
             data: {
                 code: code_uppercase,
                 first_name: first_name,
                 last_name: last_name,
                 dob: dob,
                 dob_place: dob_place,
                 card_number: card_number,
                 gender: gender,
                 nationality: nationality,
                 marital_status: marital_status,
                 religion: religion,
                 address_line_1: address_line_1,
                 address_line_2: address_line_2,
                 zip: zip,
                 country: country,
                 city: city,
                 home_phone: home_phone,
                 work_phone: work_phone,
                 other_phone: other_phone,
                 mobile_phone: mobile_phone,
                 email_1: email_1,
                 email_2: email_2,
                 joined_date: joined_date,
                 job_tittle: job_tittle,
                 job_position: job_position,
                 employee_status: employee_status,
                 department: department,
                 document: id_card_file,
                 indirect_supervisor: indirect_supervisor,
                 supervisor: supervisor
             },
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
                                    $('#joined_date-error').html('');
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
    
                            location.reload();
    
                        }
                    }
                });
        })
    }
}

jQuery(document).ready(function () {
    Employee_edit_basic.init();
});
