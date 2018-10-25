$(document).ready(function () {
    language = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka3 = 1;

                $('select[name="language"]').empty();

                $.each(data, function (key, value) {
                    if (angka3 == 1) {
                        $('select[name="language"]').append(
                            '<option> Select a Language</option>'
                        );

                        angka3 = 0;
                    }

                    $('select[name="language"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    language();
});