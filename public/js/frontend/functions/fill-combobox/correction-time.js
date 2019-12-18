$(document).ready(function () {
    CorrectionTimeType = function () {
        $.ajax({
            url: '/get-attendance-correction-types',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="attendance_correction_time_type"]').empty();

                $('select[name="attendance_correction_time_type"]').append(
                    '<option value=""> Select a Correction Time</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="attendance_correction_time_type"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    CorrectionTimeType();
});
