$(document).ready(function () {
    let select = document.getElementById('name4');

    name2 = function () {
        $.ajax({
            url: '/get-employees-data/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka3 = 1;

                $('select[name="name"]').empty();

                $.each(data, function (key, value) {
                    if (angka3 == 1) {
                        $('select[name="name"]').append(
                            '<option> Select a Name</option>'
                        );

                        angka3 = 0;
                    }

                    $('select[name="name"]').append(
                        // '<option value="' + key + '">' + value + '</option>'
                        select.options[select.options.length] = new Option(value, key)

                    );
                });
            }
        });
    };

    name2();
});