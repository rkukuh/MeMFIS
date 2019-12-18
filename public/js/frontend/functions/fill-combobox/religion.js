$(document).ready(function () {
    Religion = function () {
        $.ajax({
            url: '/get-religions',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#religion').empty();

                $('#religion').append(
                    '<option value=""> Select a Religion</option>'
                );

                $.each(data, function (key, value) {
                    $('#religion').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    Religion();
});
