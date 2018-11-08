$(document).ready(function () {
    Taskcard = function () {
        $.ajax({
            url: '/get-taskcards/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="taskcard"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="taskcard"]').append(
                            '<option> Select a Repeat Type</option>'
                        );

                        index = 0;
                    }

                    $('select[name="taskcard"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    Taskcard();
});
