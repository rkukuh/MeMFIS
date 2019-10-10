$(document).ready(function () {
    let item_uuid = $("#tool").val();
    unitItemUoms = function () {
        $.ajax({
            url: '/get-item-units/'+item_uuid,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="unit_tool"]').empty();

                $('select[name="unit_tool"]').append(
                    '<option value=""> Select a Unit</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="unit_tool"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    unitItemUoms();

});

$("#tool").on("change", function() {
    let item_uuid = $("#tool").val();

    $.ajax({
        url: '/get-item-units/'+item_uuid,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('select[name="unit_tool"]').empty();

            $('select[name="unit_tool"]').append(
                '<option value=""> Select a Unit</option>'
            );

            $.each(data, function (key, value) {
                $('select[name="unit_tool"]').append(
                    '<option value="' + key + '">' + value + '</option>'
                );
            });
        }
    });
});