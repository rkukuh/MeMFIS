let CompanyStructure = {
    init: function () {
    let update = $('.footer').on('click', '.edit-company-structure', function () {

        let company_uuid = $('input[name=company_uuid]').val()
        let code = $('input[name=code]').val()
        let name = $('input[name=name]').val()
        let maximum_period = $('input[name=max_overtime_per_period]').val()
        let maximum_holiday = $('input[name=holiday_overtime_allowance]').val()
        let description = $('#description').val()
        let company = $('#company').val()
        let parent_structure = $('#parent_structure').val()
       
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'put',
            url: '/company/' + company_uuid,
            data: {
                _token: $('input[name=_token]').val(),
                uuid: company_uuid,
                code: code,
                name: name,
                maximum_period: maximum_period,
                maximum_holiday: maximum_holiday,
                description: description,
                company: company,
                parent_structure: parent_structure,
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
                      }); 

                } else {
                    toastr.success('Data has been saved.', 'Succes', {
                        timeOut: 5000
                    });
                }
            }
        });
    });

    }      
};

jQuery(document).ready(function () {
    CompanyStructure.init()
});
