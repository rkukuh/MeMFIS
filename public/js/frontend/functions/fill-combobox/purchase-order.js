$(document).ready(function () {
    projects = function () {
        $.ajax({
            url: '/get-purchase-order/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="purchase_order"]').empty();

                $('select[name="purchase_order"]').append(
                    '<option value=""> Select a Purchase Order</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="purchase_order"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    projects();
});
