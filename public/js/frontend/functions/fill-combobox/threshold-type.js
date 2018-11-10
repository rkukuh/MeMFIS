$(document).ready(function () {
    ThresholdType = function () {
        $.ajax({
            url: '/get-threshold-types/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="threshold_type"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="threshold_type"]').append(
                            '<option> Select a Threshold Type</option>'
                        );

                        index = 0;
                    }

                    $('select[name="threshold_type"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    ThresholdType();
});
