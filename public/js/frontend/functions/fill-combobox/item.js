$(document).ready(function () {
    item = function () {
        $.ajax({
            url: '/get-items/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="item"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="item"]').append(
                            '<option> Select a Item</option>'
                        );

                        index = 0;
                    }

                    $('select[name="item"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    item();
});
