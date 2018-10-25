$(document).ready(function () {
    aviationDegree = function () {
        $.ajax({
            url: '/get-aviation-degree',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka8 = 1;

                $('select[name="aviation_degree"]').empty();

                $.each(data, function (key, value) {
                    if (angka8 == 1) {
                        $('select[name="aviation_degree"]').append(
                            '<option> Select a Aviation Degree</option>'
                        );
                        angka8 = 0;
                    }
                    $('select[name="aviation_degree"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };
    aviationDegree();
});