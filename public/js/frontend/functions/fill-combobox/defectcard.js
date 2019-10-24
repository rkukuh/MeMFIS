$(document).ready(function () {
    tool = function () {
        $.ajax({
            url: '/get-defectcard/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="item_code_id"]').empty();

                $('select[name="item_code_id"]').append(
                    '<option value=""> Select a Item</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="item_code_id"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    tool();
});
