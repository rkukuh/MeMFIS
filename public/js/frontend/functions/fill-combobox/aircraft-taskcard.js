$(document).ready(function () {
    AircraftTaskcard = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="aircraft_taskcard"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="aircraft_taskcard"]').append(
                            '<option> Select a Aircraft</option>'
                        );

                        index = 0;
                    }

                    $('select[name="aircraft_taskcard"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    AircraftTaskcard();
});
