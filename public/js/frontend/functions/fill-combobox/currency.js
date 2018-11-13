$(document).ready(function () {
    currency = function () {
        $.ajax({
            url: '/get-currencies/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka6 = 1;

                $('select[name="currency"]').empty();

                $.each(data, function (key, value) {
                    if (angka6 == 1) {
                        $('select[name="currency"]').append(
                            '<option> Select a Currency</option>'
                        );

                        angka6 = 0;
                    }

                    $('select[name="currency"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    currency();
});