$(document).ready(function () {
    currency = function () {
        $.ajax({
            url: '/get-currencies/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="currency"]').empty();

                $('select[name="currency"]').append(
                    '<option value=""> Select a Currency</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="currency"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    currency();
});
