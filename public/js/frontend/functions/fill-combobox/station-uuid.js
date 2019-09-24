$(document).ready(function () {
    Station = function () {
        $.ajax({
            url: '/get-stations',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="station"]').empty();

                $('select[name="station"]').append(
                    '<option value=""> Select a Station</option>'
                );

                $.each(data, function (key, value) {

                    $('select[name="station"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    Station();
});
