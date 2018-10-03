$(document).ready(function () {
    accountcode = function () {
        $.ajax({
            url: '/get-accountcode/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka = 1;

                $('select[name="accountcode"]').empty();

                $.each(data, function (key, value) {
                    if (angka == 1) {
                        $('select[name="accountcode"]').append(
                            '<option> Select a Accountcode</option>'
                        );

                        angka = 0;
                    }

                    $('select[name="accountcode"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    accountcode();
});


$(document).ready(function () {
    category = function () {
        $.ajax({
            url: '/get-category/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka = 1;

                $('select[name="category"]').empty();

                $.each(data, function (key, value) {
                    if (angka == 1) {
                        $('select[name="category"]').append(
                            '<option> Select a Category</option>'
                        );

                        angka = 0;
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
