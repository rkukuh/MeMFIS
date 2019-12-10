$(document).ready(function () {
    Country = function () {
        $.ajax({
            url: '/get-countries',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="country"]').empty();

                $('select[name="country"]').append(
                    '<option value=""> Select Country</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="country"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    Country();
});
