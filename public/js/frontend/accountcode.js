$(document).ready(function () {
    bank = function () {
        let select = document.getElementById('m_select2_3a');

        $.ajax({
            url: '/accountcode/',
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

    bank();
});
