$(document).ready(function () {
    tool = function () {
        $.ajax({
            url: '/get-jobcard/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="jc_no"]').empty();

                $('select[name="jc_no"]').append(
                    '<option value=""> Select a Item</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="jc_no"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    tool();
});
