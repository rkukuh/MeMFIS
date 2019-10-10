$(document).ready(function () {
    tool = function () {
        $.ajax({
            url: '/get-inventory-in/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="number"]').empty();

                $('select[name="number"]').append(
                    '<option value=""> Select a Item</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="number"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    tool();
});
