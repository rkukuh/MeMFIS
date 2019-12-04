$(document).ready(function () {
    JobPosition = function () {
        $.ajax({
            url: '/get-employment-statuses',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="employee_status"]').empty();

                $('select[name="employee_status"]').append(
                    '<option value=""> Select a Job Position</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="employee_status"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };
    JobPosition();
});
