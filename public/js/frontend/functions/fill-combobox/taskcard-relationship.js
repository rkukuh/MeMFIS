$(document).ready(function () {
    TaskcardRelationship = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="relationship"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="relationship"]').append(
                            '<option> Select a Taskcard</option>'
                        );

                        index = 0;
                    }

                    $('select[name="relationship"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    TaskcardRelationship();
});
