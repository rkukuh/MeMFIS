$(document).ready(function () {
    DiscountType = function () {
        $.ajax({
            url: '/get-promos/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name^="promo-type"]').empty();

                $('select[name^="promo-type"]').append(
                    '<option value=""> Select a Discount Type </option>'
                );

                $.each(data, function (key, value) {
                    $('select[name^="promo-type"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    DiscountType();
});