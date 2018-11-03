$(document).ready(function () {
    category = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="category"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="category"]').append(
                            '<option> Select a Category</option>'
                        );

                        index = 0;
                    }

                    $('select[name="category"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    category();
});
