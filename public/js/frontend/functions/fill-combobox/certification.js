$(document).ready(function () {
    certification = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka3 = 1;

                $('select[name="certification"]').empty();

                $.each(data, function (key, value) {
                    if (angka3 == 1) {
                        $('select[name="certification"]').append(
                            '<option> Select a certification</option>'
                        );

                        angka3 = 0;
                    }

                    $('select[name="certification"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    certification();
});