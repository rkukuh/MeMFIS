$(document).ready(function () {
    TaskcardType = function () {
        $.ajax({
            url: '/get-aircrafts/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="applicability_airplane"]').empty();

                $('select[name="applicability_airplane"]').append(
                    '<option> Select an Applicability</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="applicability_airplane"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    TaskcardType();
});
