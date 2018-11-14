$(document).ready(function () {
    category = function () {
        $.ajax({
            url: '/get-customers/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="customer"]').empty();

                $('select[name="customer"]').append(
                    '<option> Select a Customer </option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="customer"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    category();
});
