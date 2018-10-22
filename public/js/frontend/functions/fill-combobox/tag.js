$(document).ready(function () {
    tag = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka3 = 1;

                $('select[name="tag"]').empty();

                $.each(data, function (key, value) {
                    if (angka3 == 1) {
                        $('select[name="tag"]').append(
                            '<option> Select a Tag</option>'
                        );

                        angka3 = 0;
                    }

                    $('select[name="tag"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    tag();
});
