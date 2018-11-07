$(document).ready(function () {
    unitItemUoms = function () {
        $.ajax({
            url: '/get-units/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="item_unit_id"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="item_unit_id"]').append(
                            '<option> Select a Unit</option>'
                        );

                        index = 0;
                    }

                    $('select[name="item_unit_id"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    unitItemUoms();
});
