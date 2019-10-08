$(document).ready(function () {
    interchange = function () {
        $.ajax({
            url: '/get-iterchanges/'+item_uuid,
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="interchange"]').empty();

                $('select[name="interchange"]').append(
                    '<option value=""> Select a Interchange</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="interchange"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    interchange();
});
