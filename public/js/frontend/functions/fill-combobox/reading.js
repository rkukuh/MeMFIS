$(document).ready(function () {
    reading = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka3 = 1;

                $('select[name="reading"]').empty();

                $.each(data, function (key, value) {
                    if (angka3 == 1) {
                        $('select[name="reading"]').append(
                            '<option> Select a Reading Level</option>'
                        );

                        angka3 = 0;
                    }

                    $('select[name="reading"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    reading();
});
