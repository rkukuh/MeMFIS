$(document).ready(function () {
    RepeatType = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="repeat_type"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="repeat_type"]').append(
                            '<option> Select a Repeat Type</option>'
                        );

                        index = 0;
                    }

                    $('select[name="repeat_type"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    RepeatType();
});
