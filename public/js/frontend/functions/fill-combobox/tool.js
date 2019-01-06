$(document).ready(function () {
    tool = function () {
        $.ajax({
            url: '/get-items/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="tool"]').empty();

                $('select[name="tool"]').append(
                    '<option> Select a Item</option>'
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
