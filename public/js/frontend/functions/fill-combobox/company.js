$(document).ready(function () {
    Company = function () {
        $.ajax({
            url: '/get-companies',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#company').empty();

                $('#company').append(
                    '<option value=""> Select Company</option>'
                );

                $.each(data, function (key, value) {
                    $('#company').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    Company();
});
