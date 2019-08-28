let Employee_edit_benefit = {
    init: function () {

    let update_benefit = $('.footer').on('click', '.edit-benefit', function () {
        let return_status = null

        var uuid_benefit = []
        var amount = []
        $("input[name='check_benefit']:checked").each(function(){
            
            if($('input[name='+this.value+'_amount]').val() == '' || $('input[name='+this.value+'_amount]').val() < document.getElementById(this.value+'_amount').min){
                $('#'+this.value+'-error').html('Must be greater than min value')
                return_status = false
            }else{
                amount.push($('input[name='+this.value+'_amount]').val())
                $('#'+this.value+'-error').html('')
            }

            uuid_benefit.push(this.value);
        });

        var uuid_bpjs = []
        var employee_paid = []
        var company_paid = []
        var employee_min = []
        var company_min = []
        var employee_max = []
        var company_max = []

        $("input[name='check_bpjs']:checked").each(function(){
            
            if($('input[name='+this.value+'_employee]').val() == ''){
                $('#'+this.value+'_employee-error').html('Can not be null if you checked')
                return_status = false;
            }else{
                employee_paid.push($('input[name='+this.value+'_employee]').val())
                $('#'+this.value+'_employee-error').html('')
            }

            if($('input[name='+this.value+'_company]').val() == ''){
                $('#'+this.value+'_company-error').html('Can not be null if you checked')
                return_status = false;
            }else{
                company_paid.push($('input[name='+this.value+'_company]').val())
                $('#'+this.value+'_company-error').html('')
            }

            if($('input[name='+this.value+'_employee_min]').val() == ''){
                $('#'+this.value+'_employee_min-error').html('Can not be null if you checked')
                return_status = false;
            }else{
                employee_min.push($('input[name='+this.value+'_employee_min]').val())
                $('#'+this.value+'_employee_min-error').html('')
            }

            if($('input[name='+this.value+'_company_min]').val() == ''){
                $('#'+this.value+'_company_min-error').html('Can not be null if you checked')
                return_status = false;
            }else{
                company_min.push($('input[name='+this.value+'_company_min]').val())
                $('#'+this.value+'_company_min-error').html('')
            }

            if($('input[name='+this.value+'_employee_max]').val() == ''){
                $('#'+this.value+'_employee_max-error').html('Can not be null if you checked')
                return_status = false;
            }else{
                employee_max.push($('input[name='+this.value+'_employee_max]').val())
                $('#'+this.value+'_employee_max-error').html('')
            }

            if($('input[name='+this.value+'_company_max]').val() == ''){
                $('#'+this.value+'_company_max-error').html('Can not be null if you checked')
                return_status = false;
            }else{
                company_max.push($('input[name='+this.value+'_company_max]').val())
                $('#'+this.value+'_company_max-error').html('')
            }
            uuid_bpjs.push(this.value);
        });

        let uuid = $('input[name=employee_uuid]').val()

        if(return_status != null){
        return return_status
        }   

        let maximum_overtime = $('input[name=maximum_overtime]').val()
        let minimum_overtime = $('input[name=minimum_overtime]').val()
        let holiday_overtime = $('input[name=holiday_overtime]').val()
        let pph = $('input[name=pause]:checked').val()
        let late_tolerance = $('input[name=late_tolerance]').val()
        let late_punishment = $('input[name=late_punishment]').val()
        let absence_punishment = $('input[name=absences_punishment]').val()


            $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type: 'PUT',
             url: '/employee/'+uuid+'/benefit-salary/'+null,
             data: {
                 uuid_benefit: uuid_benefit,
                 amount: amount,
                 uuid_bpjs: uuid_bpjs,
                 employee_paid: employee_paid,
                 employee_min: employee_min,
                 employee_max: employee_max,
                 company_paid: company_paid,
                 company_min: company_min,
                 company_max: company_max,
                 maximum_overtime: maximum_overtime,
                 minimum_overtime: minimum_overtime,
                 holiday_overtime: holiday_overtime,
                 pph: pph,
                 late_tolerance: late_tolerance,
                 late_punishment: late_punishment,
                 absence_punishment: absence_punishment,
             },
             success: function (data) {
                        // if (data.errors) {
                            // $.each(data.errors, function (key, value) {
                            //     var name = $("input[name='"+key+"']");
                            //     if(key.indexOf(".") != -1){
                            //       var arr = key.split(".");
                            //       name = $("input[name='"+arr[0]+"']:eq("+arr[1]+")");
                            //     }
                            //     name.parent().find("div.form-control-feedback.text-danger").html(value[0]);
                                
                            //     if (data.errors.dob) {
                            //         $('#dob-error').html(data.errors.dob[0]);
                            //     }else{
                            //         $('#dob-error').html('');
                            //     }
    
                            //     if (data.errors.gender) {
                            //         $('#gender-error').html(data.errors.gender[0]);
                            //     }else{
                            //         $('#gender-error').html('');
                            //     }
    
                            //     if (data.errors.marital_status) {
                            //         $('#marital_status-error').html(data.errors.marital_status[0]);
                            //     }else{
                            //         $('#marital_status-error').html('');
                            //     }
    
                            //     if (data.errors.religion) {
                            //         $('#religion-error').html(data.errors.religion[0]);
                            //     }else{
                            //         $('#religion-error').html('');
                            //     }
    
                            //     if (data.errors.mobile_phone) {
                            //         $('#mobile_phone-error').html(data.errors.mobile_phone[0]);
                            //     }else{
                            //         $('#mobile_phone-error').html('');
                            //     }
    
                            //     if (data.errors.joined_date) {
                            //         $('#joined_date-error').html(data.errors.joined_date[0]);
                            //     }else{
                            //         $('#mobile_phone-error').html('');
                            //     }
    
                            //     if (data.errors.job_tittle) {
                            //         $('#job_title-error').html(data.errors.job_tittle[0]);
                            //     }else{
                            //         $('#job_title-error').html('');
                            //     }
                                
                            //     if (data.errors.mobile_phone) {
                            //         $('#mobile_phone-error').html(data.errors.mobile_phone[0]);
                            //     }else{
                            //         $('#mobile_phone-error').html('');
                            //     }
    
                            //     if (data.errors.job_position) {
                            //         $('#job_position-error').html(data.errors.job_position[0]);
                            //     }else{
                            //         $('#job_position-error').html('');
                            //     }
    
                            //     if (data.errors.employee_status) {
                            //         $('#employee_status-error').html(data.errors.employee_status[0]);
                            //     }else{
                            //         $('#employee_status-error').html('');
                            //     }
    
                            //     if (data.errors.department) {
                            //         $('#department-error').html(data.errors.department[0]);
                            //     }else{
                            //         $('#department-error').html('');
                            //     }
    
                            //     if (data.errors.email_1) {
                            //         $('#email_1-error').html(data.errors.email_1[0]);
                            //     }else{
                            //         $('#email_1-error').html('');
                            //     }
                            // });
                        // } else {
    
                            // toastr.success('Data has been saved.', 'Sukses', {
                            //     timeOut: 5000
                            // });
    
                            location.reload();
    
                        // }
                    }
                });
        })
    }
}

function checkboxFunction(id){
    if ($('#'+id).is(':checked')) {
        $('#'+id).attr('checked', true)
    }else{
        $('#'+id).attr('checked', false)
        $('#'+id+'-error').html('')
    }
}

function checkboxBPJSFunction(id){
    if ($('#'+id).is(':checked')) {
        $('#'+id).attr('checked', true)
    }else{
        $('#'+id).attr('checked', false)
        $('#'+id+'_employee-error').html('')
        $('#'+id+'_company-error').html('')
        $('#'+id+'_employee_min-error').html('')
        $('#'+id+'_company_min-error').html('')
        $('#'+id+'_employee_max-error').html('')
        $('#'+id+'_company_max-error').html('')
    }
}

jQuery(document).ready(function () {
    Employee_edit_benefit.init();
});
