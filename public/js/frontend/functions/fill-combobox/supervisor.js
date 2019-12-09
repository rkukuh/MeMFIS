$(document).ready(function () {
    Supervisor = function () {
        $.ajax({
            url: '/get-supervisors/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="supervisor"]').empty();

                $('select[name="supervisor"]').append(
                    '<option value=""> Select an Employee </option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="supervisor"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    Supervisor();
});
