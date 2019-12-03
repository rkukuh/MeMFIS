$(document).ready(function () {
    MaritalStatus = function () {
        $.ajax({
            url: '/get-marital-status',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#marital_status').empty();

                $('#marital_status').append(
                    '<option value=""> Select a Marital Status</option>'
                );

                $.each(data, function (key, value) {
                    $('#marital_status').append(
                        '<option value="' + value + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    MaritalStatus();
});
