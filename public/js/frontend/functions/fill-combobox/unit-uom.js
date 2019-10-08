$(document).ready(function () {
    let item_uuid = $("#uuid").val();
    unitItemUoms = function () {
        $.ajax({
            url: '/get-item-unit-uuid/'+item_uuid,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="unit_id"]').empty();

                $('select[name="unit_id"]').append(
                    '<option value=""> Select a Unit</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="unit_id"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    unitItemUoms();

});

$("#item").on("change", function() {
    let item_uuid = $("#item").val();

    $.ajax({
        url: '/get-item-unit-uuid/'+item_uuid,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('select[name="unit_id"]').empty();

            $('select[name="unit_id"]').append(
                '<option value=""> Select a Unit</option>'
            );

            $.each(data, function (key, value) {
                $('select[name="unit_id"]').append(
                    '<option value="' + key + '">' + value + '</option>'
                );
            });
        }
    });
});
