$(document).ready(function () {
    material = function () {
        $.ajax({
            url: '/get-tools-uuid/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="tool"]').empty();

                $('select[name="tool"]').append(
                    '<option value=""> Select a Tool</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="tool"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    material();
});
