$(document).ready(function () {
    Company = function () {
        $.ajax({
            url: '/get-companiy-types',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#company_type').empty();

                $('#company_type').append(
                    '<option value=""> Select Company Type</option>'
                );

                $.each(data, function (key, value) {
                    $('#company_type').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    Company();
});
