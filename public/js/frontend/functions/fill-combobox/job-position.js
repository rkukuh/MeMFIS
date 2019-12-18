$(document).ready(function () {
    JobPosition = function () {
        $.ajax({
            url: '/get-job-positions',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="job_position"]').empty();

                $('select[name="job_position"]').append(
                    '<option value=""> Select a Job Position</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="job_position"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };
    JobPosition();
});
