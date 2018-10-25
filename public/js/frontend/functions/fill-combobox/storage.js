$(document).ready(function () {
    storage = function () {
        $.ajax({
            url: '/get-storages-combobox/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka7 = 1;

                $('select[name="storage"]').empty();

                $.each(data, function (key, value) {
                    if (angka7 == 1) {
                        $('select[name="storage"]').append(
                            '<option> Select a Storage</option>'
                        );

                        angka7 = 0;
                    }

                    $('select[name="storage"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    storage();
});