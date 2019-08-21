let Bpjs = {
    init: function () {
        let reset = function (){
            $('#bpjs_code-error').html('')
            $('#bpjs_name-error').html('')
            $('#basic_salary_employee-error').html('')
            $('#min_employee-error').html('')
            $('#max_employee-error').html('')
            $('#basic_salary_company-error').html('')
            $('#min_company-error').html('')
            $('#max_company-error').html('')
        }

    let create = $('.footer').on('click', '.add-bpjs', function () {

            let code = $('input[name=bpjs_code]').val();
            let code_uppercase = code.toUpperCase();
            let name = $('input[name=bpjs_name]').val();
            let employee_paid = $('input[name=basic_salary_employee]').val();
            let min_employee = $('input[name=min_employee]').val();
            let max_employee = $('input[name=max_employee]').val();
            let company_paid = $('input[name=basic_salary_company]').val();
            let min_company = $('input[name=min_company]').val();
            let max_company = $('input[name=max_company]').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/bpjs',
            data: {
                _token: $('input[name=_token]').val(),
                code: code_uppercase,
                name: name,
                employee_paid: employee_paid,
                min_employee: min_employee,
                max_employee: max_employee,
                company_paid: company_paid,
                min_company: min_company,
                max_company: max_company,
            },
            success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#bpjs_code-error').html(data.errors.code[0]);
                        }else{
                            $('#bpjs_code-error').html('')
                        }
                        if (data.errors.name) {
                            $('#bpjs_name-error').html(data.errors.name[0]);
                        }else{
                            $('#bpjs_name-error').html('')
                        }
                        if (data.errors.employee_paid) {
                            $('#basic_salary_employee-error').html(data.errors.employee_paid[0]);
                        }else{
                            $('#basic_salary_employee-error').html('')
                        }
                        if (data.errors.min_employee) {
                            $('#min_employee-error').html(data.errors.min_employee[0]);
                        }else{
                            $('#min_employee-error').html('')
                        }
                        if (data.errors.max_employee) {
                            $('#max_employee-error').html(data.errors.max_employee[0]);
                        }else{
                            $('#max_employee-error').html('')
                        }
                        if (data.errors.company_paid) {
                            $('#basic_salary_company-error').html(data.errors.company_paid[0]);
                        }else{
                            $('#basic_salary_company-error').html('')
                        }
                        if (data.errors.min_company) {
                            $('#min_company-error').html(data.errors.min_company[0]);
                        }else{
                            $('#min_company-error').html('')
                        }
                        if (data.errors.max_company) {
                            $('#max_company-error').html(data.errors.max_company[0]);
                        }else{
                            $('#max_company-error').html('')
                        }
                } else {
                    toastr.success('Data has been saved.', 'Succes', {
                        timeOut: 5000
                    });

                    reset()
                }
        }

        });
    });

    }      
};

jQuery(document).ready(function () {
    Bpjs.init()
});