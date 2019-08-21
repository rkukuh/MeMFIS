$(document).ready(function () {
    Sections = function () {
        $.ajax({
            url: '/get-section',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="section"]').empty();

                $('select[name="section"]').append(
                    '<option value=""> Select a Section</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="section"]').append(
                        '<option value="' + value + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    Sections();
});
