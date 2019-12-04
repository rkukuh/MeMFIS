$(document).ready(function () {
    indirectSupervisor = function () {
        $.ajax({
            url: '/get-supervisors/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="indirect_supervisor"]').empty();

                $('select[name="indirect_supervisor"]').append(
                    '<option value=""> Select an indirect Supervisor </option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="indirect_supervisor"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    indirectSupervisor();
});
