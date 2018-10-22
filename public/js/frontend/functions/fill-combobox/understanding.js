$(document).ready(function () {
    understanding = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka3 = 1;

                $('select[name="understanding"]').empty();

                $.each(data, function (key, value) {
                    if (angka3 == 1) {
                        $('select[name="understanding"]').append(
                            '<option> Select a Understanding Level</option>'
                        );

                        angka3 = 0;
                    }

                    $('select[name="understanding"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    understanding();
});