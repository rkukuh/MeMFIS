$(document).ready(function () {
    speaking = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka3 = 1;

                $('select[name="speaking"]').empty();

                $.each(data, function (key, value) {
                    if (angka3 == 1) {
                        $('select[name="speaking"]').append(
                            '<option> Select a Speaking Level</option>'
                        );

                        angka3 = 0;
                    }

                    $('select[name="speaking"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    speaking();
});