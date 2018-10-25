$(document).ready(function () {
    writinng = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka3 = 1;

                $('select[name="writing"]').empty();

                $.each(data, function (key, value) {
                    if (angka3 == 1) {
                        $('select[name="writing"]').append(
                            '<option> Select a Writing Level</option>'
                        );

                        angka3 = 0;
                    }

                    $('select[name="writing"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    writinng();
});