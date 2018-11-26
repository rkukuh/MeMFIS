$(document).ready(function () {
    unitTypes = function () {
        $.ajax({
            url: '/get-unit-types/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="type"]').empty();

                $('select[name="type"]').append(
                    '<option> Select a Type</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="type"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    unitTypes();
});