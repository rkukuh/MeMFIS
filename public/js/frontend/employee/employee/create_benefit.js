let Employee_create_benefit = {
    init: function () {

    let create_benefit = $('.footer').on('click', '.create-benefit', function () {
        let return_status = null

        var uuid_benefit = []
        var amount = []
        $("input[name='check_benefit']:checked").each(function(){
            
            if($('input[name='+this.value+'_amount]').val() == '' ||$('input[name='+this.value+'_amount]').val() < document.getElementById(this.value+'_amount').min){
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
        let absence_punishment = $('input[name=absence_punishment]').val()


            $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type: 'POST',
             url: '/employee/'+uuid+'/benefit-salary',
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
                        if (data.errors) {
                            $.each(data.errors, function (key, value) {
                                if (data.errors.maximum_overtime) {
                                    $('#maximum_overtime-error').html(data.errors.maximum_overtime[0]);
                                }else{
                                    $('#maximum_overtime-error').html('');
                                }
    
                                if (data.errors.minimum_overtime) {
                                    $('#minimum_overtime-error').html(data.errors.minimum_overtime[0]);
                                }else{
                                    $('#minimum_overtime-error').html('');
                                }
    
                                if (data.errors.holiday_overtime) {
                                    $('#holiday_overtime-error').html(data.errors.holiday_overtime[0]);
                                }else{
                                    $('#holiday_overtime-error').html('');
                                }
    
                                if (data.errors.late_tolerance) {
                                    $('#late_tolerance-error').html(data.errors.late_tolerance[0]);
                                }else{
                                    $('#late_tolerance-error').html('');
                                }
    
                                if (data.errors.late_punishment) {
                                    $('#late_punishment-error').html(data.errors.late_punishment[0]);
                                }else{
                                    $('#late_punishment-error').html('');
                                }
    
                                if (data.errors.absence_punishment) {
                                    $('#absence_punishment-error').html(data.errors.absence_punishment[0]);
                                }else{
                                    $('#absence_punishment-error').html('');
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
    Employee_create_benefit.init();
});
