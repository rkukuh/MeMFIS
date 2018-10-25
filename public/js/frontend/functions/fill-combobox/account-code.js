$(document).ready(function () {
    accountcode = function () {
        $.ajax({
            url: '/get-accountcodes/',
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