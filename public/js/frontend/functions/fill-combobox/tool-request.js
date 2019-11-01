$(document).ready(function () {
    tool = function () {
        $.ajax({
            url: '/get-tool-request/'+request_uuid,
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="tool"]').empty();

                $('select[name="tool"]').append(
                    '<option value=""> Select a Tool Request</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="tool"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    tool();
});
