$(document).ready(function () {
    category = function () {
        $.ajax({
            url: '/get-customers/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="customer"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="customer"]').append(
                            '<option> Select a Customer</option>'
                        );

                        index = 0;
                    }

                    $('select[name="customer"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    category();
});
