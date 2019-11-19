$(document).ready(function () {
    LeavesType = function () {
        $.ajax({
            url: '/get-leave-types',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="leave_type"]').empty();

                $('select[name="leave_type"]').append(
                    '<option value=""> Select a Leave type</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="leave_type"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    LeavesType();
});
