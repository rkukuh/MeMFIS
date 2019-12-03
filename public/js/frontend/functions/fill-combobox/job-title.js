$(document).ready(function () {
    JobTitles = function () {
        $.ajax({
            url: '/get-job-titles',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#job_title').empty();

                $('#job_title').append(
                    '<option value=""> Select a Job Title</option>'
                );

                $.each(data, function (key, value) {
                    $('#job_title').append(
                        '<option value="' + value + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    JobTitles();
});
