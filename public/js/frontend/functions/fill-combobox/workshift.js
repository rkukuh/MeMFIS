$(document).ready(function () {
    Workshifts = function () {
        $.ajax({
            url: '/get-workshifts/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="job_position_workshift"]').empty();

                $('select[name="job_position_workshift"]').append(
                    '<option value=""> Select a Workshift Name</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="job_position_workshift"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    Workshifts();
});
