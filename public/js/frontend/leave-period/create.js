let leavePeriod = {
    init: function () {
    let create = $('.footer').on('click', '.add-leave-period', function () {

        let code = $('input[name=code]').val();
        let code_uppercase = code.toUpperCase();

        let name = $('input[name=name]').val();
        let period_start = $('input[name=period_start_date]').val();
        let period_end = $('input[name=period_end_date]').val();
        let description = $('#description').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/leave-period',
            data: {
                _token: $('input[name=_token]').val(),
                code: code_uppercase,
                name: name,
                period_start: period_start,
                period_end: period_end,
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
                    if (data.errors.period_start) {
                        $('#period_start_date-error').html(data.errors.period_start[0]);
                    }else{
                        $('#period_start_date-error').html('');
                    }
                    if (data.errors.period_end) {
                        $('#period_end_date-error').html(data.errors.period_end[0]);
                    }else{
                        $('#period_end_date-error').html('')
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
    leavePeriod.init()
});