let leaveType = {
    init: function () {
        var genders = ["All", "Male", "Female"];
        var select = document.getElementById('gender')

        for(i=0; i<3; i++){
            var opt = document.createElement('option')
            opt.setAttribute('value',genders[i])
            opt.innerHTML = genders[i]
            select.appendChild(opt)
        }

        
    let create = $('.footer').on('click', '.add-leave-types', function () {

        let code = $('input[name=code]').val()
        let code_uppercase = code.toUpperCase()

        let name = $('input[name=name]').val()
        let gender = $('input[name=gender]').val()

        if(gender == 'Male'){
            gender = 'm'
        }else if(gender == 'Female'){
            gender = 'f'
        }else{
            gender = 'all'
        }
        
        let based = $('input[name=day]').val()
        let leave_period = $('input[name=leave_period]').val()
        
        let pro_rate = null
        let distirbute = null
        let back_date = null

        if ($('#pro_rate').is(':checked')) {
            pro_rate = 1
        }else{
            pro_rate = 0
        }

        if ($('#distribute_evently_per_month').is(':checked')) {
            distirbute = 1
        }else{
            distirbute = 0
        }

        if ($('#back_date').is(':checked')) {
            back_date = 1
        }else{
            back_date = 0
        }

        let description = $('#description').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/leave-type',
            data: {
                _token: $('input[name=_token]').val(),
                code: code_uppercase,
                name: name,
                gender: gender,
                based: based,
                leave_period: leave_period,
                prorate_leave: pro_rate,
                distirbute_evently: distirbute,
                back_date: back_date,
                description: description,
            },
            success: function (data) {
                if (data.errors) {
                    if (data.errors.code) {
                        $('#code-error').html(data.errors.code[0]);
                    }else{
                        $('#code-error').html('');
                    }
                    if (data.errors.name) {
                        $('#name-error').html(data.errors.name[0]);
                    }else{
                        $('#name-error').html('');
                    }
                    if (data.errors.leave_period) {
                        $('#leave_period-error').html(data.errors.leave_period[0]);
                    }else{
                        $('#leave_period-error').html('');
                    }
                    if (data.errors.pro_rate) {
                        $('#pro_rate-error').html(data.errors.pro_rate[0]);
                    }else{
                        $('#pro_rate-error').html('')
                    }
                    if (data.errors.description) {
                        $('#description-error').html(data.errors.description[0]);
                    }else{
                        $('#description-error').html('')
                    }
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
    leaveType.init()
});