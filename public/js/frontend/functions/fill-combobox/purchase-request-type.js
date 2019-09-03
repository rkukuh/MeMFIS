$(document).ready(function () {
    PRs = function () {
        $.ajax({
            url: '/get-pr-types/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="purchase-request-type"]').empty();

                $.each(data, function (key, value) {
                    $('select[name="purchase-request-type"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    PRs();
});
