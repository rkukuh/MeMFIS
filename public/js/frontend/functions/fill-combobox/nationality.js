$(document).ready(function () {
    Nationality = function () {
        $.ajax({
            url: '/get-nationalities',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#nationality').empty();

                $('#nationality').append(
                    '<option value=""> Select Access</option>'
                );

                $.each(data, function (key, value) {
                    $('#nationality').append(
                        '<option value="' + value + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    Nationality();
});
