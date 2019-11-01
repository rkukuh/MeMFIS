$(document).ready(function () {
    tool = function () {
        $.ajax({
            url: '/get-tool-request-jobcard/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="tool_request"]').empty();

                $('select[name="tool_request"]').append(
                    '<option value=""> Select a Tool Request</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="tool_request"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    tool();
});
