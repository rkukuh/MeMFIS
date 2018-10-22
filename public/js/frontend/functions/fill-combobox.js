$(document).ready(function () {
    accountcode_category = function () {
        $.ajax({
            url: '/get-accountcodes/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka2 = 1;

                $('select[name="accountcode_category"]').empty();

                $.each(data, function (key, value) {
                    if (angka2 == 1) {
                        $('select[name="accountcode_category"]').append(
                            '<option> Select a Accountcode</option>'
                        );

                        angka2 = 0;
                    }

                    $('select[name="accountcode_category"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    accountcode_category();
});

$(document).ready(function () {
    units2 = function () {
        $.ajax({
            url: '/get-units/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka5 = 1;

                $('select[name="unit2"]').empty();

                $.each(data, function (key, value) {
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








