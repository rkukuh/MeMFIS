$(document).ready(function () {
    unitItemUoms = function () {
        $.ajax({
            url: '/get-units/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="item_unit_id"]').empty();

                $('select[name="item_unit_id"]').append(
                    '<option value=""> Select a Unit</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="item_unit_id"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    unitItemUoms();
});

$("#material").on("change", function () {
    let item_uuid = $("#material").val();

    $.ajax({
        url: '/get-item-unit-uuid/'+item_uuid,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('select[name="unit_material"]').empty();

            $('select[name="unit_material"]').append(
                '<option value=""> Select a Unit</option>'
            );

            $.each(data, function (key, value) {
                $('select[name="unit_material"]').append(
                    '<option value="' + key + '">' + value + '</option>'
                );
            });
        }
    });
});