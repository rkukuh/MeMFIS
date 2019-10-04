$(document).ready(function () {
    let item_uuid = $("#material").val();
    unitItemUoms = function () {
        $.ajax({
            url: '/get-item-units/'+item_uuid,
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
    };

    unitItemUoms();
});

$("#material").on("change", function() {
    let item_uuid = $("#material").val();

    $.ajax({
        url: '/get-item-units/'+item_uuid,
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