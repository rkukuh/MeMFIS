$(document).ready(function () {
    type = function () {
        $.ajax({
            url: '/type',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka8 = 1;

                $('select[name="type"]').empty();

                $.each(data, function (key, value) {
                    if (angka8 == 1) {
                        $('select[name="type"]').append(
                            '<option> Select a Type</option>'
                        );
                        angka8 = 0;
                    }
                    $('select[name="type"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };
    type();
});