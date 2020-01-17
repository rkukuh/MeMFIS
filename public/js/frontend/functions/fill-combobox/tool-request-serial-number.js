$(document).ready(function () {
    tool = function () {
        $.ajax({
            url: '/get-tool-request/'+request_uuid+'/'+item_uuid,
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="serial_no"]').empty();

                $('select[name="serial_no"]').append(
                    '<option value=""> Select Serial Number</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="serial_no"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    tool();
});
