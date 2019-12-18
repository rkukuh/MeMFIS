$(document).ready(function () {
    TaskcardType = function () {
        $.ajax({
            url: '/get-part-number/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="part_number"]').empty();

                $('select[name="part_number"]').append(
                    '<option value=""> Select a Part Number</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="part_number"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    TaskcardType();
});
