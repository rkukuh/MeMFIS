$(document).ready(function () {
    units2 = function () {
        $.ajax({
            url: '/get-units/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka5 = 1;

                $('select[name="unit2"]').empty();

                $.each(data, function (value, key) {
                    if (angka5 == 1) {
                        $('select[name="unit2"]').append(
                            '<option> Select a Unit</option>'
                        );

                        angka5 = 0;
                    }

                    $('select[name="unit2"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    units2();
});
