$(document).ready(function () {
    certification = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="certification"]').empty();

                $('select[name="certification"]').append(
                    '<option> Select a certification</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="certification"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    certification();
});