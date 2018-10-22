$(document).ready(function () {
    school = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka3 = 1;

                $('select[name="school"]').empty();

                $.each(data, function (key, value) {
                    if (angka3 == 1) {
                        $('select[name="school"]').append(
                            '<option> Select a school</option>'
                        );

                        angka3 = 0;
                    }

                    $('select[name="school"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    school();
});
