$(document).ready(function () {
    unittools = function () {
        $.ajax({
            url: '/get-units/',
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

    unittools();
});
$("#tool").on("change", function () {
    let item_uuid = $("#tool").val();

    $.ajax({
        url: '/get-item-unit-uuid/'+item_uuid,
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
