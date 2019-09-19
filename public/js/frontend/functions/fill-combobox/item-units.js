$(document).ready(function () {
    units = function () {
        $.ajax({
            url: '/get-item-units/'+item_uuid,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="unit_id"]').empty();

                $('select[name="unit_id"]').append(
                    '<option value=""> Select a Unit</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="unit_id"]').append(
                        '<option value="' + value.id + '">' + value.name + '</option>'
                    );
                });
            }
        });
    };

    units();
});
