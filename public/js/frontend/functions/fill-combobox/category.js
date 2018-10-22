$(document).ready(function () {
    category = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka3 = 1;

                $('select[name="category"]').empty();

                $.each(data, function (key, value) {
                    if (angka3 == 1) {
                        $('select[name="category"]').append(
                            '<option> Select a Category</option>'
                        );

                        angka3 = 0;
                    }

                    $('select[name="category"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    category();
});
