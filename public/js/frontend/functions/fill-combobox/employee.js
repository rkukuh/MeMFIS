$(document).ready(function () {
    employee = function () {
        $.ajax({
            url: '/get-employees/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="employee"]').empty();

                $('select[name="employee"]').append(
                    '<option value=""> Select an Employee </option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="employee"]').append(
                        '<option value="' + value.uuid + '">' + value.first_name +' '+ value.last_name + '</option>'
                    );
                });
            }
        });
    };

    employee();
});
