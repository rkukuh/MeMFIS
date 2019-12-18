$(document).ready(function () {
    DiscountType = function () {
        $.ajax({
            url: '/get-promos',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name^="discount-type"]').empty();

                $('select[name^="discount-type"]').append(
                    '<option value=""> Select a Currency</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name^="discount-type"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });

    };

    DiscountType();
});