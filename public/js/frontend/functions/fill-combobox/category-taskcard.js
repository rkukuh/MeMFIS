$(document).ready(function () {
    category = function () {
        $.ajax({
            url: '/get-category-taskcard/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name="category"]').empty();

                $('select[name="category"]').append(
                    '<option> Select a Category</option>'
                );

                $.each(data, function (key, value) {

                    $('select[name="category"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    category();
});
