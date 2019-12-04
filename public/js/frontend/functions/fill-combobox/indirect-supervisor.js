$(document).ready(function () {
    InderectSupervisor = function () {
        $.ajax({
            url: '/get-supervisors/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="inderect_supervisor"]').empty();

                $('select[name="inderect_supervisor"]').append(
                    '<option value=""> Select an Inderect Supervisor </option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="inderect_supervisor"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    InderectSupervisor();
});
