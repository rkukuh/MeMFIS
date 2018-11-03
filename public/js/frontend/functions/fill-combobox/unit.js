$(document).ready(function () {
    units = function () {
        $.ajax({
            url: '/get-units/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="unit"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="unit"]').append(
                            '<option> Select a Unit</option>'
                        );

                        index = 0;
                    }

                    $('select[name="unit"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    units();
});
